<?php
session_start();

//Error codes Meaning
//Code   ::   Meaning
//1  : Success
//0  : Failed to insert in database

if(isset($_POST['signupSubmitBtn'])){
    
include('connection.php');
        $firstname = ( $_POST['fname']);
        $lastname = ($_POST['lname']);
        $gender = ($_POST['gender']);
        $phone = ($_POST['contact']);
        $email = ($_POST['signupEmail']);
        $password = ($_POST['signupPass']);
        $address = ($_POST['address1']);
        $address = $address .", ". ($_POST['address2']);
        $address = $address .", ". ($_POST['city']);
        $pincode = ($_POST['pincode']);
        $date = date("Y-m-d");
        $query = "insert into users (type,fname,lname,gender,pass,email,phone,address,pincode,dt) values ('normal','$firstname', '$lastname' , '$gender','$password','$email', '$phone', '$address', '$pincode', '$date')";
        $res = mysqli_query($con, $query);
        if($res == true){
          echo "1";
        }
        else{
          echo  "0";
        }
    

}
else{
  echo "False Link";
  //header("Location:login.php");
}
?>
