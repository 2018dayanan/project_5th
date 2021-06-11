
<?php

if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');

// email verify check if already register
if(isset($_SESSION['is_login'])){
    $stuEmail  = $_SESSION['stuLogEmail'];

}else{
    echo "<script> location.href = '../index.php';</script>";
}
// to check if available same email in database
$sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
// result execute query
$result = $conn->query($sql);
if($result->num_rows  == 1){
    $row = $result->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row["stu_name"];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row["stu_img"];


}
// insert student
if(isset($_REQUEST['updateStuNameBtn'])){

    if(($_REQUEST['stuName']== "")){
        // msg displayed if required field missing
        $passmsg = '<div class="alert   alert-warning col-sm-6 ml-5 mt-2"  role="alert">Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST["stuname"];
        $stuOcc = $_REQUEST["stuOcc"];
        $stu_img = $_FILES['stuImg']['name'];
        $stu_image_temp = $_FILES['stuImg']['tmp_name'];
        $img_folder = '../image/stu/'.$stu_image;
        move_uploaded_file($stu_image_temp, $img_folder);
        $sql = " UPDATE student SET  stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
        if($conn->query($sql) == TRUE){
            // display submit success
            $passmsg = '<div class=" alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully</div>';
        }else{
           $passmsg = '<div class=" alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update</div>';
        }

    }
}
?>
<div class="col-sm-6 mt-5">
    <form action="" method="POST" class="mx-5" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" id="stuId" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;} ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="stuEmail"> Email</label>
            <input type="email" id="stuEmail" name="stuEmail" value="<?php  {echo $stuEmail;} ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="stuName">Student Name</label>
            <input type="text" id="stuName" name="stuName" value="<?php if(isset($stuName)) {echo $stuName;} ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="stuOcc">Occupation</label>
            <input type="text" id="stuOcc" name="stuOcc" value="<?php if(isset($stuOcc)) {echo $stuOcc;} ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="stuImg">Upload Image</label>
            <input type="file" id="stuImg" name="stuImg" class="form-control-file">
        </div>
        <button class="btn btn-primary" name="updateStuNameBtn" type="submit">Update</button>
        <?php if(isset($passmsg)){ echo $passmsg;} ?>
    </form>
</div>

</div><!-- div close  row div from header file -->
<?php 
include('./stuInclude/footer.php');
?>
