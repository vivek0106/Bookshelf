<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        input{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <form name='razorpayform' action="verify.php" method="POST">
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
        <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    </form>
    </body>
    <div class="row justify-content-center mt-5">
        <div class="col-auto">
            <h3 class="text-center font-weight-bold">Pay Now</h3>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-10 col-sm-8 col-md-6">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <td><?php echo $row["fname"]." ".$row['lname'];?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?php echo $row['phone']?></td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td><?php echo $_POST['totalAmt']?></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><?php echo "Bookshelf.in online payment";?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-auto">
            <button id="rzp-button" class="btn font-weight-bold" style="background-color:orange; display:block; padding:10px 25px;">Pay Now</button>
        </div>
    </div>

    </div>
</body>
</html>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>


// Checkout details as a json
var options = <?php echo $json?>;

/**
 * The entire list of Checkout fields is available at
 * https://docs.razorpay.com/docs/checkout-form#checkout-fields
 */
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};

// Boolean whether to show image inside a white frame. (default: true)
options.theme.image_padding = false;

options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
    },
    // Boolean indicating whether pressing escape key 
    // should close the checkout form. (default: true)
    escape: true,
    // Boolean indicating whether clicking translucent blank
    // space outside checkout form should close the form. (default: false)
    backdropclose: false
};

var rzp = new Razorpay(options);

document.getElementById('rzp-button').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>