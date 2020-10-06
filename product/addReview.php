<?php
session_start();
include '../connection.php';
if(isset($_POST['reviewBtn'])){
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $bookID = $_POST['bookID'];
    $sessID = $_COOKIE['bookshelfUserSessionID'];
    $userEmail = mysqli_fetch_array(mysqli_query($con,"select sessionEmail from user_sessions where sessionID='$sessID'"))['sessionEmail'];
    $userID = mysqli_fetch_array(mysqli_query($con,"select userID from users where email='$userEmail'"))['userID'];    // $bookId = mysqli_fetch_array(mysqli_query($con,"select bookID from books where isbn='$isbn'"))['bookID'];
    $query="Insert into userReviews(userId,bookId,review,rating) values ($userID,$bookID,'$review','$rating')";
    $res =  mysqli_query($con,$query);
    if($res){
        echo "1";
    }
    else{
        echo "0";
    }
}
else{
    echo "Error Finding Page";
}
?>