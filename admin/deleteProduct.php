<?php 
include "connection.php";
if(isset($_POST['deleteBtn'])){
    $isbn = $_POST['isbn'];
   if(mysqli_query($con,"delete from books where ISBN = '$isbn'")){
       echo "1";
   }
   else{
       echo "0";
   }
}
else{
    echo "Page cannot be Found";
}