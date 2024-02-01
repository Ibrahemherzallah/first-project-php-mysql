<?php
include("config.php");

session_start();
if(isset($_SESSION['id'])){
    header("Location: profilePage.php");
    exit();
}
else{
    header("location: logIn.html?Log in first");
}
?>