<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get url parameter
$Company_Name = $_GET['Company_Name'];

// delete record
$sql = 'DELETE FROM `RESELLER` WHERE Company_Name = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$Company_Name]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
