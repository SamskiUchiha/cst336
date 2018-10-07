<?php
session_start();


 if ( !isset($_SESSION['heads']) ) {  //do this when session doesn't exist ONLY
   $_SESSION['heads']  = 0;
   $_SESSION['tails'] = 0;
   $_SESSION['tossHistory'] = array();
 }
 
 if ( rand(0,1) == 0 ) {
     
      $_SESSION['heads']++;
      $_SESSION['tossHistory'][] = "H "; //add elements to the array
      
     
 } else {
     
     $_SESSION['tails']++;
     $_SESSION['tossHistory'][] = "T "; //add elements to the array
 }
print_r($_SESSION['tossHistory']);



?>

<!DOCTYPE html>
<html>
    <head>
        <title> Coin Flippling </title>
    </head>
    <body>
        
        <h2> Heads: <?= $_SESSION['heads'] ?></h2>
        
        <h2> Tails: <?= $_SESSION['tails'] ?> </h2>
        
        

    </body>
</html>