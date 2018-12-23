<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `CUSTOMER` (Customer_Surname, Customer_Firstname, Adress, ZipCode, Country, Email, Telephone, Day_Of_Birth, RegistrationDate) VALUES('','','','','','','','','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: customer-list.php');
//// return to list
//if(isset($_SESSION['list'])) {
//    header('location: ' . $_SESSION['list']);   
//} else {
//    header('location: .');
//}
//
