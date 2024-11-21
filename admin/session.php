<?php 
session_start();
if($_SESSION['isAdmin']==false){
    header('location: login.php');
}
?>