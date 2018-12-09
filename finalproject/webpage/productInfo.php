<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fortnite");
include 'inc/functions.php';
validateSession();

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  //print_r($productInfo);
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <link rel='stylesheet' href='css/styles.css' type='text/css' />
    <body>
    
    <h3><?=$productInfo['productName']?></h3>
     <?=$productInfo['productDescription']?><br>
     <img src='<?=$productInfo['productImage']?>' height='20%'/>
 
    </body>
</html>