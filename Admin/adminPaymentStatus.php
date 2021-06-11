<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include('./adminInclude/header.php');
include("../dbConnection.php");
// session_start();

require_once("../PaytmKit/lib/config_paytm.php");
require_once("../PaytmKit/lib/encdec_paytm.php");


$ORDER_ID = "";
$responseParamList = array();
$responseParamList = array();

if(isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != ""){
    // in test page we are taking parameter from POST request in actual implementation these can be collected from session or DB
    $ORDER_ID = $_POST["ORDER_ID"];
    // create an array having all required field parameters for status query
    $requestParamList = array("MID" => PAYTM_MERCHANT_MID, "ORDERID" => $ORDER_ID);

    $StatusCheckSum = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY);

    $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

    // Call the PGs getTxnStatusNew() function for verifying the transaction status.
    $responseParamList = getTxnStatusNew($requestParamList);
}
?>

<!-- <!DOCTYPE html  PUBLIC  "-//W3C//DTD HTML 4.01 Transaction//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction status Query</title>
    <meta name="GENERATOR" content="Eversoft First  Page">
</head>
<body> -->
    <div class="container">
        <h2 class="text-center my-4">Payment Status </h2>
        <form action="" method="post">
            <!-- <table border="1"> -->
            <div class="form-group row">
                <label for="" class="offset-sm-3 col-form-label">Order ID: </label>
                <div>
                <input type="" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>" id="ORDER_ID">
                </div>
                <div>
                <input type="submit" class="btn btn-primary mx-4" onclick="" value="View">
                </div>
            </div>

        </form>
    </div>

<!-- 
            <tbody>
                <tr>
                    <td><label>ORDER_ID::*</label></td>
                    <td>
                    <input type="" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>" id="ORDER_ID">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                    <input type="submit" onclick="" value="Status Query">
                    </td>
                </tr>
                </tbody>
            </table>
            <br/><br/> -->
            <?php
            if(isset($responseParamList) && count($responseParamList) >0){

            ?>
            <!-- <h2>Response of Status query:</h2> -->
            <!-- <div class="container"> -->
                <div class="justify-content-center">
                    <div class="col-auto">
                        <h2 class="text-center">Payment Receipt</h2>

                        <table class="table table-bordered">
                <tbody>
                    <?php 
                        foreach($responseParamList as $paramName => $paramValue){

                            ?>
                            <tr>
                                <td><label><?php echo $paramName ?></label></td>
                                <td ><label><?php echo $paramName ?></label></td>
                            </tr>
                    <?php } ?>
                    <!-- for print button -->
                    <tr>
                    <td>
                            <button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
            <!-- </div> -->
           
            <?php  } ?>

        <!-- </form> -->
    <!-- </div> -->

    <?php include('./adminInclude/footer.php'); ?>
    

