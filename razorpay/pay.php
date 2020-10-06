<?php

require('config.php');
require('razorpay-php/Razorpay.php');
session_start();

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//

$orderData = [
    'receipt'         => rand(1000,10000000),
    'amount'          => $_POST['totalAmt'] * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}
$query = "select fname,lname,phone,email,address from users where userID=".$_COOKIE['bookshelfUserID'];
include "../connection.php";
$row = mysqli_fetch_array(mysqli_query($con,$query));


$data = [
    "key"               => $keyId,
    "amount"            => $amount,
    "name"              => $row['fname']." ".$row['lname'],
    "description"       => "Bookshelf.in online payment",
    "image"             => "../img/book.jpg",
    "prefill"           => [
    "name"              => $row['fname']." ".$row['lname'],
    "email"             => $row['email'],
    "contact"           => $row['phone'],
    ],
    "notes"             => [
    "address"           => $row['address'],
    "merchant_order_id" => "$razorpayOrderId",
    ],
    "theme"             => [
    "color"             => "#f09300"
    ],
    "order_id"          => $razorpayOrderId,
];

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}

$json = json_encode($data);
$_SESSION['totalAmt'] = $_POST['totalAmt'];
require("checkout/manual.php");
