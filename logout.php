<?php
session_start();
if(isset($_POST['logoutBtn'])|| isset($_GET['logoutBtn']) || isset($_GET['sessionExpired'])){
    session_destroy();
    $_SESSION= [];
    setcookie("bookshelfUserSessionID","",time()-1000,"/");
    setcookie("bookshelfUserType","",time()-1000,"/");
    setcookie("bookshelfUserID","",time()-1000,"/");
    include "connection.php";
    mysqli_query($con,"delete from user_sessions where sessionID='".$_COOKIE['bookshelfUserSessionID']."'");
    mysqli_close($con);
    header('Location:index.php');
}
else{
?>
<script>
    alert("You cannot logout. Please click on logout button to logout");
</script>
<?php
    //header('Location:homepage.php');
}
    
?>