
<?php
    if(!isset($_SESSION)){
        session_start();
    
    }

include("./stuInclude/header.php");
include_once('../dbConnection.php');

// for if admin login store false if admin no tlogin otherwise you can enter inside dashboard without login by -> admin/courses.php
if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}else{
    echo "<script> location.href='../index.php';</script>";
}

// for student email 
// $stuEmail = $_SESSION['stuLogEmail'];
if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        // msg displayed if missing field
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields || Type New Password</div>';
    }else{
        $sql = "SELECT * FROM student WHERE stu_email = '$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
            $stuPass = $_REQUEST['stuNewPass'];
            $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
            if($conn->query($sql) == TRUE){
                 // msg displayed success field
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Updated Successfully</div>';
            }else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Password Updated Failed</div>';
            }
        }
    }
}

?>

    <div class="col-sm-9 mt-5">
        <div class="row">
            <div class="col-sm-6">
                <form action="" class="mt-5 mx-5" method="POST">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" id="inputEmail" value="  <?php echo $stuEmail ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="inputnewpassword">New Password</label>
                        <input type="email" class="form-control" id="inputnewpassword" placeholder="New  Password" name="stuNewPass" >
                    </div>
                    <!-- <div class="text-center"> -->
                <button type="submit" class="btn btn-danger mr-4 mt-4"  name="stuPassUpdateBtn">Update</button>
                <button type="reset" class="btn btn-secondary mr-4 mt-4">Reset</button>
                <?php if(isset($passmsg))  {echo  $passmsg;} ?>
            <!-- </div> -->
                </form>
            </div>
        </div>
    </div>

</div> <!-- div row close from header-->
<!-- </div> div container fluid close from header -->


<?php include('./admininclude/footer.php') ?>
