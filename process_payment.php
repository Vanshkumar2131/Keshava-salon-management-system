<?php
// Include Razorpay PHP Library
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

// Create an instance of the Razorpay API
$api = new Api('rzp_test_tvD4Fa9f1Ysai6', 'VCl6iygCfqHq2YV0Lirvm8yI');



// Fetch payment ID from POST request
$payment_id = $_POST['razorpay_payment_id'];

error_log("Payment ID: " . $payment_id);
try {
    // Fetch payment details from Razorpay
    $payment = $api->payment->fetch($payment_id);

    // Verify payment signature
    $attributes = array(
        'razorpay_order_id' => $payment->order_id,
        'razorpay_payment_id' => $payment_id,
        'razorpay_signature' => $_POST['razorpay_signature']
    );

    // Verify signature
    $api->utility->verifyPaymentSignature($attributes);

    // Payment is successful
    echo "Payment Successful!";

} catch (Exception $e) {
    // Payment failed
    echo "Payment Failed: " . $e->getMessage();
}
?>

