
<?php
    if(!isset($_SESSION)){
        session_start();
    
    }

// include("./stuInclude/header.php");
include('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Watch Course</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- font awesme -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <!-- google font -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet"> 
<!-- custom css -->
<link rel="stylesheet" href="../css/stustyle.css">
 </head>
 <body>
     <div class="container-fluid bg-success p-2">
        <h3>Welcome to eLearn</h3>
        <a href="./mycourse.php" class="btn btn-danger">My Course</a>
     </div>
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right">
                <h4 class="text-center">Lessons</h4>
                <ul id="playlist" class="nav flex-column">
                <?php 
                if(isset($_GET['course_id'])){
                    $course_id = $_GET['course_id'];
                    $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0 ){
                        while($row = $result->fetch_assoc()){
                            echo '
                            <li class="nav-item border-bottom py-2" movieurl='.$row['lesson_link'].' style="cursor:pointer;">'.$row['lesson_link'].'</li>
                            ';
                        }
                    }
                }
                
                ?>
                </ul>
            </div>
            <div class="col-sm-8">
            <video src="" id="videoarea" class="ml-2 w-75 mt-5" controls></video>
            </div>
        </div>
     </div>


     <!-- jquery and bootstrap link -->
     <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/popper.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>
<!-- fontawesome start -->
    <script type="text/javascript" src="../js/all.min.js"></script>
    
    <!-- <script type="text/javascript" src="../js/ajaxrequest.js"></script> -->
    <!-- end ajax -->
      <!-- admin ajax call javaScript  start -->
      <script type="text/javascript" src="./js/adminajaxrequest.js"></script>
    <!-- end ajax -->
    <!-- custom js -->
    <script type="text/javascript" src="../js/custom.js"></script>


 </body>
 </html>