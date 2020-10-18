<?php 
	if(isset($_POST["submitContact"]) && $_POST["s_Hash"]== $_SESSION['s_Hash']){
		 $link = mysqli_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB_BEANSTALKFP);

		 $email = $_SESSION["user"];



		 $password = $_POST['password1'];
		 $password2 = $_POST['password2'];
		 if ($password != $password2) {
              // echo '<div class="alert alert-danger">Password does not match</div>';
            $GLOBALS['alert_info'] .= DaddToBsAlert("Password does not match");

          }else{
          	 $password = md5($password);
          	 $sql = "UPDATE BS_USER SET USER_PASSWORD='$password', STATUS = 'PASSWORD CHANGED' WHERE USER_EMAIL='$email'";
          	 $result = mysqli_query($link, $sql);
          	 if($result){
          	 	$GLOBALS['alert_info'] .= DaddToBsAlert("Password changed Successfully");
          	 }
          }


	}
	if ($GLOBALS['alert_info']!="") {
  		echo $GLOBALS['alert_info'];
	}
 ?>