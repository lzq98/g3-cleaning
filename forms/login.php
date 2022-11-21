<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $email = "'" . filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) . "'"; // SQL injection sanitizer
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING); // SQL injection sanitizer
  
  $customerinfo = dbsearchall('customer', 'email', $email);
  if (count($customerinfo) > 0) {
    if($customerinfo[0]["password"] == $password) {
      $_SESSION["uid"] = $customerinfo[0]["uid"];
      $_SESSION["email"] = $customerinfo[0]["email"];
      $_SESSION["username"] = $customerinfo[0]["username"];
      $_SESSION["name"] = $customerinfo[0]["name"];
      $_SESSION["address"] = $customerinfo[0]["address"];
      $_SESSION["city"] = $customerinfo[0]["city"];
      $_SESSION["state"] = $customerinfo[0]["state"];
      $_SESSION["phone"] = $customerinfo[0]["phone"];
      header("Location:/index.php");
    } else {
      echo "wrong password";
    }
  }else{
    echo "Email not found";
  }
} else {
  echo "This page can only accessed by POST method.";
  header("Location:/login.php");
}
?>