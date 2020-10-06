<?php
session_start(); 
if(isset($_GET['code'])){
    require 'connection.php';
    require 'googleLogin/config.php';
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token']=$token;
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();
    $_SESSION['last_name']=$userData["family_name"];
    $_SESSION['first_name']=$userData["given_name"];
    $_SESSION['email']=$userData["email"];
    $_SESSION['gid']=$userData["id"];
    $_SESSION['user']="google";
    $query="select * from googleuser where googleID='".$_SESSION['gid']."'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)){
        // "Already user exists with the same email. Updating database not required";
        $_SESSION['bookshelfUserType']="google";
        $_SESSION['bookshelfUserSessionID'] = $_SESSION['gid'];  
       mysqli_close($con);
       header("Location: home/");
       
    }
    else{
        echo "update database";
        $date = date("Y-m-d H:i:s",time());
        $query="insert into googleuser (googleID,fname,lname,email,dt) values (".$_SESSION['gid'].",'".$_SESSION['first_name']."','".$_SESSION['last_name']."','".$_SESSION['email']."','$date')";
        $res=mysqli_query($con,$query);
        mysqli_close($con);
        if($res){
            $_SESSION['bookshelfUserType']="google";
            $_SESSION['bookshelfUserSessionID'] = $_SESSION['gid']; 
            header("Location: home/index.php");
        }
        else{
            //"Insert Failed";
            echo "<h3>Errors Encountered</h3>";
        }   
    }
   
}