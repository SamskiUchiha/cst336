<?php
session_start(); // starts or resumes an exisiting session



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Getting a Session Variable </title>
    </head>
    <body>
        <h1>My name is <?=$_SESSION["my_name"] ?></h1>
        
        
        
    </body>
</html>