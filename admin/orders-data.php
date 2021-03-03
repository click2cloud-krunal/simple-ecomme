<?php
//Include database connection details
require_once(__DIR__.'/../config.php');
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);
if (!$link) {
	die("Cannot access db.");
}

$orders;
//get all the categories
$res = mysqli_query($link,"SELECT `tbl_order`.*,GROUP_CONCAT(`pd_name` SEPARATOR ', ')  as `products`
					FROM `tbl_order`,`tbl_order_item`, `tbl_product`
					WHERE `tbl_order`.`od_id` = `tbl_order_item`.`od_id` 
					AND `tbl_product`.`pd_id` = `tbl_order_item`.`pd_id`
					GROUP BY `od_id`");
while ($row = mysqli_fetch_object($res)) {
	$orders[] = $row;
}
?>
