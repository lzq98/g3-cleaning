<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $email = "'" . filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) . "'"; // SQL injection sanitizer
  $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING); // SQL injection sanitizer

  $customerinfo = dbsearchall('customer', 'email', $email);
  $workerinfo = dbsearchall('worker', 'email', $email);
  $admininfo = dbsearchall('admin', 'email', $email);

  function loginascustomer($customerinfo)
  {
    global $password;
    if ($customerinfo[0]["password"] == $password) {
      $_SESSION["uid"] = $customerinfo[0]["uid"];
      $_SESSION["email"] = $customerinfo[0]["email"];
      $_SESSION["username"] = $customerinfo[0]["username"];
      $_SESSION["name"] = $customerinfo[0]["name"];
      $_SESSION["address"] = $customerinfo[0]["address"];
      $_SESSION["city"] = $customerinfo[0]["city"];
      $_SESSION["state"] = $customerinfo[0]["state"];
      $_SESSION["phone"] = $customerinfo[0]["phone"];
      $_SESSION["role"] = "customer";
      header("Location:/index.php");
    } else {
      echo "wrong password";
    }
  }

  function loginasworker($workerinfo)
  {
    global $password;
    if ($workerinfo[0]["password"] == $password) {
      $_SESSION["uid"] = $workerinfo[0]["uid"];
      $_SESSION["email"] = $workerinfo[0]["email"];
      $_SESSION["username"] = $workerinfo[0]["name"]; // worker have to display their real name
      $_SESSION["name"] = $workerinfo[0]["name"];
      $_SESSION["address"] = $workerinfo[0]["address"];
      $_SESSION["city"] = $workerinfo[0]["city"];
      $_SESSION["state"] = $workerinfo[0]["state"];
      $_SESSION["phone"] = $workerinfo[0]["phone"];
      $_SESSION["price"] = $workerinfo[0]["price"];
      $_SESSION["healthy"] = $workerinfo[0]["healthy"];
      $_SESSION["role"] = "worker";
      header("Location:/index.php");
    } else {
      echo "wrong password";
    }
  }

  function loginasadmin($admininfo)
  {
    global $password;
    if ($admininfo[0]["password"] == $password) {
      $_SESSION["uid"] = $admininfo[0]["uid"];
      $_SESSION["email"] = $admininfo[0]["email"];
      $_SESSION["username"] = $admininfo[0]["username"];
      $_SESSION["name"] = $admininfo[0]["name"];
      $_SESSION["address"] = "";
      $_SESSION["city"] = "";
      $_SESSION["state"] = "";
      $_SESSION["phone"] = $admininfo[0]["phone"];
      $_SESSION["role"] = "admin";
      header("Location:/index.php");
    } else {
      echo "wrong password";
    }
  }

  //special case: admin account
  if(count($admininfo) > 0){
    loginasadmin($admininfo);
    exit;
  }

  if (count($customerinfo) == 0 and count($workerinfo) == 0) {
    //case 1: no account found in both customer and worker
    echo "Email address not found";
  } elseif (count($customerinfo) == 0 and count($workerinfo) == 1) {
    //case 2: found account in worker db only
    loginasworker($workerinfo);
  } elseif (count($customerinfo) == 1 and count($workerinfo) == 0) {
    //case 3: found account in customer db only
    loginascustomer($customerinfo);
  } else {
    
    //case 4: found account in both customer and worker db
    //let user choose login account(do it later)
    //let user contact customer service
    echo "something wrong happened, please contact customer support";
  }
} else {
  echo "This page can only accessed by POST method.";
  header("Location:/login.php");
}
?>