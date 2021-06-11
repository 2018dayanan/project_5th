
<?php 
   if(!isset($_SESSION)){
    session_start();

}
include("./admininclude/header.php");
include('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}


    if(isset($_REQUEST['lessonSubmitBtn'])){
        // checking for  empty field
        if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] = "")){
            $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
        } else{
            // capturing data from table , assigning user value to variable 
            $lesson_name = $_REQUEST['lesson_name'];
            $lesson_desc = $_REQUEST['lesson_desc'];
            $course_id = $_REQUEST['course_id'];
            $course_name = $_REQUEST['course_name'];
            $lesson_link = $_REQUEST['lesson_link'];
            // $course_original_price = $_REQUEST['course_original_price'];
            // for image validation 
            // $course_image = $_FILES['course_img']['name'];
            // passing in temp name
            $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
            $link_folder = '../lessonvid/'.$lesson_link;
            // moving pictures to path
            move_uploaded_file($lesson_link_temp, $link_folder);

            // inserting in to database
            $sql = "INSERT INTO lesson (lesson_name,lesson_desc,lesson_link,course_id,course_name) VALUES ('$lesson_name','$lesson_desc','$link_folder',$course_id','$course_name')";

            // execition 
            if($conn->query($sql) == TRUE){
            $msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Lesson Added Successfully</div>';

            } else {
            $msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Add Lesson</div>';

            }

        }
    }
    
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" class="form-control" id="course_id" value="<?php if(isset($_SESSION['course_id'])){ echo $_SESSION['course_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_id" class="form-control" id="course_name" value="<?php if(isset($_SESSION['course_name'])){ echo $_SESSION['course_name'];} ?>" readonly>
        </div>
        <div class="form-group">
        <label for="lesson_name">Lesson Name</label>
        <input type="text" name="lesson_name" class="form-control" id="lesson_name" >
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea  name="lesson_desc" class="form-control" id="lesson_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <input type="file" name="lesson_link" class="form-control" id="lesson_link">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" name="course_price" class="form-control" id="course_price">
        </div>
        <div class="text-center">
            <button type="submit" name="lessonSubmitBtn" class="btn btn-danger" id="lessonSubmitBtn">Submit</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
            <?php if(isset($msg)){ echo $msg;} ?>
        </div>
        
    </form>
</div>
</div> <!--Div row close from header -->
</div> <!--Div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
