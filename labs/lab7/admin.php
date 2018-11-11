<?php
session_start();



include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

include 'inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <style>
            table {
                text-align:right;
            }
            body {
                background: linear-gradient(to right, #ccff99 22%, #00ccff 86%);
                text-align: center;
                /*width: 100%;*/
            }
            form {
                display: inline-block;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
        
            function confirmDelete() {
                
                //alert();
                //prompt();
                return confirm("Remove this item from Database?");
                
            }
            
            function openModal() {
                
                $('#myModal').modal("show");
            }
            
            
        </script>
    
    </head>
    <style>
    
        button, select {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button[type=submit] {
            width: 150px;
            background: linear-gradient(to bottom, #003300 0%, #009933 100%);
            color: black;
            padding: 10px 15px;
            margin: 3px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    
        button[type=submit]:hover {
            background: linear-gradient(to bottom, #cc3300 0%, #ff99cc 100%);
        }
        
        
        
        input, select {
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 20px;
        }
        
        
        input[type=submit] {
            width: 150px;
            background-color: #d69c2f;
            color: black;
            padding: 10px 15px;
            margin: 3px 0;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
    
        input[type=submit]:hover {
            background: linear-gradient(to bottom, #d69c2f 0%, #ff9966 100%);
        }
        
    </style>
    <body>
        
        <h1> ADMIN SECTION - OTTERMART </h1>
        
         <h3>Welcome <?= $_SESSION['adminFullName'] ?> </h3>

          <form action="addProduct.php">
              <input type="submit" value="Add New Product">
          </form>
         <form action="logout.php">
              <input type="submit" value="Logout">
          </form>

           <br><br>
        
        <?= displayAllProducts() ?>
        
        
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Product Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="productModal" width="450" height="250"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>        
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>