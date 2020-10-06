<?php
session_start();
    if(isset(  $_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID']) && isset($_POST['removeBtn']) ){
        include "../connection.php";
        $bookID = $_POST['bookID'];
        $userID = $_COOKIE['bookshelfUserID'];
        $query="delete from cartdetails where productID=$bookID and userID=$userID";
        $res = mysqli_query($con,$query);
        if( $res){
            echo "1";
        }
        else{
            echo "0";
        }
    }
    else{
        echo "Access denied";
    }

?>