<?php 

require_once('../model/database.php');
require_once('../model/directoryFunction.php');

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../index.php');
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
    include('passwordReset.php');
} else if ($action = 'complete') {
    
}