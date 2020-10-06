<?php
session_start();
    if(isset($_SESSION['bookshelfAdminID']) && isset($_POST['shipBtn'])){
        include "../../connection.php";
        $orderID= $_POST['orderID'];
        $query="update orders set orderStatus='Shipped' where orderID='$orderID'";
        $res =  mysqli_query($con,$query);
        mysqli_close($con);
        if($res){
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