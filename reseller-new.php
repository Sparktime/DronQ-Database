<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `RESELLER` (Company_Name, Adress, ZipCode, Email, Telephone, Contact_Person) VALUES('','','','','','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: reseller-list.php');
//// return to list
//if(isset($_SESSION['list'])) {
//    header('location: ' . $_SESSION['list']);   
//} else {
//    header('location: .');
//}
//
