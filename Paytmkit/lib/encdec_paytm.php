<?php 

function encrypt_e($input, $ky){
    $key = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
    return $data;
}

function decrypt_e($crypt, $ky){
    $key = html_entity_decode($ky);
    $iv = "@@@@&&&&####$$$$";
    $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
    return $data;
}

function generateSalt_e($length){
    $random ="";
    srand((double) microtime() * 1000000);

    $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
    $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
    $data .= "0FGH45OP89";

    for($i =0; $i<$length; i++){
        $random .= substr($data, (rand() %  (strlen($data))), 1);
    }
    return $random;

}

function checkString_e($value){
    if($value == 'null')
     $value = '';
     return $value; 
}

function getChecksumFromArray($arrayList, $key, $sort=1){
    if($sort !=0){
        ksort($arrayList);
    }
    $str = getArray2Str($arrayList);
    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}
function getChecksumFromString($str, $key){

    $salt = generateSalt_e(4);
    $finalString = $str . "|" . $salt;
    $hash = hash("sha256", $finalString);
    $hashString = $hash . $salt;
    $checksum = encrypt_e($hashString, $key);
    return $checksum;
}

// verify
function verifychecksum_e($arrayList, $key, $checksumvalue){
    $arrayList = removeCheckSumParam($arrayList);
    ksort($arrayList);
    $str = getArray2StrForVerify($arrayList);
    $paytm_hash = decrypt_e($checksumvalue, $key);
    $salt = substr($paytm_hash, -4);

    $finalString = $str . "|" . $salt;

    $website_hash = hash("sha256", $finalString);
    $website_hash .= $salt;


    $validFlag = "FALSE";
    if($website_hash  == $paytm_hash){
        $validFlag ="TRUE";
    }else{
        $validFlag = "FALSE";
    }
    return $validFlag;
}

// more left  creating function

?>