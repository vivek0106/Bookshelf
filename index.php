<?php
session_start();
if(isset($_COOKIE['bookshelfUserSessionID']) || isset($_SESSION['bookshelfUserSessionID'])){
    header("location:home/index.php");  
}
else{
  require 'googleLogin/config.php';
  $loginurl=$gClient->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="shared/nav/styles/nav.css">
    <link rel="stylesheet" href="shared/footer/styles/footer.css">
    <link rel="stylesheel" href="styles/main/main.css">
    <link rel="stylesheet" href="styles/login/login.css">
    <title>Bookshelf</title>
</head>
<body>
<div class="div" id="content">
    <div class="row justify-content-center ">
        <div class="col-10 col-sm-6 col-md-5 col-lg-4 loginForm">
                            <h2 class="font-weight-bold text-white text-center">Bookshelf.in</h2>
                            <form method="post">
                                <div class="form-group mb-2">
                                    <span class="label">Email</span>
                                    <input type="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">                                   
                                    <span class="label">Password</span>
                                    <input type="password" id="pass" class="form-control">
                                    <i class="fa fa-eye"></i> <i class="fa fa-eye-slash"></i>
                                    <p class="error">Username or password incorrect</p>
                                </div>
                                <input type="checkbox" checked id="rememberme" name="rememberme"> <label class="text-light pl-1" for="rememberme">Remember me</label>
                                
                                <button type="button" class="form-control loginBtn  mb-3"> <span class="loginSpinner"></span> Login</button>
                                <p href="#" class="text-white mb-3 forgotPassLink" data-toggle="modal" data-target="#forgotPass">Forgot password ? click here</p>
                                <button type="button" class="form-control signupBtn mb-3" data-toggle="modal" data-target="#signupModal">Sign up</button>
                                <button type="button"  onclick="window.location='<?php echo $loginurl?>';" class="form-control gloginBtn"> <i class="fa fa-google"></i> &nbsp; Login with Google</button>
                            </form>
        </div>
    </div>
    <div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="forgotPassLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="forgotPassLabel">Forgot Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="forgotPassForm">
          <div class="modal-body">              
                <div class="form-group">
                  <span class="label">Email</span>
                  <input type="email" class="form-control" name="forgotEmail" id="forgotEmail">
                  <p class="text-danger forgotPassError"></p>
                  <p class="text-success emailSentSuccess"></p>
                </div>               
          </div>
          <div class="modal-footer">
            <button type="submit" class="forgotSubmitBtn"> <span class="forgotPassSpinner"></span> Get Link</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="signupModal" aria-labelledby="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <div class="row justify-content-center mb-3">
         <div class="col-sm-8">  
          <form id="signupForm">     
            <div id="wrapper">
              <div class="sigunupform" id="step1">
                <div class="form-group">
                  <span class="label">First Name</span>
                  <input type="text" class="form-control" name="fname" id="fname">                  
                  <p class="text-danger d-none signuperror" id="fnameP">First Name is required</p>
               </div>
               <div class="form-group">
                  
                  <span class="label">Last Name</span>
                  <input type="text" class="form-control" name="lname" id="lname">
                  <p class="text-danger d-none siguperror" id="lnameP">Last Name is required</p>
               </div>
               <div class="form-group">
                 <span class="label">Gender</span>
                 <select class="form-control" name="gender" selected="none" id="gender">
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                 </select>
                 <p class="text-danger d-none signuperror" id="genderP">Gender is required</p>
               </div>
               <div class="form-group">
                <button type="button" class="ml-auto nextBtn" name="next1" id="next1">Next</button>
               </div> 
              </div>
    
    
    
              <div class="sigunupform d-none" id="step2">
                <div class="form-group">
                  <span class="label">Email</span>
                  <input type="email" class="form-control transparentColor" name="signupEmail" id="signupEmail">
                  <p class="text-danger d-none signuperror" id="emailP">Email is required</p>
                  <p class="text-danger d-none signuperror" id="emailE">Email already exists</p>
               </div>
               <div class="form-group">
                  <span class="label">Contact No.</span>
                  <input type="number" max="9999999999" class="form-control transparentColor" name="contact" maxlength="10" id="contact">
                  <p class="text-danger d-none signuperror" id="contactP">Contact is required</p>
                  <p class="text-danger d-none signuperror" id="contactE">Contact number already exists</p>
                </div>
               <div class="form-group">
                  <span class="label">Password</span>
                  <input type="password" class="form-control transparentColor pass" name="signupPass" id="signupPass">
                  <p class="text-danger d-none signuperror" id="passP">Password is required</p>
               </div>
               <div class="form-group">
                  <span class="label">Confirm Password</span>
                  <input type="password" class="form-control transparentColor pass" name="cpass" id="cpass">
                  <p class="text-danger d-none signuperror" id="cpassP"></p>
                  <input type="checkbox" class="m-0" value="showPass" name="showPass" id="showPass">&nbsp; <span style="font-size:0.8rem; color:#999"> Show Password </span>
               </div> 
               <div class="form-group">
                <button type="button" class="backBtn" id="back1" name="back1">Back</button>
                <button type="button" class="nextBtn" name="next2" id="next2" style="display:inline;"> <span class="next2Spinner"></span> Next</button>
               </div>
              </div>   
    
              <div class="sigunupform d-none" id="step3">
                <div class="form-group">
                  <span class="label">Address Line 1 </span>
                  <input type="text" class="form-control transparentColor" name="address1" id="address1">
               </div>
               <div class="form-group">
                  <span class="label">Address Line 2</span>
                  <input type="text" class="form-control transparentColor" name="address2" id="address2">
               </div>
               <div class="form-group">
                  <span class="label">City</span>
                  <input type="text" class="form-control transparentColor" name="city" id="city">
               </div>
               <div class="form-group">
                  <span class="label">Pincode</span>
                  <input type="text" class="form-control transparentColor" name="pincode" id="pincode">
                  <p class="signupError d-none" id="finalError">Error Sigining up</p>
                  <p class="text-success d-none signupSuccess">Sign up successful</p>
               </div> 
               <div class="form-group">
                <button type="button" class="backBtn" id="back2" name="back2">Back</button>
                <button type="button" class="signupSubmitBtn" name="signupSubmit"> <span class="signupSpinner"></span> Submit</button>
               </div>
              </div>
              
            </div>
            </form>
          </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>


<?php
    // require "shared/footer/footer.php";
?>

<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>  
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="shared/nav/js/nav.js"></script>
<script src="js/login.js"></script>
<script src="js/auth.js"></script>
<script src="js/signup.js"></script>
<script src="js/forgotPass.js"></script>
</body>
</html>

<?php
}

?>