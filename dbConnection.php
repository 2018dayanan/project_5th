
<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "9862170694";
$db_name = "lms_db";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);
// mysql_connect($db_host, $db_user, $db_password) or die('error');
// mysql_select_db('db_name')  or die('db not found');
// echo 'connected';

if($conn->connect_error){
    die("connection failed ");          
}
    // echo"connected";


?>