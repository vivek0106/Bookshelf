<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheet" href="../styles/main/main.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">
    <title>Bookshelf.in | My Orders</title>
</head>
<body>
<?php 
   include "../shared/nav/nav.php";
?>
  <div class="container" style="min-height:60vh">
    <h4 class="pb-3 pt-5 font-weight-bold">My Orders</h4>
      <div class="row">
          <div class="col-sm-6">
              <?php
                include '../connection.php';
                $uid= $_COOKIE['bookshelfUserID'];
                $query="Select fname,lname,orderStatus,orders.orderID,orders.totalAmount,orderDate,deliveryDate,qty,bookName,image,modeName,paymentStatus from orders,orderdetails,books,paymentdetails,paymentmode,users where orderedBy=$uid and orders.orderID=orderdetails.orderID and orderdetails.product=books.bookID and orders.orderID=paymentdetails.orderId and paymentmode.paymentModeID=paymentdetails.paymentMode and orders.orderedBy=users.userID";
                $res=mysqli_query($con,$query);
                mysqli_close($con);
                while($row=mysqli_fetch_array($res)){?>
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <img src="<?php echo $row['image']; ?>" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-weight-bold"><?php echo $row['bookName']; ?></h5>
                            <p class="m-0 p-1">Order Date: <?php echo date("d-m-Y",strtotime($row['orderDate'])); ?></p>
                            <p class="m-0 p-1">Total Amount: <?php echo $row['totalAmount']; ?></p>
                            <p class="m-0 p-1">Order Status: <?php echo $row['orderStatus']; ?></p>
                            <a href="#" class="downArrow"><i class="fa fa-angle-down"></i> More Details</a>
                            
                            <div class="moreDetails d-none">
                                <p class="m-0 p-1">Total Quantity: <?php echo $row['qty']; ?></p>
                                <p class="m-0 p-1">Delivery date: <?php echo date("d-m-Y",strtotime($row['deliveryDate'])); ?></p>
                               
                                <p class="m-0 p-1">Payment Status: <?php echo $row['paymentStatus']; ?></p>
                                <p class="m-0 p-1">Payment Mode: <?php echo $row['modeName']; ?></p>
                                <form action="pdf.php" method="post">
                                    <button class="btn btn-warning btn-sm mt-2 mb-2 font-weight-bold" type="submit" name="pdf" value="<?php echo $row['orderID'];?>">Get Invoice</button>
                                </form>                                
                                <a href="#" class="upArrow" ><i class="fa fa-angle-up"></i> Hide Details</a>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
          </div>
      </div>
  </div>  
  <?php require "../shared/footer/footer.php" ?>

</body>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../shared/nav/js/nav.js"></script>
  <script src="../cart/js/cart.js"></script>
<script>
$(".downArrow").click(function(){
    $(this).next().removeClass("d-none");
    $(this).addClass("d-none");
});
$(".upArrow").click(function(){
    $(this).parent().addClass("d-none");
    $(this).parent().prev().removeClass("d-none");
});
</script>
</html>