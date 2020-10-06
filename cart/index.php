<?php
session_Start();
    if( isset($_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID'])){
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bookshelf | Your Cart</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/main/main.css">
        <link rel="stylesheet" href="../shared/nav/styles/nav.css">
        <link rel="stylesheet" href="../shared/footer/styles/footer.css">
        <link rel="stylesheet" href="styles/cart.css">
    </head>
    <body>
    <?php require "../shared/nav/nav.php"?>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3 class="font-weight-bold mt-4">
                    My Shopping Cart
                </h3>
            </div>
        </div>
        <?php 
            include "../connection.php";
            $query = "select productID from cartdetails where userID=".$_COOKIE['bookshelfUserID'];
            $res = mysqli_query($con,$query);
            if(mysqli_num_rows($res) > 0){
                $totalAmt="";
                ?>
                <div class="row" style="min-height:70vh">
                <div class="col-sm-6">
                <?php
                while($row = mysqli_fetch_array($res)){
                    $query2= "select * from books where bookID=".$row['productID'];
                    $res2=mysqli_query($con,$query2);
                    $row2=mysqli_fetch_array($res2);
                    if(mysqli_num_rows($res2) > 0){
                        ?>
                        <div class="row mt-3 pt-3 pb-3">
                            <div class="col-3 col-sm-3 ">
                                <img src="<?php echo $row2['image']?>" alt="img" class='img-fluid'>
                            </div>
                            <div class="col-6 col-sm-6 cartItem">
                                <h6><strong><?php echo $row2['bookName']?></strong></h6>
                                <p>By- <?php echo $row2['author']?></p>
                                <p>Price : <?php echo $row2['price']?></p>
                                <p>Qty: <input type="number" value="1" min=1 max=<?php echo $row2['stock']?> id="<?php echo $row['productID']?>" style='width:3rem;height:1.6rem;' class='qty'> </p>
                                <button class="btn" onclick="removeFromCart(<?php echo $row['productID']?>)" style="background-color:#7c6d6b; box-shadow:1px 1px 5px #523d3b; border-radius:8px;color:white; font-weight:600; font-size:0.8rem; padding:5px 14px">Remove <i class="fa fa-trash"></i></button>
                            </div>
                        </div>


                        <?php
                    }
                }

                ?>
                </div>
                <div class="col-sm-6 p-4">
                    <h5 class="font-weight-bold pt-3 pb-3">Checkout</h5>
                    <?php
                        $query = "select productID from cartdetails where userID=".$_COOKIE['bookshelfUserID'];
                        $res = mysqli_query($con,$query);
                        if(mysqli_num_rows($res) > 0){
                            ?>
                            <table class="table table-striped">
                                <tr>
                                    <th>Products</th>                                    
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                <?php
                                    while($row = mysqli_fetch_array($res)){                                        
                                        $query2= "select * from books where bookID=".$row['productID'];
                                        $res2=mysqli_query($con,$query2);
                                        $row2=mysqli_fetch_array($res2);
                                        if(mysqli_num_rows($res2) > 0){
                                        ?>
                                            <tr>
                                                <td><?php echo $row2["bookName"];?></td>                                                
                                                <td class="checkoutPrice"><?php echo $row2["price"];?></td>
                                                <td class="checkoutQty">1</td>
                                                <td class="total"></td>
                                            </tr>

                                        <?php
                                        }
                                    }
                                ?>
                                <tr style="background-color:#ccc690; color:#333A56">
                                    <th>Total Cart Amount</th>
                                    <th></th>
                                    <th></th>
                                    <th class="cartAmt"></th>
                                </tr>
                            </table>
                            <p style="0.8rem;padding:15px 0px">Note: Please update all your personal information like address and email before placing the order</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-4"> <label for="paymentMode" style="display:inline">Payment Mode</label></div>
                                        <div class="col-8"><select name="paymentMode" class="form-control" id="paymentMode"> <option value="COD">COD </option> <option value="Online">Online</option></select></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <button class="btn btn-block placeOrderBtn" onclick="placeOrder()">Place Order</button>
                                    <form action="http://localhost/BookShelf/razorpay/pay.php" method="post">
                                        <input type="number" class="d-none" value="" id="hiddenTotalAmt" name="totalAmt">
                                        <button class="btn btn-block d-none payNowBtn"> Checkout</button>
                                    </form>
                                </div>
                            </div>
                            
                            <?php
                        }
                        else{
                            echo "Nothing to checkout";
                        }


                    ?>

                </div>
                </div>
                <?php
            }
            else{
                ?>

                <div class="row justify-content-center mt-5" style="min-height:50vh">
                    <div class="col-auto">
                        <h4 class="font-weight-bold">Cart Empty</h4>
                    </div>
                </div>
            <?php
            }
        ?>
    </div>

    <?php require "../shared/footer/footer.php"?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../shared/nav/js/nav.js"></script>
    <script src=js/cart.js></script>
    </body>
    </html>

    <?php
    }
    else{
        echo "access denied";
    }

?>