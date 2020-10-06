<?php 
    include "connection.php";
    $str= $_POST['str'];
    $token = hash("sha256",$str);
    $query = "select * from reset_tokens where token ='$token'";
    $res = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($res);
    $createdOn = $row['createdon'];
    $diff =  (time() - strtotime($createdOn)) / 60;
    if($diff <= 10){
        if(mysqli_num_rows($res)){
            //token found
            if( $row['token'] == $token){
                //token matched
                $email = $row['email'];
                $pwd = $_POST['newPass'];
                $query = "update users set pass='$pwd' where email='$email'";
                if(mysqli_query($con,$query)){
                    //password updated 
                    echo "1";
                }
                else{
                    //password update failed
                    echo "0";
                }
            }
            else{
                //token different in database
                echo "3";
            }        
        } 
        else{
            //token not found
            echo "2";
        }
    }
    else{
        echo "4";
    }
?>