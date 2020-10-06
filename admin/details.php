<?php 
session_start();
if(isset($_SESSION['bookshelfAdminID'])){
?>

<?php
include "connection.php";
$id = $_POST["bookID"];
$query = "select * from books INNER JOIN genres ON books.genre=genres.genreID where bookID= '$id'";
$res = mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$img = $row['image'];
$bookname=$row['bookName'];
$quantity=$row['stock'];
$isbn=$row['ISBN'];
$genre=$row['genreID'];
$pages=$row['pages'];
$author=$row['author'];
$publication=$row['publication'];
$publish=$row['yearOfPublish'];
$description=$row['descriptions'];
$rating=$row['rating'];
$price=$row['price'];
$tags = $row['tags'];
$response = " <form id='updateProductDetailsForm'><div class='row justify-content-center mt-4'>";
$response .= "<div class='col-6'><img src='$img' class='img-fluid'></div>";
$response .= "<div class='col-12 mt-3'>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Book Name : </label> <div class='col-sm-7'> <input type='text' value='$bookname' class='form-control' id='bname' name='bname'></div> <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='bnameIcon'></i> </span></div> </div>";
$response .= " <div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> ISBN : </label> <div class='col-sm-7'> <input type='text' value='$isbn' class='form-control' id='isbn' name='isbn'> </div><div class='col-2 p-0'></div></div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Genre ID : </label> <div class='col-sm-7 '><select name='genreId' class='form-control genreId' id='genreName' value='$genre'>";
$query = "select * from genres";
$res = mysqli_query($con,$query);
while($row = mysqli_fetch_array($res)){
    $temp =$row['genreID'];
    $genreName = $row['genreName'];
    if($genre == $temp){
        $response .= "<option value=$temp selected='true'>$genreName</option>";
    }
    else{
        $response .= "<option value=$temp>$genreName</option>";
    }
}
$response .= "</select></div>   <div class='col-2'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='genreIcon'></i> </span></div> </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> No. of Pages : </label> <div class='col-sm-7'> <input type='text' value='$pages' class='form-control' id='pages' name='pages'> </div> <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='pagesIcon'></i> </span></div>  </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Author Name : </label> <div class='col-sm-7'> <input type='text' value='$author' class='form-control' id='author' name='author'> </div> <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='authorIcon'></i> </span></div>  </div>";
$response .= " <div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Publication : </label> <div class='col-sm-7'> <input type='text' value='$publication' class='form-control' id='publication' name='publication'> </div> <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='publicationIcon'></i> </span></div>  </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Year of Publish : </label> <div class='col-sm-7'> <input type='text' value='$publish' class='form-control' id='publish' name='year'> </div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='publishIcon'></i> </span></div> </div>";
$response .= " <div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Description : </label> <div class='col-sm-7'> <input type='text' value='$description' class='form-control' id='description' name='description'> </div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='descriptionIcon'></i> </span></div> </div>";
$response .= " <div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Ratings (Out of 5) : </label> <div class='col-sm-7'> <input type='text' value='$rating' class='form-control' id='rating' name='rating'> </div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='ratingIcon'></i> </span></div> </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Price : </label> <div class='col-sm-7'> <input type='text' value='$price' class='form-control' id='price' name='price'> </div> <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='priceIcon'></i> </span></div>  </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Quantity : </label> <div class='col-sm-7'> <input type='text' value='$quantity' class='form-control' id='quantity' name='quantity'> </div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='quantityIcon'></i> </span></div> </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Featured : </label> <div class='col-sm-7'> <select class='form-control' name='featured' id='featured'><option value='no'>No</option><option value='yes'>Yes</option></select></div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='featuredIcon'></i> </span></div> </div>";
$response .= "<div class='form-group row justify-content-center align-items-center'> <label class='col-sm-3 col-form-label'> Tags : </label> <div class='col-sm-7'> <input type='text' value='$tags' class='form-control' id='tags' name='tags'> </div>  <div class='col-2 p-0'><span class='btn btn-outline-primary btn-sm mr-1'><i class='fa fa-edit' id='tags'></i> </span></div> </div>";
$response .= "<p class='updateError'></p>";
$response .= "<button class='btn btn-primary btn-block' name='edit' id='updateDetailsBtn' type='button'>UPDATE </button> </form>";
$response .= "<button class='btn btn-outline-danger btn-block mt-3 deleteProduct' name='deleteProduct' id='$id' type='button'>DELETE </button> </form>";
$response .="<script src='details.js'></script>";
echo $response;

// $new_ISBN=$_POST['isbn'];
// $new_bname=$_POST['bname'];
// $new_genre=$_POST['genreId'];
// $new_pages=$_POST['pages'];
// $new_author=$_POST['author'];
// $new_publication=$_POST['publication'];
// $new_publish=$_POST['publish'];
// $new_description=$_POST['description'];
// $new_rating=$_POST['rating'];
// $new_price=$_POST['price'];
// $new_quantity=$_POST['quantity'];
if(isset($_POST['edit'])){
    $query="UPDATE books SET ISBN='$new_ISBN', bookName='$new_bname', genre='$new_genre', pages='$new_pages', author='$new_author', publication='$new_publication', 
            yearOfPublish='$new_publish', descriptions='$new_description', rating='$new_rating', price='$new_price', stock='$new_quantity' where bookID='$id'";
    
    $res=mysqli_query($con,$query);
    echo 'Successful';
}
else{

}
mysqli_close($con);


?>



<?php
}
else{
    header("Location:index.php");
}

?>