<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `ORDER` (Quantity, Price, OrderDate, ShippingDate, OrderStatus, Employee) VALUES('','','','','','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: order-list.php');
//// return to list
//if(isset($_SESSION['list'])) {
//    header('location: ' . $_SESSION['list']);   
//} else {
//    header('location: .');
//}
//
