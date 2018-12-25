<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
Type = $_POST['Type'];
Serial_No = $_POST['Serial_No'];
Manufacturing_Date = $_POST['Manufacturing_Date'];


if ($Order_ID == '') {
    $Order_ID = null;
}

// update record
$sql = "UPDATE `PRODUCT` SET Type = ?, Manufacturing_Date = ? WHERE Serial_No = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Type, $Manufacturing_Date,$Serial_No]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
