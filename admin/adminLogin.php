<?php
session_start();
include 'connection.php';
if(isset($_POST['adminLoginBtn'])){
    $email=$_POST['adminEmail'];
    $password=$_POST['adminPassword'];
    $query="Select * from admin where email='$email' and pass='$password'";
    $res=mysqli_query($con,$query);
    mysqli_close($con);
    if(mysqli_num_rows($res)>0){
        echo "1";
        $row=mysqli_fetch_array($res);
        $_SESSION['bookshelfAdminID']=$row['adminID'];
        //echo $_SESSION['bookshelfAdminID'];
    }
    else{
        echo "0";
    }
}
else{
    echo "2";
}
?>