<?php
    include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="description" content="Cocoon -Portfolio">
    <meta name="keywords" content="Cocoon , Portfolio">
    <meta name="author" content="Pharaohlab">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> Cocoon -Portfolio</title>
    <!-- ========== Favicon Ico ========== -->
    <!--<link rel="icon" href="fav.ico">-->
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/et-line.css" rel="stylesheet">
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="assets/css/slick.css" rel="stylesheet">
    <!-- Magnific-popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    
    <link rel="icon" type="image/png" href="assets/icons/favicon.ico"/>
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<div class="body-container container-fluid">
    <a class="menu-btn" href="javascript:void(0)">
        <i class="ion ion-grid"></i>
    </a>
    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a href="#">
                    <img src="assets/img/mapit.png" alt="mapit">
                </a>
            </div>
            <!--logo end-->

            <!--main menu -->
            <div class="side_menu_section">
                <ul class="menu_nav">
                    <li>
                        <a href="index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="about.html">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="report.php">
                            Report
                        </a>
                    </li>
                    <li class="active">
                        <a href="map.php">
                            Map
                        </a>
                    </li>
                    <li>
                        <a href="blog.html">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="contact.html">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
            <!--main menu end -->

            <!--filter menu -->
            <div class="side_menu_section">
                <h4 class="side_title">filter by:</h4>
                <ul  id="filtr-container"  class="filter_nav">
                    <li  data-filter="*" class="active"><a href="javascript:void(0)" >all</a></li>
                    <li data-filter=".branding"> <a href="javascript:void(0)">branding</a></li>
                    <li data-filter=".design"><a href="javascript:void(0)">design</a></li>
                    <li data-filter=".photography"><a href="javascript:void(0)">photography</a></li>
                    <li data-filter=".architecture"><a href="javascript:void(0)">architecture</a></li>
                </ul>
            </div>
            <!--filter menu end -->


            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="ion ion-social-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="ion ion-social-dribbble"></i> </a>
                        </li>
                    </ul>
                    <div class="copy_right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
          <table id="tb" style="width: 31px;">
            <tbody>
            <tr>
              
            <td id="td_logo">
              <img id="logo" src="https://fontmeme.com/permalink/181104/fcea3527232ca1c33649e015717c307b.png" alt="bulletproof-font">
            </td>
            
            
            <td id="td_summit">
              <form action="elijah.php">
                <input type="submit" name="submit" value="Report Diaster"/> 
              </form>
              
            </td>
            
            </tr>
            </tbody>
          </table>
          
          <hr>
          
        <div id="map"></div>
        <?php
            $test = getIncident();
            //echo getSize();
        ?>
        <script type="text/javascript">
          var map;
          
          function initMap() {
            var myLatLng = {lat: 36.653822, lng: -121.797381};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 11
            });
            
            
            //----FIRST DISASTER -------------------------------------------------------------------------- --------------------------------------------------------------------------
            //var image = 'img/earthquake.png';
            var location = JSON.parse('<?php echo json_encode($test); ?>');
            var infowindow = new google.maps.InfoWindow();
            var marker, i;
            // var pic = {
            //   url: "img/icons/fire.png", // url
            //   scaledSize: new google.maps.Size(50, 50), // scaled size
            //   origin: new google.maps.Point(0,0), // origin
            //   anchor: new google.maps.Point(0, 0) // anchor
            // };
            var pic;
            var size = <?php echo getSize(); ?>;
            console.log(size);
            for(i = 1; i <= size; i++) {
              pic = {
              url: 'img/icons/'+location[i][0]['disasterType']+'.png', // url
              scaledSize: new google.maps.Size(50, 50), // scaled size
            };
                marker = new google.maps.Marker({
                  position: {lat: Number(location[i][0]['latitude']), lng: Number(location[i][0]['longitude'])},
                  map: map,
                  animation: google.maps.Animation.DROP,
                  title: location[i][0]['disasterType'],
                  icon: pic
                  //'img/icons/'+location[i][0]['disasterType']+'.png'
            
                });
              
              google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                  if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                  } else {
                     marker.setAnimation(google.maps.Animation.BOUNCE);
                  }
                  infowindow.setContent(location[i][0]['disasterType']);
                  infowindow.open(map, marker);
                }
              })(marker, i));
            
            }
            // actual market for disaster
            // var marker = new google.maps.Marker({
            //   position: location,
            //   map: map,
            //   animation: google.maps.Animation.DROP,
            //   title: '6.8 Earthquake',
            //   icon: icon
            // });
          
            // for animation
            // marker.addListener('click', function() {
            //   if (marker.getAnimation() !== null) {
            //     marker.setAnimation(null);
            //   } else {
            //     marker.setAnimation(google.maps.Animation.BOUNCE);
            //   }
            // });
            
            // so textbox can pop open
            // marker.addListener('click', function() {
            //   infowindow.open(map, marker);
            // });
          
            
            marker.setMap(map);
      //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
          }
          
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClmnFTOdiYmpEXfFyIsqyHn6wtmSWdBxs&callback=initMap"
        async defer></script>
            <!--=================== filter portfolio start====================-->
            <!--<div class="portfolio gutters grid img-container">-->
            <!--    <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>-->
            <!--    <div class="grid-item branding  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port1.png" title="project name 1">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port1.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  branding architecture  col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port2.png" title="project name 2">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port2.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  design col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port3.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port3.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  photography design col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port4.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port4.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  branding photography  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port5.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port5.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item   architecture design col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port6.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port6.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  photography architecture col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port7.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port7.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  branding design  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port8.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port8.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item architecture  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port9.png" title="project name 4">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port9.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  photography architecture col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port10.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port10.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item  branding design  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port11.png" title="project name 5">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port11.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--    <div class="grid-item architecture  col-sm-12 col-md-6 col-lg-3">-->
            <!--        <a href="assets/img/portfolio/port4.png" title="project name 4">-->
            <!--            <div class="project_box_one">-->
            <!--                <img src="assets/img/portfolio/port4.png" alt="pro1" />-->
            <!--                <div class="product_info">-->
            <!--                    <div class="product_info_text">-->
            <!--                        <div class="product_info_text_inner">-->
            <!--                            <i class="ion ion-plus"></i>-->
            <!--                            <h4>project name</h4>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </a>-->
            <!--    </div>-->
            <!--</div>-->
            <!--=================== filter portfolio end====================-->
        </div>
        <!--=================== content body end ====================-->
    </div>
</div>



<!-- jquery -->
<script src="assets/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="assets/js/slick.min.js"></script>
<!--Portfolio Filter-->
<script src="assets/js/imgloaded.js"></script>
<script src="assets/js/isotope.js"></script>
<!-- Magnific-popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!--Counter-->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- WOW JS -->
<script src="assets/js/wow.min.js"></script>
<!-- Custom js -->
<script src="assets/js/main.js"></script>
</body>
</html>