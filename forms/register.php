<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // First check if account exists
    $email = "'" . filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) . "'";
    // Do not require search all, chage search method later
    $customerinfo = dbsearchall('customer', 'email', $email);
    if (count($customerinfo) > 0) {
        echo "This email has been registed, please login.";
    } else {
        // collect value of input field
        $values["username"] = "'" . htmlentities(filter_var($_POST['username'], FILTER_SANITIZE_STRING)) . "'";
        $values["email"] = "'" . htmlentities(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) . "'";
        $values["name"] = "'" . htmlentities(filter_var($_POST['name'], FILTER_SANITIZE_STRING)) . "'";
        $values["phone"] = "'" . filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT) . "'";
        $values["address"] = "'" . htmlentities(filter_var($_POST['address'], FILTER_SANITIZE_STRING)) . "'";
        $values["city"] = "'" . htmlentities(filter_var($_POST['city'], FILTER_SANITIZE_STRING)) . "'";
        $values["state"] = "'" . htmlentities(filter_var($_POST['state'], FILTER_SANITIZE_STRING)) . "'";
        $values["password"] = "'" . filter_var($_POST['password'], FILTER_SANITIZE_STRING) . "'"; // will hashing the password later, htmlentities() is uncessary
        if (dbinsert("customer", $values)) {
            echo "Your account has been registered successfully";
        } else {
            echo "Register failed";
        }
    }
} else {
    echo "This page can only accessed by POST method.";
    header("Location:/login.php");
}
?>