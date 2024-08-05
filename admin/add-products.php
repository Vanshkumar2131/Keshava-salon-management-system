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
	<title> KSMS | Add Products</title>
	<link rel="shortcut icon" href="assets/images/dot.ico">
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="assets/css/style.css" rel='stylesheet' type='text/css' />
	<link href="assets/css/font-awesome.css" rel="stylesheet">
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/modernizr.custom.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="assets/js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<script src="assets/js/metisMenu.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<link href="assets/css/custom.css" rel="stylesheet">
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">
		bkLib.onDomLoaded(nicEditors.allTextAreas);
	</script>
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
					<h3 class="title1">Add Products</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms">
						<div class="form-title">
							<h4>Salon Products:</h4>
						</div>
						<div class="form-body" style="height:575px;">
							<form method="post" action="add-products_data.php" enctype="multipart/form-data">

								<!-- make custom productID -->
								<?php
								$query=mysqli_query($con,"select ProductID from tblproducts");
								$num=mysqli_num_rows($query)+1;
								$pid="PRD".$num;
								?>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Product ID</label>
									<input type="text" class="form-control" id="product_id" name="product_id" placeholder="Product ID" value="<?php echo $pid;?>" readonly="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Category</label>
									<select name="category" id="category" class="form-control" required="true">
										<option value="Select" selected disabled>Select Category</option>
										<!-- add products catergory for salon -->
										<option value="Hair Care">Hair Care</option>
										<option value="Hair Serum & Oil">Hair Serum & Oil</option>
										<option value="Skin Care">Skin Care</option>
										<option value="Nail Care">Nail Care</option>
										<option value="Body Care">Body Care</option>
										<option value="Fragrance">Fragrance</option>
										<option value="Tools & Accessories">Tools & Accessories</option>
									</select>
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Product Name</label>
									<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="" required="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Description</label>
									<input class="form-control" name="description" placeholder="Description" id="des" rows="5" required="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Product Quantity</label>
									<input type="number" id="product_quantity" name="product_quantity" class="form-control" placeholder="Product Quantity" value="" required="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Add Product Image</label>
									<input type="file" name="product_image" id="product_image" class="form-control" required="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Purchase Rate</label>
									<input type="text" id="Purchase_rate" name="purchase_rate" class="form-control" placeholder="Purchase Rate" value="" required="true">
								</div>
								<div class="form-group" style="color: white; margin-bottom: 24px;">
									<label>Sale Rate</label>
									<input type="text" id="sale_rate" name="sale_rate" class="form-control" placeholder="Sale Rate" value="" required="true">
								
								</div>
								<div><button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-top: 67px; margin-left: 606px; font-size: 17px; width: 83px; height: 53px;">Add</button></div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		
		<!-- Classie -->
		<script src="assets/js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById('cbp-spmenu-s1'),
				showLeftPush = document.getElementById('showLeftPush'),
				body = document.body;

			showLeftPush.onclick = function () {
				classie.toggle(this, 'active');
				classie.toggle(body, 'cbp-spmenu-push-toright');
				classie.toggle(menuLeft, 'cbp-spmenu-open');
				disableOther('showLeftPush');
			};

			function disableOther(button) {
				if (button !== 'showLeftPush') {
					classie.toggle(showLeftPush, 'disabled');
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