<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> Keshava Salon Management System || Cart</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
    <style>
         /* Popup container */
        .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        }

        /* The actual popup (appears on top) */
        .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
        }

        /* Popup arrow */
        .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
        }

        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s
        }

        /* Add animation (fade in the popup) */
        @-webkit-keyframes fadeIn {
        from {opacity: 0;}
        to {opacity: 1;}
        }

        @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
        } 
    </style>
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
                        <h2 class="page-title">Salon Cart Products</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Cart</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page header -->
    <form action="process_payment.php" method="POST">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 heading-section text-center ftco-animate" style="padding-bottom: 20px;  margin-left: 112px;">

                    <h2 class="mb-4" style="color:white;">Your Cart</h2>
                    <p>Elevate your salon experience with Keshava: Where beauty meets seamless management</p>
                </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Actions</th>
                        <th>Name of the product</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="cart-items-body"></tbody>
            </table>
            </div>
        </div>
    </div>
    <div id="subtotal">
        <h3 style="color:white; display:flex; justify-content:center;">Cart Totals</h3>
        <table style="margin-left:604px;">
            <tr>
                <td style="color:white; margin-left:617px;">Cart SubTotal</td>
                <td id="cart-subtotal" style="color:white; ">₹0.00</td>
            </tr>
            <tr>
                <td style="color:white;">Shipping</td>
                <td id="cart-shipping-fee" style="color:white;">Free</td>
            </tr>
            
            <tr id="coupon-details-row" style="display: none;">
                <td style="color:white;">Applied Coupon</td>
                <td id="applied-coupon" style="color:white;"></td>
            </tr>
            <tr id="coupon-discount-row" style="display: none;">
                <td style="color:white;">Coupon Discount</td>
                <td id="coupon-discount" style="color:white;">₹ 0.00</td>
            </tr>
            <tr>
                <td style="color:white;"><strong>Total</strong></td>
                <td id="total" style="color:white;">₹0.00</td>
            </tr>
        </table>
        <input type="hidden" id="cart-data" name="cart_data_for_php" value="">
        <?php if (isset($_SESSION['bpmsaid'])) { ?>
            <button style="margin-left:620px; width:195px; margin-top:10px; background-color:#0c9; color: white;" type="submit" id="checkout-btn" class="normal">Proceed To CheckOut</button>
        <?php } else{?>
            <a href="login.php" class="normal" style="margin-left:617px;">Login to Proceed</a>
        <?php } ?>
    </div>
    
    </form>
    
    <script src="js/cart.js"></script>
    
    <?php include_once('assets/includes/footer.php');?>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/menumaker.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/sticky-header.js"></script>
    <!--<script src="js/cart.js"></script>-->
    
    <script src="https://kit.fontawesome.com/dd27878933.js" crossorigin="anonymous"></script>
</body>

</html>