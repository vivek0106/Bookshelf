<?php
    session_start();
    if(isset($_SESSION['bookshelfAdminID'])){
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="styles/adminnav.css">
    <title>Bookshelf.in | Admin</title>
</head>
<body>
    <?php include "nav.php" ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-7 offset-sm-1 bookList">
                <?php
                   include 'connection.php';
                   $results_per_page = 10;  
                   $query1="select * from books";
                   $result=mysqli_query($con, $query1);  
                   $number_of_result = mysqli_num_rows($result); 
                   $number_of_page = ceil ($number_of_result / $results_per_page); 
                   $page = 1;   
                   if (isset ($_GET['page']) ) {  
                        $page = $_GET['page'];  
                    }
                   
                    $page_first_result = ($page-1) * $results_per_page;  
                    $query="Select * from books LIMIT ". $page_first_result .','. $results_per_page;
                    $res=mysqli_query($con,$query); 
                    while($row=mysqli_fetch_array($res)){
                       ?>
                       <div class="row mt-4" >
                           <div class="col-sm-3">
                                <img src="<?php echo $row['image']; ?>" class="img-fluid"/>
                           </div>
                           <div class="col-sm-8">
                              <h5 >Name : <?php echo $row['bookName']; ?></h5>
                              <br>
                               <h6>Author: <?php echo $row['author']; ?></h6>
                               <h6>ISBN: <?php echo $row['ISBN']; ?></h6>
                                <h6>Price: <?php echo $row['price']; ?></h6>
                                <h5>Quantity : <?php echo $row['stock']; ?></h5>
                                <br>
                                <button class="btn btn-secondary bookItem" id="<?php echo $row['bookID']; ?>">Details</button>
                            </div>
                       </div>
                       <hr>
                   <?php
                   }
                   ?>
                
            </div>
            <div class="col-sm-3 ml-2 mr-2" id="bookDetails"> 
                <div class="d-flex justify-content-center">  
                    <div class="spinner-border m-5 hide"></div>
                </div>
            </div>
        </div>
        <div class="row page">
            <div class="col-sm-8">
                 <div class="row justify-content-center align-items-center">
                     <div class="col-sm-6">
                        
                        <nav aria-label="Page navigation example">
                           
                            <ul class="pagination">
                                <li class="p-2">Pages</li>
                                <?php 
                                    if($page > 1){                                  
                                ?>
                                <li class="page-item"><a class="page-link" href="admin.php?page=<?php echo $page-1; ?>">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a></li>
                                <?php
                                    }
                                ?>
                                <?php
                                    for($i = 1; $i<= $number_of_page; $i++) {  ?>
                                        <li class="page-item <?php if($i == $page){echo "active";}?>"><a class="page-link" href="admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php
                                    }
                                    if ($page<$number_of_page){
                                ?>                                
                                <li class="page-item"> <a class="page-link" href="admin.php?page=<?php echo $page+1; ?>">
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
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin.js"></script>
</body>
</html>


<?php
    }
    else{
        header("Location:index.php");
    }

?>