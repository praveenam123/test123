<?php
include_once('config-fetch.php');
include_once('left-includes/functions.php');
include_once('left-includes/pluggable.php');
include_once('left-includes/class.MySQL.php');
include_once('left-includes/class.Captcha.php');
include_once('left-includes/class.Auth.php');
include_once('left-includes/class.MarketingAgency.php');
include_once('left-includes/class.Payment.php');
include_once('left-includes/class.Category.php');
include_once('left-includes/class.Author.php');
include_once('left-includes/class.Publisher.php');
include_once('left-includes/class.Book.php');
include_once('left-includes/class.Supplier.php');
include_once('left-includes/class.Store.php');
include_once('left-includes/class.PaymentMethod.php');
include_once('left-includes/class.CourierService.php');
include_once('left-includes/class.Order.php');
include_once('left-includes/class.Utility.php');
//---------------------------------------------
$sql = new MySQL(LW_DB_NAME, LW_DB_USER, LW_DB_PASS, LW_DB_HOST);
	
if (STORE_ID==1) {	
	//Load Plugins 
	foreach( glob(BASE_PATH.'left-content/plugins/*.plugin.php') as $plugin) {
	  require_once($plugin);
	}
	
	//Load Themes 
	foreach( glob(BASE_PATH.'left-content/themes/*.theme.php') as $theme) {
	  require_once($theme);
	}
} else {
	//Load Plugins 
	foreach( glob(BASE_PATH.'left-content/stores/'.WEBSITE_SLUG.'/*.plugin.php') as $plugin) {
	  require_once($plugin);
	}
	
	//Load Themes 
	foreach( glob(BASE_PATH.'left-content/stores/'.WEBSITE_SLUG.'/*.theme.php') as $theme) {
	  require_once($theme);
	}
}
class_actions('captcha');
class_actions('auth');
class_actions('marketing_agency');
class_actions('category');
class_actions('author');
class_actions('publisher');
class_actions('supplier');
class_actions('store');
class_actions('payment_method');
class_actions('courier_service');
class_actions('book');
class_actions('order');
class_actions('payment');
class_actions('utility');
//---------------------------------------------
$auth->refresh_session_user_country($_SESSION[STORE_ID.'_user_country_code']);
$countries=$sql->executeSQL("SELECT * FROM `master_countries` WHERE 1 ORDER BY `country_name` ASC");
$user=$auth->user_now();
//---------------------------------------------
$options['admin_url']=BASE_URL.'left-admin/';
$options['admin_path']=BASE_PATH.'left-admin/';
$options['admin_charset']='utf-8';
include_once('left-admin/admin-functions.php');
if (STORE_ID>1)
	include_once('left-content/stores/'.$_GET['store'].'/admin-functions.php');
?>