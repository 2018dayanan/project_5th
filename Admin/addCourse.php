
<?php 
   if(!isset($_SESSION)){
    session_start();
// }else{
//     session_destroy();
}
include("./admininclude/header.php");
include('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}


    if(isset($_REQUEST['courseSubmitBtn'])){
        // checking for  empty field
        if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] = "") || ($_REQUEST['course_price']== "") || ($_REQUEST['course_original_price']== "")){
            $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else{
            // capturing data from table
            $course_name = $_REQUEST['course_name'];
            $course_desc = $_REQUEST['course_desc'];
            $course_author = $_REQUEST['course_author'];
            $course_duration = $_REQUEST['course_duration'];
            $course_price = $_REQUEST['course_price'];
            $course_original_price = $_REQUEST['course_original_price'];
            // for image validation 
            $course_image = $_FILES['course_img']['name'];
            // passing in temp name
            $course_image_temp = $_FILES['course_img']['tmp_name'];
            $img_folder = '../image/courseimg/'.$course_image;
            // moving pictures to path
            move_uploaded_file($course_image_temp, $img_folder);

            // inserting in to database
            $sql = "INSERT INTO course (course_name,course_desc,course_author,course_image,course_duration,course_price,course_original_price) VALUES ('$course_name','$course_desc','$course_author','$img_folder','$course_duration','$course_price','$course_original_price')";

            // execition 
            if($conn->query($sql) == TRUE){
            $msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2">Course Added Successfully</div>';

            } else {
            $msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add Course</div>';

            }

        }
    }
    
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" class="form-control" id="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc"  rows=2 class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" name="course_author" class="form-control" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" name="course_duration" class="form-control" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Original Price</label>
            <input type="text" name="course_original_price" class="form-control" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" name="course_price" class="form-control" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" name="course_img" class="form-control-file" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" name="courseSubmitBtn" class="btn btn-danger" id="courseSubmitBtn">Submit</button>
            <a href="course.php" class="btn btn-secondary">Close</a>
            <?php if(isset($msg)){ echo $msg;} ?>
        </div>
        
    </form>
</div>
</div> <!--Div row close from header -->
</div> <!--Div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
