<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/main/main.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheet" href="styles/search.css">
    <title>Bookshelf.in | Browse</title>
</head>
<body>
    <?php include "../shared/nav/nav.php";?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-2 offset-sm-1 mt-3">
                <h5>Filter Products</h5>
                <div class="genreList">
                    <h6 class="mt-5">Genre</h6>
                    <?php
                    include '../connection.php';
                        $query ="Select * from genres order by genreID ";
                        $res= mysqli_query($con,$query);?>
                        <form id="filterProductForm">
                            <?php while($row=mysqli_fetch_array($res)){?>
                                <div class="list-group-item checkbox">
                                        <label><input type="checkbox" class="filterByGenre" name="<?php echo $row['genreID']; ?>" value="<?php echo $row['genreID']; ?>"  id="<?php echo $row['genreID']; ?>"> <?php echo $row['genreName']; ?></label>
                                </div>
                            <?php }?>
                            <h6 class="mt-5">Price</h6>
                            <select name="price" id="filterByPrice" class="form-control">
                                <option value="0">None</option>
                                <option value="1">Below Rs.100</option>
                                <option value="2">100-200</option>
                                <option value="3">200-300</option>
                                <option value="4">Above Rs.300</option>
                            </select>
                            <button type="submit" class="btn btn-primary mt-2" name="filter">Apply</button>
                        </form>
                </div>
            </div>
            <div class="col-sm-8 col-lg-6 bookList">
                <?php
                include '../connection.php';
    
                    
                    $results_per_page = 10;             
                    
                    $page = 1;   
                    if(isset($_GET['searchText'])){
                        $search=$_GET['searchText'];
                        $search = mysqli_real_escape_string($con, $search);
                        $query="Select * from books where tags LIKE '%$search%'";
                        $url = "http://localhost/BookShelf/search/search.php?searchText=".$_GET['searchText'];
                        $resultFor = $search;
                    }
                    else if(isset($_GET['genre'])){
                        $search=$_GET['genre'];
                        $search = mysqli_real_escape_string($con, $search);
                        $query="Select * from books where genre = $search";
                        $resultFor = mysqli_fetch_array(mysqli_query($con,"select genreName from genres where genreID=$search"))['genreName'];
                        $url = "http://localhost/BookShelf/search/search.php?genre=".$_GET['genre'];
                    }
                    
                    $res=mysqli_query($con, $query);  
                    $number_of_result = mysqli_num_rows($res); 
                    $number_of_page = ceil ($number_of_result / $results_per_page); 
                    $count=mysqli_num_rows($res);
                    if($count==0){
                        echo "<p class='mt-4'>No results found for input - <span class='text-primary' style='font-size:1.3rem;text-decoration:underline; font-weight:500'>$search </span></p>";
                    }
                    else{
                        echo "<p class='mt-3' style='font-size:0.9rem'>Showing results for - <span class='text-primary' style='font-size:0.9rem;text-decoration:underline; font-weight:500'>$resultFor </span></p>";
                        if (isset ($_GET['page'])) {  
                            $page = $_GET['page'];  
                        }
                        $page_first_result = ($page-1) * $results_per_page;  
                        if(isset($_GET['searchText'])){
                            $query="Select * from books where tags LIKE '%$search%' order by bookID LIMIT ". $page_first_result .','. $results_per_page;
                        }
                        else if(isset($_GET['genre'])){
                            $query="Select * from books where  genre = $search order by bookID LIMIT ". $page_first_result .','. $results_per_page;
                        }
                        else{
                            $query="Select * from books LIMIT ". $page_first_result .','. $results_per_page;
                        }
                        $res=mysqli_query($con,$query); 
                        while($row=mysqli_fetch_array($res))
                        {
                            ?>
                            <div class="row mt-5">
                                <div class="col-4 col-sm-3">
                                    <img src="<?php echo $row['image']; ?>" class="img-fluid"/>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col product" onclick="callProduct( <?php echo $row['bookID']; ?>)">
                                            <h5 class="bname"><?php echo $row['bookName']; ?></h5>
                                            <h6 class="authorName">By- <?php echo $row['author']; ?></h6>
                                            <h5 class="mt-2">Price: &#x20B9; <?php echo $row['price']; ?></h5>
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

                ?>
            </div>
            
        </div>

        <div class="row page">
            <div class="col-sm-12">
                 <div class="row align-items-center">
                     <div class="col-sm-6 offset-sm-5">
                        
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="p-2">Pages</li>
                                <?php 
                                    if($page > 1){                                  
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php echo "$url&page=".$page-1;?>">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a></li>
                                <?php
                                    }
                                ?>
                                <?php
                                    for($i = 1; $i<= $number_of_page; $i++) {  ?>
                                        <li class="page-item <?php if($i == $page){echo "active";}?>"><a class="page-link" href="<?php echo "$url&page=".$i;?>"><?php echo $i; ?></a></li>
                                <?php
                                    }
                                    if ($page<$number_of_page){
                                ?>                                
                                <li class="page-item"> <a class="page-link" href="<?php echo "$url&page=".$page+1;?>">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a></li>
                                    <?php } ?>

                            </ul>
                        </nav>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <?php include "../shared/footer/footer.php";?>
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../shared/nav/js/nav.js"></script>
    <script src="js/search.js"></script>
    <script src="../cart/js/cart.js"></script>
</body>
</html>
<?php

?>