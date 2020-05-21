<?php 

require_once('../model/database.php');
require_once('../model/directoryFunction.php');

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php?action=loginBtn');
	exit();
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    } 
}

if ($action == 'home') {
    $userInfo = getUserInfo($_SESSION['id']);
    $claimedListing = getClaimedListings($_SESSION['id']);
    if ($userInfo['claimed'] > 0){
        $createNewSection = "";
    } else {
        $createNewSection = "
        <a href='?action=createNew&claimedNum=" . $userInfo['claimed'] . "'>
            <div class='home-wrapper'>
                <div class='left'>
                    <img src='../images/add-icon.png'>
                </div>
                <div class='right'>
                    <p>You have no claimed Lawyer listings, create one now.</p>  
                </div>
            </div>
        </a>
        ";
    }
    include('home-dash.php');
} else if ($action == 'logout') {
    session_destroy();
    header('Location: ../index.php');
} else if ($action == 'clientEdit') {
    $userInfo = getUserInfo($_SESSION['id']);
        $favsIDDirty = explode(' ', $userInfo['favorites']);
        $favsIDClean = array();
        $favorites = array();
        $j = count($favsIDDirty);
        for ($x = 1; $x < $j; $x++) {
            $favsIDClean[$x] = (int)$favsIDDirty[$x];
            $favorites[$x] = getLawyerProfile($favsIDClean[$x]);
        }
    
    include('client-dash.php');
} else if ($action == 'clientEditer') {
    $userInfo = getUserInfo($_SESSION['id']);
    include('clientEditer.php');
} else if ($action == 'clientEdited') {
    $names = explode(' ', $_POST['name']);
    $firstName = $names[0];
    $lastName = $names[1];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    dashUpdate($firstName, $lastName, $phone, $email, $pass, $_SESSION['id']);
    header('Location: ./?action=clientEdit');
} else if ($action == 'passReset'){
    include('passwordReset.php');
} else if ($action == 'passResetComplete'){
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $id = $_SESSION['id'];

    updatePass($pass, $id);
    header('Location: ./?action=home');
} else if ($action == 'favRemove'){
    $id = $_SESSION['id'];
    $lawID = (string)$_GET['lawyerID'];
    $userInfo2 = getUserInfo($id);
    $currentFavList = $userInfo2['favorites'];
    $favArray = explode(" ", $currentFavList);
    $keyRemove = array_search($lawID, $favArray);
    unset($favArray[$keyRemove]);
    $newFavArray = implode(" ", $favArray);
    addFav($id, $newFavArray);
    header('Location: ./?action=clientEdit');
} else if ($action == 'createNew') {
    $userInfo = getUserInfo($_SESSION['id']);
    $claimedNum = $userInfo['claimed'];
    include('create_listing.php');
} else if ($action == 'createNewSubmit') {
    $name = $_POST['name'];
    $workplace = $_POST['workplace'];
    $startDate = $_POST['startDate'];
    $barID = $_POST['barID'];
    $barDate = $_POST['barDate'];
    $errorCode = $_SESSION['id'] . "-N";

    if ($name == "") {
        header('Location: ./?action=createNew');
    } else {
        newLawyer($name, $workplace, $startDate, $barID, $barDate, $errorCode);
        header('Location: ./?action=creationStatus');
    }
} else if ($action == 'creationStatus') {
    $userInfo = getUserInfo($_SESSION['id']);
    $searchCode = $_SESSION['id'] . "-N";
    $unfinishedListings = getUnclaimedListings($searchCode);
    include('testerPage.php');
} else if ($action == 'finishCreateForm') {
    $lawyerID = $_GET['lawyerID'];
    $userInfo = getUserInfo($_SESSION['id']);
    include('create_listing_2.php');
} else if ($action == 'finishCreate') {
    $lawyerID = $_POST['lawyerID'];
    $claimedNew = (int)$_POST['claimedNumOri'];
    $claimedNew++;
    $claimedID = $_SESSION['id'];
    addClaim($_SESSION['id'], $claimedNew);
    $Null = NULL;
    updateError($lawyerID, $Null);
    updateClaimed($lawyerID, $claimedID);

    $expTitle = $_POST['expTitle'];
    $expDur = $_POST['expDur'];
    $eduSchool = $_POST['eduSchool'];
    $eduContent = $_POST['eduContent'];
    $expCheck = $_POST['expCheck'];
    $eduCheck = $_POST['eduCheck'];
    $addressCheck = $_POST['addressCheck'];

    if ($expCheck == TRUE) {
        newLawyerExp($lawyerID, $expTitle, $expDur);
        newLawyerExp($lawyerID, $Null, $Null);
    } else {
        newLawyerExp($lawyerID, $expTitle, $expDur);
    }

    if ($eduCheck == TRUE) {
        newLawyerEdu($lawyerID, $eduSchool, $eduContent);
        newLawyerEdu($lawyerID, $Null, $Null);
    } else {
        newLawyerEdu($lawyerID, $eduSchool, $eduContent);
    }

    if ($addressCheck == TRUE) {
        newLawyerAddress($lawyerID, $Null, $Null, $Null, $Null);
        newLawyerAddress($lawyerID, $Null, $Null, $Null, $Null);
    } else {
        newLawyerAddress($lawyerID, $Null, $Null, $Null, $Null);
    }

    $target_dir = "../images/lawyer-profiles/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $photoPath = basename( $_FILES["fileToUpload"]["name"]);
    profileUpload($lawyerID, $photoPath);

    header('Location: ./?action=home');
} else if ($action == 'depthEdit') {
    $lawyerID = $_GET['lawyerID'];
    $lawyerMainInfo = getLawyerProfile($lawyerID);
    $lawyerExpInfo = getLawyerExperience($lawyerID);
    $exCount = count($lawyerExpInfo);
    if($exCount > 1) {
        $experienceThis = "
        <div class='wrapped-item'>
            <label for='expPlace'>Place of Experience</label>
            <input type='text' name='expPlace' value='" . $lawyerExpInfo[0]['projectTitle'] ."'>
        </div>
        <div class='wrapped-item'>
            <label for='expDuration'>Duration</label>
            <input type='text' name='expDuration' value='" . $lawyerExpInfo[0]['projectDuration'] ."'>
        </div>
        <input type='hidden' name='expRowNum' value='" . $lawyerExpInfo[0]['rowNum'] . "'>
        <div class='wrapped-item'>
            <label for='expPlace2'>Place of Experience 2</label>
            <input type='text' name='expPlace2' value='" . $lawyerExpInfo[1]['projectTitle'] ."'>
        </div>
        <div class='wrapped-item'>
            <label for='expDuration2'>Duration 2</label>
            <input type='text' name='expDuration2' value='" . $lawyerExpInfo[1]['projectDuration'] ."'>
        </div>
        <input type='hidden' name='expRowNum2' value='" . $lawyerExpInfo[1]['rowNum'] . "'>
        ";
    } else {
        $experienceThis = "
        <div class='wrapped-item'>
            <label for='expPlace'>Place of Experience</label>
            <input type='text' name='expPlace' value='" . $lawyerExpInfo[0]['projectTitle'] ."'>
        </div>
        <div class='wrapped-item'>
            <label for='expDuration'>Duration</label>
            <input type='text' name='expDuration' value='" . $lawyerExpInfo[0]['projectDuration'] ."'>
        </div>
        <input type='hidden' name='expRowNum' value='" . $lawyerExpInfo[0]['rowNum'] . "'>
        ";
    }
    $lawyerEduInfo = getLawyerEducation($lawyerID);
    if (count($lawyerEduInfo) > 1){
        $educationThis = "
        <div class='wrapped-item'>
            <label for='eduSchool'>Education</label>
            <input type='text' name='eduSchool' value='" . $lawyerEduInfo[0]['eduTitle'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='eduContent'>Education Content</label>
            <input type='text' name='eduContent' value='" . $lawyerEduInfo[0]['eduContent'] . "'>
        </div>
        <input type='hidden' name='eduRowNum' value='" . $lawyerEduInfo[0]['rowNum'] . "'>
        <div class='wrapped-item'>
            <label for='eduSchool2'>Education 2</label>
            <input type='text' name='eduSchool2' value='" . $lawyerEduInfo[1]['eduTitle'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='eduContent2'>Education Content 2</label>
            <input type='text' name='eduContent2' value='" . $lawyerEduInfo[1]['eduContent'] . "'>
        </div>
        <input type='hidden' name='eduRowNum2' value='" . $lawyerEduInfo[1]['rowNum'] . "'>
        ";
    } else {
        $educationThis = "
        <div class='wrapped-item'>
            <label for='eduSchool'>Education</label>
            <input type='text' name='eduSchool' value='" . $lawyerEduInfo[0]['eduTitle'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='eduContent'>Education Content</label>
            <input type='text' name='eduContent' value='" . $lawyerEduInfo[0]['eduContent'] . "'>
        </div>
        <input type='hidden' name='eduRowNum' value='" . $lawyerEduInfo[0]['rowNum'] . "'>
        ";
    }
    $lawyerAddressInfo = getAddress($lawyerID);
    if (count($lawyerAddressInfo) > 1) {
        $addressThis = "
        <div class='wrapped-item'>
            <label for='addressAdd'>Address</label>
            <input type='text' name='addressAdd' value='" . $lawyerAddressInfo[0]['address'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressCity'>City</label>
            <input type='text' name='addressCity' value='" . $lawyerAddressInfo[0]['city'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressZip'>Zipcode</label>
            <input type='text' name='addressZip' value='" . $lawyerAddressInfo[0]['zipcode'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressPhone'>Phone</label>
            <input type='text' name='addressPhone' value='" . $lawyerAddressInfo[0]['phoneNum'] . "'>
        </div>
        <input type='hidden' name='addressRowNum' value='" . $lawyerAddressInfo[0]['rowNum'] . "'>
        <div class='wrapped-item'>
            <label for='addressAdd2'>Address 2</label>
            <input type='text' name='addressAdd2' value='" . $lawyerAddressInfo[1]['address'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressCity2'>City 2</label>
            <input type='text' name='addressCity2' value='" . $lawyerAddressInfo[1]['city'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressZip2'>Zipcode 2</label>
            <input type='text' name='addressZip2' value='" . $lawyerAddressInfo[1]['zipcode'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressPhone2'>Phone 2</label>
            <input type='text' name='addressPhone2' value='" . $lawyerAddressInfo[1]['phoneNum'] . "'>
        </div> 
        <input type='hidden' name='addressRowNum2' value='" . $lawyerAddressInfo[1]['rowNum'] . "'>       
        ";
    } else {
        $addressThis = "
        <div class='wrapped-item'>
            <label for='addressAdd'>Address</label>
            <input type='text' name='addressAdd' value='" . $lawyerAddressInfo[0]['address'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressCity'>City</label>
            <input type='text' name='addressCity' value='" . $lawyerAddressInfo[0]['city'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressZip'>Zipcode</label>
            <input type='text' name='addressZip' value='" . $lawyerAddressInfo[0]['zipcode'] . "'>
        </div>
        <div class='wrapped-item'>
            <label for='addressPhone'>Phone</label>
            <input type='text' name='addressPhone' value='" . $lawyerAddressInfo[0]['phoneNum'] . "'>
        </div>
        <input type='hidden' name='addressRowNum' value='" . $lawyerAddressInfo[0]['rowNum'] . "'>
        ";
    }
    $allCategories = getAllCategories();
    if ($_SESSION['id'] !== $lawyerMainInfo['claimedID']){
        header('Location: ./?action=home');
    }
    include('depthListingEdit.php');
} else if ($action == 'lawyerDepthEdit') {
    $lawyerID = $_POST['lawyerID'];
    $name = $_POST['name'];
    $workPlace = $_POST['workPlace'];
    $years = $_POST['startDate'];
    $barID = $_POST['barID'];
    $barDate = $_POST['barDate'];
    $cate1 = $_POST['cate1'];
    if ($cate1 == "") {
        $cate1 = NULL;
    }
    $cate2 = $_POST['cate2'];
    if ($cate2 == "") {
        $cate2 = NULL;
    }
    $cate3 = $_POST['cate3'];
    if ($cate3 == "") {
        $cate3 = NULL;
    }
    $cate4 = $_POST['cate4'];
    if ($cate4 == "") {
        $cate4 = NULL;
    }
    $cate5 = $_POST['cate5'];
    if ($cate5 == "") {
        $cate5 = NULL;
    }
    setLawyerProfile1($lawyerID, $name, $workPlace, $years, $barID, $barDate);
    setLawyerProfile2($lawyerID, $cate1, $cate2, $cate3, $cate4, $cate5);
    
    if(isset($_POST['expPlace2'])) {
        $lawyerExpPlace = $_POST['expPlace'];
        $lawyerExpDur = $_POST['expDuration'];
        $lawyerExpRow = $_POST['expRowNum'];
        $lawyerExpPlace2 = $_POST['expPlace2'];
        $lawyerExpDur2 = $_POST['expDuration2'];
        $lawyerExpRow2 = $_POST['expRowNum2'];

        setLawyerExperience($lawyerExpRow, $lawyerID, $lawyerExpPlace, $lawyerExpDur);
        setLawyerExperience($lawyerExpRow2, $lawyerID, $lawyerExpPlace2, $lawyerExpDur2);
    } else {
        $lawyerExpPlace = $_POST['expPlace'];
        $lawyerExpDur = $_POST['expDuration'];
        $lawyerExpRow = $_POST['expRowNum'];
        setLawyerExperience($lawyerExpRow, $lawyerID, $lawyerExpPlace, $lawyerExpDur);
    }

    if (isset($_POST['eduSchool2'])) {
        $lawyerEduSchool = $_POST['eduSchool'];
        $lawyerEduContent = $_POST['eduContent'];
        $lawyerEduRowNum = $_POST['eduRowNum'];
        $lawyerEduSchool2 = $_POST['eduSchool2'];
        $lawyerEduContent2 = $_POST['eduContent2'];
        $lawyerEduRowNum2 = $_POST['eduRowNum2'];
        setLawyerEducation($lawyerEduRowNum, $lawyerID, $lawyerEduSchool, $lawyerEduContent);
        setLawyerEducation($lawyerEduRowNum2, $lawyerID, $lawyerEduSchool2, $lawyerEduContent2);
    } else {
        $lawyerEduSchool = $_POST['eduSchool'];
        $lawyerEduContent = $_POST['eduContent'];
        $lawyerEduRowNum = $_POST['eduRowNum'];
        setLawyerEducation($lawyerEduRowNum, $lawyerID, $lawyerEduSchool, $lawyerEduContent);
    }

    if (isset($_POST['addressAdd2'])){
        $lawyerAddAddress = $_POST['addressAdd'];
        $lawyerAddCity = $_POST['addressCity'];
        $lawyerAddzip = $_POST['addressZip'];
        $lawyerAddPhone = $_POST['addressPhone'];
        $lawyerAddressRowNum = $_POST['addressRowNum'];
        $lawyerAddAddress2 = $_POST['addressAdd2'];
        $lawyerAddCity2 = $_POST['addressCity2'];
        $lawyerAddzip2 = $_POST['addressZip2'];
        $lawyerAddPhone2 = $_POST['addressPhone2'];
        $lawyerAddressRowNum2 = $_POST['addressRowNum2'];
        setAddress($lawyerAddressRowNum, $lawyerID, $lawyerAddAddress, $lawyerAddCity, $lawyerAddzip, $lawyerAddPhone);
        setAddress($lawyerAddressRowNum2, $lawyerID, $lawyerAddAddress2, $lawyerAddCity2, $lawyerAddzip2, $lawyerAddPhone2);
    } else {
        $lawyerAddAddress = $_POST['addressAdd'];
        $lawyerAddCity = $_POST['addressCity'];
        $lawyerAddzip = $_POST['addressZip'];
        $lawyerAddPhone = $_POST['addressPhone'];
        $lawyerAddressRowNum = $_POST['addressRowNum'];
        setAddress($lawyerAddressRowNum, $lawyerID, $lawyerAddAddress, $lawyerAddCity, $lawyerAddzip, $lawyerAddPhone);
    }
    
    header('Location: ./?action=home');
} else if ($action == 'moreClaimed') {
    $userInfo = getUserInfo($_SESSION['id']);
    $allUnClaimed = getNotclaimedListings();
    $allYourClaimed = getClaimedListings($_SESSION['id']);
    include('moreClaimed.php');
} else if ($action == 'moreClaimedAdd') {
    $userInfo = getUserInfo($_SESSION['id']);
    $claimedNum = (int)$userInfo['claimed'];
    $lawyerID = $_GET['lawyerID'];
    $claimedNum++;
    addClaim($_SESSION['id'], $claimedNum);
    updateClaimed($lawyerID, $_SESSION['id']);
    header('Location: ./?action=home');
} else if ($action == 'moreClaimedRemove') {
    $userInfo = getUserInfo($_SESSION['id']);
    $claimedNum = (int)$userInfo['claimed'];
    $lawyerID = $_GET['lawyerID'];
    $claimedNum--;
    addClaim($_SESSION['id'], $claimedNum);
    updateClaimed($lawyerID, NULL);
    header('Location: ./?action=home');
}