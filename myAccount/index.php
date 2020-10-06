<?php 
session_start();
  if(isset($_SESSION['bookshelfUserSessionID']) || isset($_COOKIE['bookshelfUserSessionID'])){
    require "../connection.php";
    $ses = $_COOKIE['bookshelfUserSessionID'];
    $query = "select * from users where email=(select sessionEmail from user_sessions where sessionID='$ses')";
    $res= mysqli_query($con,$query);
    if(mysqli_num_rows($res) > 0){
      $row = mysqli_fetch_array($res);
    ?>
<html>
<head>
    <title>Bookshelf | My Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../shared/footer/styles/footer.css">
    <link rel="stylesheet" href="../styles/main/main.css">
    <link rel="stylesheet" href="../shared/nav/styles/nav.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php 
   include "../shared/nav/nav.php";
?>
  
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-sm-10 col-lg-8">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">My account</h3>
            </div>
            <div class="col-4 text-right" onclick="enableEdit()">
              <a href="#!" class="btn btn-sm btn-primary"> <i class="fa fa-edit"> </i> Edit </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form id="userInfoForm">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">              
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-first-name">First Name</label>
                    <input type="text" class="form-control form-control-alternative" name="fname" placeholder="First name" disabled value=<?php echo $row["fname"];?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-last-name">Last name</label>
                    <input type="text" class="form-control form-control-alternative" name="lname" placeholder="Last name" disabled value=<?php echo $row["lname"];?>>
                  </div>
                </div>                    
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" name="email" class="form-control form-control-alternative" placeholder="Enter Email/Displayed Email" disabled value=<?php echo $row["email"];?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Gender</label>
                    <select name="gender" id="gender" name="gender" disabled class="form-control form-control-alternative">                          
                      <option value="Female" <?php if($row["gender"]=="Female") {echo "selected='true'";}  ?>>Female</option>
                      <option value="Male" <?php if($row["gender"]=="Male") {echo "selected='true'";}  ?> >Male</option>
                   </select>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Contact information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group focused">
                    <label class="form-control-label" for="input-address">Address</label>
                    <textarea name="address" id="address" name="address" disabled class="form-control form-control-alternative"  placeholder="Home Address" ><?php echo $row["address"];?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Postal code</label>
                    <input type="number"min="0" max="999999" name="code" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code" disabled value=<?php echo (int)$row["pincode"];?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-country">Contact Number</label>
                    <input type="number" name="number" id="input-contact-number" min="0" max="9999999999" class="form-control form-control-alternative" placeholder="123124123" disabled value=<?php echo (int)$row["phone"];?>>
                  </div>
                </div>
                <div class="col-6">
                  <button class="btn btn-success userInfoUpdateBtn d-none" name="saveBtn" type="submit">Save</button>
                </div>
              </div>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>         
   
 <?php require "../shared/footer/footer.php" ?>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../shared/nav/js/nav.js"></script>
  <script src="../cart/js/cart.js"></script>
  <script src="myAccount.js"></script>
</body>
</html>

<?php
    }
  }
  else{
    header("Location: ../");
  }
?>