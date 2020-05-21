<?php 
require_once('model/database.php');
require_once('model/directoryFunction.php');
session_start();

if ( !isset($_POST['email'], $_POST['pass']) ) {
	die ('Please fill both the username and password field!');
}

$email = $_POST['email'];
$pass = $_POST['pass'];

$userInfo = dashLogVerify($email);

if (!empty($userInfo)) {
    if (password_verify($pass, $userInfo['pass'])) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['id'] = $userInfo['UserID'];
         header('Location: dashboard');
    } else {
        echo 'Incorrect password!';
    }
} else {
    echo 'Incorrect username!';
}

?>