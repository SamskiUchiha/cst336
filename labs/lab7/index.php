<?php
    session_start();
    
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("ottermart");
    
    function valid() {
        global $dbConn;
        
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        
        //This SQL does NOT prevent SQL Injection (because of the single quotes)
        // $sql = "SELECT * FROM om_admin
        //                  WHERE username = '$username' 
        //                  AND  password = '$password'";
                         
        $sql = "SELECT * FROM om_admin
                         WHERE username = :username 
                         AND  password = :password ";                 
        $np = array();
        $np[':username'] = $username;
        $np[':password'] = $password;
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute($np);
        $record = $stmt->fetch(PDO::FETCH_ASSOC); 
        
        if (empty($record)) {
            return false;
            
        } else {
           $_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
           header('Location: admin.php'); //redirects to another program
            
        }
    }


?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>login</title>
	<link rel="stylesheet" href="css/styles.css">
	
	<script src="js/modernizr-2.6.2.min.js"></script>
    <script>
    function msg() {
        alert("Invalid password or username!");
    }
    </script>
	</head>
	<body>
		  <center><div id="login">
            <br>
            <h2> Welcome Admin </h2>
            <!--<a href="https://fontmeme.com/small-caps-fonts/"><img src="https://fontmeme.com/permalink/181111/402540f673630abdb7e0d7fd0c1ffc05.png" alt="small-caps-fonts" border="0"></a>-->
            <form method="post">
              <input type="text" name="username" placeholder="username"/> <br>
              <br>
              <input type="password" name="password" placeholder="password"/> <br>
              <br>
              <input type="submit" value="Login">
              <br>
              <br>
              <br>
              <?php
                if(valid() || isset($_POST['username']) || isset($_POST['password'])) {
                    echo "<script>msg();</script>";
                } else {
                    valid();
                }
              ?>
            </form>
        </div></center>
	
	</body>
</html>