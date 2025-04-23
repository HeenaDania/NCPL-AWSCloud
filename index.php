<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Door O Help</title>

    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    
    <!-- js files -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="searchScript.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                include 'config.php';
                  include 'includes/topHeader.php';
                  include 'includes/mainHeader.php';
            ?>

            <!-- banner -->
            <section class="intro_section page_mainslider ds">
                <!-- flexslider -->
                <div class="flexslider" data-dots="false">
                    <ul class="slides">
                        <li>
                            <img src="img/slide01.jpg" alt="">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="slide_description_wrapper">
                                            <div class="slide_description">
                                                <div class="intro-layer" data-animation="fadeInUp">
                                                    <h2>
                                                        Door O Help
                                                    </h2>
                                                    <hr class="divider_40_3 gradient_bg_color">
                                                </div>
                                                <div class="intro-layer" data-animation="fadeInUp">
                                                    <p>
                                                        Get instant access to reliable and affordable services over here
                                                    </p>
                                                    <form method="POST">
                                                        <input type="hidden" id="hiddenCity" name="hiddenCity" value="Edmonton">
                                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search for services here..." style="width: 300px; margin-left: 80px; border-color: white" autocomplete="off">
                                                        <input type="submit" class="theme_button color" style="width: 120px; margin-top: 90px; margin-right: 50px;" value="Find" name="go">
                                                    </form>
                                                    <div id="display"></div>
                                                    <?php 
                                                        if (isset($_POST['go'])) {
                                                            $_SESSION['service']=$_POST['search'];
                                                            $_SESSION['city']=$_POST['hiddenCity'];
                                                            header("location:services.php");
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            <!-- eof .slide_description -->
                                        </div>
                                        <!-- eof .slide_description_wrapper -->
                                    </div>
                                    <!-- eof .col-* -->
                                </div>
                                <!-- eof .row -->
                            </div>
                            <!-- eof .container -->
                        </li>
                    </ul>
                </div>
                <!-- eof flexslider -->
            </section>
            <!-- eof banner -->

            <!-- about us -->
            <section id="about" class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25 columns_margin_bottom_30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class='section_header' data-aos="fade-down">
                                What We Offer
                            </h2>
                            <hr class="divider_40_3 gradient_bg_color" data-aos="fade-right">
                            <p data-aos="fade-up">
                                Door-o-Help is recognized as the fastest-growing startup in Canada. We are a mobile marketplace for local services.
                            </p>
                            <p data-aos="fade-up">
                                We help customers hire trusted professionals for all their service needs which consist of Plumbers, Electricians, Carpenters, Cleaning and Pest Control. 
                            </p>
                            <p data-aos="fade-up">
                                Be it getting a plumbing job done, improving your fitness through yoga, learning to play the guitar, decorating your home or getting candid photos of your wedding clicked, we are a sure shot destination for your service needs.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <div class="row columns_margin_bottom_20">
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-right">
                                        <img src="img/services/01.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">Verified Professional</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-down">
                                        <img src="img/services/02.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">Hardwork</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-left">
                                        <img src="img/services/03.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">Insured Work</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-right">
                                        <img src="img/services/04.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">100% Satisfaction</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-up">
                                        <img src="img/services/05.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">Guaranteed</h6>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-6">
                                    <div class="vertical-item banner-item text-center" data-aos="fade-left">
                                        <img src="img/services/06.jpg" alt="" />
                                        <h6 class="transp_gradient_bg text-uppercase">On Time Arrival</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof about us -->

            <!-- join us -->
            <section id="join" class="ds parallax call_to_action section_padding_100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h2 class="section_header" data-aos="fade-down">
                                Expand Your Business With Door O Help
                            </h2>
                            <hr class="divider_40_3 gradient_bg_color">
                            <p data-aos="fade-up">
                                Join a community of 200+ professionals who have successfully grown their business by collabrating with Door O Help for providing daily services to customers.
                            </p>
                            <p class="topmargin_40" data-aos="fade-up">
                                <a href="professional.php" class="theme_button color">Become a Professional</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof join us -->

            <!-- services -->
            <section id="services" class="ls section_padding_top_100 section_padding_bottom_75">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h2 class="section_header" data-aos="fade-down">
                                Most Frequently Used Services
                            </h2>
                            <hr class="divider_40_3 gradient_bg_color">
                            
                        </div>
                    </div>
                    <style type="text/css">
                        .imgdiv img{
                            height: 100px;
                            width: 100px;
                        }
                    </style>
                    <div class="row topmargin_60 columns_margin_bottom_30 imgdiv">
                        <div class="col-md-4 col-sm-6" data-aos="fade-right">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/beauty.png" alt="" class="inverse-image" />
                                <h4>
                                    Beauty Services
                                </h4>
                                <p>
                        Beauty services like hair styles, mehndi, manicure, pedicure, hair spa, facials, rebiunding, waxing etc.
                    </p>
                                <p class="topmargin_30">
                    </p>
                            </article>
                        </div>
                        <div data-aos="fade-down" class="col-md-4 col-sm-6">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/tutor.png" alt="" class="inverse-image" />
                                <h4>
                                    Home Tutors
                                </h4>
                                <p>
                        Well qualified home tutors for primary school, middle school, high school and college students. 
                    </p>
                                <p class="topmargin_30">
                    </p>
                            </article>
                        </div>
                        <div data-aos="fade-left" class="col-md-4 col-sm-6">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/puja.png" alt="" class="inverse-image" />
                                <h4>
                                    Puja/Pandits
                                </h4>
                                <p>
                        Experienced pandits for puja in our auspicious functions in homes, offices or companies, marriages etc. 
                    </p>
                                <p class="topmargin_30">
                    </p>
                            </article>
                        </div>

                        
                                <div data-aos="fade-right" class="col-md-4 col-sm-6">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/cleaning.svg" alt="" class="inverse-image" />
                                <h4>
                                    Cleaning Services
                                </h4>
                                <p>
                        Bedroom cleaning, bathroom cleaning, kitchen cleaning, Floor cleaning etc.
                    </p>
                                <p class="topmargin_30">
                        
                    </p>
                            </article>
                        </div>
                        
                                <div data-aos="fade-up" class="col-md-4 col-sm-6">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/floor.png" alt="" class="inverse-image" />
                                <h4>
                                    Floor Repair
                                </h4>
                                <p>
                        Floor services like floor cleaning, floor repair, floor re-coating, floor designs etc. 
                    </p>
                                
                    </p>
                            </article>
                        </div>
                        
                            <div data-aos="fade-left" class="col-md-4 col-sm-6">
                            <article class="with_padding big-padding with_shadow rounded text-center">
                                <img src="img/services-icons/health.png" alt="" class="inverse-image" />
                                <h4>
                                    Healthcare services
                                </h4>
                                <p>
                              Healthcare services like Physciortheripist, Nursing services, Vaccination, mother and baby care etc. 
                    </p>
                                
                            </article>
                        </div>
                        
                    </div>
                </div>
            </section>
            <section id="gallery service" class="ls ms section_padding_top_30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center" data-aos="fade-down">
                            <div class="filters carousel_filters bottommargin_30">
                                <a href="#" class="selected" data-filter="*">AC Repair</a>
                                <a href="#" data-filter=".kitchen">Beauty Spa</a>
                                <a href="#" data-filter=".bathroom">Business Suggestions</a>
                                <a href="#" data-filter=".bedroom">Home Decorators </a>
                                <a href="#" data-filter=".livingroom">Wedding Planners</a>
                                <a href="#" data-filter=".parlour">Repairs</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel text-nav" data-nav="true" data-dots="false" data-margin="0" data-filters=".carousel_filters">
                    <div class="vertical-item kitchen">
                        <div class="item-media">
                            <img src="img/gallery/01.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/01.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item bathroom">
                        <div class="item-media">
                            <img src="img/gallery/02.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/02.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item bedroom">
                        <div class="item-media">
                            <img src="img/gallery/03.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/03.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item livingroom">
                        <div class="item-media">
                            <img src="img/gallery/04.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/04.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item parlour">
                        <div class="item-media">
                            <img src="img/gallery/05.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/05.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item terrace">
                        <div class="item-media">
                            <img src="img/gallery/06.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/06.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item kitchen">
                        <div class="item-media">
                            <img src="img/gallery/07.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/07.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item bathroom">
                        <div class="item-media">
                            <img src="img/gallery/08.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/08.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item bedroom">
                        <div class="item-media">
                            <img src="img/gallery/09.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/09.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item livingroom">
                        <div class="item-media">
                            <img src="img/gallery/10.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/10.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item parlour">
                        <div class="item-media">
                            <img src="img/gallery/11.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/11.jpg"></a>
                            </div>
                        </div>
                    </div>

                    <div class="vertical-item terrace">
                        <div class="item-media">
                            <img src="img/gallery/12.jpg" alt="" />
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="img/gallery/12.jpg"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof services -->

            <!-- partners -->
            <section id="partners" class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25 columns_margin_bottom_30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row columns_margin_bottom_10">
                                <div class="col-xs-6 col-xxs-12" data-aos="fade-right">
                                    <a href="#" class="with_shadow display-block text-center">
                                        <img src="img/clients/01.png" alt="" />
                                    </a>
                                </div>
                                <div class="col-xs-6 col-xxs-12" data-aos="fade-left">
                                    <a href="#" class="with_shadow display-block text-center">
                                        <img src="img/clients/02.png" alt="" />
                                    </a>
                                </div>
                                <div class="col-xs-6 col-xxs-12" data-aos="fade-right">
                                    <a href="#" class="with_shadow display-block text-center">
                                        <img src="img/clients/03.png" alt="" />
                                    </a>
                                </div>
                                <div class="col-xs-6 col-xxs-12" data-aos="fade-left">
                                    <a href="#" class="with_shadow display-block text-center">
                                        <img src="img/clients/04.png" alt="" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2 class="section_header" data-aos="fade-down">
                                Our Partners
                            </h2>
                            <hr class="divider_40_3 gradient_bg_color" data-aos="fade-right">
                            <p data-aos="fade-up">
                                Be it getting a plumbing job done, improving your fitness through yoga, learning to play the guitar, decorating your home or getting candid photos of your wedding clicked, we are a sure shot destination for your service needs.
                            </p>
                            <p class="semibold grey" data-aos="fade-up">
                                We're the <span class="highlight">#1</span> refinishing &amp; repairing centre <span class="highlight">in the States!</span>
                            </p>
                            <div class="row columns_margin_bottom_0" data-aos="fade-up">
                                <div class="col-sm-6">
                                    <ul class="list2 margin_0">
                                        <li>Pork salami pork chop</li>
                                        <li>Hamburger corned beef </li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list2 margin_0">
                                        <li>Pork salami pork chop</li>
                                        <li>Hamburger corned beef </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof partners -->

            <!-- testimonials -->
            <section id="reviews" class="ls background_cover page_testimonials section_padding_top_100 section_padding_bottom_100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h2 class="section_header" data-aos="fade-down">
                                Testimonials
                            </h2>
                            <hr class="divider_40_3 gradient_bg_color" data-aos="fade-right">

                            <div class="owl-carousel testimonials-owl-carousel topmargin_60" data-responsive-lg="3" data-responsive-md="2" data-responsive-sm="2" data-dots="true" data-nav="false">
                                <?php
                                    $getT="select * from testimonials order by id desc";
                                    $exeT=mysqli_query($con,$getT);
                                    while($dataT=mysqli_fetch_array($exeT)){
                                ?>
                                <blockquote class="theme_background with_padding image-offset rounded text-center margin_0">
                                    <img src="<?php echo $dataT['image']; ?>" alt=""> <?php echo $dataT['feedback']; ?>
                                    <div class="item-meta">
                                        <h5 class="highlight"><?php echo $dataT['name']; ?></h5>
                                    </div>
                                </blockquote>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- eof testimonials -->

            <?php include 'includes/footer.php'; ?>

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

        // smooth scroll and activating links
        $(".links a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                $('#homeLink,#aboutLink,#joinLink,#servicesLink').removeClass('active');

                var hash = this.hash;
                if(hash=='#'){
                    $('#homeLink').addClass('active');
                }
                if(hash=='#about'){
                    $('#aboutLink').addClass('active');
                }
                if(hash=='#join'){
                    $('#joinLink').addClass('active');
                } 
                if(hash=='#services'){
                    $('#servicesLink').addClass('active');
                }

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
        // aos animations
        AOS.init({
          duration: 1200,
        })
    });

    function displayLocation(latitude, longitude) {
        var request = new XMLHttpRequest();
        var method = 'GET';
        var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latitude + '&lon=' + longitude;
        var async = true;
        request.open(method, url, async);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                console.log("Nominatim Response:", data); // Log the entire response

                if (data.address) {
                    var city = data.address.city || data.address.town || data.address.village || data.address.hamlet || '';  // Get city from different properties
                    console.log("City:",city);
                    
                        document.cookie = "ucity = " + city;
                        console.log("City set to: " + city);
                         // Default to Edmonton, because the initial state is bad
                         document.getElementById('hiddenCity').value = city ? city : 'Edmonton';
          //Submit the form automatically
                          document.forms[0].submit();
                        } else {
                        console.log("City information not found in address");
                          // if this happens, still submit with default 'Edmonton'
                           document.getElementById('hiddenCity').value =  'Edmonton';
                          document.forms[0].submit();
                      }
                 } else if (request.readyState == 4 && request.status !== 200) {
                console.log("Nominatim request failed with status: " + request.status);
                  // if this happens, still submit with default 'Edmonton'
                  document.getElementById('hiddenCity').value =  'Edmonton';
                  document.forms[0].submit();
            }
        };
        request.send();
    }


      var successCallback = function(position){
        var x = position.coords.latitude;
        var y = position.coords.longitude;
        displayLocation(x,y);
      };

      var errorCallback = function(error){
        var errorMessage = 'Unknown error';
        switch(error.code) {
          case 1:
            errorMessage = 'Permission denied';
            break;
          case 2:
            errorMessage = 'Position unavailable';
            break;
          case 3:
            errorMessage = 'Timeout';
            break;
        }
        document.write(errorMessage);
      };
      navigator.geolocation.getCurrentPosition(successCallback,errorCallback,options);

    </script>
</body>
</html>