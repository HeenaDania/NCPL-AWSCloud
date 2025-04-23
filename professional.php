<?php
ob_start();
session_start();

// Error reporting (put at the very top)
error_reporting(E_ALL);
ini_set('display_errors', 1);
$config = require 'includes/s3config.php';
require 'vendor/autoload.php'; // Ensure AWS SDK is installed
include 'config.php'; // Ensure this file exists and has correct DB connection
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

    <!-- js files -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body>
    <!-- preloader -->
    <div class="preloader">
        <div class="preloader_image"></div>
    </div>
    <!-- eof preloader -->

    <div id="canvas">
        <div id="box_wrapper">

            <?php include 'includes/topHeader.php'; ?>

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
                                        <li> <a href="">Home / Become a Professional</a> </li>
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
                            <h2>JOIN US</h2>
                            <p>Become a Door O Help Partner</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- becoming a professional form -->
            <section class="ls section_padding_top_100 section_padding_bottom_100">
                <div class="container">
                    <div class="row">
                        <!-- Place PHP Code Here -->
                        <?php
                        if (isset($_POST['add'])) {
                            $fullName = $_POST['name'];
                            $address = $_POST['address'];
                            $profession = $_POST['profession'];
                            // $profession = "WebDeveloper";
                            $experience = $_POST['experience'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $availability = $_POST['availability'];
                            $verified=1;

                            // Access latitude, longitude, and city from $_POST
                            $city = $_POST['city'] ?? '';
                            $latitude = $_POST['latitude'] ?? 0;
                            $longitude = $_POST['longitude'] ?? 0;
                            $name = $_FILES["img"]["name"];
                            $temp_name = $_FILES["img"]["tmp_name"];
                            $location = 'images/';
                            $path=$location.$name;

                            if (preg_match("/^[0-9]{10}$/", $phone)) {
                                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK){
                                    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                    if (!in_array($_FILES['img']['type'], $allowedTypes)){
                                        echo "<script>swal('Error!', 'Invalid file type. Only JPEG, JPG, and PNG are allowed.', 'error');</script>";
                                    }
                                    elseif ($_FILES['img']['size'] > 5 * 1024 * 1024) { // 5MB
                                        echo "<script>swal('Error!', 'File size exceeds 5MB.', 'error');</script>";
                                    }
                                    else{
                                        if (move_uploaded_file($temp_name,$path)){ 
                                            $query="insert into professionals (name,city,profession,phone,email,image,availability,experience,address,latitude,longitude) VALUES ('$fullName','$city','$profession','$phone','$email','$path','$availability','$experience','$address','$latitude','$longitude')";
                                            mysqli_query($con,$query) or die(mysqli_error($con));
                                            echo "<script type='text/javascript'>swal('Successfully Registered !', 'Will be avaliable to our users for providing services after verification by Team and informed via email.', 'success');</script>";    
                                          }

                                        // try{
                                        //     $s3 = new S3Client([
                                        //         'region'  => $config['s3']['region'],
                                        //         'version' => $config['s3']['version'],
                                        //         'credentials' => [
                                        //             'key'    => $config['s3']['key'],
                                        //             'secret' => $config['s3']['secret'],
                                        //         ],
                                        //         'http'    => [
                                        //             'timeout' => 60, // Increase timeout
                                        //             'connect_timeout' => 70
                                        //         ]
                                        //     ]);
                                        //     echo "<script>console.log('S3 Client Configured:', " . json_encode([
                                        //         'region' => $s3->getRegion(),
                                        //         'credentials_key' => $config['s3']['key'] ? 'EXISTS' : 'MISSING',
                                        //         'credentials_secret' => $config['s3']['secret'] ? 'EXISTS' : 'MISSING'
                                        //     ]) . ")</script>";

                                        //     echo "<script>console.log('File Info:', " . json_encode($_FILES['img']) . ")</script>";

                                        //     if (!file_exists($_FILES['img']['tmp_name'])) {
                                        //         throw new Exception("Temp file not found: " . $_FILES['img']['tmp_name']);
                                        //     }

                                        //     chmod($_FILES['img']['tmp_name'], 0777);  // WARNING: Only for debugging. Never in production.
                                        //     $fileContents = @file_get_contents($tmpFile);  // Use @ to suppress warnings
                                        //     if ($fileContents === false) {
                                        //         $error = error_get_last();
                                        //         throw new Exception("Cannot read temp file: " . print_r($error, true));
                                        //     }
                                        //     $key = 'professionals/' . uniqid() . '_' . basename($_FILES['img']['name']);
                                        //     $bucket = $config['s3']['bucket'];
                                        //     $upload = $s3->putObject([
                                        //         'Bucket' => $bucket,
                                        //         'Key'    => $key,
                                        //         'Body' => $fileContents,        // Use file contents
                                        //         'ACL'    => 'public-read',
                                        //     ]);
                                        //     $imageUrl = $upload->get('ObjectURL');
                                        //  // $query = "INSERT INTO professionals (name, city, profession, phone, email, experience, address, latitude, longitude, availability, image) VALUES ('$fullName', '$city', '$profession', '$phone', '$email', '$experience', '$address', '$latitude', '$longitude', '$availability', '$imageUrl')";

                                        //  //    $result = mysqli_query($con, $query);
                                        //  //    if ($result) {
                                        //  //        echo "<script>swal('Successfully Registered!', 'Will be available to our users after verification.', 'success');</script>";
                                        //  // } else {
                                        //  //        echo "<script>swal('Error!', 'Database error: " . mysqli_error($con) . "', 'error');</script>";
                                        //  //    }
                                        // }
                                        // catch (AwsException $e) {
                                        //      echo "<script>console.error('AWS Error:', " . json_encode([
                                        //             'code' => $e->getAwsErrorCode(),
                                        //             'message' => $e->getMessage(),
                                        //             'request_id' => $e->getAwsRequestId()
                                        //         ]) . ")</script>";
                                        //      file_put_contents('s3_errors.log', 
                                        //             date('Y-m-d H:i:s') . " - " . $e->getMessage() . "\n",
                                        //             FILE_APPEND
                                        //         );
                                                
                                        //         die("S3 Connection Failed - Check Browser Console");
                                        //     // error_log($e->getMessage());
                                        //     // echo "<script>swal('Error!', 'S3 upload error: " . $e->getMessage() . "', 'error');</script>";
                                        // }
                                    }

                                }
                                else{
                                    echo "<script>swal('Error!', 'Please upload an image.', 'error');</script>";
                                }
                            }
                            else{
                                echo "<script>swal('Invalid Phone No.!', 'Enter a valid 10 digits phone number.', 'error');</script>";
                            }
                        }
                        ?>
                        <form class="shop-register" role="form" method="POST" enctype="multipart/form-data">
                            <!-- Hidden fields for lat/lon/city -->
                            <input type="hidden" name="latitude" id="latitude-field">
                            <input type="hidden" name="longitude" id="longitude-field">
                            <input type="hidden" name="city" id="city-field">

                            <div class="col-sm-6">
                                <div class="form-group validate-required" id="billing_first_name_field" data-aos="fade-up">
                                    <label for="billing_first_name" class="control-label">
                                        <span class="grey">Full Name</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control " name="name" placeholder="Enter your Full Name" required>
                                </div>
                                <div class="form-group validate-required validate-email" id="billing_email_field" data-aos="fade-up">
                                    <label for="billing_email" class="control-label">
                                        <span class="grey">Email</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" class="form-control " name="email" placeholder="Enter your Email-Id" value="" required>

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" id="billing_company_field" data-aos="fade-up">
                                    <label for="billing_company" class="control-label">
                                        <span class="grey">Primary Profession</span>
                                        <span class="required">*</span>
                                    </label>
                                    <select class="form-control" name="profession" id="profession" required style="font-style: italic;">
                                        <option disabled selected>Select a Profession</option>
                                        <?php
                                        $get = "select * from services";
                                        $exe = mysqli_query($con, $get);
                                        while ($data = mysqli_fetch_array($exe)) {
                                        ?>
                                            <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                                <div class="form-group validate-required validate-phone" id="billing_phone_field" data-aos="fade-up">
                                    <label for="billing_phone" class="control-label">
                                        <span class="grey">Phone</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control " name="phone" value="" required placeholder="Enter your phone number">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group validate-required" id="billing_last_name_field" data-aos="fade-up">
                                    <label for="billing_last_name" class="control-label">
                                        <span class="grey">Experience</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="number" class="form-control " name="experience" placeholder="Enter your Experience in years" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group validate-required validate-image" id="billing_image_field" data-aos="fade-up">
                                    <label for="billing_image" class="control-label">
                                        <span class="grey">Profile Pic</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="file" class="form-control " name="img" required>

                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group validate-required validate-email" id="billing_email_field" data-aos="fade-up">
                                    <label for="billing_email" class="control-label">
                                        <span class="grey">Address</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-control " style="height: 100px;" required name="address" id="addr" required>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group validate-required validate-availability" id="billing_availability_field" data-aos="fade-up">
                                    <label for="billing_availability" class="control-label">
                                        <span class="grey">Availability</span>
                                        <span class="required">*</span>
                                    </label>
                                    <input type="varchar" class="form-control " name="availability" value="" required style="height: 100px;" placeholder="Enter your timings for availability">
                                </div>
                            </div>
                            <div class="col-sm-12" align="center" data-aos="fade-up">
                                <button type="reset" class="theme_button wide_button color1 topmargin_40">Reset</button>
                                <button type="submit" name="add" class="theme_button wide_button color1 topmargin_40">Register Now</button>
                            </div>
                    </div>
                    </form>

                </div>
        </div>
        </section>
        <!-- eof becoming a professional form -->

        <section class="ds parallax page_copyright section_padding_15 with_top_border_container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="grey regular">Services provided with ♥ by Door O Help</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- eof #box_wrapper -->
    </div>
    <!-- eof #canvas -->

    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <script src="js/switcher.js"></script>
    <script src="js/aos.js"></script>

    <script type="text/javascript">
        function displayLocation(latitude, longitude) {
            var request = new XMLHttpRequest();
            var method = 'GET';
            var url = 'https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=' + latitude + '&lon=' + longitude;
            var async = true;
            request.open(method, url, async);
            request.onreadystatechange = function() {
                if (request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                    console.log("Nominatim Response:", data);

                    if (data.address) {
                        var city = data.address.city || data.address.town || data.address.village || data.address.hamlet || '';
                        console.log("City:", city);

                        if (city) {
                            // document.cookie = "city=" + city;  // No longer setting cookies
                            console.log("City set to: " + city);
                        } else {
                            console.log("City information not found in address");
                            // document.cookie = "city="; // No longer setting cookies
                        }

                        // Set city in the hidden field
                        document.getElementById('city-field').value = city;

                    } else {
                        console.log("Address information not found in Nominatim response");
                        // document.cookie = "city="; // No longer setting cookies
                    }

                    document.getElementById('addr').value = data.display_name || '';
                } else if (request.readyState == 4 && request.status !== 200) {
                    console.log("Nominatim request failed with status: " + request.status);
                    // document.cookie = "city="; // No longer setting cookies
                }
            };
            request.send();
        }
		
        var successCallback = function(position) {
            var x = position.coords.latitude;
            var y = position.coords.longitude;
            displayLocation(x, y);

            // Set latitude and longitude in hidden fields
            document.getElementById('latitude-field').value = position.coords.latitude;
            document.getElementById('longitude-field').value = position.coords.longitude;
        };

        var errorCallback = function(error) {
            var errorMessage = 'Unknown error';
            switch (error.code) {
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
            console.log(errorMessage);
            document.write(errorMessage);
        };

        var options = {
            enableHighAccuracy: true,
            timeout: 1000,
            maximumAge: 0
        };

        $(document).ready(function() {
            AOS.init({
                duration: 1200,
            });
            if (navigator.geolocation) {
                console.log("Geolocation is supported by this browser.");
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        });
    </script>
</body>
</html>
<?php ob_end_flush(); ?>
