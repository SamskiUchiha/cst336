<?php

function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}


function displayAllProducts(){
    global $dbConn;
    
    $sql = "SELECT * FROM om_product ORDER BY productName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
    echo "<table>";
    foreach ($records as $record) {
        
        echo "<tbody>";
            echo "<tr>";
                echo "<td><a class='btn btn-primary' role='button' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                echo "<td><form action='deleteProduct.php' onsubmit='return confirmDelete()'></td>";
                echo "<td><input type='hidden' name='productId' value='".$record['productId']."'></td>";
                echo "   <td><button class='btn btn-outline-danger' type='submit'>Delete</button></td>";
                echo "</form>";
                echo "<td>[<a onclick='openModal()' target='productModal' href='productInfo.php?productId=".$record['productId']."'>".$record['productName']."</a>]  ";
                echo " $" . $record[price]   . "<br><br></td>";
            echo "</tr>";
        echo "</tbody>";
        
        
    }
    echo "<table>";
}

function getCategories() {
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER BY catName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    //print_r($records);
    
    return $records;
    
}

function getProductInfo($productId) {
     global $dbConn;
    
    $sql = "SELECT * FROM om_product WHERE productId = $productId";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    
    return $record;
     
    
}

?>