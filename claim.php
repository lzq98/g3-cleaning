<!DOCTYPE html>
<html lang="en">
<?php include 'include/requirelogin.php';
if ($_SESSION["role"] != "worker") {
    // only worker can access this page
    header("Location:/index.php");
    exit;
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
                <h2>Order claim</h2>
                <p>Order details</p>
            </div>

            <?php
            if (isset($_GET['orderid'])) {
                $oid = $_GET['orderid'];
            } else {
                // this webpage must have a order id to continue
                header("Location:/searchorder.php");
            }
            include 'include/db.php';
            $orderresult = dbsearchall("orders", "oid", $oid);
            if (count($orderresult) == 0) {
                // order not fount
                header("Location:/searchorder.php");
            } else {
                $order = $orderresult[0];
                if ($order["worker"] != 0) {
                    // this order is been claimed or already assigned to an worker
                    header("Location:/searchorder.php");
                }
            }
            ?>

            <form action="forms/claim.php" method="post" role="form" class="php-request-form">
                <div class="row">
                    <div class="col-lg-3">
                        <strong>Address</strong>
                        <p>
                            <?php echo $order['address'] . '</br>' . $order['city'] . '</br>' . $order['state'] ?>
                        </p>
                        </br>
                    </div>
                    <div class="col-lg-3">
                        <strong>Customer ID</strong>
                        <p>
                            <?php echo $order['customer'] ?>
                        </p>
                        </br>
                    </div>
                    <div class="col-lg-3">
                        <strong>Subject</strong>
                        <p>
                            <?php echo $order['subject'] ?>
                        </p>
                        </br>
                    </div>
                    <div class="col-lg-3">
                        <strong>Date</strong>
                        <p>
                            <?php echo $order['date'] ?>
                        </p>
                        </br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <strong>Message</strong>
                        <p>
                            <?php echo $order['message'] ?>
                        </p>
                        </br>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" name="oid" value="<?php echo $order['oid'] ?>" />
                    <div class="text-center"><button type="submit">Claim this order</button></div>
                </div>

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