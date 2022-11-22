<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $values["customer"] = $_SESSION["uid"];
    $values["address"] = "'" . filter_var($_POST['address'], FILTER_SANITIZE_STRING) . "'";
    $values["state"] = "'" . filter_var($_POST['state'], FILTER_SANITIZE_STRING) . "'";
    $values["city"] = "'" . filter_var($_POST['city'], FILTER_SANITIZE_STRING) . "'";
    $values["subject"] = "'" . filter_var($_POST['subject'], FILTER_SANITIZE_STRING) . "'";
    $values["date"] = "'" . filter_var($_POST['date'], FILTER_SANITIZE_STRING) . "'";
    $values["message"] = "'" . filter_var($_POST['message'], FILTER_SANITIZE_STRING) . "'";
    if (isset($_POST["worker"])) {
        $values["worker"] = "'" . filter_var($_POST['worker'], FILTER_SANITIZE_NUMBER_INT) . "'";
        $values["status"] = "'ready'";
    }else{
        $values["status"] = "'waiting'";
    }
    
    if (dbinsert("orders", $values)) {
        echo "Your order has been placed";
    } else {
        echo "Order not placed, please try again";
    }
} else {
    echo "This page can only accessed by POST method.";
    header("Location:/login.php");
}
?>