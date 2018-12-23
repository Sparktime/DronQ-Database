<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
$Customer_ID = $_POST['Customer_ID'];
$Customer_Surname = $_POST['Customer_Surname'];
$Customer_Firstname = $_POST['Customer_Firstname'];
$Adress = $_POST['Adress'];
$ZipCode = $_POST['ZipCode'];
$City = $_POST['City'];
$Country = $_POST['Country'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Day_Of_Birth = $_POST['Day_Of_Birth'];
$RegistrationDate = $_POST['RegistrationDate'];
//$Order_ID = $_POST['$Order_ID'];

if ($Order_ID == '') {
    $Order_ID = null;
}

// update record
$sql = "UPDATE `CUSTOMER` SET Customer_Surname = ?, Customer_Firstname = ?, Adress = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Day_Of_Birth = ?, RegistrationDate = ? WHERE Customer_ID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Customer_Surname, $Customer_Firstname, $Adress, $ZipCode, $City, $Country, $Email, $Telephone, $Day_Of_Birth, $RegistrationDate, $Customer_ID]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
