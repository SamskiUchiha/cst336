<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT * FROM om_category ORDER BY catName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $product = $_GET['productName'];
    
    //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
    //$sql = "SELECT * FROM om_product
    //        WHERE productName LIKE '%$product%'";
  
    $sql = "SELECT * FROM om_product WHERE 1"; //Gettting all records from database
    
    if (!empty($product)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND productName LIKE :product OR productDescription LIKE :product";
         $namedParameters[':product'] = "%$product%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND catId =  :category";
          $namedParameters[':category'] = $_GET['category'] ;
    }
    
    if(!empty($_GET['priceFrom'])) {
        $sql .= " AND price >= :priceFrom";
        $namedParameters["priceFrom"] = $_GET['priceFrom'];
    }
    
    if(!empty($_GET['priceTo'])) {
        $sql .= " AND price <= :priceTo";
        $namedParameters["priceTo"] = $_GET['priceTo'];
    }
    
    //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "productPrice") {
            
            $sql .= " ORDER BY price";
        } else {
            
              $sql .= " ORDER BY productName";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    //print_r($records);
    
    
    foreach ($records as $record) {
        
        echo "<a href='purchaseHistory.php?productId=".$record['productId']."'>";
        echo $record['productName'];
        echo "</a> ";
        echo $record['productDescription'] . " $" .  $record['price'] .   "<br>";   
        
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: Ottermart Product Search</title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
    </head>
    <body>
        
       <a href="https://fontmeme.com/tmnt-font/"><img src="https://fontmeme.com/permalink/181027/394a5ae5dc43a06388b7c21ab7b17794.png" alt="tmnt-font" border="0"></a>
        <h2> Product Search </h2>
        
        <center><div id="dv">
            <form>
                
                Product: <input type="text" name="productName" placeholder="Product keyword" /> <br />
                
                Category: 
                <select name="category">
                   <option value=""> Select one </option>  
                   <?=displayCategories()?>
                </select>
                
                Price: From: <input type="text" name="priceFrom" size="7"  /> 
                 To: <input type="text" name="priceTo" size="7" />
                <br>
                Order By:
                Price <input type="radio" name="orderBy" value="productPrice">
                Name <input type="radio" name="orderBy" value="productName">
                <br>
                <input type="submit" name="submit" value="Search!"/>
            </form>
            <br>
            <hr>
            
            <?php
                if($_GET['submit'] == "Search!") {
                    echo "<h2> Results: </h2>";
                    filterProducts();
                }
            ?>
        </div></center>


    </body>
</html>