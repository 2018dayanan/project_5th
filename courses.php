<?php
// start of navigation

include('./dbConnection.php');
include('./mainInclude/header.php');
?>
    <!-- End Navigation -->
    <!-- Start course page  banner -->

    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow: 10px;">
        </div>
    </div>
    <!-- End course page  banner -->
<!-- start All popular course -->
<div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <!-- Start All course 1st card deck -->
    <div class="row mt-4">
        <?php
        
        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $course_id = $row['course_id'];

                echo '
                
                <div class="col-sm-4 mb-4">
                
                <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align:left; padding:0; margin:0;">
                <div class="card">
                    <img src=" '.str_replace('..','.', $row['course_img']).' " alt="Guitar" class="card-img-top" />
                    <div class="card-body">
                        <h5 class="card-title">'.$row['course_name'].'</h5>
                        <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small><span class="font-weight-bolder">&#8377 '.$row['course_price'].' </span></p> 
                        <a href="coursedetails.php?course_id='.$course_id.'" class="btn btn-primary text-white font-weight-bolder float-right">Enroll</a>
                    </div>
                </div>
                </a>
                </div>';
            }
        }
        
        ?>
    </div>
    <!-- end all course row -->
    
</div>
<!-- ended all course -->
<!-- End All popular course 2nd card deck -->

    <!-- footer section start -->
<?php include('./mainInclude/footer.php'); ?>
<!-- end footer -->
