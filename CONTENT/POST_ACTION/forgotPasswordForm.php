
<?php
	// echo '<script type="text/javascript">alert("Hello");</script>';
	if(isset($_POST["s_Hash"]) && $_POST["s_Hash"]== $_SESSION['s_Hash']){

		  // echo $GLOBALS['alert_info']; $_SESSION['redirectOnNextLoad'] ="hh"; echo $_SESSION['redirectOnNextLoad'];
		  $link = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB_BEANSTALKFP);

		  // $Password = rand(100000000,9999999999);

		  //SIGNUP PHP CODE


		  		$to = $_POST['forgotemail'];
		  		$sql = "SELECT * FROM BS_USER WHERE USER_EMAIL = '$to'";
		  		$result = mysqli_query($link,$sql);
		  		if($result){
        			if(mysqli_num_rows($result)>0){
        				$password = rand(100000000,9999999999);
		  		// echo '<div class="alert alert-success">'.$password.'</div>';


						$subject = "Franchise Portal Password change";

						$message = "
						<html>
						<head>
						<title>Password Change</title>
						</head>
						<body>
						<p>Your new password is--> </p>
						<p>".$password."</p>
						</body>
						</html>
						";

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: <Franchise@beanstalkedu.com>' . "\r\n";

						mail($to,$subject,$message,$headers);
						$password = md5($password);

						$sql = "UPDATE BS_USER SET USER_PASSWORD='$password' WHERE USER_EMAIL='$to'";
						$result = mysqli_query($link, $sql);

						if ($result) {
							echo '<div class="alert alert-success">Password sent to the email</div>';
						}else{
							echo '<div class="alert alert-danger">Password can not be sent </div>';
						}


        			}

        		}else{
        			echo '<div class="alert alert-danger">The Email is not registered</div>';
        		}



		  		// echo '<div class="alert alert-success">'.$to.'</div>';





		}

 ?>
