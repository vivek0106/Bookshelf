<?php
$to_email=$_GET['email'];
$subject='Apnamarket reset password';
$token=$_GET['token'];
$body="<h3>Click on the link to reset password</h3><a href='localhost/apnamarket/resetPassword.php?token=$token&email=$to_email&action=resetpassword'>
        localhost/apnamarket/resetPassword.php?email=$to_email&action=resetpassword</a>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Apnamarket.in <apnamarket02@gmail.com>';
$status=mail($to_email,$subject,$body,$headers);

if($status){
    //echo($status);
    header('Location:verifyUser.php?mailsent=true');
}
else{
    header('Location:verifyUser.php?mailsent=false');
}

?>