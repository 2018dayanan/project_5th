<?php
include('./dbConnection.php');
session_start();
if(isset($_SESSION['stuLogEmail'])){
echo "<script>location.href = 'loginsignup.php'</script>";
}else{
    // code from paytm
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    // if user  login taking email from user session
    $stuEmail = $_SESSION['stuLogEmail'];
    // code from paytm

    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap -->
     <link rel="stylesheet" href="./css/bootstrap.min.css">
   <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet"> 
    <!-- custom css -->
    <link rel="stylesheet" href="./css/style.css">
    <title>Checkout</title>
    <!-- from paytm meta -->
    <meta name="GENERATOR" content="Evrsoft First Page ">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 jumbotron">
                <h3 class="mb-5">Welcome to ELearn Payment Page</h3>
                 <form action="./PaytmKit/pgRedirect.php" method="post">
                    <div class="form-group row">
                        <label for="ORDER_ID" class="col-sm-4 col-form-label">ORDER_ID</label>
                        <div class="col-sm-8">
                            <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" .rand(10000,99999999) ?>"readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
                        <div class="col-sm-8">
                        <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)) {echo $stuEmail;} ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
                        <div class="col-sm-8">
                        <input id="TXN_AMOUNT" tabindex="10"  type="text"  name="TXN_AMOUNT"  value="<?php if(isset($_POST['id'])) {echo $_POST['id'];} ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label> -->
                        <div class="col-sm-8">
                        <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <!-- <label for="Channel  ID" class="col-sm-4 col-form-label">Amount</label> -->
                        <div class="col-sm-8">
                        <input id="CHANNEL_ID" type="hidden" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>

                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Checkout" onclick="" class="btn btn-primary">
                        <a href="./courses.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
                <small class="form-text text-muted">Note: Complete Payment  by  Clicking Checkout Button</small>
            </div>
        </div>
    </div>
<!-- form from paytm start -->
    <!-- <h1>CheckOut </h1>
    <pre></pre>
    <form action="pgRedirect.php" method="post">
        <table border="1">
        <tr>
            <th>S.No</th>
            <th>Label</th>
            <th>Value</th>
        </tr>
        <tr>
            <td> <label>ORDER_ID::*</label> </td>
            <td>
            <input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo "ORDS" .rand(10000,99999999) ?>">
            </td>
        </tr>
        <tr>
        <td>2</td>
            <td> <label>CUSTID::*</label> </td>
            <td>
            <input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
            </td>
        </tr>
        <tr>
        <td>3</td>
            <td> <label>INDUSTRY_TYPE_ID::*</label> </td>
            <td>
            <input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            </td>
        </tr>
        <tr>
        <td>4</td>
            <td> <label>Channel::*</label> </td>
            <td>
            <input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            </td>
        </tr>
        <tr>
        <td>5</td>
            <td> <label>txnAmount*</label> </td>
            <td>
            <input id="TXN_AMOUNT" tabindex="10"  type="text"  name="TXN_AMOUNT"  value="1">
            </td>
        </tr>
        <tr>
        <td></td>
        <td></td>
        <td><input  value ="CheckOut" type="submit"  onclick=""></td>
        </tr>
        
        </tbody> -->
        <!-- </table> -->
    <!-- </form> -->
    <!-- form from paytm  end -->

    
</body>
</html>
<?php 
}
?>