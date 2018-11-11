<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO om_product (productName, productDescription, productImage,price, catId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    </head>
    <style>
        body {
            background: linear-gradient(to right, #ccff99 22%, #00ccff 86%);
            text-align: center;
            /*width: 100%;*/
        }
        table {
            text-align: center;
            border-radius:30px;
            background: linear-gradient(to bottom, #ff6600 0%, #ff9900 100%);
        }
        
         input, select {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        input[type=submit] {
            width: 150px;
            background-color: aqua;
            color: black;
            padding: 10px 15px;
            margin: 3px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        input[type=submit]:hover {
            background-color: green;
        }

    </style>
    
    <!--<script>-->
    <!--    function msg() {-->
    <!--        alert("New Product was added!");-->
    <!--    }-->
    <!--</script>-->
    
    <body>
        
        <h1> Adding New Product </h1>
        
        
            <center><table>
            <tbody>
            <tr>
                <td>
                <form>
                   Product name: <input type="text" name="productName"><br>
                   Description: <textarea name="description" cols="50" rows="4"></textarea><br>
                   Price: <input type="text" name="price"><br>
                   Category: 
                   <select name="catId">
                      <option value="">Select One</option>
                      <?php
                      
                      $categories = getCategories();
                      
                      foreach ($categories as $category) {
                          
                          echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                          
                      }
                      
                      ?>
                   </select> <br />
                   
                   Set Image Url: <input type="text" name="productImage"><br>
                   <input type="submit" name="addProduct" value="Add Product">
                   </form>
                   
                    <form action="admin.php">
                        <input type="submit" name="Back" value="back">
                    </form>
               </td>
            </tr>
            </tbody>
        </table></center>
        
        
        

    </body>
</html>