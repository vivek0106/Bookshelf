<?php
session_start();
if(isset($_POST['adminLogoutBtn'])){
    session_destroy();
    $_SESSION=[];
    header('Location:index.php');
}
else{
    header('Location :admin.php');
}
?>
