<!-- retrive product image from database -->
<!-- Path: admin/view-products.php -->
<!-- Compare this snippet from admin/view-products.php: -->
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
<title>KSMS || View Products</title>
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
            <div class="tables">
                <h3 class="title1">View Products</h3>
                <div class="panel-body"  style="overflow-x:auto;">
                    <h4>View Products</h4>
                </div>
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Product Image</th>
                            <th>Wholesale Rate</th>
                            <th>Retail Rate</th>
                            <th>Creation Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM tblproducts");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $cnt;?></th>
                            <td><?php echo $row['ProductName'];?></td>
                            <td><?php echo $row['Description'];?></td>
                            <td><img src="<?php echo "admin/".$row['product_image'];?>" width="100px" height="100px"></td>
                            <td><?php echo $row['wholesale_rate'];?></td>
                            <td><?php echo $row['retail_rate'];?></td>
                            <td><?php echo $row['CreationDate'];?></td>
                        </tr>
                        <?php
                        $cnt = $cnt + 1;
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include_once('assets/includes/footer.php');?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Classie -->
<script src="assets/js/classie.js"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
    showLeftPush = document.getElementById('showLeftPush'),
    body = document.body;
    
    showLeftPush.onclick = function() {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
    };
    </script>
    <!--scrolling js-->
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>
