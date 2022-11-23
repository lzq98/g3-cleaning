<!DOCTYPE html>
<html lang="en">
<?php include 'include/requirelogin.php'; ?>
<?php include 'include/db.php'; ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Order history</title>
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

    <!-- ======= Order history ======= -->
    <section id="history" class="history section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Order history</h2>
                <p>Here are your orders</p>
            </div>

            <?php
            if ($_SESSION['role'] == 'customer') {
                $orders = dbsearchall("orders", "customer", $_SESSION["uid"]);
            } elseif ($_SESSION['role'] == 'worker') {
                $orders = dbsearchall("orders", "worker", $_SESSION["uid"]);
            } elseif ($_SESSION['role'] == 'admin') {
                // do it later
                $orders = [];
            } else {
                // error handling
                session_destroy();
                echo "OOPS! something wrong happened, you have been logged out.";
                exit;
            }

            if (count($orders) == 0) {
                // no orders found
                if ($_SESSION['role'] == 'customer') {
            ?>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <a href="searchworker.php">You don't have any orders yet, request a service now!</a>
                </div>
            </div>
            <?php
                } elseif ($_SESSION['role'] == 'worker') {
            ?>
            <div class="row">
                <div class="d-flex justify-content-center">
                    <a href="claimrequest.php">You don't have any orders yet, claim a request now!</a>
                </div>
            </div>
            <?php
                }
            } else {
                // found orders
            ?>
            <div class="history-list">
                <ul>
                    <?php
                $orders = array_reverse($orders);
                $index = 1;
                foreach ($orders as $order) {
                    if ($order['status'] == "notpaid") {
                        // notpaid
                        if ($order['worker'] == 0 and $order['start'] == '' and $order['end'] == '') {
                            // worker not found, not start, not end
                            // this order is waiting for worker
                            $iconleft = "bx bx-time-five icon-help";
                            $status = "Waiting for worker";
                        } elseif ($order['worker'] != 0 and $order['start'] == '' and $order['end'] == '') {
                            // worker is found, not start, not end
                            // this order is ready to go
                            $iconleft = "bx bx-time-five icon-help";
                            $status = "Ready";
                        } elseif ($order['worker'] != 0 and $order['start'] != '' and $order['end'] == '') {
                            // worker is found, started, not end
                            // this order is ongoing
                            $iconleft = "bx bx-time-five icon-help";
                            $status = "Ongoing";
                        } elseif ($order['worker'] != 0 and $order['start'] != '' and $order['end'] != '') {
                            // worker is found, started, ended
                            // this order is end, waiting for payment
                            $iconleft = "bx bx-time-five icon-help";
                            $status = "Waiting for payment";
                        } else {
                            // something went wrong
                            // error handling
                            $iconleft = "bx bx-help-circle icon-help";
                            $status = "Order Error, please contact customer support.";
                        }
                    } elseif ($order['status'] == "paid") {
                        if ($order['worker'] != 0 and $order['start'] != '' and $order['end'] != '') {
                            // worker is found, started, ended, customer paid
                            // this order is complete
                            $iconleft = "bx bx-check-circle icon-help";
                            $status = "Complete";
                        } else {
                            // something went wrong
                            // error handling
                            $iconleft = "bx bx-help-circle icon-help";
                            $status = "Order Error, please contact customer support.";
                        }
                    } elseif ($order['status'] == "canceled") {
                        //order canceled
                        $iconleft = "bx gmdi-cancel-o icon-help";
                        $status = "Canceled";
                    } else {
                        // something went wrong, there should be no other status
                        // error handling
                        $iconleft = "bx bx-help-circle icon-help";
                        $status = "Order Error, please contact customer support.";
                    }

                    echo '<li data-aos="fade-up" data-aos-delay="' . $index * 100 . '">';
                    $title = "#" . $order['oid'] . ' ' . $order['date'] . ' ' . $order['subject'];
                    if ($index == 1) {
                        echo '<i class="' . $iconleft . '"></i> <a data-bs-toggle="collapse" class="collapse"
                        data-bs-target="#history-list-1">' . $title . '<i
                        class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="history-list-1" class="collapse show" data-bs-parent=".history-list">';
                    } else {
                        echo '<i class="' . $iconleft . '"></i> <a data-bs-toggle="collapse" class="collapsed"
                        data-bs-target="#history-list-' . $index . '">' . $title . '<i
                        class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="history-list-' . $index . '" class="collapse" data-bs-parent=".history-list">';
                    }
                    if ($_SESSION['role'] == 'customer') {
                        if ($order['worker'] != 0) {
                            $workerinfo = dbsearch("worker", ["name", "phone"], "uid", $order['worker'])[0];
                            $workername = $workerinfo['name'];
                            $workerphone = $workerinfo['phone'];
                        } else {
                            $workername = "waiting for worker";
                            $workerphone = "waiting for worker";
                        }

                        echo
                            '<div class="row">
                                <div class="col-md-3">
                                    <strong>Address</strong>
                                    <p>' . $order['address'] . '</br>' . $order['city'] . '</br>' . $order['state'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Worker name</strong>
                                    <p>' . $workername . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Worker phone</strong>
                                    <p>' . $workerphone . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Status</strong>
                                    <p>' . $status . '</p>
                                    </br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Message</strong>
                                    <p>' . $order['message'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Price</strong>
                                    <p>' . $order['price'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Edit or review</strong>
                                    <a href="orderdetail.php?orderid=' . $order['oid'] .
                            '" class="btn btn-primary">Select this order</a>
                                    </br>
                                </div>
                            </div>';
                    } elseif ($_SESSION['role'] == 'worker') {
                        $customerinfo = dbsearch("customer", ["username", "phone"], "uid", $order['customer'])[0];
                        $customername = $customerinfo['username'];
                        $customerphone = $customerinfo['phone'];

                        echo
                            '<div class="row">
                                <div class="col-md-3">
                                    <strong>Address</strong>
                                    <p>' . $order['address'] . '</br>' . $order['city'] . '</br>' . $order['state'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Customer name</strong>
                                    <p>' . $customername . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Customer phone</strong>
                                    <p>' . $customerphone . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Status</strong>
                                    <p>' . $status . '</p>
                                    </br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Message</strong>
                                    <p>' . $order['message'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Price</strong>
                                    <p>' . $order['price'] . '</p>
                                    </br>
                                </div>
                                <div class="col-md-3">
                                    <strong>Edit or review</strong>
                                    <a href="orderdetail.php?orderid=' . $order['oid'] .
                            '" class="btn btn-primary">Select this order</a>
                                    </br>
                                </div>
                            </div>';
                    }
                    echo '</div></li>';
                    $index += 1;
                }
                    ?>
                </ul>
            </div>
            <?php
            }
            ?>
        </div>
    </section><!-- End Frequently Asked Questions Section -->

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