
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


// update course 
if(isset($_REQUEST['requpdate'])){
    // checking for empty fields
if(($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] = "") || ($_REQUEST['course_price']== "") || ($_REQUEST['course_original_price']== "")){
    // message dispalyed if required field missing
    $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';

} else{
    // assigning user value to variable
    $cid = $_REQUEST['course_id'];
    $cname = $_REQUEST['course_name'];
    $cdesc = $_REQUEST['course_desc'];
    $cauthor = $_REQUEST['course_author'];
    $cduration = $_REQUEST['course_duration'];
    $cprice = $_REQUEST['course_price'];
    $coriginalprice = $_REQUEST['course_original_price'];
    $cimg = '../image/courseimg/'. $_FILES['course_img']['name'];

    // updation of data
        $sql  = "UPDATE course SET course_id = '$cid', course_name = '$cname',course_desc = '$cdesc',course_author = '$cauthor',course_duration = '$cduration',course_price = '$cprice',course_original_price = '$coriginalprice',course_img = '$cimg' WHERE  course_id = '$cid'";
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
    <h3 class="text-center">Update Course Details</h3>

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" class="form-control" id="course_id" value="<?php if(isset($row['course_id'])){ echo $row['course_id'];} ?>" readonly>;
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" name="course_name" class="form-control" id="course_name" value="<?php if(isset($row['course_name'])){ echo  $row['course_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc"  rows=2 class="form-control">
            <?php if(isset($row['course_desc'])){ echo  $row['course_desc'];} ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" name="course_author" class="form-control" id="course_author" value="<?php if(isset($row['course_author'])){ echo  $row['course_author'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" name="course_duration" class="form-control" id="course_duration" value="<?php if(isset($row['course_duration'])){ echo  $row['course_duration'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_original_price">Original Price</label>
            <input type="text" name="course_original_price" class="form-control" id="course_original_price" value="<?php if(isset($row['course_original_price'])){ echo  $row['course_original_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" name="course_price" class="form-control" id="course_price" value="<?php if(isset($row['course_price'])){ echo  $row['course_price'];} ?>">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php if(isset($row['img'])){ echo  $row['img'];} ?>" alt="" class="img-thumbnail">
            <input type="file" name="course_img" class="form-control-file" id="course_img" value="<?php if(isset($row['course_img'])){ echo  $row['course_img'];} ?>">
        </div>
        <div class="text-center">
            <button type="submit" name="requpdate" class="btn btn-danger" id="requpdate">Update</button>
            <a href="course.php" class="btn btn-secondary">Close</a>
            <?php if(isset($msg)){ echo $msg;} ?>
        </div>
        
    </form>
</div>
</div> <!--Div row close from header -->
</div> <!--Div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
