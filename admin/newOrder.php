<?php
    session_start();
    if(isset($_SESSION["bookshelfAdminID"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/adminnav.css">
    <title>BookShelf | New Orders</title>
</head>
<body onload="getNewOrders()";>
    <?php include "nav.php" ?>
    <div class="container">
        <ul class="nav nav-tabs nav-justified mt-5">
            <li class="nav-item">
                <a class="nav-link active" href="#newOrders" onclick="getNewOrders()" data-toggle="tab" >New Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#approved" data-toggle="tab"  onclick="getApprovedOrders()">Approved</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#shipped" data-toggle="tab"  onclick="getShippedOrders()">Shipped</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#delivered" data-toggle="tab"  onclick="getPendingOrders()">Delivery Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#cancelled" data-toggle="tab"  onclick="getCancelledOrders()">Cancelled Orders</a>
            </li>
        </ul>
        <div class="tab-content container mt-3">
       
            <div class="tab-pane active" id="newOrders">
                <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th >Order ID</th>
                                <th >User ID</th>
                                <th >Product Name</th>
                                <th >Price</th>
                                <th >Quantity</th>
                                <th >Payment Status</th>
                                <th >Order Date</th>
                                <th >Action</th>
                                
                            </tr>
                        </thead>
                        <tbody id="newOrdersBody">
                            
                    </tbody>
                    </table>
            </div>
            <div class="tab-pane" id="approved">
                    <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th >Order ID</th>
                                        <th >User ID</th>
                                        <th >Product Name</th>
                                        <th >Price</th>
                                        <th >Quantity</th>
                                        <th >Payment Status</th>
                                        <th >Order Date</th>
                                        <th >Send for shipping</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="approvedOrdersBody">
                                    
                                </tbody>
                    </table>
            </div>
            <div class="tab-pane" id="shipped">
            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th >Order ID</th>
                                        <th >User ID</th>
                                        <th >Product Name</th>
                                        <th >Price</th>
                                        <th >Quantity</th>
                                        <th >Payment Status</th>
                                        <th >Order Date</th>
                                        <th >Send for Delivery</th>
                                    </tr>
                                </thead>
                                <tbody id="shippedOrdersBody">
                                    
                                </tbody>
                    </table>
            </div>
            <div class="tab-pane" id="delivered">
                <ul class="nav nav-tabs nav-justified mt-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="#pendingOrders" onclick="getPendingOrders()" data-toggle="tab">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#deliveredOrders" onclick="getDeliveredOrders()" data-toggle="tab">Delivered</a>
                    </li>
                </ul>
                <div class="tab-content container mt-3">
                    <div class="tab-pane active" id="pendingOrders">
                        <table class="table table-bordered table-hover text-center ">
                                            <thead>
                                            <tr>
                                                <th >Order ID</th>
                                                <th >User ID</th>
                                                <th >Product Name</th>
                                                <th >Price</th>
                                                <th >Quantity</th>
                                                <th >Payment Status</th>
                                                <th >Order Date</th>
                                                <th >Delivery Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pendingOrdersBody">
                                            
                                        </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="deliveredOrders">
                        <table class="table table-bordered table-hover text-center ">
                                        <thead>
                                        <tr>
                                            <th >Order ID</th>
                                            <th >User ID</th>
                                            <th >Product Name</th>
                                            <th >Price</th>
                                            <th >Quantity</th>
                                            <th >Payment Status</th>
                                            <th >Order Date</th>
                                            <th >Delivery Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="deliveredOrdersBody">
                                        
                                    </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
            <div class="tab-pane" id="cancelled">
                <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th >Order ID</th>
                                <th >User ID</th>
                                <th >Product Name</th>
                                <th >Price</th>
                                <th >Quantity</th>
                                <th >Payment Status</th>
                                <th >Order Date</th>
                                <th >Orders Status</th>
                                
                            </tr>
                        </thead>
                        <tbody id="cancelledOrdersBody">
                            
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>  
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/newOrder.js"></script>
<script>
    $(".nav-link").removeClass("active");
    $("#navOrders").addClass("active");
</script>
</html>

<?php }
 else{
    header("Location:index.php");
}
?>