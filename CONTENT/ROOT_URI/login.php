<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMS+ Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/assets/images/black-logo.png">
	<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="/assets/login/images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/login/css/main.css">
<!--===============================================================================================-->
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
  .content {
    /*background: rgba(0, 0, 0, 0.6);*/
  }
  .login-box{
  	color: #fff;
  	margin-top: 10%;
    background: rgba(0, 0, 0, 0.6);
  }
  .iFields{
  	padding-left: 20px;
  	padding-right: 20px;
  }
  @media (max-width: 768px) {
  	.iFields{
	  padding-left: 5px;
	  padding-right: 5px;
	}
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
	<div class="content container">
		<div class="col-md-6 mx-auto pt-4">
			<div class="card shadow login-box">
				<div class="card-body text-center">
					<img src="/assets/images/logo.png" height="120" width="auto">
					<h3 class="mt-3 mb-0 font-weight-bold">Member Login</h3>
					<form method="POST">
						<input type="hidden" name="formName" value="signInForm">
						<input type="hidden" name="s_Hash" value="<?php echo $_SESSION['s_Hash']; ?>">
						<div class="mt-4 iFields">
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="email" name="email" placeholder="Email" required>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="password" placeholder="Password" required>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
							
							<div class="container-login100-form-btn">
								<button type="submit" class="login100-form-btn" style="font-weight: bold; font-size: 1.2em;">
									Login
								</button>
							</div>
							<div class="text-center mt-3">
								<a href="signup" style="color: #fff; font-size: 1.2em;" class="font-weight-bold" style="text-decoration: none;">New User? Sign Up!</a><br>
	                            <a style="color: #fff; font-size: 1em;" href="/">
	                                Go to Home
	                            </a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form method="POST">
	          <div class="form-group">
	            <label>Enter your registered email Id</label>
	            <input type="email" name="forgotEmail" class="form-control" placeholder="Registered Mail ID" required>
	          </div>
	          <input type="submit" name="forgotpass" value="Submit" class="btn btn-success">
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	

	
<!--===============================================================================================-->	
	<script src="/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="/assets/vendor/bootstrap/js/popper.js"></script> -->
	<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/assets/login/js/main.js"></script>

</body>
</html>

