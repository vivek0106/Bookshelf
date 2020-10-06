<?php

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    include "../connection.php";
        $uid = $_COOKIE['bookshelfUserID'];
        $totalAmt = $_SESSION['totalAmt'];
        $oid = $attributes['razorpay_order_id'];
        $pid = $attributes['razorpay_payment_id'];
        $query = "insert into orders(orderID,orderedBy,orderStatus,totalAmount) values ('$oid',$uid,'Ordered',$totalAmt)";
        $res = mysqli_query($con,$query);
        $query = "select * from cartdetails where userID = $uid";
        $res1 = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($res1)){
            $pid =$row['productID'];
            $qty = $row['qty'];
            $query2 = "insert into orderdetails(orderID,product,qty) values ('$oid',$pid,$qty)";
            mysqli_query($con,$query2);        
        }
        $res2 = mysqli_query($con,"delete from cartdetails where userID=$uid");
        $res3 = mysqli_query($con,"insert into paymentdetails values('$pid',2,'$oid','Success',$totalAmt)");
       

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
            <title>Transaction</title>
        </head>
        <body>
            <div class="Container">
                <div class="row justify-content-center mt-5 p-2">
                    <div class="col-10 col-sm-8 col-md-6">
                        <table class="table table-striped">
                            <tr>
                                <td colspan="2"><h4 class="font-weight-bold">Your payment was <span class="text-success">successful.</span></h4></td>
                            </tr>
                            
                            <tr>
                               <th>Payment ID</th> 
                               <td> <?php echo $attributes['razorpay_payment_id'] ?></td> 
                            </tr>
                            <tr>
                                <th>Order ID</th> 
                                <td><?php echo $attributes['razorpay_payment_id'] ?></td>
                            </tr>
                           <tr>
                               <td>
                                   <a href="../home/" class="btn btn-warning">Home</a>
                               </td>
                           </tr>
                        </table>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
        

}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

/*$html = "<p>Your payment was successful</p>
             <p>Payment ID: {$attributes['razorpay_payment_id']}</p>
             <p>Order ID: {$attributes['razorpay_order_id']}</p>
             <p>Payment Signature: {$attributes['razorpay_signature']}</p>";*/