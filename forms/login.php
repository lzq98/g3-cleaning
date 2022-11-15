<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $email = $_POST['email'];
  $password = $_POST['password'];
  echo $email;
  echo $password;
  $_SESSION['username'] = "lee";
  header("Location:/index.php");
} else {
  echo "This page can only accessed by POST method.";
  header("Location:/login.php");
}
?>