<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
$Company_Name = $_POST['Company_Name'];
$Adress = $_POST['Adress'];
$ZipCode = $_POST['ZipCode'];
$City = $_POST['City'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Contact_Person = $_POST['Contact_Person'];

if ($Order_ID == '') {
    $Order_ID = null;
}

// update record
$sql = "UPDATE `RESELLER` SET Adress = ?, ZipCode = ?, City = ?, Email = ?, Telephone = ?, Contact_Person = ? WHERE Company_Name = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Adress, $ZipCode, $City, $Email, $Telephone, $Company_Name]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
