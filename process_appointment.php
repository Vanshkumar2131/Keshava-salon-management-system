<?php

require('./PHPMailer/src/PHPMailer.php');
require('./PHPMailer/src/Exception.php');
require('./PHPMailer/src/SMTP.php');

require('assets/includes/dbconnection.php');

session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $services = implode(", ", $_POST['services']);
    $adate = $_POST['adate'];
    $atime = $_POST['atime'];
    $salon_name = $_POST['salon'];
    $query = "SELECT * FROM tblappointment WHERE AptTime='$atime' AND Status='1' AND AptDate='$adate' AND Services='$services' AND salon_name='$salon_name'";
    $executeQuery = mysqli_query($con, $query);
    if (mysqli_num_rows($executeQuery) > 0) {
        header('Location: appointment.php?type=failed');
    } else {
        $salon_name = $_POST['salon'];
        $querySalon = "select * from tblsalon where SalonName='$salon_name'";
        $executeSalon = mysqli_query($con, $querySalon);
        $salon = mysqli_fetch_array($executeSalon);
        if($salon){
            $salon_address = $salon['address'];
            $salon_phone = $salon['phone'];
            $salon_email = $salon['email'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $services = implode(", ", $_POST['services']);
            $gender = $_POST['gender'];
            $adate = $_POST['adate'];
            $atime = $_POST['atime'];
            $phone = $_POST['phone'];
            $aptnumber = mt_rand(100000000, 999999999);

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // SMTP server
                $mail->SMTPAuth = true;
                $mail->Username = 'keshavasalon@gmail.com'; // SMTP username
                $mail->Password = 'kpnhmtbctjnnihfz'; // SMTP password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                //Recipients
                $mail->setFrom('keshavasalon@gmail.com', 'Keshava Salon Management');
                $mail->addAddress($email); // Add a recipient

                //Content
                $mail->isHTML(true); // Set email format to HTML    
                $mail->Subject = 'Appointment Booking';
                $mail->Body = 'Dear ' . $name . ',<br><br>Thank you for requesting an appointment at Keshava Salon. Your appointment details are as follows:<br><br>Appointment Number: ' . $aptnumber . '<br>Name: ' . $name . '<br>Email: ' . $email . '<br>Gender: ' . $gender . '<br>Phone Number: ' . $phone . '<br>Salon Name: ' . $salon_name . '<br>Salon Address: ' . $salon_address . '<br>Appointment Date: ' . $adate . '<br>Appointment Time: ' . $atime . '<br>Services: ' . $services . '<br><br>We look forward to seeing you at our salon. If you have any questions or need to make changes to your appointment, please feel free to contact us.<br><br>Thank you!<br>Keshava Salon Management';
                $mail->AltBody = 'Dear ' . $name . ', Thank you for requesting an appointment at Keshava Salon. Your appointment details are as follows: Appointment Number: ' . $aptnumber . ' Name: ' . $name . ' Email: ' . $email .

                $mail->send();
                $query = "INSERT INTO tblappointment(AptNumber,Name,Email,Gender,PhoneNumber,salon_name,salon_phone,salon_email,salon_address,AptDate,AptTime,Services,ApplyDate,Remark, Status,RemarkDate) VALUES ('$aptnumber','$name','$email','$gender','$phone','$salon_name','$salon_phone','$salon_email','$salon_address','$adate','$atime','$services', '$adate', '','', '$adate')";
                // echo $query;
                if(mysqli_query($con, $query)){
                    echo "New record created successfully";
                    header('Location: appointment.php?msg='. $aptnumber .'&type=success');
                }else{
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }   
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }  
        }
    }
}
?>
