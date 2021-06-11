
<?php

if(!isset($_SESSION)){
    session_start();

}
// define('TITLE', 'Edit Lesson');
include("./admininclude/header.php");
include('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
    if(isset($_SESSION['is_admin_login'])){
        $adminEmail = $_SESSION['adminLogEmail'];
    }else{
        echo "<script> location.href='../index.php';</script>";
    }


// update course 
if(isset($_REQUEST['requpdate'])){
    // checking for empty fields
if(($_REQUEST['lesson_id'] == "") || ($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] = "")){
    // message dispalyed if required field missing
    $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';

} else{
    // assigning user value to variable
    $lid = $_REQUEST['lesson_id'];
    $lname = $_REQUEST['lesson_name'];
    $ldesc = $_REQUEST['lesson_desc'];
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    // $llink = $_REQUEST['course_price'];
    // $coriginalprice = $_REQUEST['course_original_price'];
    $llink = '../lessonvid/'. $_FILES['lesson_link']['name'];

    // updation of data
        $sql  = "UPDATE lesson SET lesson_id = '$lid', lesson_name = '$lname',lesson_desc = '$ldesc',course_id = '$cid',course_name = '$cname',lesson_link = '$llink' WHERE  lesson_id_id = '$lid'";
        if($conn->query($sql) == TRUE ){
            // below message display on form submit success
        $msg ='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';

        }else{
        $msg ='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update</div>';

        }

    }
}


?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Lesson Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_id">Lesson ID</label>
            <input type="text" name="lesson_id" class="form-control" id="lesson_id" value="<?php if(isset($row['lesson_id'])){ echo $row['lesson_id'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" name="lesson_name" class="form-control" id="lesson_name" value="<?php if(isset($row['lesson_name'])){ echo  $row['lesson_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea name="lesson_desc" id="lesson_desc"  rows=2 class="form-control">
            <?php if(isset($row['lesson_desc'])){ echo  $row['lesson_desc'];} ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" class="form-control" id="course_id" value="<?php if(isset($row['course_id'])){ echo  $row['course_id'];} ?>"  readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" class="form-control" id="course_name" onkeypress="isInputNumber(event)" value="<?php if(isset($row['course_name'])){ echo  $row['course_name'];} ?>" readonly>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="<?php if(isset($row['lesson_link'])){echo $row['lesson_link'];} ?>" allowfullscreen  class="embed-responsive-item"></iframe>
                </div>
            <input type="file" name="lesson_link" class="form-control-file" id="lesson_link" >
        </div>
        
        <div class="text-center">
            <button type="submit" name="requpdate" class="btn btn-danger" id="requpdate">Update</button>
            <a href="lesson.php" class="btn btn-secondary">Close</a>
            <?php if(isset($msg)){ echo $msg;} ?>
        </div>
        
    </form>
</div>
</div> <!--Div row close from header -->
</div> <!--Div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
