
<?php 
if(isset($_GET['str']) && isset($_GET['action'])){
    $token = hash("sha256",$_GET['str']);
    if($_GET['action']=='resetpassword'){
        include('connection.php');
        $query = "select * from reset_tokens where token='$token'";
        $res = mysqli_query($con,$query);
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_array($res);
            $createdOn = $row['createdon'];
            $diff =  (time() - strtotime($createdOn)) / 60;
            if($diff > 10){
                ?>
                <h3>Link Expired</h3>
                <?php 
            }
            else{

            ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
                    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
                    <link rel="stylesheet" href="styles/login/login.css">
                    <title>Bookshelf Reset Password</title>
                </head>
                <body>
                    <div class="container newPass">
                        <div class="row justify-content-center" style="margin-top:100px">
                            <div class="col-sm-6 col-lg-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto">
                                            <h3 class="text-center" style="display: inline;">Bookshelf.in </h6> <span>Reset Password</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <form id="newPassForm">
                                        <div class="form-group">
                                            <span class="label">New Password</span>
                                            <input type="password" class="form-control transparentColor newPass"id="newPass">
                                            <p class="text-danger d-none error">Password is required</p>
                                        </div>
                                        <div class="form-group">
                                            <span class="label">Confirm New Password</span>
                                            <input type="password" class="form-control transparentColor newPassC" id="newPassC">
                                            <p class="text-danger d-none error">Confirm Password is required</p>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" class="m-0" value="showNewPass" id="showNewPass">&nbsp; <span style="font-size:0.8rem; color:#555"> Show Password </span>
                                        </div>
                                        <div class="form-group">
                                            <p class="response"></p>
                                            <button type="button" class="form-control btn changePassBtn" style="background-color: #333A56; font-weight:600; color:white">Change Password</button>
                                                
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="node_modules/jquery/dist/jquery.min.js"></script>
                    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
                    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                    <script src="js/newPass.js"></script>
                    </body>
                    </html>

            <?php
            }
        }
        else{
            echo "Invalid Link";

        }
    }
    else{
        echo "You cannot reset password. Errors encountered";
    }
}

else{
    echo " Errors encountered";
}
?>


