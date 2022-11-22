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

    <title>Register your G3 cleaning account</title>
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
    <!-- ======= register Section ======= -->
    <section id="register" class="register">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Register your new account</h2>
                <p>Please input your information.</p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex align-items-center">
                    <form action="forms/register.php" method="post" role="form" class="php-register-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="username">User name*</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email*</label>
                                <input type="text" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Your name*</label>
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone number*</label>
                                <input type="text" class="form-control" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="password1">Your password*</label>
                                <input type="password" class="form-control" id="password1" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password2">Retype password*</label>
                                <input type="password" class="form-control" id="password2" required>
                            </div>
                        </div>
                        <input type="hidden" name="password" id="password" required>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Your Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="state">State</label>
                                <select class="form-control" name="state" id="state">
                                    <option value=""></option>
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
                                <select class="form-control" name="city" id="city">
                                    <option value=""></option>
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
                        <div class="text-center"><button type="submit" onclick="return checkForm();">Register</button></div>
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <a href="login.php">Already have an account? Login now.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End register Section -->

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
            if(document.getElementById('password1').value != document.getElementById('password2').value){
                alert('Password not match, please retype your password');
                return false;
            }
            var plainpassword = document.getElementById('password1');
            var md5password = document.getElementById('password');
            md5password.value = md5(plainpassword.value);
            return true;
        }
    </script>

</body>

</html>