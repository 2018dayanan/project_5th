<?php 

define('PAYTM_ENVIRONMENT', 'TEST'); //PROD
define('PAYTM_MERCHANT_KEY', 'XXXXXXXXXXXXXXXXXXXXXXXX');//CHANGE THIS CONSTANTS VLAUE WITH MERCHANT KEY  RECEIVED FROM PAYTM
define('PAYTM_MERCHANT_MID', 'XXXXXXXXXXXXXXXXXXXXXXX');//CHANGE THIS CONSTANTS VLAUE WITH MERCHANT ID MID  RECEIVED FROM PAYTM
define('PAYTM_MERCHANT_KEY', 'XXXXXXX');//CHANGE THIS CONSTANTS VLAUE WITHwebsite named FROM PAYTM
$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if(PAYTM_ENVIRONMENT == 'PROD'){
    $PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
    $PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';

}
define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', '$PAYTM_STATUS_QUERY_NEW_URL');
define('$PAYTM_STATUS_QUERY_NEW_URL', '$PAYTM_STATUS_QUERY_NEW_URL');
define('PAYTM_TXN_URL', '$PAYTM_TXN_URL');


?>