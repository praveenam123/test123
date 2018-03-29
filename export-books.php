<?php
include_once('load.php');
$arr=array();
$i=1;
$buks=$book->list_isbns_by_supplier(1);
foreach ($buks as $isbn) {
    if ($isbn>1000000000) {
        $arr[]=$book->get_spreadsheet_book_row($isbn, 1);
    
        //To break the loop
        $i++;
        if ($i>20) break;
    }
}
print_r($arr);
?>