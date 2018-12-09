<?php

header('Access-Control-Allow-Origin: *');

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");


$sql = "SELECT * FROM om_admin WHERE username =:username ";

        
$username = $_GET['username'];
$password = sha1($_GET['password']);
                 
$sql = "SELECT * FROM om_admin
                 WHERE username = :username 
                 AND  password = :password ";                 
$np = array();
$np[':username'] = $username;
$np[':password'] = $password;

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$record = $stmt->fetch(PDO::FETCH_ASSOC); 

// if (empty($record)) {
//     return false;
    
// } else {
//   $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
//   header('Location: displayadminmenu.php'); //redirects to another program
    
// }

// print_r($record);
echo json_encode($record);

?>