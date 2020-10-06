
<?php
session_Start();
  if(isset(  $_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID']) && isset($_POST['getCartCount']) ){
    include "../connection.php";
    $res = mysqli_query($con,"select count(*) as count from cartdetails where userID=".$_COOKIE['bookshelfUserID']);
            if(mysqli_num_rows($res) > 0 ){
                $count = mysqli_fetch_array($res)['count'];
                echo $count;
            }
    }
    else{
        echo "ACCESS DENIED";
    }
?>