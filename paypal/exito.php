<?php
// #Execute Payment
// This  shows how you can complete
// a payment that has been approved by
// the buyer by logging into paypal site.
// You can optionally update transaction
// information by passing in one or more transactions.
// API used: POST '/v1/payments/payment/<payment-id>/execute'.

require __DIR__ . '/bootstrap.php';
use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
session_start();
if(isset($_GET['success']) && $_GET['success'] == 'true') {
    
    $paymentId_session = $_SESSION['paymentId']; 
    
    $paymentId = $paymentId_session;
    // Get the payment Object by passing paymentId
    $payment = Payment::get($paymentId, $apiContext);
    
    // PaymentExecution object includes information necessary 
    // to execute a PayPal account payment. 
    // The payer_id is added to the request query parameters
    // when the user is redirected from paypal back to your site
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
    
    //Execute the payment
    // (See bootstrap.php for more on `ApiContext`)
    $result = $payment->execute($execution, $apiContext);

    echo "<pre>";
    var_dump($result);
    
    
} else {
    echo "User cancelled payment.";
}
