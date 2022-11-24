<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["uid"])) {
    header("Location:/login.php");
    exit;
}
if ($_SESSION['role'] != 'admin') {
    // the account is banned
    // the worker cought COVID
    header("Location:/login.php");
    exit;
}

if (!isset($_GET['imageid'])) {
    header("Location:/verifylist.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Search workers</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <?php include 'include/header.php'; ?>
    <section id="headerspace" class="">
    </section>
    <!-- ======= forms Section ======= -->
    <section id="request" class="request">
        <div class="container">

            <div class="section-title">
                <h2>Search workers</h2>
                <p>Search workers around you</p>
            </div>


            <form action="forms/verify.php" method="post" role="form" class="php-request-form">
                <?php

                include 'include/db.php';
                $imagelist = dbsearchall("image", "imageid", $_GET['imageid']);
                if (count($imagelist) == 0) {
                    header("Location:/verifylist.php");
                } else {
                    $image = $imagelist[0];
                    $imagelink = "uploads/" . $image['date'] . "/" . $image['image'] . "." . $image['type'];
                ?>
                <!-- start image -->
                <div class="row">
                    <div class="form-group col-md-6 text-center">
                        <strong>Worker ID</strong>
                        <p>
                            <?php echo $image['worker'] ?>
                        </p>
                        </br>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <strong>Date</strong>
                        <p>
                            <?php echo $image['date'] ?>
                        </p>
                        </br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="form-group col-md-8 text-center">
                        <img src=<?php echo '"' . $imagelink . '"'; ?> alt="Certificate">
                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
                <!-- end image -->
                <div class="row">
                    </br>
                </div>
                <input type="hidden" name="imageid" value="<?php echo $image['imageid']; ?>">
                <div class="row">
                    <div class="form-group col-md-6 text-center">
                        <button name="result" value=0 type="submit">Reject</button>
                    </div>
                    <div class="form-group col-md-6 text-center">
                        <button name="result" value=1 type="submit">Accept</button>
                    </div>
                </div>
                <?php
                }
                ?>


            </form>


        </div>
    </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <?php include 'include/footer.php'; ?>

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>