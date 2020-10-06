<?php
session_start();
    if(isset($_SESSION['bookshelfAdminID']) && isset($_POST['cancelledOrdersBtn'])){
        include "../../connection.php";
        $query="Select orders.orderID,orderDate,orderedBy,orderStatus,paymentStatus,qty,bookName,price from orders,orderdetails,books,paymentdetails where orders.orderStatus = 'Cancelled' and orders.orderID=orderdetails.orderID and orderdetails.product=books.bookID and orders.orderID=paymentdetails.orderId ";
        $res = mysqli_query($con,$query);
        mysqli_close($con);
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
                <td><?php echo $rowOrders['orderStatus'] ?></td>
            </tr> 
        <?php
            }
        }
        else{
            ?>
        <tr>
            <td colspan=8><h5>There are no cancelled orders.</h5></td>
        </tr>

    <?php
        }
    }
    else{
        echo "<h4>Access Denied</h4>";
    }

?>