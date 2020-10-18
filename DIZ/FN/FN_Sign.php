<?php
 if(isset($_SESSION['LoggedIn'])){
 }
 else $_SESSION['LoggedIn']=false;
  if(isset($_POST["s_Hash"]) && $_POST["s_Hash"]== $_SESSION['s_Hash']){

  
  $link = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
  $link->set_charset("utf8");


  //SIGNUP PHP CODE

  if (isset($_POST['formName']) && $_POST['formName']=="signUpForm"){
      $fullname = $_POST['fullName'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $password = $_POST['password'];
      $referral = $_POST['referral'];

      $today = date("Y-m-d");

      $password = md5($password);
      // echo $password;

      $sql = "SELECT * FROM USERS WHERE `EMAIL` = '$email' OR PHONE = '$phone'";
      $result = mysqli_query($link, $sql);
      if ($result) {
        $results = mysqli_num_rows($result);
        if($results>0){
          echo '<script>alert("You are already registered. Please login to proceed");</script>';
        }else{
          $userId = G_uni_id_digits();
          $sqlInsert = "INSERT INTO USERS (`USER_ID`, `NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `AGE`, `GENDER`, `REG_DATE`, `MAIL_STATUS`, `STATUS`, `REFERRED_BY`) VALUES ('$userId', '$fullname', '$email', '$phone', '$password', '$age', '$gender', '$today', 'NOT VERIFIED', 'REGISTERED', '$referral')";

          $resultInsert = mysqli_query($link, $sqlInsert);
          if ($resultInsert) {
            $_SESSION["LoggedIn"]=true;
            $_SESSION["userEmail"] = $email;
            $_SESSION["userId"] = $userId;
            $_SESSION["userName"] = $fullname;
            echo "<script>window.location.href='dashboard';</script>";
          }else{
            echo "<script>alert('Try Again');</script>";
          }
        }
      }else{
        echo "<script>alert('".mysqli_error($link)."');</script>";
      }
      
  }
  


  // SIGN IN PHP CODE

  if (isset($_POST['formName']) && $_POST['formName']=="signinForm"){
      $email = $_POST['email'];

      $password = $_POST['password'];

      $password = md5($password);
      // echo $password;
      $sql = "SELECT * FROM USERS WHERE `EMAIL` = '$email'";
      $result = mysqli_query($link, $sql);

      $results = mysqli_num_rows($result);
      if($results==0){
           echo "<script>alert('You are not registered. Please Login');</script>";
      }else{
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $passwordDB = $row['PASSWORD'];
        if($password == $passwordDB){
            // echo '<div class="alert alert-success"> Welcome to Beanstalk Franchise Portal </div>';
            $_SESSION["LoggedIn"]=true;
            $_SESSION["userEmail"] = $email;
            $_SESSION["userId"] = $row['USER_ID'];
            $_SESSION["userName"] = $row['NAME'];
            echo "<script>
                window.location.href='dashboard';
              </script>";
        }else{
            echo "<script>alert('Password is wrong!');</script>";
        }
      }

  }


//ADMIN SIGNIN

if (isset($_POST['formName']) && $_POST['formName']=="adminSignIn"){
      $email = $_POST['email'];

      $password = $_POST['password'];

      $password = md5($password);
      // echo $password;
      $sql = "SELECT * FROM ADMIN_USERS WHERE `EMAIL` = '$email'";
      $result = mysqli_query($link, $sql);

      $results = mysqli_num_rows($result);
      if($results==0){
           echo "<script>alert('No user found! Please check the email!');</script>";
      }else{
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $passwordDB = $row['PASSWORD'];
        if($password == $passwordDB){
            // echo '<div class="alert alert-success"> Welcome to Beanstalk Franchise Portal </div>';
            $_SESSION["AdminLoggedIn"]=true;
            $_SESSION["userEmail"] = $email;
            $_SESSION["userId"] = $row['USER_ID'];
            $_SESSION["userName"] = $row['NAME'];
            echo "<script>
                window.location.href='/adminpanel/';
              </script>";
        }else{
            echo "<script>alert('Password is wrong!');</script>";
        }
      }

  }
}




?>
