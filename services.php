<?php
ob_start();
session_start();
$service=$_SESSION['service'];
$city=$_SESSION['city'];
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Door O Help</title>
<link href="https://demo.phpjabbers.com/1527739242_337/index.php?controller=pjFront&action=pjActionLoadCss&layout=layout6" type="text/css" rel="stylesheet" />
    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- js files -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>

</head>
<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="preloader_image"></div>
    </div>
    <!-- eof preloader -->
    
    <div id="canvas">
        <div id="box_wrapper">

            <?php 
            if(!isset($_SESSION['uid']))
            {
                echo "<script type='text/javascript'>swal('Couldn't Search !', 'You have to Register/Login to search for services', 'error');</script>";
                header("location:index.php");
            }
                  include 'includes/topHeader.php';
            ?>          

            <!-- main header -->
            <header class="page_header header_gradient dotted_items toggler_right">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 display_table">
                        <div class="header_left_logo display_table_cell">
                            <a href="index.php" class="logo top_logo">
                                <span class="logo_text"> Door </span>
                                <img src="img/logo.png" alt="O">
                                <span class="logo_text"> Help </span>
                            </a>
                        </div>
                        <div class="header_mainmenu display_table_cell text-right">
                            <!-- main nav start -->
                            <nav class="mainmenu_wrapper">
                                <ul class="mainmenu nav sf-menu">
                                    <li> <a href="">Home / Services</a> </li>
                                </ul>
                            </nav>
                            <!-- eof main nav -->
                            <!-- header toggler -->
                            <span class="toggle_menu">
                                <span></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            </header>
            <!-- eof main header -->

            <section class="page_breadcrumbs ds parallax section_padding_top_50 section_padding_bottom_50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                        <input type="hidden" id="hiddenCity" name="hiddenCity" value="Edmonton">
                            <h2>PROFESSIONALS</h2>
                            <p>Get instant access to reliable proffesionals near you.</p>
                        
                        </div>
                    </div>
                </div>
            </section>

            <section class="ls section_padding_top_100 section_padding_bottom_100 columns_padding_25">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12" data-aos="fade-up">
                            <style type="text/css">
                                .pimg{
                                    height: 200px;
                                    width: 200px;
                                    border: 1px solid white; 
                                    border-radius: 50%;
                                    
                                }

                                .product{
                                    -moz-transition: all 0.3s;
                                    -webkit-transition: all 0.3s;
                                    transition: all 0.3s;
                                }

                                 .product:hover {
                                  -moz-transform: scale(1.1);
                                  -webkit-transform: scale(1.1);
                                  transform: scale(1.1);
                                }
                            </style>
                            <div class="columns-3">
                                <ul id="products" class="products list-unstyled">
                                    <?php
                                      $userid = $_SESSION['uid'];
                                      $get="select * from professionals where profession = '$service' && city = '$city'";
                                      // $get="select * from professionals where profession = '$service' && city = '$city'  && verified =1 ";
                                      $exe=mysqli_query($con,$get);
                                      while($data=mysqli_fetch_array($exe)){
                                    ?>
                                    <style type="text/css">
                                        .content_addr{
                                            line-height: 22px;
                                        }
                                    </style>
                                    <li class="product type-product">
                                        <div class="vertical-item content-padding text-center with_shadow">
                                            
                                            <div class="item-content">
                                                <img class="pimg" src="<?php echo $data['image']; ?>" alt="" />
                                                    <h4 class="bottommargin_0" style="margin-top: 20px;">

                                                <a href=""><?php echo $data['name']; ?></a>
                                                </h4>
                                                <p style="margin-bottom: 6px; margin-top: 8px;"><b>Email - </b><?php echo $data['email']; ?></p>

                                                <p><b>Experience - </b><?php echo $data['experience']; ?> yrs. <b>Phn - </b><?php echo $data['phone']; ?></p>
                                                <p><b>Availability - </b><?php echo $data['availability']; ?></p>
                                                <p>Please give me a call at my number during business hours or email me to book. You can also visit me at my office.</p>
                                                </div>
                                                <div class="content_addr">
                                                <p class="topmargin_30">
                                                <a target="_blank" class="theme_button color1" style="margin-bottom : 50px;" href="http://maps.google.com/maps?daddr=<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>" >Get Directions</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>

                            </div>
                            <!-- eof .columns-* -->
                            <!-- <div class="row">
                                <div class="col-sm-12 text-center">
                                    <ul class="pagination with_shadow">
                                        <li class="disabled">
                                            <a href="#">
                                                <span class="sr-only">Prev</span>
                                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li>
                                            <a href="#">
                                                <span class="sr-only">Next</span>
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->... </div>

                    </div>
                </div>
            </section>

            <!-- footer -->
            <section class="ds parallax page_copyright section_padding_15 with_top_border_container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p class="grey regular">Services provided with ♥ by Door O Help</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof footer -->

        </div>
        <!-- eof #box_wrapper -->
    </div>
    <!-- eof #canvas -->
    

    <!-- js files -->
    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <script src="js/aos.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function() {
            // aos animations
            AOS.init({
              duration: 1200,
            })
        });

            
      var options = {
        enableHighAccuracy: true,
        timeout: 1000,
        maximumAge: 0
      };

      navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);
</script>
<script >
var p1 = "success";
    </script>
    

</body>
</html>
