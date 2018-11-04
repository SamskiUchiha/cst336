<?php
include 'dbConnection1.php';
$dbConn = startConnection("c9");

    function orderQuote() {
        global $dbConn;
        
        $sql = "SELECT * FROM `q_quotes` ORDER BY quote ASC";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

    function getQuote() {
        global $dbConn;
        $q = $_GET['keyword'];
        
        $sql = "SELECT * FROM `p1_quotes` WHERE quote LIKE '%$q%'";
        //$sql = "SELECT * FROM `p1_quotes` WHERE quote LIKE '%$q%'";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<h3>".$record['quote']. '('. $record['author'].")</h3>";
            
        }
    }
    
    function getCat() {
        global $dbConn;
        $cat = $_GET['category'];
        
        $sql = "SELECT DISTINCT category FROM `p1_quotes`";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option>" .$record['category']. "</option> ";
            
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Quote Finder </title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>

        <div class="jumbotron">
            <h1> Famous Quote Finder </h1>
        </div>
      
        <form>
            Enter Quote Keyword <input type="text" name="keyword" value="" /><br><br>
            Category:
            <select name="category">
                <option value=""> Select One </option>
                <?= getCat();?>
            </select><br><br>
            Order
            <br>
            <input type="radio" name="orderBy" value="az"
                /> A-Z <br>
            <input type="radio" name="orderBy" value="za"
                /> Z-A <br>
              
            <br>
            
            <input type="submit" value="Display Quotes!"/>

      </form>
      
      
      <hr>
      
        <div id="quotes">
          <?= getQuote();?>
        </div>
      
    </body>
</html>