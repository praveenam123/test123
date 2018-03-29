<?php
ob_end_flush();
ob_start();
session_start();

error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

//for localhost make this 1
$enable_local=0;

if (($store_name=$_GET['store']) || ($store_name=$_SESSION['leftword_order_store'])) {
	include_once ('left-content/stores/'.$store_name.'/config.php');
	unset($_SESSION['leftword_order_store']);
}
elseif ($enable_local)
	include_once ('config-local.php');
else
	include_once ('config.php');
?>