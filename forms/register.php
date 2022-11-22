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
        $values["username"] = "'" . filter_var($_POST['username'], FILTER_SANITIZE_STRING) . "'";
        $values["email"] = "'" . filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) . "'";
        $values["name"] = "'" . filter_var($_POST['name'], FILTER_SANITIZE_STRING) . "'";
        $values["phone"] = "'" . filter_var($_POST['phone'], FILTER_SANITIZE_STRING) . "'";
        $values["address"] = "'" . filter_var($_POST['address'], FILTER_SANITIZE_STRING) . "'";
        $values["city"] = "'" . filter_var($_POST['city'], FILTER_SANITIZE_STRING) . "'";
        $values["state"] = "'" . filter_var($_POST['state'], FILTER_SANITIZE_STRING) . "'";
        $values["password"] = "'" . filter_var($_POST['password'], FILTER_SANITIZE_STRING) . "'";
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