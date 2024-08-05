<?php
include('assets/includes/dbconnection.php');

// Signup database insertion code
$cust_id = $_POST['cust_id'];
$name = $_POST['name'];
$mobilenumber = $_POST['mobilenumber'];
$email = $_POST['email'];
// gemder
$gender = $_POST['gender'];
if ($gender == "male") { 
    $gender = 'Male';
} else if ($gender == "female") { 
    $gender = 'Female';
}  else {
    $gender = 'Other';
}
$address = $_POST['address'];
$state = $_POST['state'];
$pin = $_POST['pin'];
$password = $_POST['password'];

// Check if the email already exists

$query = mysqli_query($con, "SELECT * FROM tblcustomer WHERE email='$email'");
$ret = mysqli_fetch_array($query);

if(!$ret)
{
    // Insert the data into the database
    $insert_tblcustomer = "INSERT INTO `tblcustomer`(`Cust_ID`, `Name`, `MobileNumber`, `Email`,`Password`, `Gender`, `Address`, `State`, `PIN`) VALUES ('$cust_id','$name','$mobilenumber','$email','$password','$gender','$address','$state','$pin')";
    $query_tblcustomer = mysqli_query($con, $insert_tblcustomer);

    if ($query_tblcustomer) {
        echo "<script>alert('You have successfully registered.');</script>";
        echo "<script>window.location.href='login.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
} else {
    echo "<script>alert('Email already exists.');</script>";
}
?>
