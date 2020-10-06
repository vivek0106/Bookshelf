<?php
session_start();
    if(isset($_SESSION["bookshelfAdminID"])){
?>
    <?php
include 'connection.php';
$queryProduct="Select count(*) from books";
$resProduct=mysqli_query($con,$queryProduct);
$rowProduct=mysqli_fetch_array($resProduct);

$querySales="Select count(*) from orders";
$resSales=mysqli_query($con,$querySales);
$rowSales=mysqli_fetch_array($resSales);

$queryProfit="select (SUM(totalAmount)*(15/100)) as profit from orders";
$resProfit=mysqli_query($con,$queryProfit);
$rowProfit = mysqli_fetch_array($resProfit)['profit'];

$queryCustomer="select count(*) from users";
$resCustomer=mysqli_query($con,$queryCustomer);
$rowCustomer=mysqli_fetch_array($resCustomer);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/adminnav.css">
    <title>Bookshelf | Stats</title>
</head>
<body>
    <?php include "nav.php" ?>
    <div class="container">
        <div class="row justify-content-center" style="margin-top:15vh">
            <div class="col-sm-5">
                <div class="card">
                    <h5 class="card-header font-weight-bold">Total Products</h5>
                    <div class="card-body">
                        <h1 class="card-text font-weight-bold p-3"><?php echo $rowProduct['count(*)']; ?></h1>
                        <a href="admin.php" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <h5 class="card-header font-weight-bold">Total Sales</h5>
                    <div class="card-body">
                        <h1 class="card-text font-weight-bold p-3"><?php echo $rowSales['count(*)']; ?></h1>
                        <a href="newOrder.php" class="btn btn-primary">View Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 mt-3">
                <div class="card">
                    <h5 class="card-header font-weight-bold">Total Profit</h5>
                    <div class="card-body">
                        <h1 class="card-text font-weight-bold p-3">&#8377;&nbsp;<?php echo round($rowProfit,2); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 mt-3">
                <div class="card">
                    <h5 class="card-header font-weight-bold">Total Customers</h5>
                    <div class="card-body">
                        <h1 class="card-text font-weight-bold p-3"><?php echo $rowCustomer['count(*)']; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <span>Designed and maintained by Bookshelf.in | Terms and Conditions | Privacy Policy | Copyright </span> &#169; <span>| 2020</span>
    </div>
</body>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>  
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    $(".nav-link").removeClass("active");
    $("#navStats").addClass("active");
</script>
</html>


<?php
    }
    else{
        header("Location:index.php");
    }
?>