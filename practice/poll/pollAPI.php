<?php
header('Access-Control-Allow-Origin: *');
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");


$sql = "SELECT * FROM om_admin WHERE choice =:choice ";

$parameters = array();
$parameters[":choice"]=$_GET["choice"];

$stmt = $dbConn->prepare($sql);
$stmt->execute($parameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($record);
echo json_encode($record);

?>