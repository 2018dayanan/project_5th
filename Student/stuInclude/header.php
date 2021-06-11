<?php 
include_once('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
else{
    echo "<script> location.href = '../index.php';</script>";

}

if(isset($stuLogEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stu_img = $row['stu_img'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
    <!-- bootstrap -->
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
    <!-- Top Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-emd-nowrap p-0 shadow" style="background-color: #225470;">
        <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">eLearn</a>
    </nav>

    <!-- sidebar -->
    <div class="container-fluid mb-5" style="margin-top:40px;">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a href="studentProfile.php" class="nav-link <?php if(PAGE == 'profile') {echo 'active';} ?>"><i class="fas fa-user"></i>Profile<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourse.php" class="nav-link"><i class="fab fa-accessible-icon"></i>My Course</a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link"><i class="fab fa-accessible-icon"></i>Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePass.php" class="nav-link"><i class="fas fa-key"></i>Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link"><i class="fab fa-sign-out-alt"></i>Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

    </div>
</body>
</html>