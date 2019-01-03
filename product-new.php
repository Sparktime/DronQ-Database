<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `PRODUCT` (Type, Manufacturing_Date) VALUES('','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: product-list.php');
//// return to list
//if(isset($_SESSION['list'])) {
//    header('location: ' . $_SESSION['list']);   
//} else {
//    header('location: .');
//}
//
