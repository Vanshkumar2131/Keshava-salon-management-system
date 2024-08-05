<?php
session_start();
error_reporting(0);

include('assets/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Keshava Salon Management System || Home Page</title>
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
    <?php include('assets/includes/socfile.php');?>
    <?php include('assets/includes/header.php');?>
    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <h1 class="hero-title"> Keshava Salon Management System</h1>
                    <p class="hero-text"><strong>Where Beauty Meets Elegance, and Style is an Art.</strong> </p>
                    <a href="appointment.php" class="btn btn-default">Make an Appointment</a>
                </div>
                <img src="assets/images/left-image.jpg" style="margin-left: 80px; width: 500px;" alt="" srcset="">

            </div>
            <!-- <div class="row" style="margin-left: 70%; align-items: center; justify-content: center;">
                
                    <img src="assets/images/left-image.jpg" alt="" srcset="">
                
            </div> -->
        </div>
    </div>

    <div class="space-medium bg-default1">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="padding-right: 0px; width: 480px;"><img src="assets/images/parlor.jpg" style=" height: 419px; width: 461px; border-radius: 10px;" alt="" class="img-responsive"></div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12" style="padding-left:6px;">
                    <div class="well-block card" style="width: unset; border-radius: 10px; height: 418px; background: #333333;">
                        <span class="top"></span>
                        <span class="right"></span>
                        <span class="bottom"></span>
                        <span class="left"></span>
                        <?php
                            $ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
                            $cnt=1;
                            while ($row=mysqli_fetch_array($ret)) {
                        ?>
                        <h1 style="color:white;"><?php  echo $row['PageTitle'];?></h1>
                        <h5 class="small-title " style="color:white;">best experience ever</h5>
                        <p><?php  echo $row['PageDescription'];?></p><?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('assets/includes/footer.php');?>
    <!-- /.footer-->
    <script>var BotStar={appId:"s85cbf17a-d663-421b-bb0f-6683e0f4790a",mode:"livechat"};!function(t,a){var e=function(){(e.q=e.q||[]).push(arguments)};e.q=e.q||[],t.BotStarApi=e;!function(){var t=a.createElement("script");t.type="text/javascript",t.async=1,t.src="https://widget.botstar.com/static/js/widget.js";var e=a.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();}(window,document)</script>
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