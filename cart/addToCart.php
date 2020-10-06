<?php
session_start();
    if(isset(  $_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID']) && isset($_POST['cartBtn']) ){
        include "../connection.php";
        $bookID = $_POST['bookID'];
         $userID = $_COOKIE['bookshelfUserID'];
        $query="select * from cartdetails where userID=$userID and productID=$bookID";
        $res = mysqli_query($con,$query);
        if( mysqli_num_rows($res) > 0){
            echo "2";
        }
        else{
            
            $query = "insert into cartdetails(userID,productID,qty) values ($userID,$bookID,1)";
            $res=mysqli_query($con,$query);
            if($res){
                echo "1";
            }
            else{
                echo "0";
            }
        }
        
    }
    else{
        echo "Access denied";
    }

?>