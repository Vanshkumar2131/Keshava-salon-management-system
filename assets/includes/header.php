<div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    
                <a href="index.php"><img src = "assets/images/Keshava 2.svg" height = "175px" ></a> 
                <!-- <a href="index.php"><h1> Keshava salon management system</h1></a> -->
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation"> 
                            <ul>
                                <li class="active"><a href="index.php" title="Home">Home</a></li>
                                <li><a href="service-list.php" title="Service List">Service List</a></li>
                                <li><a href="product-list.php" title="Product List">Product List</a></li>
                                <li><a href="contact.php" title="Contact Us">Contact</a> </li>
                                <?php if (isset($_SESSION['bpmsaid'])) { ?>
                                
                                <li><a href="appointment.php" title="Book Appointment">Book Appointment</a> </li>
                                <li><a href="cart.php" title="Cart">Cart</a> </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['bpmsaid']; ?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php" title="Profile">Profile</a></li>
                                        <!-- <li><a href="cart.php" title="Cart">Cart</a></li>  -->
                                        <!-- <li><a href="change-password.php" title="Change Password">Change Password</a></li> -->
                                        <li><a href="logout.php" title="Logout">Logout</a></li>
                                    </ul>
                                </li>
                               <?php }else{ ?>
                                <li><a href="login.php" title="Login">Login</a></li>
                                <!--<li><a href="downloads/publish.htm" title="Download">Download Software</a></li>-->
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>