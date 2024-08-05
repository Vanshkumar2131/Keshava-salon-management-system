<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');

if(isset($_GET['delid'])){
    $del_id = intval($_GET['delid']);
    if (($key = array_search($del_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        echo "<script>alert('Product has been removed from the cart');</script>";
        echo "<script>window.location.href='view-cart.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
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
    <!-- Add your CSS links here -->
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
                        <h2 class="page-title">Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page header -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!empty($_SESSION['cart'])){
                                    foreach($_SESSION['cart'] as $product_id){
                                        $query = mysqli_query($con, "SELECT ProductName, ProductPrice FROM tblproducts WHERE ID='$product_id'");
                                        if($query && mysqli_num_rows($query) > 0) {
                                            $row = mysqli_fetch_assoc($query);
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ProductName']; ?></td>
                                                <td><?php echo $row['ProductPrice']; ?></td>
                                                <td><a href="view-cart.php?delid=<?php echo $product_id; ?>">Remove</a></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No Product in the cart</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!--Footer-->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; 2024 Keshava Salon Management System. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
	</body>
</html>
