
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- font awesme -->
    <!-- fav icon -->
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet"> 
<!-- custom css -->
<link rel="stylesheet" href="./css/style.css">
<!-- testimonials css -->
<!-- <link rel="stylesheet" href="css/owl.carousel.min.css"> -->
    <title>ELearn</title>
</head>
<body>
    <!-- <h1>E Learning Let's Learn Smarter</h1> -->
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark  pl-5 fixed-top">
  <a class="navbar-brand" href="index.php">eLearn</a>
  <!-- tagline start -->
  <span class="navbar-text">Learn Smarter</span>
  <!-- tagline end -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-nav pl-5">
      <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
      <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
      <?php
      // session_start();
        if(isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item">
          <a href="student/studentProfile.php" class="nav-link">My Profile</a>
          </li>
      <li class="nav-item custom-nav-item">
      <a href="logout.php" class="nav-link">Logout</a>
      </li>';
        }else{
          echo '<li class="nav-item custom-nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter">Login</a>
          </li>
          <li class="nav-item custom-nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign Up</a>
          </li>';
        }
      ?>
      <li class="nav-item custom-nav-item"><a href="../Student/stufeedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>

    </ul>
  </div>
</nav>