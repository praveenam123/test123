<?php
include_once('load.php');
$q=$sql->executeSQL("SELECT * from authors");
$fields=array('about','name');

$users_array=array();
$i=0;
foreach ($q as $r) {
    foreach ($fields as $field) {
        $v=$sql->executeSQL("SELECT `value` FROM `authors_meta` WHERE `key`='$field' && `uid`='$r[id]' LIMIT 1");
        $r[$field]=$v['value'];
    }
    $users_array[]=$r;
    
    //break the loop
    $i++; if ($i>5) break;
}
print_r($users_array);
?>