<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
$Reseller_ID = $_POST['Reseller_ID']
$Company_Name = $_POST['Company_Name'];
$Adress = $_POST['Adress'];
$ZipCode = $_POST['ZipCode'];
$City = $_POST['City'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Contact_Person = $_POST['Contact_Person'];
console.log("Resellersave tot line 14"); 

if ($Order_ID == '') {
    $Order_ID = null;
}

// update record
$sql = "UPDATE `RESELLER` SET Company_Name = ?, Adress = ?, ZipCode = ?, City = ?, Email = ?, Telephone = ?, Contact_Person = ? WHERE Reseller_ID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Company_Name, $Adress, $ZipCode, $City, $Email, $Telephone, $Reseller_ID]);
checkSQL($stmt);
console.log("Resellersave tot line 25"); 

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
