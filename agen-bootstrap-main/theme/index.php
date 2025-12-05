<?php 
session_start();
include 'config.php';


$result = $mysqli->query("SELECT * FROM noticies ORDER BY data_publicacio DESC LIMIT 3");
$ultimas = $result->fetch_all(MYSQLI_ASSOC);

$resultTestimonis = $mysqli->query("SELECT * FROM testimonis ");
$testimonis = $resultTestimonis->fetch_all(MYSQLI_ASSOC);
?>


<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>ARCANAU</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- theme meta -->
  <meta name="theme-name" content="agen" />
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>
<style>
  .logo{
    width: 150px;
  }
</style>
<body>
  

<header class="navigation fixed-top">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand " href="index.html"><img class="logo" src="images/logoArcanau.png" alt="Egen"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
      aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navigation">
      <ul class="navbar-nav ml-auto">
        <?php
        if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'admin') {
          echo "<li class='nav-item active'>";
          echo "<a class='nav-link' href='adminPanel.php'>Panel de admin</a>";
          echo "</li>";
        }
        ?>
        
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="blog.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="portafolio.php">Portfolio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- banner -->
<section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
  data-background="images/banner/banner2.jpg">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="display-1 text-white font-weight-bold font-primary">ARCANAU</h1>
      </div>
    </div>
  </div>
</section>
<!-- /banner -->

<!-- blog -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Ultimas noticias</h2>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($ultimas as $n): ?>
      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
        <article class="card">
          <img src="<?= $n['imatge'] ?>" alt="post-thumb" class="card-img-top mb-2">
          <div class="card-body p-0">
            <time><?= $n['data_publicacio'] ?></time>
            <a href="blog-single" class="h4 card-title d-block my-3 text-dark hover-text-underline"><?= $n['titol'] ?></a>
            <a href="detall.php?id=<?= $n['id'] ?>">Leer más</a>
          </div>
        </article>
      </div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<!-- /blog -->

<!-- testimonial-slider -->
<section class="section bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="text-white mb-5">Testimonios de nuestros clientes</h2>
      </div>
    </div>
    
    <div class="row bg-contain" data-background="images/banner/brush.png">
      
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="slider" class="ui-card-slider bg-contain">
          <?php foreach ($testimonis as $t): ?>
          <div class="slide">
            <div class="card text-center">
              <div class="card-body px-5 py-4">
                <img src="images/testimonial/user-1.jpg" alt="user-1" class="img-fluid rounded-circle mb-4">
                <h4 class="text-secondary"><?= $t['nom']?> <?= $t['cognom']?></h4>
                <p><?= $t['testimoni']?></p>
              </div>
            </div>
          </div>
           
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /testimonial-slider -->

<!-- team -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Our Team</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
        <div class="section-border"></div>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-1.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.html">Sara Adams</a></h4>
            <i>Designer</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-2.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.html">Tom Bills</a></h4>
            <i>Developer</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-3.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center position-relative zindex-1">
            <h4><a class="text-dark" href="team-single.html">Anna Walle</a></h4>
            <i>Manager</i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card hover-shadow">
          <img src="images/team/member-4.jpg" alt="team-member" class="card-img-top">
          <div class="card-body text-center">
            <h4>Devid Json</h4>
            <i>CEO</i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /team -->

<!-- about -->
<section class="section-lg position-relative bg-cover" data-background="images/backgrounds/about-bg.jpg">
  <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-6 col-md-8 col-sm-7 col-8">
        <h2 class="text-white mb-4">Who We Are</h2>
        <p class="text-light mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt
          ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequat.</p>
        <a href="about.html" class="btn btn-primary">Read More</a>
      </div>
      <div class="col-md-2 col-sm-4 col-4 text-right align-self-end">
        <a class="venobox" data-autoplay="true" data-vbtype="video"
          href="https://www.youtube.com/watch?v=jrkvirglgaQ"><i
            class="text-center icon-sm icon-box rounded-circle text-white bg-gradient-primary d-block ti-control-play"></i></a>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<!-- project -->
<section class="section">
  <div class="container-fluid px-0">
    <div class="row">
      <div class="col-lg-10 mx-auto text-center">
        <h2>Our Feature Works</h2>
        <div class="section-border"></div>
      </div>
    </div>

    <div class="row no-gutters shuffle-wrapper">
      <div class="col-lg-4 col-md-6 shuffle-item">
        <div class="project-item">
          <img src="images/project/project-1.jpg" alt="project-image" class="img-fluid w-100">
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h4">Project title</a>
            <a href="#"><i class="ti-link icon-xs text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 shuffle-item">
        <div class="project-item">
          <img src="images/project/project-2.jpg" alt="project-image" class="img-fluid w-100">
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h4">Project title</a>
            <a href="#"><i class="ti-link icon-xs text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 shuffle-item">
        <div class="project-item">
          <img src="images/project/project-3.jpg" alt="project-image" class="img-fluid w-100">
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h4">Project title</a>
            <a href="#"><i class="ti-link icon-xs text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 shuffle-item">
        <div class="project-item">
          <img src="images/project/project-4.jpg" alt="project-image" class="img-fluid w-100">
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h4">Project title</a>
            <a href="#"><i class="ti-link icon-xs text-white"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 shuffle-item">
        <div class="project-item">
          <img src="images/project/project-5.jpg" alt="project-image" class="img-fluid w-100">
          <div class="project-hover bg-secondary px-4 py-3">
            <a href="#" class="text-white h4">Project title</a>
            <a href="#"><i class="ti-link icon-xs text-white"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /project -->




<!-- footer -->
<footer class="bg-secondary position-relative">
  <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
  <div class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">About</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-6">
          <h4 class="text-white mb-5">Company</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-light d-block mb-3">Service</a></li>
            <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
            <li><a href="#" class="text-light d-block mb-3">About us</a></li>
            <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
            <li><a href="#" class="text-light d-block mb-3">Support</a></li>
          </ul>
        </div>
        <div class="col-md-6">
          <div class="bg-white p-4">
            <h3>Contact us</h3>
            <form action="#">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Full name">
              <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Email address">
              <textarea name="message" id="message" class="form-control mb-4 px-0" placeholder="Message"></textarea>
              <button class="btn btn-primary" type="submit">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="pb-4">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-left">
          <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
          </p>
        </div>
        <div class="col-md-6">
          <ul class="list-inline text-md-right text-center">
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
            <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- venobox -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- shuffle -->
<script src="plugins/shuffle/shuffle.min.js"></script>
<!-- apear js -->
<script src="plugins/counto/apear.js"></script>
<!-- counter -->
<script src="plugins/counto/counTo.js"></script>
<!-- card slider -->
<script src="plugins/card-slider/js/card-slider-min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>
