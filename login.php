<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("linking_file.php") ?>
    <title>Diviana Dines: Login</title>
</head>
<body>
    <?php include("header.php") ?>

    <div class="container px-10">
      <div class="card" id="bg">
        <div class="row justify-content-around d-flex">
          <div class="col-6 col-lg-4 align-items-center d-flex">
            <div class="card text-center border-0 hide" id="login-btn">
              <div class="card-body">
                <h5 class="card-title" id="text-toggle">Already have an Account?</h5>
                <a href="#bg" class="btn btn-primary" id="login-toggle">Log-in</a>
              </div>
            </div>
            <div id="login" class="mx-xl-4 card w-100">
              <div class="card-body">
                <h5 class="card-title text-center">Login</h5> 
                <form action="#" novalidate method="POST" onsubmit="return validation1()">
                  <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" class="form-control" name="e-mail" placeholder="Email id" id="e-mail" required />
                      <span id="e-mails" class="text-danger"></span>
                      <span id="e-mails1" class="text-success"></span>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="pword" name="pword" placeholder="Password" required>
                      <span id="pwords" class="text-danger"></span>
                      <span id="pwords1" class="text-success"></span>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="check">
                    <label class="form-check-label" for="check">Remember me</label>
                  </div>
                  <div class="d-flex flex-column align-items-center" id="login">
                    <button type="submit" class="px-5 btn btn-primary">Log in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="col-6 col-lg-4 align-items-center d-flex">
            <div class="card text-center border-0" id="sign-btn">
              <div class="card-body">
                <h5 class="card-title" id="text-toggle">Don't have an account?</h5>
                <a href="#bg" class="btn btn-primary" id="sign-toggle">Sign-up</a>
              </div>
            </div>
            <div id="sign-up" class="mx-xl-4 card w-100 hide">
              <div class="card-body">
                <h5 class="card-title text-center">Sign-up</h5>                
                  <form action="" novalidate method="POST" onsubmit="return validation()">
                    <div class="form-group">
                      <input type="text" class="form-control" name="fname" placeholder="Full Name" id="fname" required />
                      <span id="fnames" class="text-danger"></span>
                      <span id="fnames1" class="text-success"></span>
                    </div>	

                    <div class="form-group">
                      <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" id="mobilenumber" required />
                      <span id="mobileno" class="text-danger"></span>
                      <span id="mobileno1" class="text-success"></span>
                    </div>	

                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email-id" id="email" required />
                      <span id="emails" class="text-danger"></span>
                      <span id="emails1" class="text-success"></span>
                    </div>	
                    
                    <div class="form-group">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      <span id="passwords" class="text-danger"></span>
                      <span id="passwords1" class="text-success"></span>
                    </div>
                    
                    <div class="form-group">
                      <input type="password" class="form-control" id="passwordcheck" name="passwordcheck" placeholder="Re-Enter Password" required>
                      <span id="passwordchecks" class="text-danger"></span>
                      <span id="passwordchecks1" class="text-success"></span>
                    </div>
                    <div class="d-flex flex-column align-items-center pt-3" id="signup">
                      <button type="submit" class="px-6 btn btn-primary">Sign up</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </div>
    <?php include("footer.php") ?>

  <script type="text/javascript" src="login.js"></script>
</body>
</html>


                    