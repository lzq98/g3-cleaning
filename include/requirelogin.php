<?php
session_start();
if (!isset($_SESSION["uid"])){
    header("Location:/login.php");
    exit;
}
if ($_SESSION['role'] == 'worker' and $_SESSION['healthy'] == 0){
    // the account is banned
    // the worker cought COVID
    header("Location:/uploadcertification.php");
    exit;
}
?>