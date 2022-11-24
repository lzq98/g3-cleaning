<?php
session_start();
include '../include/db.php';
date_default_timezone_set('Australia/Adelaide');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get order detail
    $oid = filter_var($_POST['oid'], FILTER_SANITIZE_NUMBER_INT);
    $orderresult = dbsearchall("orders", "oid", $oid);
    if (count($orderresult) > 0) {
        // order found
        $order = $orderresult[0];
    } else {
        // order not found
        header("Location:/orderhistory.php");
        exit;
    }
    $order = $orderresult[0];
    if ($_SESSION['role'] == 'customer') {
        // first check if this order belongs to this customer
        if ($order['customer'] != $_SESSION['uid']) {
            // order not belong to this customer
            header("Location:/orderhistory.php");
            exit;
        }
        // have update and payment function
        if ($_POST['type'] == 'pay') {
            if ($order['status'] != 'paid') {
                // using paypal for payment
                $values["status"] = '"paid"';
                if (dbupdate("orders", "oid", $oid, $values)) {
                    $output = "You have paid for your order";
                } else {
                    $output = "Something went wrong, please try again";
                }
            }else{
                $output = "You have already paid for your order";
            }
        } elseif ($_POST['type'] == 'update') {
            // only accept date, subject and message update
            $values["date"] = "'" . filter_var($_POST['date'], FILTER_SANITIZE_STRING) . "'";
            $values["subject"] = "'" . htmlentities(filter_var($_POST['subject'], FILTER_SANITIZE_STRING)) . "'";
            $values["message"] = "'" . htmlentities(filter_var($_POST['message'], FILTER_SANITIZE_STRING)) . "'";
            if($order["status"] = "paid"){
                // only accept comment and rating change after paid
                $values["comment"] = "'" . htmlentities(filter_var($_POST['comment'], FILTER_SANITIZE_STRING)) . "'";
                $values["rating"] = filter_var($_POST['rating'], FILTER_SANITIZE_NUMBER_INT);
            }
            if (dbupdate("orders", "oid", $oid, $values)) {
                $output = "You have updated your order";
            } else {
                $output = "Something went wrong, please try again";
            }
        } else {
            // other type are not support
            header("Location:/orderhistory.php");
            exit;
        }
    } elseif ($_SESSION['role'] == 'worker') {
        // first check if this order belongs to this worker
        if ($order['worker'] != $_SESSION['uid']) {
            // order not belong to this worker
            header("Location:/orderhistory.php");
            exit;
        }
        // have update start and end function
        if ($_POST['type'] == 'update') {
            // only accept price update
            // price update must be done after the order has end and not paid
            if ($order['status'] == 'notpaid' and $order['start'] != "" and $order['end'] != "") {
                // update price
                $values["price"] = "'" . filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT) . "'";
                if (dbupdate("orders", "oid", $oid, $values)) {
                    $output = "You have updated your order";
                } else {
                    $output = "Something went wrong, please try again";
                }
            } else {
                $output = "Order is already paid or not end.";
            }
        } elseif ($_POST['type'] == 'start') {
            // start work
            // not accept any values except oid
            if ($order['status'] == 'notpaid' and $order['start'] == "" and $order['end'] == "") {
                // update start time
                $values["start"] = date('"h:i:s"');
                if (dbupdate("orders", "oid", $oid, $values)) {
                    $output = "You have start your order";
                } else {
                    $output = "Something went wrong, please try again";
                }
            }
        } elseif ($_POST['type'] == 'end') {
            // end work
            // not accept any values except oid
            if ($order['status'] == 'notpaid' and $order['start'] != "" and $order['end'] == "") {
                $end = date('h:i:s');
                $values["end"] = '"' . $end . '"';

                //add automatic calculate price if not set here
                //$values["price"] = autocalc();
                if ($order['price'] == "") {
                    $values["price"] = floor(((strtotime($end) - strtotime($order["start"])) % 86400 / 3600) * $_SESSION['price']);
                }

                if (dbupdate("orders", "oid", $oid, $values)) {
                    $output = "You have end your order";
                } else {
                    $output = "Something went wrong, please try again";
                }
            }
        } else {
            // other type are not support
            header("Location:/orderhistory.php");
            exit;
        }
    } else {
        // default: other role not allow to access
        header("Location:/orderhistory.php");
        exit;
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
                                <?php
                                if ($_POST['type'] == 'pay'){
                                    echo '<div id="paypal-button-container"></div>';
                                }
                                ?>
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
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=AUD"></script>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $order['price'];?>' // Can also reference a variable or function
                        }
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function (orderData) {
                    // Successful capture! For dev/demo purposes:
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
                    // When ready to go live, remove the alert and show a success message within this page. For example:
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                    // Or go to another URL:  actions.redirect('thank_you.html');
                });
            }
        }).render('#paypal-button-container');
    </script>

</body>

</html>