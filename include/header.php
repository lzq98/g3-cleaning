<!-- ======= Header ======= -->
<?php
include 'session.php';
?>
<header id="header" class="fixed-top ">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php">G3 cleaning</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
        <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
        <li><a class="nav-link scrollto" href="index.php#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
        <?php if (isset($_SESSION['username'])) {
        ?>
        <li class="dropdown"><a href="#"><span>
              <?php echo $_SESSION['username']; ?>
            </span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">My account</a></li>
            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="orderhistory.php">Order history</a></li>
            <li><a href="#">Customer support</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php
        } else {
        ?>
        <li><a class="nav-link scrollto" href="login.php">Login</a></li>
        <?php
        }
        ?>
        <li><a class="getstarted scrollto" href="request.php">Request a service</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->