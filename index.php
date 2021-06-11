<!-- start of navigation -->
<?php
include('./dbConnection.php');
include('./mainInclude/header.php');
?>
    <!-- End Navigation -->

    <!-- Start VIdeo Background -->
<div class="container-fluid remove-vid-marg">
<div class="vid-parent">
    <video playsinline autoplay muted loop>
        <source src="video/banvid.mp4">
    </video>
    <div class="vid-overlay">

    </div>
</div>
<!-- vid-content -->
<div class="vid-content">
    <h1 class="my-content">Welcome to eLearn</h1>
    <small class="my-content">Learn Smarter</small><br>

    <?php 
    if(!isset($_SESSION['is_login'])){
        echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
    }else{
        echo '<a href="student/studentProfile.php" class="btn btn-primary mt-3 ">My Profile</a>';
    }
    ?>
    
</div>
</div>
    <!-- end video background -->

    <!-- start text banner -->
    <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i>100+ Online Courses</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-rupee-sign mr-3"></i>Moneyback Guarantee*</h5>
            </div>
        </div>
    </div>
    <!-- end text banner -->

    <!-- start most popular course -->
    <div class="container mt-5">
    <h1 class="text-center">Popular Courses</h1>
    <!-- Start Popular course 1st card deck -->
    <div class="card-deck mt-4">
    <?php
        $sql = "SELECT FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding:0; margin:0;">
                <div class="card">
                    <img src=" '.str_replace('..','.',$row['course_img']).' " alt="Guitar" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">'.$row['course_name'].'</h5>
                        <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].' </span></p> 
                        <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                    </div>
                </div>
                </a>';
            }
        }
    
    ?>
       </div>
   
    <!-- end most popular course 1-->
    <!-- start  most popular  course 2nd card deck -->

    <div class="card-deck mt-4">
    <?php
        $sql = "SELECT FROM course LIMIT 3,3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding:0; margin:0;">
                <div class="card">
                    <img src=" '.str_replace('..','.',$row['course_img']).' " alt="Guitar" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">'.$row['course_name'].'</h5>
                        <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].' </span></p> 
                        <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                    </div>
                </div>
                </a>';
            }
        }
    
    ?>
    
</div>
<!-- view all -->
<div class="text-center m-2">
    <a href="courses.php" class="btn btn-danger btn-sm">View All Courses</a>
</div>
    
<!-- End Most popular course 2nd card deck -->
<!-- contact us start -->
<?php
include('./contact.php');
?>
<!-- Added div for closing -->
<!-- contact us end -->

<!-- testimonials  start -->
<div class="container-fluid mt-5" id="Feedback" style="background-color:#4b7289">
<h1 class="text-center testyheading p-4">Students Feedback</h1>
<div class="row">
    <div class="col-md-12">
        <div class="owl-carousel" id="testimonial-slider">
        <?php
        $sql =  "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.f_content";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row= $result->fetch_assoc()){
                $s_img =  $row['stu_img'];
                $n_img = str_replace('..','.',$s_img);
        //     }
        // }
        // while loop and if loop was passed to testimonial below to take all looping process

        ?>
            <div class="testimonial">
                <p class="description">
                    <?php echo $row['f_content']; ?>
                </p>
                <div class="pic">
                    <img src="<?php echo $n_img ?>" alt="" />
                </div>
                <div class="testimonial-prof">
                    <h4><?php echo $row['stu_name'] ?></h4>
                    <small><?php echo $row['stu_occ'] ?></small>
                </div>
            </div>

            <!-- while loop curly brace closes here -->
            <?php    }
            } 
            ?>
        </div>
    </div>
</div>
</div>
<!-- testimonail end -->

<!-- start social media follower  -->

<div class="container-fluid bg-danger">
    <div class="row text-white text-center p-1">
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-facebook-f"></i>Facebook</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-twitter"></i>Twitter</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-whatsapp"></i>WhatsApp</a>
        </div>
        <div class="col-sm">
            <a href="#" class="text-white social-hover"><i class="fab fa-instagram"></i>Instagram</a>
        </div>
    </div>
</div>
<!-- </div>Added div for closing -->
<!-- end social media follower  -->

<!-- start about section -->
    <div class="container-fluid p-4" style="background-color:#E9ECEF">
        <div class="container" style="background-color:#E9ECEF">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>eLearn provides universal access  to the   world best education, partnering with top universities  organizations to offer online courses.</p>
                </div>
                <div class="col-sm">
                    <h5>Category</h5>
                    <a href="#" class="text-dark">Web Development</a>
                    <a href="#" class="text-dark">Web Designing</a>
                    <a href="#" class="text-dark">Android App Dev</a>
                    <a href="#" class="text-dark">iOS Development</a>
                    <a href="#" class="text-dark">Data Analysis</a>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>eLearn Pvt Ltd <br> Near Sanchaya Kosh<br> Biratnagar, Nepal<br>  Ph: +9779876543210</p>
                </div>
            </div>
        </div>
    </div>
<!-- </div> Added div for closing -->
<!-- end about section -->
<!-- footer section start -->
<?php include('./mainInclude/footer.php'); ?>
<!-- end footer -->