<?php
session_start();
error_reporting(0);
include('assets/includes/dbconnection.php');

if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
	if(isset($_POST['submit'])) {
        
        $product_id = $_POST['product_id'];
        $category = $_POST['category'];
        $product_name = $_POST['product_name'];
        $product_image = $_FILES["product_image"]["name"];
        $product_description = $_POST['description'];
        $product_quantity = $_POST['product_quantity'];
        $purchase_rate = $_POST['purchase_rate'];
        $sale_rate = $_POST['sale_rate'];

        // Construct the image path
        $image_path = "assets/product_images/" . $product_image;
    
        // Move the uploaded file to the desired directory
        move_uploaded_file($_FILES["product_image"]["tmp_name"], $image_path);
    
        // Insert data into the database
        $insert_tblproduct = "INSERT INTO `tblproducts`(`ProductID`, `product_category`, `ProductName`, `Description`, `product_image`, `sale_rate`) VALUES ('$product_id','$category','$product_name','$product_description','$image_path','$sale_rate')";
        $query_tblproduct = mysqli_query($con, $insert_tblproduct);
    
        if ($query_tblproduct) {
            echo "<script>alert('Service has been added.');</script>";

            $insert_tblproduct_stock = "INSERT INTO `tblproducts_stock`(`product_id`, `product_name`, `product_category`, `product_quatity`, `purchase_rate`, `sale_rate`) VALUES ('$product_id','$product_name','$category','$product_quantity','$purchase_rate','$sale_rate')";
            $query_tblproduct_stock = mysqli_query($con, $insert_tblproduct_stock);

            if ($query_tblproduct_stock) {
                echo $query_tblproduct_stock;
                echo "<script>window.location.href='add-products.php?msg=success'</script>";
                // echo "<script>alert('Service has been added.');</script>";
            }else{
                echo "<script>alert('Something Went Wrong. Please try again.');</script>";
            }
            
            // Additional logic if needed
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>