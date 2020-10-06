<?php
include 'connection.php';
if(isset($_POST['updateDetailsBtn'])){
    $isbn=$_POST['isbn'];
    $bname=$_POST['bname'];
    $genreId=$_POST['genreId'];
    $pages=$_POST['pages'];
    $author=$_POST['author'];
    $publication=$_POST['publication'];
    $year=$_POST['year'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $tags=$_POST['tags'];
    $stock=$_POST['quantity'];
    $featured=$_POST['featured'];
    //echo " $isbn $bname $genreId $pages $author $price";
    $query="update books set bookName = '$bname', genre = $genreId , pages = $pages , author = '$author' ,
            publication = '$publication' , yearOfPublish = '$year', descriptions = '$description' ,price = '$price' , tags = '$tags', stock = $stock, 
            featured = '$featured' where ISBN = '$isbn'";
    $res = mysqli_query($con,$query);
    if($res){
        //update successful
        echo "1";
    }
    else{
        //update failed
        echo "0";
    }
}
else{
    echo "Page connot be found";
}

?>
