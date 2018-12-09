<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$sql ="SELECT * FROM om_rating WHERE id = ".$_GET['id'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);
?>