<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheet" href="../styles/main/main.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">
    <title>Bookshelf.in | My Wishlist</title>
</head>
<body>
<?php 
   include "../shared/nav/nav.php";
?>
  <div class="container" style="min-height:60vh">
    <h4 class="pb-3 pt-5 font-weight-bold">My Wishlist</h4>
      <div class="row">
          <div class="col-sm-6">
              <?php
                include '../connection.php';
                $uid= $_COOKIE['bookshelfUserID'];
                $query="select * from books where bookID in (select productID from wishlist where userID=$uid)";
                $res=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($res)){?>
                    <div class="row mt-3">
                        <div class="col-sm-4 col-lg-3">
                            <img src="<?php echo $row['image']; ?>" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="font-weight-bold"><?php echo $row['bookName']; ?></h5>
                            <p>By - <?php echo $row['author']; ?> </p>
                            <p>Rating - <?php echo $row['rating'];?></p>
                            <p>Price - <?php echo $row['price'];?></p>
                            <button class="btn" onclick="removeFromWish(<?php echo $row['bookID']; ?>)" style="background-color:#7c6d6b; box-shadow:1px 1px 5px #523d3b; border-radius:8px;color:white; font-weight:600; font-size:0.8rem; padding:5px 14px">Remove <i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                <?php }
                ?>
          </div>
      </div>
  </div>  
  <?php require "../shared/footer/footer.php" ?>

</body>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../shared/nav/js/nav.js"></script>
  <script src="../cart/js/cart.js"></script>
  <script src="wishlist.js"></script>
<script>
$(".downArrow").click(function(){
    $(this).next().removeClass("d-none");
    $(this).addClass("d-none");
});
$(".upArrow").click(function(){
    $(this).parent().addClass("d-none");
    $(this).parent().prev().removeClass("d-none");
});
</script>
</html>