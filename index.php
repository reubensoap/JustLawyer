<?php

require_once('model/database.php');
require_once('model/directoryFunction.php');

session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}


if (!isset($_SESSION['loggedin'])) {
	$header = "views/main-header.php";
} else {
    $header = "views/main-header-loggedin.php";
}


if ($action == 'home') {
    $listCate = getAllCategories();
    include('main.php');
} else if ($action == 'logout') {
    session_destroy();
    header('Location: index.php');
} else if ($action == 'directoryName') {
    $sectionLetterHead = $_GET['sectionLetter'];
    $section = getSection($_GET['sectionLetter']);
    include('directoryName.php');
} else if ($action == 'lawyer-profile') {
    $profile = getLawyerProfile($_GET['lawyerID']);
    $profileName = $profile['name'];
    $directoryIndex = substr($profileName, 0, 1);
    $lawyerEducation = getLawyerEducation($_GET['lawyerID']);
    $lawyerExperience = getLawyerExperience($_GET['lawyerID']);
    if ($profile['cate2'] == NULL) {
        $finalList = $profile['cate1'];
        $finalList2 = $profile['cate1'];
    } else if ($profile['cate3'] == NULL){
        $finalList = $profile['cate1']. " and ". $profile['cate2'];
        $finalList2 = $profile['cate1']. " and ". $profile['cate2'];
    } else if ($profile['cate4'] == NULL) {
        $finalList = $profile['cate1']. ", ". $profile['cate2']. " and ". $profile['cate3'];
        $finalList2 = $profile['cate1']. ", ". $profile['cate2']. " and ". $profile['cate3'];
    } else if ($profile['cate5'] == NULL) {
        $finalList = $profile['cate1']. ", ". $profile['cate2']. ", ". $profile['cate3']. " and ". $profile['cate4'];
        $finalList2 = $profile['cate1']. ", ". $profile['cate2']. ", ". $profile['cate3']. " and ". $profile['cate4'];
    } else {
        $finalList = $profile['cate1']. ", ". $profile['cate2']. ", ". $profile['cate3']. ", ". $profile['cate4']. " and ". $profile['cate5'];
        $finalList2 = $profile['cate1']. ", ". $profile['cate2']. ", ". $profile['cate3']. ", ". $profile['cate4']. " and ". $profile['cate5'];
    }
    $currentdate = date('Y', time());
    $intCurrentDate = (INT)$currentdate;
    $intProfileYears = (INT)$profile['years'];
    $YWorth = $intCurrentDate - $intProfileYears;
    $address = getAddress($_GET['lawyerID']);

    if (!isset($_SESSION['loggedin'])) {
        $favDiv = "<div class='header-tag'>
        <a href='?action=signup' class='thirdBtn'>Add To Your Favorite List? Sign Up</a>
        </div>";
    } else {
        $id = $_SESSION['id'];
        $lawID = $_GET['lawyerID'];
        $userInfo2 = getUserInfo($id);
        $currentFavList = $userInfo2['favorites'];
        $favArray = explode(" ", $currentFavList);
        $favFinder = 0;
        $j = count($favArray);
        for($i = 0; $i < $j; $i++){
            if ($lawID == (int)$favArray[$i]){
                $favFinder = 1;
            }
        }
        if ($favFinder == 0) {
            $favDiv = "<div class='header-tag'>
            <a href='?action=addFav&lawID=". $_GET['lawyerID'] ."' class='thirdBtn'>Add To Favorites</a>
            </div>";
        } else {
            $favDiv = "<div class='header-tag'>
            <a href='#' class='thirdBtn'>Favorited</a>
            </div>";
        }
    }
    $allClaimed = getAllClaimedListings();
    shuffle($allClaimed);
    $claimedDisplay = array();
    for($x = 0; $x < 3; $x++) {
        $claimedDisplay[$x] = $allClaimed[$x];
    }
    include('profile-page.php');
} else if ($action == 'directoryMain') {
    $allProfiles = getAllProfiles();
    $allCategories = getAllCategories();
    $cities = getCities();
    $exam = $_GET['area'];
    $areaFilter = $_GET['area'];
    $cityFilter = $_GET['city'];
    if ($cityFilter == 'areaOnly' && ($areaFilter == 'cityOnly')) {
        $Filtered = getAllInfoTotal();
        include('directoryMain.php');
    } else if ($_GET['areaOnly'] == 1 || $cityFilter == 'areaOnly') {
        $Filtered = getAllInfoAreaOnly($areaFilter);
        include('directoryMain.php');
    } else if ($_GET['cityOnly'] == 1 || $areaFilter == 'cityOnly') {
        $Filtered = getAllInfoCityOnly($cityFilter);
        include('directoryMain.php');
    } else {
        $Filtered = getAllInfo($areaFilter, $cityFilter);
        include('directoryMain.php'); 
    } 
} else if ($action == 'searchBar'){
    $allProfiles = getAllProfiles();
    $allCategories = getAllCategories();
    $cities = getCities();

    if ($_POST['area'] == NULL) {
        $areaFilter = $_POST['city'];
        $cityFilter = $_POST['city'];
    } else {
        if ($_POST['city'] == NULL){
            $areaFilter = $_POST['area'];
            $cityFilter = $_POST['area'];
        } else {
            $areaFilter = $_POST['area'];
            $cityFilter = $_POST['city'];
        }
    }
    $Filtered = getAllInfoSearch($areaFilter, $cityFilter);
    include('directoryMain.php');
} else if ($action == 'faq') {
    include('faq.php');
} else if ($action == 'signup'){
    include('signup.php');
} else if ($action == 'signupForm'){
    include('signupForm.php');
} else if ($action == 'loginBtn'){
    if (!isset($_SESSION['loggedin'])) {
        include('login.php');
    } else {
        header('Location: dashboard');
    }
    
} else if ($action == 'signupSubmit'){

    $email = $_POST['email'];
    informalCreation($email);
    $to = $email;
    $subject = "HTML email";

    $message = "
    <html>
    <head>
    <title>HTML email</title>
    </head>
    <body>
    <p>This email contains HTML Tags!</p>
    <table>
    <tr>
    <th>Check This Out</th>
    </tr>
    <tr>
    <td>Please Click on the link below to create your profile: </td>
    </tr>
    <tr>
    <td><a href='www.reubentest.site?action=creationForm'>Click Here</a> </td>
    </tr>
    </table>
    </body>
    </html>
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <reubencode117@gmail.com>' . "\r\n";

    if (mail($to,$subject,$message,$headers)) {
        echo "Message accepted";
    } else {
        echo "Error: Message not accepted";
    }
    include('faq.php');
} else if ($action == 'creationForm') {
    include('creationForm.php');
} else if ($action == 'verify-creationForm') {
    $email = $_POST['email'];
    $verEmail = getUserEmail($email);
    if ($verEmail == NULL) {
        echo " Error: Input Not Valid";
        include('creationForm.php');
    } else {
        include('finalCreationForm.php');
    }
} else if ($action == 'creationComplete') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    completeCreation($firstName, $lastName, $pass, $email);
    include('login.php');
} else if ($action == 'forgot') {
    include('passForgot.php');
} else if ($action == 'forgotPass') {
    $verEmail = getUserEmail($_POST['email']);
    if ($verEmail == NULL) {
        echo " Error: Input Not Valid";
        header('Location: ./?action=forgot');
    } else {
        $email = $_POST['email'];
        $to = $email;
        $subject = "JustLawyer Password Reset";
        $message = "
        <html>
        <head>
        <title>Password Reset</title>
        </head>
        <body>
        <p>We were notified of your request.</p>
        <table>
        <tr>
        <th>Follow these steps:</th>
        </tr>
        <tr>
        <td>Please Click on the link below to update your Password: </td>
        </tr>
        <tr>
        <td><a href='www.reubentest.site?action=passReset'>Click Here</a> </td>
        </tr>
        </table>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <reubencode117@gmail.com>' . "\r\n";

        mail($to,$subject,$message,$headers);
        echo"Password Reset Email Sent.";
        header('Location: ./?action=forgot');
        }
} else if ($action == 'passReset') {
    include('passReset.php');
} else if ($action == 'password-verif') {
    $verEmail = getUserEmail($_POST['email']);
    if ($verEmail == NULL) {
        echo " Error: Input Not Valid";
        header('Location: ./?action=passReset');
    } else {
        $email = $_POST['email'];
        session_start();
        $userInfo = dashLogVerify($email);
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $userInfo['UserID'];
        header('Location: dashboard/?action=passReset');
    }
} else if ($action == 'addFav') {
    $id = $_SESSION['id'];
    $lawID = $_GET['lawID'];
    $userInfo1 = getUserInfo($id);
    $currentFavList = $userInfo1['favorites'];
    $additionalFav = (string)$lawID;
    $newFavList = $currentFavList . " " . $additionalFav;
    addFav($id, $newFavList);
    header('Location: ?action=lawyer-profile&lawyerID='. $lawID);
}



?>