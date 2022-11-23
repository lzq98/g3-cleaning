<!DOCTYPE html>
<html lang="en">
<?php
include 'include/requirelogin.php';
include 'include/db.php';
if (!isset($_GET['orderid'])) {
    // order not selected
    header("Location:/orderhistory.php");
    exit;
} else {
    $oid = $_GET['orderid'];
}
$orderresult = dbsearchall("orders", "oid", $oid);
if (count($orderresult) > 0) {
    // order found
    $order = $orderresult[0];
    if ($_SESSION['role'] == 'customer') {
        if ($order['customer'] != $_SESSION['uid']) {
            // order not belong to this customer
            header("Location:/orderhistory.php");
            exit;
        }
    } elseif ($_SESSION['role'] == 'worker') {
        if ($order['worker'] != $_SESSION['uid']) {
            // order not belong to this worker
            header("Location:/orderhistory.php");
            exit;
        }
    } else {
        // default: other role not allow to access
        header("Location:/orderhistory.php");
        exit;
    }
} else {
    // order not found
    header("Location:/orderhistory.php");
    exit;
}
// verification pass
$order = $orderresult[0];
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Request your next home service</title>
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
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Order detail</h2>
                <p>Review or edit your order here</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-center">
                    <form action="forms/updateorder.php" method="post" role="form" class="php-request-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" value=<?php echo '"' .
                                    $order['address'] . '"'; ?> required readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" value=<?php echo '"' . $order['state'] . '"'; ?>
                                required readonly>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" value=<?php echo '"' . $order['city'] . '"'; ?>
                                required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" value=<?php echo '"'
                                    . $order['subject'] . '"'; ?> required
                                <?php if
                                ($_SESSION['role'] == 'worker') {
                                    echo "readonly";
                                } ?>>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date" value=<?php echo '"' .
                                    $order['date'] . '"'; ?> required
                                <?php if
                                ($_SESSION['role'] == 'worker') {
                                    echo "readonly";
                                } ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" rows="5" <?php if
                                ($_SESSION['role'] == 'worker') { echo "readonly"; } ?>><?php
                                 echo $order['message']; ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="start">Start</label>
                                <input type="text" class="form-control" id="date" value=<?php echo '"' . $order['start']
                                    . '"'; ?> readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end">End</label>
                                <input type="text" class="form-control" id="date" value=<?php echo '"' . $order['end'] .
                                    '"'; ?> readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="start">Price</label>
                                <input type="text" class="form-control" name="price" id="date" value=<?php echo '"' . $order['price']
                                    . '"'; if ($_SESSION['role']=='customer' or $order['status']!='notpaid') { echo "readonly"; } ?>>
                            </div>
                        </div>
                        
                        <div class="row">
                        <?php
                        // comment and rating
                        if ($order['status'] == 'paid'){
                            if ($_SESSION['role'] == 'customer'){
                                ?>
                                <div class="form-group col-md-4">
                                    <label for="rating">Rating</label>
                                    <input type="range" class="form-range" min="1" max="5" id="rating" name="rating"
                                    <?php
                                        if ($order['rating'] == ''){
                                            echo 'value=5';
                                        }else{
                                            echo 'value=' . $order['rating'];
                                        }
                                    ?>
                                    >
                                </div>
                                <?php
                            }else{
                                ?>
                                <div class="form-group col-md-4">
                                    <label for="rating">Rating</label>
                                    <div>
                                    <?php
                                    if ($order['rating'] == ''){
                                        echo '<p>The customer has not rate yet.</p>';
                                    }else{
                                        $i = 0;
                                        while ($i < $order['rating']){
                                            echo '<i class="bi bi-star-fill"></i>';
                                            $i ++;
                                        }
                                        while ($i < 5){
                                            echo '<i class="bi bi-star"></i>';
                                            $i ++;
                                        }
                                    }
                                    ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="form-group col-md-8">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" name="comment" rows="5" <?php if
                                    ($_SESSION['role'] == 'worker') { echo "readonly"; } ?>><?php
                                    echo $order['comment']; ?></textarea>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php echo '<input type="hidden" name="oid" value="' . $order['oid'] . '">'?>
                        <div class="row">
                            <?php
                            if($_SESSION["role"]=='customer'){
                                if ($order["status"] == 'notpaid' and $order['start'] != '' and $order['end'] != '' and $order['price'] != ''){
                                    // order ends, the order is ready for payment
                                    echo '<div class="form-group col-md-4 text-center"><button name="type" value="pay" type="submit">Pay</button></div>';
                                }else{
                                    // the order is not ready for payment, dont show the button
                                    echo '<div class="form-group col-md-4 text-center"></div>';
                                }
                            }elseif($_SESSION["role"]=='worker'){
                                if ($order["status"] == 'notpaid' and $order['start'] == '' and $order['end'] == ''){
                                    // order not started
                                    echo '<div class="form-group col-md-4 text-center"><button name="type" value="start" type="submit">Start</button></div>';
                                }elseif ($order["status"] == 'notpaid' and $order['start'] != '' and $order['end'] == ''){
                                    // order started
                                    echo '<div class="form-group col-md-4 text-center"><button name="type" value="end" type="submit">End</button></div>';
                                }else{
                                    // other situation, don't show the button
                                    echo '<div class="form-group col-md-4 text-center"></div>';
                                }
                            }
                            ?>
                            <div class="form-group col-md-4 text-center"></div>
                            <div class="form-group col-md-4 text-center"><button name="type" value="update" type="submit">Update</button></div>
                        </div>
                    </form>
                </div>
            </div>

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