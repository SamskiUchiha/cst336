<?php

$backgroundImage = "img/sea.jpg";

if (isset($_GET["keyword"])) {  //checks if the form has been submitted

    include "api/pixabayAPI.php";

    $keyword = $_GET["keyword"];
    
    if (!empty($_GET['category'])) { //user selected a category
        
        $keyword = $_GET['category'];
        
    }
    
    
    echo "You searched for:  $keyword";
    

   $imageURLs = getImageURLs($keyword, $_GET["layout"]);
   //print_r($imageURLs);
   //shuffle($imageURLs);

   $backgroundImage = $imageURLs[array_rand($imageURLs)];
  
}

function formIsValid() {
    
    if (empty($_GET['keyword']) && empty($_GET['category'])) {
        echo "<h1> ERROR: Select a category or Type a word</h1>";
        return false;
    }
    return true;
            
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 4: Pixabay Slideshow </title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        
        <style>
            
            body {
                
                background-image: url(<?=$backgroundImage?>);
                background-size: cover;
                
            }
            
            #carouselExampleIndicators{
                 width:500px;
                 margin:0 auto; 
            }
            
            form {
                opacity: 0.8;
                display: inline-block;
                color: white;
                text-align: left;
                background-color: #33212e;
                padding: 10px;
                border-radius: 25px;
                -webkit-box-shadow:0px 0px 5px 5px #FFF3EF ;
                -moz-box-shadow:0px 0px 5px 5px #FFF3EF ;
                box-shadow:0px 0px 5px 5px #FFF3EF ;
            }
            
        </style>
        
    </head>


    <body>
    
        <br>

        <form method="GET">
            <input type="text" name="keyword" size="15" placeholder="Keyword" value="<?=$_GET['keyword']?>" />
            
            <input type="radio" name="layout" value="horizontal" 
              <?php
              
                if ($_GET['layout'] == "horizontal") {
                    echo " checked";
                }
              
              ?>
            
            > Horizontal
            <input type="radio" name="layout" value="vertical"  
               <?= ($_GET['layout'] == "vertical")?" checked":"" ?>  > Vertical
        

            <select name="category">
                <option value=""> Select One </option>
                <option value="ocean">Sea</option>
                <option>Mountains</option>
                <option>Forest</option>
                <option  <?= ($_GET['category'] == "Sky")?" selected":"" ?> >Sky</option>
            </select>
            
            <input type="submit" name="submitBtn" value="Submit" />
            
        </form>

        <!--<h1>You must type a keyword or select a category</h1>-->
        
        <?php 
        if (isset($imageURLs) &&  formIsValid() ) { ?>
        
           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                  for ($i=1; $i < 7; $i++) { 
                    echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                  }
                 ?>
              </ol>
              <div class="carousel-inner">
                <?php
                  for ($i = 0; $i < 6; $i++) {
                      do {
                       $randomIndex = array_rand($imageURLs);  // rand(0, count($imageURLs)-1);
                      }
                      while (!isset($imageURLs[$randomIndex]));
                      echo "<div class=\"carousel-item ";
                      echo ($i == 0)?" active ":"";
                      echo "\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$randomIndex]."\" alt=\"Second slide\">";
                      echo "</div>";
                      unset($imageURLs[$randomIndex]);
                  }
                 ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        
        <?php
         } //closing if isset($imageURLs)
         else {
            
            echo "<br><h1>Enter a Keyword or Select a Category!</h1>";     
             
         }
        ?>


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
    </body>
</html>