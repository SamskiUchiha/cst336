
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>
        <link rel='stylesheet' href='css/styles.css' type='text/css' />
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script>
        
            function validateForm() {
                
                var username = $("#username").val();
                var password = $("#password").val();
                var passwordAgain =  $("#passwordAgain").val();
                var zip = $("#zip").val();
                
                if (username.length < 5 ) {
                    $("#usernameError").html("Error: Username must be at least 5 characters long");
                }
                
                if (password.length < 3) {
                    $("#passwordError").html("Error: Password not long enough, needs to be 3 characters long");
                    $("#passwordSuccess").html("");
                 } 
                else {
                    $("#passwordError").html("");
                    $("#passwordSuccess").html("Success!");
                }
                
                if(!passwordAgain) {
                    $("#passwordMismatch").html("Error: Enter Password");
                }
                else if(password != passwordAgain){
                    $("#passwordMismatch").html("Error: Passwords must match");
                     $("#passwordAgainSuccess").html("");
                } else {
                    $("#passwordMismatch").html("");
                    $("#passwordAgainSuccess").html("Success!");
                }
                
                if(!zip) {
                    $("#ZipError").html("Error: Zip code not found!");
                    $("#ZipSuccess").html("");
                }
                
                return false;
           
            }
            
            $("document").ready(function(){  
                
                $("#zip").change(function(){
                    
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                        dataType: "json",
                        data: { "zip": $("#zip").val(),
                                "city": $("#city").val(),
                                "latitude": $("#latitude").val(),
                                "longitude": $("#longitude").val()
                        },
                        success: function(data,status) {
                            if(data == false) {
                                $("#ZipError").html("Error: Zip code not found!");
                                $("#ZipSuccess").html("");
                                $("#ZipError").css("color", "red");
                                
                                $("#city").html("");
                                $("#latitude").html("");
                                $("#longitude").html("");
                            } else {
                                $("#city").html(data.city);
                                $("#latitude").html(data.latitude);
                                $("#longitude").html(data.longitude);
                                
                                $("#ZipError").html("");
                                
                                $("#ZipSuccess").html("Success!");
                                $("#ZipSuccess").css("color", "green");
                            }
                           
                           //alert(data.city);

                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                    
                }); //zipEvent
                
                $("#state").change(function(){
                    $.ajax({

                        type: "GET",
                        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
                        dataType: "json",
                        data: { "state": $("#state").val() },
                        success: function(data,status) {
                            $("#county").html("Select one");
                        for(var i = 0; i < data.length; i++){
                            $("#county").append("<option>" + data[i].county + "</option>");
                        }
                            //alert(data[0].county);
                           //$("#city").html(data.city);
                         
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }
                        
                    });//ajax
                   
                }); // state event
                
                 $("#username").change(function() {
                    var username = $("#username").val();
                    //alert(username);
                    $.ajax({
    
                        type: "GET",
                        url: "usernameAPI.php",
                        dataType: "json",
                        data: { "username": username },
                        success: function(data, status) {
                         
                            if(!data) {
                                $("#usernameError").html("username is available");
                                $("#usernameError").css("color", "green");
                            } else {
                                 $("#usernameError").html("username is not available");
                                 $("#usernameError").css("color", "red");
                                 
                            }
                        
                        },
                        complete: function(data, status) { //optional, used for debugging purposes
                            //alert(status);
                        }
    
                    }); //ajax

    
                });
                
            });//documentReady
            
        </script>

    </head>

    <body>
        <div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html"><h4> Sign Up Form </h4></a></h1>
			<center>
				<div ><img src="twitter.png" width = "100px"/></div>
				<br>
				<div ><img src="facebook.png" width = "100px"/></div>
				<br>
				<div ><img src="google-plus.png" width = "100px"/></div>
			</center>
		</aside>
        <div id="signup">
        
            <form onsubmit="return validateForm()">
         
                <fieldset>
                <legend>Sign Up</legend>
                    First Name:  <input type="text" placeholder="Enter First Name"><br> 
                    Last Name:   <input type="text" placeholder="Enter Last Name"><br> 
                    Email:       <input type="text" placeholder="Enter Email"><br> 
                    Phone Number:<input type="text" placeholder="(000) 000-0000"><br><br>
                    Zip Code:    <input type="text" id="zip">  <span id="ZipError" class="error"></span> <span id="ZipSuccess" class="suc"></span> <br>
                    City:  <span id="city"></span>
                    <br>
                    Latitude: <span id="latitude"></span>
                    <br>
                    Longitude:<span id="longitude"></span>
                    <br><br>
                    State: 
                    <select id="state" >
                        <option value="">Select One</option>
                        <option value="ca"> California</option>
                        <option value="ny"> New York</option>
                        <option value="tx"> Texas</option>
                        <option value="va"> Virginia</option>
                    </select><br />
                    
                    Select a County: <select id="county"></select><br>
                    
                    Desired Username: <input id="username"  type="text"> <span id="usernameSuccess" class="suc"></span> <span id="usernameError" class="error"></span> 
                    <br>
                    
                    Password: <input id="password" type="password"> <span id="passwordSuccess" class="suc"></span> <span id="passwordError" class="error"></span><br>
                    
                    Type Password Again: <input id="passwordAgain" type="password"> <span id="passwordAgainSuccess" class="suc"></span> <span id="passwordMismatch" class="error"></span><br>
                    
                    <input type="submit" value="Sign up!">
                </fieldset>
                <br>
                <br>
                <br>
                <center><img src = "verified.png" alt = "Buddy logo" title = "This is the Verified Buddy logo" width = "35px"/></center>
            
               
        </form>
        </div>
       
    
    </body>
</html>