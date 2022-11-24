<?php
session_start();
include '../include/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $oid = $_POST["oid"];
    $orderresult = dbsearch("orders", ["worker"], "oid", $oid);
    if (count($orderresult) > 0) {
        if ($orderresult[0]["worker"] != 0) {
            $output = "You are late, this order has been claimed or assigned";
        } else {
            dbupdate("orders", "oid",$oid, array("worker" => $_SESSION['uid']));
            $output = "You have claimed this order";
        }
    } else {
        // order not found
        header("Location:/searchorder.php");
    }

} else {
    $output = "This page can only accessed by POST method.";
    header("Location:/searchorder.php");
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