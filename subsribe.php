<?php

include './PHPMailer/src/Exception.php';
include './PHPMailer/src/PHPMailer.php';
include './PHPMailer/src/SMTP.php';


require('assets/includes/dbconnection.php');

session_start();
error_reporting(0);

$email = $_POST['email'];
$mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'keshavasalon@gmail.com'; // SMTP username
    $mail->Password = 'kpnhmtbctjnnihfz'; // SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('keshavasalon@gmail.com', 'Keshava Salon Management');
    $mail->addAddress($email); // Add a recipient

    //Content
    $mail->isHTML(true); // Set email format to HTML    
    $mail->Subject = ' Exciting News and Updates from Keshava Salon Management!';
    $mail->Body = "Dear Subscriber, Great news! Your subscription to Keshava Salon Management is now active, unlocking exclusive updates tailored just for you!. Here's what's in store: Insider Insights, Trendspotting, Business Strategies, Product Recommendations, Community Engagement. Stay tuned for valuable insights to boost your salon's success! Warm regards, Keshava Salon Management Team";
    $mail->AltBody = "Dear Subscriber, Great news! Your subscription to Keshava Salon Management is now active, unlocking exclusive updates tailored just for you!. Here's what's in store: Insider Insights, Trendspotting, Business Strategies, Product Recommendations, Community Engagement. Stay tuned for valuable insights to boost your salon's success! Warm regards, Keshava Salon Management Team";
    $mail->send();
    $query = "insert into tblsubscriber (Email) Values ('$email')";
    // echo $query;
    if(mysqli_query($con, $query)){
        echo "New record created successfully";
        header('Location: index.php?type=success');
    }else{
        echo "Error: " . $query . "<br>" . mysqli_error($con);
    }   
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header('Location: index.php?type=failed');
}  
?>