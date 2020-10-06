<?php
include 'connection.php';
if(isset($_POST['contactUs']))
{
    
    $email = $_POST['conemail'];
    $subject='BookShelf.in';
    $body="  <h1>Bookshelf.in</h1>
            <h3>Our team will contact with you soon.</h3>
            <p>Thanks,<br>Bookshelf.in team</p>";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Bookshelf User  <customerReply.bookshelf.in>';
    $status=mail($email,$subject,$body,$headers); 
 
    $email2 = 'shantanu.tripathi@xaviers.edu.in';
    $userName=$_POST['conname'];
    $userEmail=$_POST['conemail'];
    $userMessage=$_POST['message'];
    $subject2='BookShelf.in User Message';
    $body2="<h1>Bookshelf.in</h1>
            <h3>Username : $userName</h3>
            <h3>Email : $userEmail</h3>
            <h3>Message : $userMessage</h3>
            <p>Thanks,<br> Bookshelf.in</p>";
    $headers2 = "MIME-Version: 1.0" . "\r\n";
    $headers2 .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers2 .= 'From: Bookshelf Admin  <admin.bookshelf.in>';
    $status2=mail($email2,$subject2,$body2,$headers2); 
    if($status && $status2){
        echo "1";
    }
    else{
        echo "2";
    }
}
  else{
    echo "0";
  }
?>