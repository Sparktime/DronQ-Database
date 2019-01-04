<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
$Order_ID = $_POST['Order_ID'];
$Quantity = $_POST['Quantity'];
$Price = $_POST['Price'];
$OrderDate = $_POST['OrderDate'];
$ShippingDate = $_POST['ShippingDate'];
$OrderStatus = $_POST['OrderStatus'];
$Employee = $_POST['Employee'];
//$Order_ID = $_POST['$Order_ID'];

//if ($Order_ID == '') {
//    $Order_ID = null;
//}

// update record
$sql = "UPDATE `ORDER` SET Quantity = ?, Price = ?, OrderDate = ?, ShippingDate = ?, OrderStatus = ?, Employee = ? WHERE Order_ID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Quantity, $Price, $OrderDate, $ShippingDate, $OrderStatus, $Employee, $Order_ID]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
