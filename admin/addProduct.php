<?php
//Error code
//0 : Query failed to execute
//1 : Successfully data saved
//2 : Add book button not clicked
include 'connection.php';
if(isset($_POST['addBook'])){
    $isbn=$_POST['isbn'];
    $bname=$_POST['bname'];
    $file_name=$_FILES['image']['name'];
    $temp_name=$_FILES['image']['tmp_name'];
    $img_dir="../uploadedBookImages/".$file_name;
    $genreId=$_POST['genreId'];
    $pages=$_POST['pages'];
    $author=$_POST['author'];
    $publication=$_POST['publication'];
    $year=$_POST['year'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $tags=$_POST['tag'];
    $stock=$_POST['quantity'];
    $featured=$_POST['featured'];
    $imgUploadStatus = move_uploaded_file($temp_name,$img_dir);
    $query="INSERT INTO books (ISBN,bookName,image,genre,pages,author,publication,yearOfPublish,descriptions,rating,price,tags,stock,featured) VALUES
            ('$isbn','$bname','$img_dir',$genreId,$pages,'$author','$publication','$year','$description',0,$price,'$tags',$stock,'$featured')";
    
    $res=mysqli_query($con,$query);

    if($res && $imgUploadStatus){
        echo '1';
    }
    else{
        echo '0';
    }
}
else{
    echo '2';
}
?>