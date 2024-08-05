<?php
session_start();
error_reporting(0);

include('assets/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once('assets/includes/header.php');?>
    <title>Keshava Salon Management System</title>
    <link rel="shortcut icon" href="assets/images/dot.ico">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4 style="justify-content:center; display:flex; color:white; margin-left:52px;">Update your details:</h4>
						</div>
						<div class="form-body" style="margin-left: 510px;
    width: 500px;
    height: 1000px;">
							<form method="post">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 
$ret=mysqli_query($con,"select * from  tblcustomer where Name='$_SESSION[bpmsaid]'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

  
							 <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputName">Name</label> <input type="text" class="form-control" name="name" id="name" value="<?php  echo $row['Name'];?>" required="true"> </div><div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputEmail">Email</label> <input type="text" class="form-control" name="email" id="email" value="<?php  echo $row['Email'];?>" required="true"> </div><div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputMN">Mobile Number</label> <input type="text" class="form-control" name="mobnumber" id="mobnumber" value="<?php  echo $row['MobileNumber'];?>" required="true"> </div><div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> <label for="exampleInputPass">Password</label> <input type="text" class="form-control" name="pass" id="pass" value="<?php  echo $row['password'];?>" required="true"> </div> <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
"> 
<label for="exampleInputstate">State</label> <input type="text" class="form-control" name="state" id="state" value="<?php  echo $row['State'];?>" required="true"> </div> <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
">
<label for="exampleInputpin">Pin</label> <input type="text" class="form-control" name="Pin" id="pin" value="<?php  echo $row['PIN'];?>" required="true"> </div> <div class="form-group" style="
    color: white;
    margin-bottom: 24px;
">
<label for="exampleInputGender">Address</label> <textarea name="address" id="address" rows="5" class="form-control">
        <?php  echo $row['Address'];?></textarea> </div>
							 <?php } ?>
							 
                             <button type="submit" name="submit" class="btn btn-primary btn-sm" style="
    margin-top: 67px;
    margin-left: 201px;
    font-size: 17px;
    width: 100px;
    height: 53px;
">Update</button> </form> 
						</div>
						
					</div>
				
				
			</div>
		</div>
		 
	</div>

<?php include_once('assets/includes/footer.php');?>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/menumaker.js"></script>
    <!-- sticky header -->
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/sticky-header.js"></script>
</body>
</html>