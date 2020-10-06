<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheel" href="../styles/main/main.css">
    <title>Bookshelf | Home</title>
</head>
<body>
<?php
  include "../connection.php";
  if(isset($_COOKIE['bookshelfUserSessionID']) || isset($_SESSION['bookshelfUserSessionID'])){
    $query = "select * from user_sessions where sessionID ='".$_COOKIE['bookshelfUserSessionID']."'";
    $res = mysqli_query($con,$query);
    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_array($res);
        $createdOn = $row['sessionStartTime'];
        $diff =  (((time() - strtotime($createdOn)) / 60)/60)/24;
        if($diff > 30){
          header("Location: ../logout.php");
        }
        else{
              $res= mysqli_query($con,"update user_sessions set sessionStartTime='".date("Y-m-d H:i:s",time())."' where sessionID='".$_COOKIE['bookshelfUserSessionID']."'");
              require "../shared/nav/nav.php";
            ?>
              <div class="div" id="content">
            <?php
                require "home.php";
              ?>
              </div>
              
              <?php
                require "../shared/footer/footer.php";
              ?>
                 
              <script src="../node_modules/jquery/dist/jquery.min.js"></script>
              <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>  
              <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
              <script src="js/home.js"></script>
              <script src="../shared/nav/js/nav.js"></script>
              <script src="../cart/js/cart.js"></script>
              </body>
              </html>
              <?php
        }
    }
    else{
      echo "user not found";
    }
  }
  else{
    require "../shared/nav/nav.php";
            ?>
              <div class="div" id="content">
            <?php
                require "home.php";
              ?>
              </div>
              
              <?php
                require "../shared/footer/footer.php";
              ?>
                 
              <script src="../node_modules/jquery/dist/jquery.min.js"></script>
              <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>  
              <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>  
              <script src="js/home.js"></script>
              <script src="../shared/nav/js/nav.js"></script>              
              <script src="../cart/js/cart1.js"></script>
              </body>
              </html>
              <?php 
  }
?>

