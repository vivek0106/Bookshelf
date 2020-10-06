<?php
include('connection.php');
function token($str){   
    $key = hash("sha256", $str);     
    return $key;
}
if(isset($_POST['forgotPass'])){  
        $str = bin2hex(random_bytes(100));   
        $email = $_POST['email'];
        $query = "SELECT email FROM users WHERE email='$email'";
        $res = mysqli_query($con,$query);
        if(mysqli_num_rows($res)){
            
            $token=token($str);
            $dt = date("Y-m-d H:i:s");
               //email to user
               //below are the contents to be sent
               $subject='BookShelf reset password';
               $body="  <h1>Bookshelf.in</h1>
                        <h3>This email is in response of your password reset request. Please click on the link given below to reset your password</h3><a href='localhost/BookShelf/newPass.php?str=$str&action=resetpassword'>
                        Reset Password Link</a>
                        <p>Thanks,<br>The bookshelf.in team</p>";
               $headers = "MIME-Version: 1.0" . "\r\n";
               $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
               $headers .= 'From: Bookshelf.in <resetpassword.bookshelf.in>';
               $status=mail($email,$subject,$body,$headers);               
               if($status){
                   //email sent
                    $res2=mysqli_query($con, "insert into reset_tokens(email,token,createdon) values('$email','$token','$dt')");
                    if($res2){
                        //token set                        
                        echo "1";
                    }
                    else{
                        //token not set
                        echo "2";
                    }
               }
               else{
                   //email failed
                   echo "0";
               }
        }
              
        else{   
            //account not found            
            echo "3";                     
        }   
        mysqli_close($con);
        exit();   
}
else if(isset($_POST["checkEmailPhone"])){
    $email = $_POST['checkEmail'];
    $phone = $_POST['checkPhone'];
    $query = "select fname from users where email='$email'";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res)){
        echo "1";
    }
    $query = "select fname from users where phone='$phone'";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res)){
        echo "2";
    }
    mysqli_close($con);
    exit();    
}
else{
    header("Location:login.php");
    mysqli_close($con);
    exit(); 
}
?>


