<?php
    session_start();
    if(isset(  $_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID'])){
        include "../connection.php";
        $pid = $_POST['pid'];
        $qty = $_POST['qty'];
        $uid = $_COOKIE['bookshelfUserID'];
        $query = "update cartdetails set qty=$qty where productID=$pid and userID=$uid";
        if(mysqli_query($con,$query)){
            echo "1";
        }
        else{
            echo "0";
        }
    }
    else{
        echo "Access Denied";
    }
?>