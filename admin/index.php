<?php 
    session_start();
    if(isset($_SESSION['bookshelfAdminID'])){
        header("Location:admin.php");
    }
    else{
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheel" href="../styles/main/main.css">
    <link rel="stylesheet" href="../styles/login/login.css">
    <title>BookShelf | Admin</title>
</head>
<body>
<div class="div" id="content">
    <div class="row justify-content-center ">
        <div class="col-10 col-sm-6 col-md-5 col-lg-4 loginForm">
                            <h2 class="font-weight-bold text-white text-center" style="display:inline;">Bookshelf.in </h2><span class="text-white">Admin</span>
                            <form method="post" id="adminForm">
                                <div class="form-group mb-2">
                                    <span class="label">Email</span>
                                    <input type="email" id="email" class="form-control" name="adminEmail">
                                </div>
                                <div class="form-group">                                   
                                    <span class="label">Password</span>
                                    <input type="password" id="pass" class="form-control" name="adminPassword">
                                    <i class="fa fa-eye"></i> <i class="fa fa-eye-slash"></i>
                                    <p class="adminError text-danger"></p>
                                </div>                         
                                <button type="submit" class="form-control loginBtn  mb-3" name="adminLoginBtn"> <span class="loginSpinner"></span> Login</button>
                            </form>
        </div>
    </div>
</div>
</body>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>  
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../js/login.js"></script>
<script src="js/adminLogin.js"></script>
</html>
<?php
    }
?>