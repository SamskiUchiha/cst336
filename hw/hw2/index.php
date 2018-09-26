
<!--resources-->
<!--https://fnbr.co/-->
<!--https://wallpapersite.com/download-most-popular-wallpapers/material-design-geometric-stock-dark-black-hd-10125.html->
<!--https://divtable.com/table-styler/-->

    <!--Sam Laitha-->
    <!--9/21/2018-->
<?php 
    $b = array('back5.jpg', 'back2.jpg', 'back3.jpg', 'back4.jpg'); // array of filenames

    $i = rand(0, count($b)-1); // generate random number size of the array
    
    shuffle($b); // Function Array(3)
    $selectedBback = "$b[$i]"; // set variable equal to which random filename was chosen
?>
    
<!DOCTYPE html>
<html>
    <head>
        <title> Fornite GUI Randomiser </title>
        <hr>
        
        <center><img src = "img/logo.png" alt = "fornite logo" title = "fornite logo" width = "10%"/></center>
    </head>
    <style type="text/css">
        @import url("css/styles.css");
        body {
            background-color: black !important;
            /*background-image: url("img/back2.jpg");*/
            background: url(img/<?php echo $selectedBback; ?>) no-repeat;
        }
        
        
        table {
            text-align:center;
        }
        
        #main {
            background-color: gray;
            margin-left: 580px;
            margin-right: 580px;
      
        }

        
    </style>
    <body>
        <?php
            include 'functions.php';
        ?>
        <div align="center">
            Try to get 3 of the same picture!
        </div>
      
        
        <!--<center><table class="darkTable"></center>-->
        <!--    <thead>-->
        <!--    <tr>-->
        <!--    <th></th>-->
        <!--    </tr>-->
        <!--    </thead>-->
        <!--    <tfoot>-->
        <!--    <tr>-->
        <!--    <td></td>-->
        <!--    </tr>-->
        <!--    </tfoot>-->
        <!--    <tbody>-->
        <!--    <tr>-->
        <!--    <td></td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--    <td></td>-->
        <!--    </tr>-->
        <!--    <tr>-->
        <!--    <td>-->
        <!--        <form>-->
        <!--            <input type = "submit" value="RANDOM"/>-->
        <!--        </form>-->
                

                
        <!--    </td>-->
        <!--    </tr>-->
        <!--    </tbody>-->
        <!--    </table>-->
            
        <center><table class="darkTable"></center>
            <thead>
            <tr>
            <th>
                <form>
                    <input type = "submit" value="RANDOM" style="color:red"/>
                </form>
            </th>
            <th>
                <form>
                    <input type = "submit" value="RANDOM" style="color:red"/>
                </form>
            </th>
            </tr>
            </thead>
            <tfoot>
            <tr>
            <td><?=displayBackGround(); ?></td>
            <td><?=displayBackGround(); ?></td>
            </tr>
            </tfoot>
            <tbody>
            <tr>
            <td><?= displayBling(); ?></td>
            <td><?= displaySkins(); ?></td>
            </tr>
            </tbody>
            </table>
    
            

    </body>
    <br>
    <br>
    <br>
    
    <footer>
        <center>CST336 Internet Programming. 2018 &copy; Laitha<br/></center>
        <center><strong> Disclaimer: </strong> Homework 2: Feeling Lucky? </center>
        <center><img src = "img/verified.png" alt = "Buddy logo" title = "This is the Verified Buddy logo" width = "35px"/></center>
        <br/>
    </footer>
    <hr>
</html>