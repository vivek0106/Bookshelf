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
    <div class="row justify-content-center">
        <div class="col-8 col-sm-6">
            <h1 class="text-center font-weight-bold">Pay Now</h1>
            <form id="checkout-selection" action="pay.php" method="POST" required>
                <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" required>
                <input type="email" id="email" name="email" placeholder="email" required class="form-control" required>
                <input type="tel" maxlength="10" name="number" id="number" class="form-control" required placeholder="Phone Number">
                <input type="number" placeholder="Amount" name="amt" id="amt" required class="form-control">
                <input type="text" placeholder="Payment Description" name="desc" id="desc" required class="form-control">
                <input type="submit" class="btn btn-primary" value="Submit" class="form-control">
                <input type="reset" class="btn btn-secondary" value="Reset" class="form-control">
            </form>
        </div>
   </div>
   </div>

</body>
</html>