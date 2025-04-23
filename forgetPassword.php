<?php ob_start();
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

			<?php include 'config.php';
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
									<li> <a href="">Home / Forget Password</a> </li>
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
							<h2>FORGET PASSWORD</h2>
							<p>Enter your email id to recover your password</p>
						</div>
					</div>
				</div>
			</section>

			<!-- becoming a professional form -->
			<section class="ls section_padding_top_100 section_padding_bottom_100">
				<div class="container">
					<div class="row">
						<form class="shop-register" role="form" method="POST" enctype="multipart/form-data">
						<div class="col-sm-6">
							<div class="form-group validate-required" id="billing_first_name_field" data-aos="fade-up">
								<label for="billing_first_name" class="control-label">
									<span class="grey">Email Id</span>
									<span class="required">*</span>
								</label>
								<input type="email" class="form-control " name="email" placeholder="Enter your Email Id" required>
							</div>
							</div>
							<div class="col-sm-12" data-aos="fade-up">
								<button type="submit" name="send" class="theme_button wide_button color1 topmargin_40">Send Mail</button>
							</div>
							</div>

						</form>
						<?php 
if (isset($_POST['send'])) {
  $email=$_POST['email'];
  $query = "select id FROM users where email='".$email."'";
        $result = mysqli_query($con,$query);
        $Results = mysqli_fetch_array($result);
        $id=$Results['id'];
 
        if(count($Results)!=0)
        {
            $encrypt = ($Results['id']);
            $to      = $email; 
            $subject = 'Reset Password'; // Give the email a subject 
            $message = '
                         
                        Reset Passowrd :

                        Click on the link given below to to reset your password :

                        http://localhost/DOH/user/resetPassword.php?encrypt='.$encrypt.'
                         
                        '; // Our message above including the link
                                             
                        $headers = 'From:doorohelp@gmail.com' . "\r\n"; // Set from headers
                        mail($to, $subject, $message, $headers); // Send our email
                        echo "<script type='text/javascript'>swal('Successfully Sent!', 'Reset Password link has been sent to your email id.', 'success');</script>"; 
        }
        else
        {
            echo "<script type='text/javascript'>alert('The Email Id you have entered is  not rgistered yet!');</script>";
        }
}
?>
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
		
		$(document).ready(function() {
		    // aos animations
			AOS.init({
			  duration: 1200,
			})
		});
	</script>

</body>
</html>