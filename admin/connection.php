<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "bookshelf";    
$con = mysqli_connect($host,$username,$password,$database);
if(mysqli_connect_error())
{
    echo "Connection error";
}

?>