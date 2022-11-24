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
      $output = "wrong password";
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
      $output = "wrong password";
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
      $output = "wrong password";
    }
  }

  //special case: admin account
  if(count($admininfo) > 0){
    loginasadmin($admininfo);
    exit;
  }

  if (count($customerinfo) == 0 and count($workerinfo) == 0) {
    //case 1: no account found in both customer and worker
    $output = "Email address not found";
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
    $output = "something wrong happened, please contact customer support";
  }
} else {
  $output = "This page can only accessed by POST method.";
  header("Location:/login.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Result</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>
<body>
    <?php include '../include/header.php'; ?>
    <section id="headerspace" class="">
    </section>
    <!-- ======= forms Section ======= -->
    <section id="request" class="request">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Thank you!</h2>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-center">
                    <form role="form" class="php-request-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-8">
                                <p class="text-center"><?php echo $output;?></p>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                        </br>
                        <div class="text-center"><button type="submit" onclick="window.location.go(-1);">Back</button></div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <?php include '../include/footer.php'; ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>