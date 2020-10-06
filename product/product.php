<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">    
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheet" href="styles/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <title>Bookshelf | Product Details</title>
</head>
<body>
    <?php require "../shared/nav/nav.php";?>
    <div class="container">
        <div class="row justify-content-center">
        <?php 
            include '../connection.php';
            $bookId= $_GET['id'];
            //$isbn= 'B0727XB6YC';
            $query="select * from books INNER JOIN genres ON books.genre=genres.genreID where bookID= '$bookId'";
            $query2 = "select avg(rating) as avg from userReviews where bookID=(select bookID from books where bookID='$bookId')";
            $res=mysqli_query($con,$query);
            $res2=mysqli_query($con,$query2);
            $avgRating = mysqli_fetch_array($res2)['avg'];
            while($row=mysqli_fetch_array($res))
            {
        ?>
            <div class="col-7 col-sm-4 mt-5">
                <img src="<?php echo $row['image']; ?>" class="img-fluid">
            </div>
            <div class="col-10 col-sm-6 mt-5">
                <div class="row">
                    <table>
                        <tr>
                            <td colspan=2>
                                <h3 style="font-weight:600; display:inline"><?php echo $row['bookName']; ?></h3> &nbsp;&nbsp;<p style="display:inline"> by <?php echo $row['author']; ?></p>
                               
                            </td>
                        </tr>
                        <tr>
                            <td>ISBN:</td>
                            <td><?php echo $row['ISBN']; ?></td>
                        </tr>
                        <tr>
                            <td>Rating: </td>
                            <td><?php echo round($avgRating,1);?></td>
                        </tr>
                        <tr>
                            <td>Genre:</td>
                            <td><?php echo $row['genreName']; ?></td>
                        </tr>
                        <tr>
                            <td>No. of pages:</td>
                            <td><?php echo $row['pages']; ?></td>
                        </tr>
                        <tr>
                            <td>Published in year:</td>
                            <td><?php echo $row['yearOfPublish']; ?></td>
                        </tr>
                        <tr>
                            <td>Publication: </td>
                            <td><?php echo $row['publication']; ?></td>
                        </tr>
                        <tr>
                            <td>Description: </td>
                            <td>
                                <p class="desc d-none" id="full"><?php echo $row['descriptions']; ?></p>
                                <p class="showDesc" id="short"></p> 
                                <a href="#" id="more" class="text-primary">Show More</a>
                                <a href="#" id="less" class="text-primary d-none">Show Less</a>
                            </td>
                        </tr>
                        <tr style="font-weight:600">
                            <td  style="font-size:1.1rem">Price: </td>
                            <td  style="font-size:1.1rem">₹   
                                <?php echo $row['price']; ?>&nbsp;&nbsp;&nbsp;
                                <span class="text-success" id="inStock">In Stock</span>
                                <span class="text-danger d-none" id="outStock">Out of Stock</span>
                                <p class="stock d-none"><?php echo $row['stock']; ?></p>
                            </td>
                        </tr>
                        <tr class="justify-content-center">
                            <td colspan=2>
                                <button type="button" class="buyNowBtn" onclick="addToCart(<?php echo $_GET['id']; ?>,true)">Buy Now</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="addToCartBtn mr-2" onclick="addToCart(<?php echo $_GET['id']; ?>,false)">Add to Cart</button>
                                <button type="button" class="wishlistBtn" onclick="addToWish(<?php echo $_GET['id']; ?>)"><i class="fa fa-heart fa-lg"></i></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php }?>
        </div>
       <div class="row reviewSection">
            <?php
              $query="select reviewID,fname,lname,userReviews.rating,review from users,userReviews,books where books.bookID=$bookId and users.userID=userReviews.userId and books.bookID=userReviews.bookId order by addedOn ";
              $res=mysqli_query($con,$query);
              ?>
                <div class="col-sm-5 mt-2 mb-4 userReviewWrapper" >
                <h5 style="font-weight:600; padding:10px 0px">Customer Reviews and Ratings</h5>
                <?php 
                if(mysqli_num_rows($res)> 0){
                    while($row=mysqli_fetch_array($res))
              {?>                   
                    <div class="row userReview">
                        <div class="col-sm-auto">
                            <h6 style="font-weight:500; font-size:0.8rem"><i class="fa fa-user fa-sm"></i>&nbsp;<?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname'];?></h6>
                        </div>
                        <div class="col-sm-4 d-flex align-items-center">
                            <div id="setRating<?php echo $row['reviewID']?>"  data-rateyo-read-only="true" data-rateyo-star-width="12px"></div>                         
                        </div>
                        <div class="col-sm-8">
                            <p style="font-weight:600; font-size:0.9rem"><?php echo $row['review'];?></p>
                        </div>
                    </div>
                    <script>
                        var elem = "#setRating"+<?php echo $row['reviewID']?>;
                        console.log(elem);
                        $(elem).rateYo({rating : <?php echo $row['rating']?>});
                    </script>

                    
              <?php }
              }
                else{
                    echo "<h6 style='font-weight:500; font-size:0.8rem'>No reviews found for this book</h6>";
                }  
                ?>
                </div>
              <div class="col-11 col-sm-5 mt-2 mb-4 reviewForm">
                  <h5 style="font-weight:600;padding:5px" class="mt-3">Your review</h5>
                  <form id="reviewForm">
                        <textarea name="review" id="" cols="30" rows="4" class="form-control mt-4" placeholder="Review" required></textarea>
                        <div class="mt-3"> <span style="padding:5px; font-weight:600; font-size:0.9rem">Rating</span> <div  style="padding-top:5px;padding-bottom:15px" id="rateYo" data-rateyo-star-width="17px" data-rateyo-normal-fill="#bfbfbf"></div></div>
                        <input type="hidden" class="form-control mt-3 ed" placeholder="Rating" name="rating" required>
                        <button type="submit" class="reviewBtn mt-2" name="reviewBtn">Submit</button>
                  </form>
             </div>
       </div>
    </div>
    <?php require "../shared/footer/footer.php";?>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../shared/nav/js/nav.js"></script>
    <script src="review.js"></script>
    <script src="../cart/js/cart.js"></script>
    <script src="../wishlist/wishlist.js"></script>
    <script>
        var add = "...";
        var desc = $(".desc").text();
        var stock = $(".stock").text();
        var showDesc = desc.substr(0,150).concat(add);
        $(".showDesc").html(showDesc);
        $(document).ready(function(){
            if(stock == 0){
                $("#inStock").addClass("d-none");
                $("#outStock").removeClass("d-none");
            }
            $("#more").click(function(){
                $(this).addClass("d-none");
                $("#short").addClass("d-none");
                $("#full").removeClass("d-none");
                $("#less").removeClass("d-none");
            });
            $("#less").click(function(){
                $(this).addClass("d-none");
                $("#more").removeClass("d-none");
                $("#short").removeClass("d-none");
                $("#full").addClass("d-none");
            });
        });
        $(function () {$("#rateYo").rateYo({rating: 0,halfStar: true});});
        $(function(){
            $("#rateYo").rateYo().on("rateyo.change",function(e,data){
                var rate=data.rating;
                $(this).next().text(rate);
                $(".ed").val(rate);
            });
        });
    </script>
 
</body>
</html>