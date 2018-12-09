<?php
session_start();

include 'inc/dbConnection.php';
$dbConn = startConnection("fortnite");

include 'inc/functions.php';
validateSession();

?>

<!DOCTYPE html>
<html>
    <head>
        <title> View Products </title>
        <style>
            
        </style>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <script>
            function confirmDelete() {
                return confirm("Remove this item from Database?");
            }
            
        </script>
        
        <style>
            #div2 {
                padding-right: 45%;
             
            }
      
        </style>
    
    </head>
    <body>
        <div id="colorlib-page">
    		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
        			<h1 id="colorlib-logo"><a href="index.html"></a></h1>
        			<nav id="colorlib-main-menu" role="navigation">
        				<ul>
        					<li class="colorlib-active"><a href="index.html"></a></li>
        					<!--<li><a href="login.php">Admin Sign in</a></li>-->
        					<li><a href="login.php"></a></li>
        	
        				</ul>
        
        			</nav>
        		</aside>
        
        	<div id="div2">
        		<center>
        		    <!--<h1> ADMIN SECTION - OTTERMART </h1>-->
                
                    <h1>Welcome <?= $_SESSION['adminFullName'] ?> </h1>
                    
                    <div id="div3">
                        <form action="logout.php">
                        <input type="submit" value="Logout">
                        </form>
                        <form action="displayadminmenu.php">
                            <input type="submit" value="back">
                        </form>
                    </div>
                   
                </center>
            
                <br><br>
                    
                <?= displayAllProducts() ?>
        		    
        		
    		</div>
       </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>