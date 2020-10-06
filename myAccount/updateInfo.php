<?php
session_start();
    if(isset(  $_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID']) && isset($_POST['saveBtn']) ){
        $email = $_POST['email'];
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $gender= $_POST['gender'];
        $address= $_POST['address'];
        $postalCode=$_POST['code'];
        $number = $_POST['number'];
        $id = $_COOKIE['bookshelfUserID'];
        $query = "update users set fname='$fname',lname='$lname',email='$email',gender='$gender',address='$address',pincode='$postalCode',phone='$number' where userID=$id";
        include "../connection.php";
        $res = mysqli_query($con,$query);
        if($res){
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