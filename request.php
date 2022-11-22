<!DOCTYPE html>
<html lang="en">
<?php include 'include/requirelogin.php'; ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Request your home service</title>
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
                <h2>Request service</h2>
                <?php
                    if (isset($_GET['workerid']) and isset($_GET['workername'])){
                        echo "<p>Request service from " . $_GET['workername'] . "</p>";
                    }else{
                        echo "<p>Please input your personal information, we will assign a worker for you.</p>";
                    }
                ?>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-center">
                    <form action="forms/request.php" method="post" role="form" class="php-request-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Your Address</label>
                                <input type="text" class="form-control" name="address" id="address" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state">State</label>
                                <select class="form-control" name="state" id="state" required>
                                    <option value="NSW">New South Wales</option>
                                    <option value="VIC">Victoria</option>
                                    <option value="SA">South Australia</option>
                                    <option value="ACT">Australia Capital Territory</option>
                                    <option value="WA">Western Australia</option>
                                    <option value="QLD">Queensland</option>
                                    <option value="TAS">Tasmania</option>
                                    <option value="NT">Northern Territory</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="city">City</label>
                                <!--change to auto select later-->
                                <!--do not let customer to choose-->
                                <select class="form-control" name="city" id="city" required>
                                    <option value="Sydney">Sydney</option>
                                    <option value="Melbourne">Melbourne</option>
                                    <option value="Adelaide">Adelaide</option>
                                    <option value="Canberra">Canberra</option>
                                    <option value="Perth">Perth</option>
                                    <option value="Brisbane">Brisbane</option>
                                    <option value="Hobart">Hobart</option>
                                    <option value="Darwin">Darwin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" name="date" id="date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" rows="5"></textarea>
                        </div>
                        <?php 
                        if (isset($_GET['workerid']) and isset($_GET['workername'])){
                            echo '<input type="hidden" name="worker" id="worker" value="' . $_GET["workerid"] . '">';
                        }?>
                        <div class="text-center"><button type="submit">Send Requests</button></div>
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