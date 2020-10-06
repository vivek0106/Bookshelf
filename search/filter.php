<?php
include '../connection.php';
$genreID = array();
$genreCount = 0;
$price = 0;
if(isset($_POST['filter'])){
    if(isset($_GET['filterByGenre'])){
        $genreid = $_GET['filterByGenre'];
        $genreID =explode("-",$genreid);
        $genreCount=count($genreID);   
    }
    if(isset($_GET['filterByPrice'])){
        $price = $_GET['filterByPrice'];
    }
    $query = "select * from books where genre in (";
    for($i=0 ; $i < $genreCount; $i++){
        $query .= $genreID[$i].",";

    }
    $query =substr($query,0,-1);
    $query .= ")";
    // $query = substr($query,0,-6);
    // echo $query;
    if($price > 0){

       if($price == 1){
            $query .= " and price < 100"; 
       }
       elseif($price==2){
            $query .= " and price BETWEEN 100 and 200"; 
       }
       elseif($price==3){
            $query .= " and price BETWEEN 200 and 300";            
       }
       elseif($price==4){
        $query .= " and price >300";            
       }

    }
    $res=mysqli_query($con,$query);
    
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_array($res))
        {
            ?>
            <div class="row mt-4">
                <div class="col-4 col-sm-3">
                    <img src="<?php echo $row['image']; ?>" class="img-fluid"/>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col product" onclick="callProduct( <?php echo $row['bookID']; ?>)">
                            <h6 class="bname"><?php echo $row['bookName']; ?></h5>
                            <h6 class="authorName">By- <?php echo $row['author']; ?></h6>
                            <h6>Price: &#x20B9; <?php echo $row['price']; ?></h6>
                            <?php if($row['stock']>0){echo "<h6 class='text-success'>Available</h6>"; }else{echo "<h6 class='text-danger'>Out of Stock</h6>";} ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <button class="cartBtn mr-1" onclick="addToCart(<?php echo $row['bookID']; ?>,false)"> Add to <i class="fa fa-shopping-cart "></i></button> 
                        </div>
                    </div>
                
                </div>
            </div>
            
            <hr>
            
        <?php
        }
    }
    else{ ?>
        <h4 class="text-center">No Result Found</h4>

    <?php }
}
else{
    echo "Access Denied";
}
?>
