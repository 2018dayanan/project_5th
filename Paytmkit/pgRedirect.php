<?php
     header("Pragma: no-cache");
     header("Cache-Control: no-cache");
     header("Expires: 0");

     require_once("./lib/config_paytm.php");
     require_once("./lib/encdec_paytm.php");

     $checkSum = "";
     $paramList = array();

     $ORDER_ID = $_POST["ORDER_ID"];
     $CUST_ID = $_POST["CUST_ID"];
     $INDUSTRY_TYPE_ID = $_POST["INDUSTRY_TYPE_ID"];
     $CHANNEL_ID = $_POST["CHANNEL_ID"];
     $TXN_AMOUNT = $_POST["TXN_AMOUNT"];

    //  CREATE an array having all required parameters for checksum
     
    $paramList["MID"] = PAYTM_MERCHANT_MID;
    $paramList["ORDER_ID"] = $ORDER_ID;
    $paramList["CUST_ID"] = $CUST_ID;
    $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
    $paramList["CHANNEL_ID"] = $CHANNEL_ID;
    $paramList["CHANNEL_ID"] = $CHANNEL_ID;
    $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
    $paramList["WEBSITE"] = $PAYTM_MERCHANT_WEBSITE;
    $paramList["CALLBACK_URL"] ="http://localhost/ELearn/PaytmKit/pgResponse.php";


    // CALLBACK FUNCTIONS 

    // $paramList["CALLBACK_URL"] ="http://localhost/ELearn/PaytmKit/pgResponse.php";
    // $paramList["MSISDN"] = $MSISDN; //Mobile number of customer
    // $paramList["EMAIL"] = $EMAIL; //EMAIL ID of customer
    // $paramList["VERIFIED_BY"] = $EMAIL; //EMAIL  of customer
    // $paramList["IS_USER_VERIFIED"] = "YES"; 

    // CJECKSUM STRING WOLL RETURN BY GETCHECKSUMFROM ARRAY FUNCTION

    $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY); 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MERCHANT CHECKOUT PAGE</title>
</head>
<body>
    <center> <h1>Please do not refresh this page...</h1> </center>
    <form action="<?php echo PAYTM_TXN_URL ?>" name="f1" method="post">
        <table border="1">
            <tbody>
            <?php 
                foreach($paramList as $name => $value){
                    echo '<input type="hidden" name="'.$name.'" value="'.$value.'">';
                }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
            </tbody>
        </table>
        <script type="text/javascript">
            document.f1.submit();
        </script>

    </form>
    
</body>
</html>