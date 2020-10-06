<?php
session_start();
    if(isset($_SESSION['bookshelfAdminID']) && isset($_POST['cancelBtn'])){
        include "../../connection.php";
        $orderID= $_POST['orderID'];
        $query = "update orders set orderStatus='Cancelled' where orderID='$orderID'";
        $query2 ="update paymentdetails set paymentStatus='Refund Initiated' where orderId='$orderID'";
        $res =  mysqli_query($con,$query);
        $res2 = mysqli_query($con,$query2);
        mysqli_close($con);
        if($res && $res2){
            echo "1"; //order status updated
        }
        else{
            echo "0"; //failed to update order status
        }

    }
    else{
        echo "<h4>Access Denied</h4>";
    }


?>