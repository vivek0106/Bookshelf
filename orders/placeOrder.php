<?php
    include "../connection.php";
    if(isset($_POST['paymentMode'])){
        $uid = $_POST['uid'];
        $totalAmt = $_POST['totalAmt'];
        $oid = rand(999999,99999999);
        $pid = "VAS".rand(100000,1000000);
        $query = "insert into orders(orderID,orderedBy,orderStatus,totalAmount) values ('$oid',$uid,'Ordered',$totalAmt)";
        $res = mysqli_query($con,$query);
        $query = "select * from cartdetails where userID = $uid";
        $res = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($res)){
            $pid =$row['productID'];
            $qty = $row['qty'];
            $query2 = "insert into orderdetails(orderID,product,qty) values ('$oid',$pid,$qty)";
            mysqli_query($con,$query2);        
        }
        mysqli_query($con,"delete from cartdetails where userID=$uid");
        if($_POST['paymentMode']=="COD"){
            mysqli_query($con,"insert into paymentdetails values('$pid',1,'$oid','Pending',$totalAmt)");
        }
        else if($_POST['paymentMode']=="Online"){
            mysqli_query($con,"insert into paymentdetails values('$pid',2,'$oid','Success',$totalAmt)");
        }
       
        echo "1";
    }
?>