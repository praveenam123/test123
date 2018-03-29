<?php
error_reporting(E_ALL);
//header("Content-type: text/csv");
//header("Content-Disposition: attachment; filename=file.csv");
//header("Pragma: no-cache");
//header("Expires: 0");
$servername = "localhost";
$username = "root";
$password = "Praveena@01";
$dbname = "leftwhlx_aug15";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
}
$q=$sql->executeSQL("SELECT `id`, `username`, `password`, `isadmin`, `email`, `store_id`, `isactive`, `updated_on`, `registered_on` FROM `users` WHERE 1");
$fields=array('billing_address_county', 'billing_address_district' , 'billing_address_door', 'billing_address_line', 'billing_address_locality', 'billing_address_pincode', 'billing_address_province', 'billing_address_state', 'billing_address_street', 'billing_address_taluk', 'billing_address_town', 'billing_address_zipcode', 'bookclubforlife', 'cart', 'email', 'formname', 'fullname', 'isactive', 'membership_expiry', 'member_id', 'mobile', 'phone', 'title', 'uid',  'username');

$users_array=array();
$i=0;
foreach ($q as $r) {
    foreach ($fields as $field) {
        $v=$sql->executeSQL("SELECT `value` FROM `users_meta` WHERE `key`='$field' && `uid`='$r[id]' LIMIT 1");
        $r[$field]=$v['value'];
    }
    $users_array[]=$r;
    
    //break the loop
    $i++; if ($i>5) break;
}
?>
