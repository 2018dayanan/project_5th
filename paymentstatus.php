
<!-- start including header -->
<?php
include('./mainInclude/header.php');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
include("./dbConnection.php");
// session_start();

require_once("./PaytmKit/lib/config_paytm.php");
require_once("./PaytmKit/lib/encdec_paytm.php");


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
<!-- end closing header -->
 <!-- Start course page  banner -->
 <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./image/coursebanner.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow: 10px;">
        </div>
    </div>
    <!-- End course page  banner -->

    <!-- start payment status page -->
<div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="post">
        <div class="form-group row">
            <label for="" class="offset-sm-3 col-form-label">Order ID:</label>
            <div>
                <input type="text" class="form-control mx-3">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" value="view">
            </div>
        </div>
    </form>
</div>
    <!-- end payment status page -->
    <?php  
    if(isset($responseParamList) && count($responseParamList)>0)
    {  ?>
    <div class="row justify-content-center">
        <div class="col-auto">
            <h2 class="text-center">Payment  Receipt</h2>
            <table class="table table-bordered">
                <tbody>
                    <?php 
                    foreach($responseParamList as $paramName => $paramValue){
                        if(($paramName == "TXNID") || ($paramName=="ORDERID") || ($paramName == "TXNAMOUNT") || ( $paramName == "STATUS")){ ?>
                            <tr>
                            <td><label><?php echo $paramName ?></label></td>
                            <td> <?php echo $paramValue ?></td>
                            </tr>
                            <?php }}  ?>
                            <tr>
                            <td></td>
                            <td><button onclick="javascript:window.print();" class="btn btn-primary">Print</button></td>
                            </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <?php 
     }
    ?>
    </div>
    <div class="mt-5">
    
<!-- including sontact us  start -->
    <?php 
    include('./contact.php')
    ?>
    </div>
<!-- end contact us including -->
<!-- start including footer  -->
<?php 
include('./mainInclude/footer.php');
?>
<!--end including footer -->