<!DOCTYPE html>
<html lang="en">
<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>
<?php 
  if ($_SESSION['LoggedIn']) {
    echo "<script>window.location.href='dashboard';</script>";
  }
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="/assets/images/black-logo.png">
    <!-- Title Page-->
    <title>SMS+ Signup</title>

    <!-- Icons font CSS-->
    <link href="/assets/login/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/assets/login/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/login/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/assets/signup/css/main.css" rel="stylesheet" media="all">
    <style type="text/css">
        @font-face {
          font-family: 'SinaNovaReg';
          src: url('/assets/fonts/SinaNovaReg.woff');
        }
        body {
          font-family: 'SinaNovaReg';
          color: #444444;
        }
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
          }
          #myVideo2 {
            display: none;
          }
          @media (max-width: 769px) {
            #myVideo {
              display: none;
            }
            /*Mobile*/
            #myVideo2 {
              display: block;
              position: fixed;
              right: 0;
              bottom: 0;
              min-width: 100%; 
              min-height: 100%;
            }
          }
          .login-box{
              color: #fff;
              background: rgba(0, 0, 0, 0.7);
          }
          .blueC{
              color: #2F90F0;
          }
    </style>
</head>
<body>
    <video autoplay muted loop id="myVideo">
      <source src="assets/videos/v1.mp4" type="video/mp4">
    </video>
    <video autoplay muted loop id="myVideo2">
      <source src="assets/videos/v2.mp4" type="video/mp4">
    </video>
    <div class="page-wrapper bg-gra-02 p-b-100 font-poppins" style="padding-top: 1.5em;">
        <div class="wrapper wrapper--w680">
            <div class="card login-box card-4">
                <div class="card-body pt-4">
                    <div class="text-center mb-3">
                        <img src="/assets/images/logo.png" height="120" width="auto">
                    </div>
                    <h3 class="mb-0 pb-0 text-center font-weight-bold">Registration Form</h3>
                    <p class="mb-2 text-center" style="margin-bottom: 20px; margin-top: 10px; font-size: 1.2em;">Create your free account today.</p>
                    <form method="POST" id="signUpForm">
                    	<input type="hidden" name="formName" value="signUpForm">
						          <input type="hidden" name="s_Hash" value="<?php echo $_SESSION['s_Hash']; ?>">
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="basic-addon1">@</span>
                                      </div>
                                      <input required type="email" class="form-control" placeholder="Email" name="email" aria-label="Email" aria-describedby="basic-addon1" id="email">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text " id="basic-addon1"><i class="fa fa-user"></i></span>
                                      </div>
                                      <input required type="text" id="userName" class="form-control" placeholder="User Name" name="userName" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <p style="color: red; font-weight: bold; display: none;" id="userNameError">The user name is already taken!</p>
                                </div>
                            </div> 
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text " id="basic-addon1"><i class="fa fa-user-plus"></i></span>
                                      </div>
                                      <input required type="text" class="form-control" placeholder="First Name" name="firstName" aria-label="Username" aria-describedby="basic-addon1" id="firstName">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group mb-3">
                                      <input required type="text" class="form-control" placeholder="Last Name" name="lastName" aria-label="Username" aria-describedby="basic-addon1" id="lastName">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                      </div>
                                      <input required type="password" class="form-control" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1" id="password">
                                    </div>
                                </div>
                                <p style="color: red; font-weight: bold; display: none;" id="passwordError">Both the passwords must be same</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group mb-3">
                                      <input required type="password" class="form-control" placeholder="Password Again" name="password2" aria-label="Password Again" aria-describedby="basic-addon1" id="password2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mx-auto">
                                <div class="p-t-15" style="text-align: center;"> 
                                  <p style="color: red; font-weight: bold; margin-bottom: 20px; font-size: 1.3em; display: none;" id="fieldsError">Please fill all the fields!</p>
                                  <button class="btn btn--radius-2 btn--blue" type="button" onclick="validateForm()" style="font-weight: bold; font-size: 1.4em;">Sign Up</button>
                                  <br><br>
                                  <a href="login" class="font-weight-bold" style="text-decoration: none; color: #fff; font-size: 1.2em;">Already a member? Sign In</a><br>
                                  <a class="txt2" style="color: #fff; font-size: 1em;" href="/">
                                      Go to Home
                                  </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      function validateForm() {
        var userName = document.getElementById('userName').value;
        var email = document.getElementById('email').value;
        var firstName = document.getElementById('firstName').value;
        var lastName = document.getElementById('lastName').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        var userNameError = document.getElementById('userNameError');
        var passwordError = document.getElementById('passwordError');
        var fieldsError = document.getElementById('fieldsError');
        userNameError.style.display = "none";
        passwordError.style.display = "none";
        fieldsError.style.display = "none";
        console.log(password)
        if (password == '' || password2 == '' || firstName == '' || lastName == '' || userName == '' || email == '') {
          fieldsError.style.display = "block";
        }else{
          fetch('/API/V1/?checkUserName&userName='+userName)
          .then(function(response) {
            if (response.status !== 200) {
              console.log(
                "Looks like there was a problem. Status Code: " + response.status
              );
              return;
            }
            response.json().then(function(data) {
              if (data.data == 'present') {
                userNameError.style.display = "block";
              }else if (password != password2) {
                passwordError.style.display = "block";
              }else{
                document.getElementById("signUpForm").submit();
              }
            });
          })
          .catch(function(err) {
            console.log("Fetch Error :-S", err);
          });
        }
      }
    </script>
    <!-- Jquery JS-->
    <script src="/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!-- Vendor JS-->
    <script src="/assets/login/vendor/select2/select2.min.js"></script>
    <!-- Main JS-->
    <script src="/assets/signup/js/global.js"></script>

</body>

</html>


<!-- end document-->