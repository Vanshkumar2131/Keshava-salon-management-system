<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> Keshava Salon Management System || Product List</title>
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include_once('assets/includes/socfile.php');?>
    <?php include_once('assets/includes/header.php');?>
    <div class="page-header">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Salon Products</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Product list</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 heading-section text-center ftco-animate" style="padding-bottom: 20px;  margin-left: 112px;">

                    <h2 class="mb-4" style="color:white;">Our Product Prices</h2>
                    <p>Elevate your salon experience with Keshava: Where beauty meets seamless management</p>
                </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Name of the product</th>
                        <th>Product Description</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($con, "SELECT * FROM tblproducts");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cnt; ?></th>
                        <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $row['ProductID']; ?>">
                        <td id="ProductName"><?php echo $row['ProductName']; ?></td>
                        <td id="Description"><?php echo $row['Description']; ?></td>
                        <td><img src="<?php echo "admin/" . $row['product_image']; ?>" width="100px" height="100px"></td>
                        <td id="sale_rate"><?php echo $row['sale_rate']; ?></td>
                        <td><input type="number" class="form-control" id="quantity" name="quantity_<?php echo $row['ProductID']; ?>" placeholder="Quantity" value="" required="true"></td>

                        <td> <button class="normal" onclick="addToCart()"><i class="fa-solid fa-cart-plus" style="color:black; font-size:38px"></i></button></td>
                    </tr>

                    <?php
                        $cnt = $cnt + 1;
                    }
                    ?>
                </tbody>
            </table>

            </div>
        </div>
    </div>

    <div class="space-small bg-primary">
        <!-- call to action -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-7 col-md-8 col-xs-12">
                    <h1 class="cta-title">Book your online appointment</h1>
                    <p class="cta-text"> Call to action button for booking appointment.</p>
                </div>
                <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                    <a href="appointment.php" class="btn btn-white btn-lg mt20">Book Appointment</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/add_cart.js"></script>
    <?php include_once('assets/includes/footer.php');?>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/menumaker.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/sticky-header.js"></script>
    
    <script src="https://kit.fontawesome.com/dd27878933.js" crossorigin="anonymous"></script>
</body>

</html>