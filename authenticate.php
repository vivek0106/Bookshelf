<?php
session_start();
include('connection.php');
if($con){  
if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = "SELECT * FROM users WHERE email='$email' and pass='$password'";
    $run = mysqli_query($con,$query);  

    if(mysqli_num_rows($run) >0)
    {   $temp = bin2hex(random_bytes(10));
        $date = date("Y-m-d H:i:s",time());
                   
            $res = mysqli_query($con,"insert into user_sessions(sessionID,sessionEmail,sessionStartTime) values ('$temp','$email','$date')");
            mysqli_close($con);
            if($res){
                //insert into session logs table successful
                if($_POST['rememberme'] == 'checked'){
                    $uid = mysqli_fetch_array($run)['userID'];
                    //set a cookie with a session_log id on client side]
                    setcookie("bookshelfUserSessionID",$temp,time()+86400*30,"/");
                    setcookie("bookshelfUserType","normal",time()+86400*30,"/");
                    setcookie("bookshelfUserID",$uid,time()+86400*30,"/");
                }
            }
            else{
                //insert in session_logs table failed
                echo "0";
            }
        // do not remember the user just redirect to home page do not create any cookies, create sessions on client side
        $uid = mysqli_fetch_array($run)['userID'];
        $_SESSION['bookshelfUserType']="normal";
        $_SESSION['bookshelfUserSessionID'] = $temp;
        $_SESSION['bookshelfUserID']=$uid;  
        echo "success";
    }    
    else{   
        echo "Invalid username or password";
    }

}
else{
    echo "Unknown Error";
}

}
else{
    echo "Connection Error";
}


?>