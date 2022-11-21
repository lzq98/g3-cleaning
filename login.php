<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location:/index.php");
    exit;
} ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SSE G3 cleaning</title>
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
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Login</h2>
                <p></p>
            </div>

            <div class="row">
                <div class="col-lg-2 d-flex align-items-center">
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <form action="forms/login.php" method="post" role="form" class="php-email-form"
                        onsubmit="checkForm()">
                        <div class="row">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" id="passwordplain" required>
                            <input type="hidden" name="password" id="password" required>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your have been logged in</div>
                        </div>
                        <div class="text-center"><button type="submit">Login</button></div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <a href="register.php">Don't have an account? Register now.</a>
                            </div>
                        </div>
                    </form>
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
    <script src="assets/js/md5.js"></script>
    <script>
        function checkForm() {
            var plainpassword = document.getElementById('passwordplain');
            var md5password = document.getElementById('password');
            md5password.value = md5(plainpassword.value);
            return true;
        }
    </script>

</body>

</html>