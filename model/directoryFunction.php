<?php

function getSection($letter) {
    global $db;
    $query = "SELECT name, lawyerID FROM lawyerLawyerProfile WHERE name LIKE CONCAT(:letter, '%')"; 
    $statement1 = $db->prepare($query);
    /*$statement1->bindValue(':letter', $letter, PDO::PARAM_STR);*/
    $statement1->execute(['letter' => $letter]);
    $return = $statement1->fetchAll();
    $statement1->closeCursor();
    return $return;
}

function getCities() {
    global $db;
    $query = "SELECT DISTINCT city FROM lawyerLawyerAddress";
    $stmt10 = $db->prepare($query);
    $stmt10->execute();
    $return = $stmt10->fetchAll();
    $stmt10->closeCursor();
    return $return;
}

function getLawyerProfile($ID) {
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile WHERE lawyerID = :ID";
    $stmt1 = $db->prepare($query);
    $stmt1->execute(['ID' => $ID]);
    $return = $stmt1->fetch();
    $stmt1->closeCursor();
    return $return;
}

function setLawyerProfile1($ID, $name, $place, $years, $barID, $barDate){
    global $db;
    $query = "UPDATE lawyerLawyerProfile
                SET name = :name, placeOfWork = :place, years = :years, barID = :barID, barDate = :barDate
                WHERE lawyerID = :ID";
    $stmt32 = $db->prepare($query);
    $stmt32->execute(['name' => $name, 'place' => $place, 'years' => $years, 'barID' => $barID, 'barDate' => $barDate, 'ID' => $ID]);
    $stmt32->closeCursor();
}

function setLawyerProfile2($ID, $cate1, $cate2, $cate3, $cate4, $cate5){
    global $db;
    $query = "UPDATE lawyerLawyerProfile
                SET cate1 = :cate1, cate2 = :cate2, cate3 = :cate3, cate4 = :cate4, cate5 = :cate5
                WHERE lawyerID = :ID";
    $stmt33 = $db->prepare($query);
    $stmt33->execute(['cate1' => $cate1, 'cate2' => $cate2, 'cate3' => $cate3, 'cate4' => $cate4, 'cate5' => $cate5, 'ID' => $ID]);
    $stmt33->closeCursor();
}

function getLawyerExperience($ID) {
    global $db;
    $query = "SELECT * FROM lawyerLawyerExperience WHERE lawyerID = :ID";
    $stmt11 = $db->prepare($query);
    $stmt11->execute(['ID' => $ID]);
    $return = $stmt11->fetchAll();
    $stmt11->closeCursor();
    return $return;
}

function setLawyerExperience($rowNum, $ID, $expPlace, $expDur){
    global $db;
    $query = "UPDATE lawyerLawyerExperience
                SET projectTitle = :expPlace, projectDuration = :expDur
                WHERE rowNum = :rowNum AND lawyerID = :ID";
    $stmt23 = $db->prepare($query);
    $stmt23->execute(['expPlace' => $expPlace, 'expDur' => $expDur, 'ID' => $ID, 'rowNum' => $rowNum]);
    $stmt23->closeCursor();
}

function getLawyerEducation($ID) {
    global $db;
    $query = "SELECT * FROM lawyerLawyerEducation WHERE lawyerID = :ID";
    $stmt11 = $db->prepare($query);
    $stmt11->execute(['ID' => $ID]);
    $return = $stmt11->fetchAll();
    $stmt11->closeCursor();
    return $return;
}

function setLawyerEducation($rowNum, $ID, $eduTitle, $eduContent){
    global $db;
    $query = "UPDATE lawyerLawyerEducation
                SET eduTitle = :title, eduContent = :content
                WHERE rowNum = :rowNum AND lawyerID = :ID";
    $stmt25 = $db->prepare($query);
    $stmt25->execute(['title' => $eduTitle, 'content' => $eduContent, 'ID' => $ID, 'rowNum' => $rowNum]);
    $stmt25->closeCursor();
}

function getCategoryNames1($one) {
    global $db;
    $query = 'SELECT * FROM lawyerLawyerCategories WHERE categorieID IN (:one)';
    $stmt2 = $db->prepare($query);
    $stmt2->execute(['one' => $one]);
    $return = $stmt2->fetchAll();
    $stmt2->closeCursor();
    return $return;
}

function getCategoryNames2($one, $two) {
    global $db;
    $query = 'SELECT * FROM lawyerLawyerCategories WHERE categorieID IN (:one, :two)';
    $stmt2 = $db->prepare($query);
    $stmt2->execute(['one' => $one, 'two' => $two]);
    $return = $stmt2->fetchAll();
    $stmt2->closeCursor();
    return $return;
}

function getCategoryNames3($one, $two, $three) {
    global $db;
    $query = 'SELECT * FROM lawyerLawyerCategories WHERE categorieID IN (:one, :two, :three)';
    $stmt3 = $db->prepare($query);
    $stmt3->execute(['one' => $one, 'two' => $two, 'three' => $three]);
    $return = $stmt3->fetchAll();
    $stmt3->closeCursor();
    return $return;
}

function getCategoryNames4($one, $two, $three, $four) {
    global $db;
    $query = 'SELECT * FROM lawyerLawyerCategories WHERE categorieID IN (:one, :two, :three, :four)';
    $stmt3 = $db->prepare($query);
    $stmt3->execute(['one' => $one, 'two' => $two, 'three' => $three, 'four' => $four]);
    $return = $stmt3->fetchAll();
    $stmt3->closeCursor();
    return $return;
}

function getCategoryNames5($one, $two, $three, $four, $five) {
    global $db;
    $query = 'SELECT cateName FROM lawyerLawyerCategories WHERE categorieID IN (:one, :two, :three, :four, :five)';
    $stmt4 = $db->prepare($query);
    $stmt4->execute(['one' => $one, 'two' => $two, 'three' => $three, 'four' => $four, 'five' => $five]);
    $return = $stmt4->fetchAll();
    $stmt4->closeCursor();
    return $return;
}

function getAddress($ID) {
    global $db;
    $query = 'SELECT * FROM lawyerLawyerAddress WHERE lawyerID = :ID';
    $stmt5 = $db->prepare($query);
    $stmt5->execute(['ID' => $ID]);
    $return = $stmt5->fetchAll();
    $stmt5->closeCursor();
    return $return;
}

function setAddress($rowNum, $ID, $addAddress, $addCity, $addZip, $addPhone){
    global $db;
    $query = "UPDATE lawyerLawyerAddress 
                SET address = :address, city = :city, zipcode = :zip, phoneNum = :phone
                WHERE rowNum = :rowNum AND lawyerID = :ID";
    $stmt24 = $db->prepare($query);
    $stmt24->execute(['address' => $addAddress, 'city' => $addCity, 'zip' => $addZip, 'phone' => $addPhone, 'ID' => $ID, 'rowNum' => $rowNum]);
    $stmt24->closeCursor();
}

function getAllProfiles() {
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile";
    $stmt6 = $db->prepare($query);
    $stmt6->execute();
    $return = $stmt6->fetchAll();
    $stmt6->closeCursor();
    return $return;
}

function getAllCategories() {
    global $db;
    $query = "SELECT cateName FROM lawyerLawyerCategories";
    $stmt7 = $db->prepare($query);
    $stmt7->execute();
    $return = $stmt7->fetchAll();
    $stmt7->closeCursor();
    return $return;
}

function getAllInfo($area, $city) {
    global $db;
    $query = "SELECT DISTINCT lawyerLawyerAddress.city, lawyerLawyerAddress.address, lawyerLawyerAddress.zipcode, lawyerLawyerAddress.phoneNum, lawyerLawyerProfile.name, lawyerLawyerProfile.lawyerID, lawyerLawyerProfile.years, lawyerLawyerProfile.cate1, lawyerLawyerProfile.cate2, lawyerLawyerProfile.cate3, lawyerLawyerProfile.cate4, lawyerLawyerProfile.cate5, lawyerLawyerProfile.placeOfWork, lawyerLawyerProfile.profilePhoto
            FROM lawyerLawyerAddress INNER JOIN lawyerLawyerProfile ON lawyerLawyerAddress.lawyerID = lawyerLawyerProfile.lawyerID
            WHERE lawyerLawyerAddress.city = :city AND (lawyerLawyerProfile.cate1 = :area OR lawyerLawyerProfile.cate2 = :area OR lawyerLawyerProfile.cate3 = :area OR lawyerLawyerProfile.cate4 = :area OR lawyerLawyerProfile.cate5 = :area)";
    $stmt9 = $db->prepare($query);
    $stmt9->execute(['area' => $area, 'city' => $city]);
    $return = $stmt9->fetchAll();
    $stmt9->closeCursor();
    return $return;
}

function getAllInfoCityOnly($city) {
    global $db;
    $query = "SELECT DISTINCT lawyerLawyerAddress.city, lawyerLawyerAddress.address, lawyerLawyerAddress.zipcode, lawyerLawyerAddress.phoneNum, lawyerLawyerProfile.name, lawyerLawyerProfile.lawyerID, lawyerLawyerProfile.years, lawyerLawyerProfile.cate1, lawyerLawyerProfile.cate2, lawyerLawyerProfile.cate3, lawyerLawyerProfile.cate4, lawyerLawyerProfile.cate5, lawyerLawyerProfile.placeOfWork, lawyerLawyerProfile.profilePhoto
            FROM lawyerLawyerAddress INNER JOIN lawyerLawyerProfile ON lawyerLawyerAddress.lawyerID = lawyerLawyerProfile.lawyerID
            WHERE lawyerLawyerAddress.city = :city";
    $stmt9 = $db->prepare($query);
    $stmt9->execute(['city' => $city]);
    $return = $stmt9->fetchAll();
    $stmt9->closeCursor();
    return $return;
}

function getAllInfoAreaOnly($area) {
    global $db;
    $query = "SELECT DISTINCT lawyerLawyerAddress.city, lawyerLawyerAddress.address, lawyerLawyerAddress.zipcode, lawyerLawyerAddress.phoneNum, lawyerLawyerProfile.name, lawyerLawyerProfile.lawyerID, lawyerLawyerProfile.years, lawyerLawyerProfile.cate1, lawyerLawyerProfile.cate2, lawyerLawyerProfile.cate3, lawyerLawyerProfile.cate4, lawyerLawyerProfile.cate5, lawyerLawyerProfile.placeOfWork, lawyerLawyerProfile.profilePhoto
            FROM lawyerLawyerAddress INNER JOIN lawyerLawyerProfile ON lawyerLawyerAddress.lawyerID = lawyerLawyerProfile.lawyerID
            WHERE lawyerLawyerProfile.cate1 = :area OR lawyerLawyerProfile.cate2 = :area OR lawyerLawyerProfile.cate3 = :area OR lawyerLawyerProfile.cate4 = :area OR lawyerLawyerProfile.cate5 = :area";
    $stmt9 = $db->prepare($query);
    $stmt9->execute(['area' => $area]);
    $return = $stmt9->fetchAll();
    $stmt9->closeCursor();
    return $return;
}

function getAllInfoTotal() {
    global $db;
    $query = "SELECT DISTINCT lawyerLawyerAddress.city, lawyerLawyerAddress.address, lawyerLawyerAddress.zipcode, lawyerLawyerAddress.phoneNum, lawyerLawyerProfile.name, lawyerLawyerProfile.lawyerID, lawyerLawyerProfile.years, lawyerLawyerProfile.cate1, lawyerLawyerProfile.cate2, lawyerLawyerProfile.cate3, lawyerLawyerProfile.cate4, lawyerLawyerProfile.cate5, lawyerLawyerProfile.placeOfWork, lawyerLawyerProfile.profilePhoto
            FROM lawyerLawyerAddress INNER JOIN lawyerLawyerProfile ON lawyerLawyerAddress.lawyerID = lawyerLawyerProfile.lawyerID";
    $stmt9 = $db->prepare($query);
    $stmt9->execute();
    $return = $stmt9->fetchAll();
    $stmt9->closeCursor();
    return $return;
}

function getAllInfoSearch($area, $city) {
    global $db;
    $query = "SELECT DISTINCT lawyerLawyerAddress.city, lawyerLawyerAddress.address, lawyerLawyerAddress.zipcode, lawyerLawyerAddress.phoneNum, lawyerLawyerProfile.name, lawyerLawyerProfile.lawyerID, lawyerLawyerProfile.years, lawyerLawyerProfile.cate1, lawyerLawyerProfile.cate2, lawyerLawyerProfile.cate3, lawyerLawyerProfile.cate4, lawyerLawyerProfile.cate5, lawyerLawyerProfile.placeOfWork, lawyerLawyerProfile.profilePhoto, lawyerLawyerCategories.cateName
    FROM lawyerLawyerAddress INNER JOIN lawyerLawyerProfile ON lawyerLawyerAddress.lawyerID = lawyerLawyerProfile.lawyerID INNER JOIN lawyerLawyerCategories ON lawyerLawyerProfile.cate1 = lawyerLawyerCategories.categorieID
    WHERE lawyerLawyerAddress.city LIKE CONCAT('%', :city, '%') OR lawyerLawyerProfile.name LIKE CONCAT('%', :area, '%') OR lawyerLawyerCategories.cateName LIKE CONCAT('%', :area, '%')";
    $stmt10 = $db->prepare($query);
    $stmt10->execute(['area' => $area, 'city' => $city]);
    $return = $stmt10->fetchAll();
    $stmt10->closeCursor();
    return $return;
}

function informalCreation($email) {
    global $db;
    $query = "INSERT INTO lawyerUserList (email)
                VALUES (:email)";
    $stmt11 = $db->prepare($query);
    $stmt11->execute(['email' => $email]);
    $stmt11->closeCursor();
}

function getUserEmail($email) {
    global $db;
    $query = "SELECT email FROM lawyerUserList 
                WHERE email = :email";
    $stmt12 = $db->prepare($query);
    $stmt12->execute(['email' => $email]);
    $return = $stmt12->fetch();
    $stmt12->closeCursor();
    return $return;
}

function completeCreation($firstName, $lastName, $pass, $email){
    global $db;
    $query = "UPDATE lawyerUserList
                SET firstName = :firstName, lastName = :lastName, pass = :pass
                WHERE email = :email";
    $stmt13 = $db->prepare($query);
    $stmt13->execute(['firstName' => $firstName, 'lastName' => $lastName, 'pass' => $pass, 'email' => $email]);
    $stmt13->closeCursor();
}

function addFav($id, $newFavList) {
    global $db;
    $query = "UPDATE lawyerUserList
                SET favorites = :newFav
                WHERE UserID = :id";
    $stmt18 = $db->prepare($query);
    $stmt18->execute(['id' => $id, 'newFav' => $newFavList]);
    $stmt18->closeCursor();
}

/* DASHBOARD FUNCTIONS ---------------------------------- */

function dashLogVerify($email) {
    global $db;
    $query = "SELECT * FROM lawyerUserList
                WHERE email = :email";
    $stmt14 = $db->prepare($query);
    $stmt14->execute(['email' => $email]);
    $return = $stmt14->fetch();
    $stmt14->closeCursor();
    return $return;
}

function getUserInfo($id) {
    global $db;
    $query = "SELECT * FROM lawyerUserList
            WHERE UserID = :id";
    $stmt15 = $db->prepare($query);
    $stmt15->execute(['id' => $id]);
    $return = $stmt15->fetch();
    $stmt15->closeCursor();
    return $return;
}

function dashUpdate($firstName, $lastName, $phone, $email, $pass, $ID){
    global $db;
    $query = "UPDATE lawyerUserList
                SET firstName = :firstName, lastName = :lastName, pass = :pass, email = :email, phone = :phone
                WHERE UserID = :ID";
    $stmt13 = $db->prepare($query);
    $stmt13->execute(['firstName' => $firstName, 'lastName' => $lastName, 'pass' => $pass, 'email' => $email, 'phone' => $phone, 'ID' => $ID]);
    $stmt13->closeCursor();
}

function updatePass($pass, $id) {
    global $db;
    $query = "UPDATE lawyerUserList
                SET pass = :pass
                WHERE UserID = :ID";
    $stmt16 = $db->prepare($query);
    $stmt16->execute(['ID' => $id, 'pass' => $pass]);
    $stmt16->closeCursor();
}

function newLawyer($name, $workplace, $years, $barID, $barDate, $errorCode) {
    global $db;
    $query = "INSERT INTO lawyerLawyerProfile (name, placeOfWork, years, barID, barDate, errorCode)
                VALUES (:name, :workplace, :years, :barID, :barDate, :code)";
    $stmt20 = $db->prepare($query);
    $stmt20->execute(['name' => $name, 'workplace' => $workplace, 'years' => $years, 'barID' => $barID, 'barDate' => $barDate, 'code' => $errorCode]);
    $stmt20->closeCursor();
}

function newLawyerExp($ID, $expTitle, $expDur) {
    global $db;
    $query = "INSERT INTO lawyerLawyerExperience (lawyerID, projectTitle, projectDuration)
                VALUES (:ID, :title, :dur)";
    $stmt25 = $db->prepare($query);
    $stmt25->execute(['ID' => $ID, 'title' => $expTitle, 'dur' => $expDur]);
    $stmt25->closeCursor();
}

function newLawyerEdu($ID, $eduSchool, $eduContent) {
    global $db;
    $query = "INSERT INTO lawyerLawyerEducation (lawyerID, eduTitle, eduContent)
                VALUES (:ID, :title, :content)";
    $stmt26 = $db->prepare($query);
    $stmt26->execute(['ID' => $ID, 'title' => $eduSchool, 'content' => $eduContent]);
    $stmt26->closeCursor();
}

function newLawyerAddress($ID, $address, $city, $zip, $phone) {
    global $db;
    $query = "INSERT INTO lawyerLawyerAddress (lawyerID, address, city, zipcode, phoneNum)
                VALUES (:ID, :address, :city, :zip, :phone)";
    $stmt27 = $db->prepare($query);
    $stmt27->execute(['ID' => $ID, 'address' => $address, 'city' => $city, 'zip' => $zip, 'phone' => $phone]);
    $stmt27->closeCursor();
}

function addClaim($id, $claimedNew){
    global $db;
    $query = "UPDATE lawyerUserList
                SET claimed = :claimedNew
                WHERE UserID = :id";
    $stmt21 = $db->prepare($query);
    $stmt21->execute(['id' => $id, 'claimedNew' => $claimedNew]);
    $stmt21->closeCursor();
}

function getClaimedListings($id){
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile
                WHERE claimedID = :id";
    $stmt22 = $db->prepare($query);
    $stmt22->execute(['id' => $id]);
    $return = $stmt22->fetchAll();
    $stmt22->closeCursor();
    return $return;
}

function getNotclaimedListings(){
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile
                WHERE claimedID IS NULL";
    $stmt22 = $db->prepare($query);
    $stmt22->execute();
    $return = $stmt22->fetchAll();
    $stmt22->closeCursor();
    return $return;
}

function getAllClaimedListings(){
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile
                WHERE claimedID IS NOT NULL";
    $stmt22 = $db->prepare($query);
    $stmt22->execute();
    $return = $stmt22->fetchAll();
    $stmt22->closeCursor();
    return $return;
}

function getUnclaimedListings($searchCode) {
    global $db;
    $query = "SELECT * FROM lawyerLawyerProfile
                WHERE errorCode = :search";
    $stmt29 = $db->prepare($query);
    $stmt29->execute(['search' => $searchCode]);
    $return = $stmt29->fetchAll();
    $stmt29->closeCursor();
    return $return;
}

function updateError($id, $newCode){
    global $db;
    $query = "UPDATE lawyerLawyerProfile
                SET errorCode = :code
                WHERE lawyerID = :id";
    $stmt30 = $db->prepare($query);
    $stmt30->execute(['id' => $id, 'code' => $newCode]);
    $stmt30->closeCursor();
}

function updateClaimed($id, $claimed){
    global $db;
    $query = "UPDATE lawyerLawyerProfile
                SET claimedID = :claimed
                WHERE lawyerID = :id";
    $stmt31 = $db->prepare($query);
    $stmt31->execute(['id' => $id, 'claimed' => $claimed]);
    $stmt31->closeCursor();
}

function profileUpload($lawyerID, $photoPath) {
    global $db;
    $query = "UPDATE lawyerLawyerProfile
                SET profilePhoto = :photo
                WHERE lawyerID = :id";
    $stmt32 = $db->prepare($query);
    $stmt32->execute(['id' => $lawyerID, 'photo' => $photoPath]);
    $stmt32->closeCursor();
}

?>