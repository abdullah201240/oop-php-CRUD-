<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include './vendor/autoload.php';

use Ecom\Controllers\UserController;

$userController = new UserController;

$username = $_POST['username']; 
$password = $_POST['password'];

$user = $userController->authenticate($username, $password);

if ($user !== false) { 
    header('location:./views/create.php');
} else {
    echo "Authentication failed";
}
?>
