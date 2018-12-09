<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function getAllPets(){
    global $dbConn;
    
    $sql = "SELECT id, name, type FROM pets ORDER BY name ASC";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
    return $records;
}



?>

<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            tr {
              padding-left: 100px;
              text-align: left;
            }
            #d {
              width:50%;
              padding-left: 100px;
              border-radius: 10px;
              text-align: left;
              background-color: lightgray;
            }
        </style>
   
    </head>
    <body>
        
	  <?php 
	    include 'inc/header.php';
	    
	  ?>
	  <script>
	      $('document').ready(function() {
	          $('.petLink').click(function() {
	              $('#petModal').modal("show");
	              $("#container").html("<img src='img/loading.gif' />");
	              
	              
	              $.ajax({

                    type: "GET",
                    url: "api/getPetInfo.php",
                    dataType: "json",
                    data: { "petid": $(this).attr('id') },
                    success: function(data, status) {
                        // $("#container").html(data.name);
                        
                        $("#petname").html(data.name);
                        $("#breed").html(data.breed);
                        $("#age").html(2018 - data.yob) ;
                        $("#description").html(data.description);
                        $("#petImage").attr('src', "img/" + data.pictureURL);
                        $("#container").html("");
                        //alert(data); 
                       
                        
                    
                    },
	          }); // ajax closing
	          
	           //   alert($(this).attr('id'));
	          }); // petlink click
	          
	      }); // doc end
	  </script>
	  <?php
	    $pets = getAllPets();
	    foreach($pets as $pet) {
	        echo "<center>";
	        echo "<div id='d'>";
	        echo "<h4><ul><li>Name: " ."<a href='#' class = 'petLink' id = '". $pet['id']. "'>". $pet['name'] ." </a>" ."</li><h4>";
	        echo "<h4><li>Type: ".$pet['type']."</li></ul><h4>";
	        echo "</div>";
	        echo "</center>";
	    }
	  ?>
	  
	  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="petname">Modal title</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div id="container"></div>
        <div>
        
        <table>
          <tbody>
          <tr>
          <td><img id = "petImage" src=""></td>
          <td>
            Breed: <span id="breed"> </span> <br> <br>
            Age: <span id="age"> </span> years  </span> <br> <br>
            <span id="description">
            
          </td>
          </tr>
          </tbody>
        </table>
	      
	      
	     
	      
	      
	      
	      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <?php
        include 'inc/footer.php';
        
        ?>
        </body>

</html>