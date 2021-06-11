
<?php
include_once('../dbConnection.php');
// $_POST['stuname']
// check if set data or not
if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stupass'])){

    // fetching data 
    $stuname  = $_POST['stuname'];
    $stuemail  = $_POST['stuemail'];
    $stupass  = $_POST['stupass'];

    // insertion data 
    $sql = "INSERT INTO student(stu_name,stu_email,stu_pass) VALUES('$stuname','$stuemail','$stupass')";

    // executing query

   

    if($conn->query($sql) == TRUE ){
        echo json_encode("OK");
    }else{
        echo json_encode("Failed");
    }
};

?>