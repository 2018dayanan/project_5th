
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
if(($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] = "")){
    // message dispalyed if required field missing
    $msg ='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';

} else{
    // assigning user value to variable
    $sid = $_REQUEST['stu_id'];
    $sname = $_REQUEST['stu_name'];
    $semail = $_REQUEST['stu_email'];
    $spass = $_REQUEST['stu_pass'];
    $socc = $_REQUEST['stu_occ'];
    // $cprice = $_REQUEST['course_price'];
    // $coriginalprice = $_REQUEST['course_original_price'];
    // $cimg = '../image/courseimg/'. $_FILES['course_img']['name'];

    // updation of data
        $sql  = "UPDATE student SET stu_id = '$sid', stu_name = '$sname',stu_email = '$semail',stu_pass = '$spass',stu_occ = '$socc' WHERE  stu_id = '$sid'";
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
    <!-- <h3 class="text-center">Update Course Details</h3> -->

    <?php
        if(isset($_REQUEST['view'])){
            $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
        }
    
    ?>
    <!-- creating form -->

    <!-- <div class="col-sm-6 mt-5 mx-3 jumbotron"> -->
        <h3 class="text-center">Update Student Detail</h3>
        <form action="" method="post" enctype="multipart/from-data">
        <div class="form-group">
                <label for="stu_name">ID</label>
                <input type="text" class="form-control" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id']))  { echo $row['stu_id'];}  ?>" readonly>
            </div>
            <div class="form-group">
                <label for="stu_name">Name</label>
                <input type="text" class="form-control" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name']))  { echo $row['stu_name'];}?>" >
            </div>
            <div class="form-group">
                <label for="stu_email">Email</label>
                <input type="text" class="form-control" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email']))  { echo $row['stu_email'];}?>">
            </div>
            <div class="form-group">
                <label for="stu_pass">Password</label>
                <input type="text" class="form-control" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass']))  { echo $row['stu_pass'];}?>">
            </div>
            <div class="form-group">
                <label for="stu_occ">Occupation</label>
                <input type="text" class="form-control" id="stu_occ" name="stu_occ" value="<?php if(isset($row['stu_occ']))  { echo $row['stu_occ'];}?>">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-danger" id="requpdate" name="requpdate">Update</button>
                <a href="students.php" class="btn btn-secondary">Close</a>
            </div>
            <?php if(isset($msg)) {echo $msg;} ?>
        </form>
    <!-- </div> -->
</div> <!--Div row close from header -->
</div> <!--Div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
