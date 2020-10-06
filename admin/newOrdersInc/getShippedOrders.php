<?php
session_start();
    if(isset($_SESSION['bookshelfAdminID']) && isset($_POST['shippedOrdersBtn'])){
        include "../../connection.php";
        $query="Select orders.orderID,orderDate,orderedBy,paymentStatus,qty,bookName,price from orders,orderdetails,books,paymentdetails where orders.orderStatus = 'Shipped' and orders.orderID=orderdetails.orderID and orderdetails.product=books.bookID and orders.orderID=paymentdetails.orderId ";
        $res = mysqli_query($con,$query);
        mysqli_close($con);
        $response="";
        if(mysqli_num_rows($res)>0){
            while($rowOrders = mysqli_fetch_array($res)){
            ?>
             <tr>
                <td><?php echo $rowOrders['orderID'] ?></td>
                <td><?php echo $rowOrders['orderedBy'] ?></td>
                <td><?php echo $rowOrders['bookName'] ?></td>
                <td><?php echo $rowOrders['price'] ?></td>
                <td><?php echo $rowOrders['qty'] ?></td>
                <td><?php echo $rowOrders['paymentStatus'] ?></td>
                <td><?php echo date("d-m-Y",strtotime($rowOrders['orderDate'])); ?></td>
                <td>
                    <button class="btn btn-success accept btn-sm mr-2" onclick="sendForDelivery('<?php echo $rowOrders['orderID'] ?>')"> <i class="fa fa-check fa-lg m-1"></i> </button>
                    <button class="btn btn-danger cancel btn-sm" onclick="cancel('<?php echo $rowOrders['orderID'] ?>')"> <i class="fa fa-times fa-lg m-1"></i> </button>
                </td>
            </tr> 
        <?php
            }
        }
        else{
            ?>
        <tr>
            <td colspan=8><h5>No new Orders pending for Shipping</h5></td>
        </tr>

    <?php
        }
    }
    else{
        echo "<h4>Access Denied</h4>";
    }

?>