<!DOCTYPE html>
<html lang="en">


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
        <div class="container">

            <div class="section-title">
                <h2>Search workers</h2>
                <p>Search workers around you</p>
            </div>


            <form action="searchworker.php" method="get" role="form" class="php-request-form">
                <?php
                if (isset($_GET["state"]) and isset($_GET["city"]) and isset($_GET["sort"])) {
                    $state = $_GET["state"];
                    $city = $_GET["city"];
                    $sort = $_GET["sort"];
                } else {
                    $state = "*";
                    $city = "*";
                    $sort = "rating";
                }
                ?>
                <div class="row">
                    <div class="col-lg-4 form-group">
                        <label for="state">State</label>
                        <select class="form-control" name="state" id="state" onchange="this.form.submit()">
                            <option value="*" <?php if ($state=="*") {
                                echo 'selected="selected"';
                            } ?> >All</option>
                            <option value="NSW" <?php if ($state=="NSW") {
                                echo 'selected="selected"';
                            } ?> >New South
                                Wales
                            </option>
                            <option value="VIC" <?php if ($state=="VIC") {
                                echo 'selected="selected"';
                            } ?> >Victoria
                            </option>
                            <option value="SA" <?php if ($state=="SA") {
                                echo 'selected="selected"';
                            } ?> >South
                                Australia
                            </option>
                            <option value="ACT" <?php if ($state=="ACT") {
                                echo 'selected="selected"';
                            } ?> >Australia
                                Capital Territory</option>
                            <option value="WA" <?php if ($state=="WA") {
                                echo 'selected="selected"';
                            } ?> >Western
                                Australia
                            </option>
                            <option value="QLD" <?php if ($state=="QLD") {
                                echo 'selected="selected"';
                            } ?> >Queensland
                            </option>
                            <option value="TAS" <?php if ($state=="TAS") {
                                echo 'selected="selected"';
                            } ?> >Tasmania
                            </option>
                            <option value="NT" <?php if ($state=="NT") {
                                echo 'selected="selected"';
                            } ?> >Northern
                                Territory
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="city">City</label>
                        <!--change to auto select later-->
                        <!--do not let customer to choose-->
                        <select class="form-control" name="city" id="city" onchange="this.form.submit()">
                            <option value="*" <?php if ($city=="*") {
                                echo 'selected="selected"';
                            } ?> >All</option>
                            <option value="Sydney" <?php if ($city=="Sydney") {
                                echo 'selected="selected"';
                            } ?> >Sydney
                            </option>
                            <option value="Melbourne" <?php if ($city=="Melbourne") {
                                echo 'selected="selected"';
                            } ?>
                                >Melbourne</option>
                            <option value="Adelaide" <?php if ($city=="Adelaide") {
                                echo 'selected="selected"';
                            } ?>
                                >Adelaide</option>
                            <option value="Canberra" <?php if ($city=="Canberra") {
                                echo 'selected="selected"';
                            } ?>
                                >Canberra</option>
                            <option value="Perth" <?php if ($city=="Perth") {
                                echo 'selected="selected"';
                            } ?> >Perth
                            </option>
                            <option value="Brisbane" <?php if ($city=="Brisbane") {
                                echo 'selected="selected"';
                            } ?>
                                >Brisbane</option>
                            <option value="Hobart" <?php if ($city=="Hobart") {
                                echo 'selected="selected"';
                            } ?> >Hobart
                            </option>
                            <option value="Darwin" <?php if ($city=="Darwin") {
                                echo 'selected="selected"';
                            } ?> >Darwin
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="sort">Sort by</label>
                        <select class="form-control" name="sort" id="sort" onchange="this.form.submit()">
                            <option value="rating" <?php if ($sort=="rating") {
                                echo 'selected="selected"';
                            } ?>
                                >Highest
                                rating first</option>
                            <option value="price" <?php if ($sort=="price") {
                                echo 'selected="selected"';
                            } ?> >Lowest
                                price
                                first</option>
                        </select>
                    </div>
                </div>

                <?php

                include 'include/db.php';
                if ($city != "*") {
                    $targets["city"] = $city;
                }
                if ($state != "*") {
                    $targets["state"] = $state;
                }
                $targets["healthy"] = true;
                $workerlist = dbsearchmultiplecondition("worker", array("uid", "name", "city", "price", "rating"), $targets);

                if (count($workerlist) == 0) {
                    echo "no workers available.";
                } else {
                    if ($sort == "rating") {
                        $columns = array_column($workerlist, 'rating');
                        array_multisort($columns, SORT_DESC, $workerlist);
                    }elseif ($sort == "price") {
                        $columns = array_column($workerlist, 'price');
                        array_multisort($columns, SORT_ASC, $workerlist);
                    }
                ?>

                <!-- start result -->
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-center">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Worker ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Rating</th>
                                </tr>
                            </thead>
                            <?php
                    echo "<tbody>";
                    foreach ($workerlist as $worker) {
                        echo '<tr>';
                        echo '<th scope="row">' . $worker["uid"] . '</th>';
                        echo '<td>' . $worker["name"] . '</td>';
                        echo '<td>' . $worker["city"] . '</td>';
                        echo '<td>' . $worker["price"] . '</td>';
                        echo '<td>' . $worker["rating"] . '</td>';
                        echo '</tr>';
                    }
                    echo "</tbody>";
                            ?>
                        </table>
                    </div>
                </div>
                <!-- end result -->


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
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>