<?php
session_start();
error_reporting(0);

include('assets/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> Keshava Salon Management System || Appointments Form</title>
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

    <script src="assets/js/jquery.min.js"></script>
</head>

<body>  
    <?php include('assets/includes/socfile.php');?>
    <?php include('assets/includes/header.php');?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Book Appointment</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Book Appointment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container" style="padding-left:76px;">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <b>
                                <h1 style="font-size: 34px; margin-left: 325px; color:white;">Appointment Form</h1>
                            </b>
                            <p style=" font-size: 17px;margin-left: 330px;"> Book your appointment to save salon rush.</p>
                            <form method="post" action="process_appointment.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" required="true" style="width: 500px;">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="phone" style="margin-left: 141px;">phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+" style="width: 500px; margin-left: 141px;">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label" for="email">email</label>
                                        <input type="email" class="form-control" id="appointment_email"placeholder="Email" name="email" required="true" style="width: 1011px;">
                                    </div>
                                    <div class="col-md-12" style="width: 1265px;">
                                        <label class="control-label" for="services">Services</label>
                                        <div class="row">
                                            <?php 
                                                $query=mysqli_query($con,"select * from tblservices");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                            ?>
                                            <div class="col-md-4">
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" name="services[]" value="<?php echo $row['ServiceName'];?>">
                                                    <?php echo $row['ServiceName'];?>
                                                </label>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    
                                    <!-- Add Salon select option -->
                                    <div class="col-md-6" style="margin-top: 23px;">
                                        <label class="control-label" for="Subject">Salon</label>
                                        <select name="salon" id="salon" required="true" class="form-control" style="width: 1011px;">
                                            <option value="-1">Select Salon</option>
                                            <?php 
                                                $query=mysqli_query($con,"select * from tblsalon");
                                                    while($row=mysqli_fetch_array($query))
                                                {
                                            ?>
                                            <option value="<?php echo $row['SalonName'];?>">
                                                <?php echo $row['SalonName'];?></option>
                                            <?php } ?>
                                        </select>
                                        
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Appointment Date</label>
                                            <input type="date" class="form-control appointment_date" placeholder="Date"
                                                name="adate" id='inputdate' required="true" style="width: 1011px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label" for="textarea">Select Appointment Time</label>
                                            <select class="form-control appointment_time" name="atime" id="time" required="true" style="width: 1011px;">
                                                <!-- Time slots will be dynamically generated here -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="radio col-md-6" style="margin-left:310px; width:450px; margin-top:10px;">
                                        <label class="control-label" for="gender" style="padding-top: 20px; font-size: 15px"> <strong style="color: white;margin-bottom: 24px;">Gender:</strong>
                                            <label style="color: white;margin-bottom: 24px;">
                                                <input type="radio" name="gender" id="gender" value="Male">
                                                Male
                                            </label>
                                            <label style="color: white;margin-bottom: 24px;">
                                                <input type="radio" name="gender" id="gender" value="Female">
                                                Female
                                            </label>
                                            <label style="color: white;margin-bottom: 24px;">
                                                <input type="radio" name="gender" id="gender" value="Transgender">
                                                Transgender
                                            </label>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" id="submit" name="submit" class="btn btn-default"
                                                style="width: 192px;height: 72px;margin-left: 415px;margin-top: 67px;font-size: 18px;">Book</button>
                                            <?php if (isset($_GET['msg'])){
                                                $aptno = $_GET['msg'];
                                                echo "<script>alert('Appointment Booked Successfully and Appointment No. is $aptno');</script>";
                                            }elseif(isset($_GET['type'])){
                                                echo "<script>alert('Appointment Already Booked.');</script>";  
                                            }?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('assets/includes/footer.php');?>

    <script>
    // Function to generate time slots
    function generateTimeSlots() {
        var startTime = 10.5 * 60; // Start time in minutes (10:30 AM)
        var endTime = 19.5 * 60; // End time in minutes (7:50 PM)
        var slotDuration = 40; // Duration of each slot in minutes

        var selectElement = document.getElementById("time");

        // Clear any existing options
        selectElement.innerHTML = '';

        // Loop through the time range and generate options
        for (var i = startTime; i < endTime; i += slotDuration) {
            var hours = Math.floor(i / 60);
            var minutes = i % 60;
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Handle midnight (0:00) as 12 AM
            minutes = minutes < 10 ? '0' + minutes : minutes;

            var timeString = hours + ':' + minutes + ' ' + ampm;

            var option = document.createElement("option");
            option.text = timeString;
            option.value = timeString;

            selectElement.add(option);
        }
    }

    // Call the function to generate time slots
    generateTimeSlots();
    </script>
    <script>

        $(function () {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var minDate = year + '-' + month + '-' + day;

            var maxMonth;
            var maxYear;
            if (month === 11) {
                maxMonth = '01';
                maxYear = year + 1;
            } else if (month === 12) {
                maxMonth = '02';
                maxYear = year + 1;
            } else {
                maxMonth = dtToday.getMonth() + 2;
                maxYear = year;
            }
            var maxDate = maxYear + '-' + maxMonth + '-' + day;
            $('#inputdate').attr('min', minDate);
            $('#inputdate').attr('max', maxDate);
        });
    </script>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/menumaker.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/sticky-header.js"></script>
</body>

</html>