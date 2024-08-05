<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>KSMS |  Sales Reports</title>
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
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('assets/includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('assets/includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Sales reports</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Sales reports:</h4>
						</div>
						<div class="form-body" style="height:400px;">
							<form method="post" name="bwdatesreport"  action="sales-reports-detail.php" enctype="multipart/form-data">
								

  
							 <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputEmail1">From Date</label> <input type="date" class="form-control1" name="fromdate" id="fromdate" value="" required='true'> </div> 
							 <div class="form-group"style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputPassword1">To Date</label><input type="date" class="form-control1" name="todate" id="todate" value="" required='true'> </div>
							 <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputPassword1">Request Type</label><input type="radio" name="requesttype" value="mtwise" checked="true" style="margin-left:10px;">Month wise
                  <input type="radio" name="requesttype" value="yrwise" style="margin-left:10px;">Year wise </div>
							 
							
							
							  <button type="submit" name="submit" class="btn btn-primary btn-sm" style="
    margin-top: 67px;
    margin-left: 606px;
    font-size: 17px;
    width: 83px;
    height: 53px;
">Submit</button> </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 
	</div>
	<?php include_once('assets/includes/footer.php');?>
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
<?php } ?>