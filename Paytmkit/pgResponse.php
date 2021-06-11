<?php
     header("Pragma: no-cache");
     header("Cache-Control: no-cache");
     header("Expires: 0");
     include("../dbConnection.php");
     session_start();

     require_once("./lib/config_paytm.php");
     require_once("./lib/encdec_paytm.php");


     $paytmChecksum = "";
     $paramList = array();
     $isValidChecksum ="FALSE";

     $paramList  = $_POST;
     $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";  //sent by paytm pg

    //  verify all parameters received from paytm pg to your  application, like MID received from paytm  pg is same as your application MID , TXN_AMPOUNT and ORDER_ID are same as what was sent by you to paytm PG for initiating transaction etc.
    $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChechsum); //will return false or trus string 

    if($isValidCheckSum == "TRUE"){
        // echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
        if($_POST["STATUS"] == "TXN_SUCCESS"){
            echo "<b>Transaction status is Success</b>" . "<br/>";
        //  process your  transaction here as  success transaction.
        // verify amount & order id received from payment gateway with your applicatons order IF and amoint.

        if(isset($_POST['ORDERID'] && isset($_POST['TXNAMOUNT']))){
            $order_id = $_POST['ORDERID'];
            $stu_email = $_SESSION['stuLogEmail'];
            $course_id = $_SESSION['course_id'];
            $status = $_SESSION['STATUS'];
            $respmsg = $_SESSION['RESPMSG'];
            $amount = $_SESSION['TXNAMOUNT'];
            $date = $_SESSION['TXNDATE'];
            $sql = "INSERT INTO courseorder(order_id, stu_email, course_id, status ,respmsg, amount, order_date)VALUES('$order_id','$stu_email',' $course_id','$status','$respmsg','$amount','$date')";
            if($conn->query($sql)== TRUE){
                echo "Redirecting  to My Profile...";
                echo "<script> setTimeout(()=>{

                    window.location.href = '../Student/myCourse.php';
                }, 1500);</script>";

            };



        }
            
        }else{
            echo "<b>Transaction status is failure</b>" . "<br/>";
        }
       
   

    if(isset($_POST) && count($_POST) > 0){
        // for all data you receive  do not want to show  commenting it 
        // foreach($_POST as $paramName => $paramValue){
        //     echo "<br/>" . $paramName . " = " .$paramValue;
        // }
    }
}else{
    echo "<b>Checksum mismatched</b>";
}

;?>