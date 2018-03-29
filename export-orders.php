<?php
include_once('load.php');
$arr=array();
$i=0;
$orders=$order->list_orders_array(1);
foreach ($orders as $ord) {
    $post=$order->get_single_order($ord['id']);
    $order_details[$i]=$post;
	$items=array();
	$order_books[$i]['oid']=$ord['id'];
	$order_books[$i]['code']=$ord['code'];
	foreach ($post as $key=>$value) {
		if (strstr($key, 'price')) {
			$itm=explode('_',$key);
			$order_books[$i]['books'][$itm[2]]['price']=$value;
		}
		if (strstr($key, 'quantity')) {
			$itm=explode('_',$key);
			$order_books[$i]['books'][$itm[2]]['quantity']=$value;
		}
		if (strstr($key, 'additionalshipping')) {
			$itm=explode('_',$key);
			$order_books[$i]['books'][$itm[2]]['additionalshipping']=$value;
		}
	}
    
    //To break the loop
    $i++;
    if ($i>=20) break;
}
print_r($order_details);
print_r($order_books);
?>