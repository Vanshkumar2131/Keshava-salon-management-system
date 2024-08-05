<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');

if(isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = $_POST['password'];
    
    // Assume your table structure has columns 'ID', 'UserName', and 'Password'
    $query = mysqli_query($con, "SELECT ID FROM tbladmin WHERE UserName='$adminuser' AND Password='$password'");
    $ret = mysqli_fetch_array($query);

    if($ret > 0) {
        $_SESSION['bpmsaid'] = $ret['ID'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>KSMS | Login Page </title>
<link rel="shortcut icon" href="assets/images/dot.ico">

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->

<link href="assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/custom.js"></script>
<link href="assets/css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push" style="
    background: black;">
<div class="main-content" style="margin-bottom : 32px; height: 100%; width: 83%; background: black;">
		
		<!-- main content start-->
		<div id="page-wrapper" style="margin-top: 32px; ">
			<div class="main-page login-page ">
				<h3 class="title1">SignIn Page</h3>
				<div class="widget-shadow">
					<div class="login-top card">
					<span class="top"></span>
  <span class="right"></span>
  <span class="bottom"></span>
  <span class="left"></span>
						<h4 style="color:white;">Welcome back to KSMS AdminPanel ! </h4>
					</div>
					<div class="login-body card">
						<form role="form" method="post" action="">
						<span class="top"></span>
  <span class="right"></span>
  <span class="bottom"></span>
  <span class="left"></span>
							
							<input type="text" class="user" name="username" placeholder="Username" required="true">
							<input type="password" name="password" class="lock" placeholder="Password" required="true">
							<input type="submit" name="login" value="Sign In">
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="../index.php">Back to Home</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								<div class="forgot">
									<a href="forgot-password.php">forgot password?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
	<!-- Classie -->
		<script src="assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="assets/js/bootstrap.js"> </script>
</body>
</html>