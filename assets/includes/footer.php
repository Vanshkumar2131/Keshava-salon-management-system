<?php
include('dbconnection.php');
// session_start();
// error_reporting(0);

if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Salon Address</h2>
                            <ul class="listnone contact">
                                <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <li><i class="fa fa-map-marker"></i> <?php  echo $row['PageDescription'];?> </li>
                                <li style="
    font-size: medium;"><i class="fa fa-phone"></i> +91 <?php  echo $row['MobileNumber'];?></li>
                               
                                <li style="
    font-size: medium;"><i class="fa fa-envelope-o"></i>  <?php  echo $row['Email'];?></li><?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title" style="margin-inline:13px;">Social Feed</h2>
                            <ul class="listnone" style="margin:15px;">
                                <!-- <li><a href="#"> <i class="fa fa-facebook"></i> Facebook </a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linked In</a></li>
                                <li><a href="#"> <i class="fa fa-youtube"></i>Youtube</a></li> -->
                                <li><a href="https://www.instagram.com/anomalyenterprise/" class="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                <li><a href="https://keshava.anomalyenterprise.in" class="#"><i class="fa fa-globe"></i>Website</a></li>
                                <li><a href="https://www.linkedin.com/company/anomaly-enterprise/" class="#"><i class="fa fa-linkedin"></i>Linked In</a></li>
                                <!-- <a href="#" class="#"><i class="fa fa-youtube-play"></i></a> -->
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <!-- newsletter block -->
                            <h2 class="widget-title">Newsletters</h2>
                            <p>Enter your email address to receive new patient information and other useful information right to your inbox.</p>
                            <form method="post" action="subsribe.php">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter your email address" name="email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" value="submit" name="sub">Subscribe</button>
                                    </span>
                                   
                                </div>
                            </form>
                            <?php
                                if(isset($_GET['type'])){
                                    if($_GET['type'] == 'success'){
                                        echo "<p style='color: green;'>You have successfully subscribed to our newsletter!</p>";
                                    }elseif($_GET['type']=='failed'){
                                        echo "<p style='color: red;'>You have already subscribed to our newsletter!</p>";
                                    }
                                }
                            ?>
                            <!-- /input-group -->
                        </div>
                        <!-- newsletter block -->
                    </div>
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>&copy; Keshava Salon Management System 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>