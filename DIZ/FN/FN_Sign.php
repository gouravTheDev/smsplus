<?php
 if(isset($_SESSION['LoggedIn'])){
 }
 else $_SESSION['LoggedIn']=false;
  if(isset($_POST["s_Hash"]) && $_POST["s_Hash"]== $_SESSION['s_Hash']){

  
  $link = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
  $link->set_charset("utf8");

if(mysqli_connect_error()){
   die("ERROR: UNABLE TO CONNECT: ".mysqli_connect_error());
}
  function showErrorMsg($msg)
  {
    return '<div style="width: 100%; padding: 10px; text-align: center; font-weight: bold; background: #E7012A; color: #ffffff;">'.$msg.'</div>';
  }

  //SIGNUP PHP CODE

  if (isset($_POST['formName']) && $_POST['formName']=="signUpForm"){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $today = date("Y-m-d");

    $sql = "SELECT * FROM USERS WHERE `EMAIL` = '$email' OR `USER_NAME` = '$userName'";
    $result = mysqli_query($link, $sql);
    if ($result) {
      $results = mysqli_num_rows($result);
      if($results>0){
        echo '<script>alert("You are already registered! Please signin or use another mail Id.")</script>';
      }else if ($password != $password2) {
        echo '<script>alert("Passwords are not same!")</script>';
         // echo showErrorMsg("Passwords are not same!");
      }else{
        $password = md5($password);
        $userId = D_create_UserId();
        $sqlInsert = "INSERT INTO USERS (`USER_ID`, `FIRST_NAME`, `LAST_NAME`, `USER_NAME`, `EMAIL`, `PASSWORD`, `REG_DATE`, `STATUS`) VALUES ('$userId', '$firstName', '$lastName', '$userName', '$email', '$password', '$today', 'NOT VERIFIED')";

        $resultInsert = mysqli_query($link, $sqlInsert);
        if ($resultInsert) {
          $_SESSION["LoggedIn"]=true;
          $_SESSION["userId"] = $userId;
          $_SESSION["userName"] = $userName;
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

  if (isset($_POST['formName']) && $_POST['formName']=="signInForm"){
      $email = $_POST['email'];

      $password = $_POST['password'];

      $password = md5($password);
      // echo $password;
      $sql = "SELECT * FROM USERS WHERE `EMAIL` = '$email'";
      $result = mysqli_query($link, $sql);

      $results = mysqli_num_rows($result);
      if($results==0){
           echo "<script>alert('You are not registered. Please Register first');</script>";
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

if (isset($_POST['formName']) && $_POST['formName']=="AdminsignInForm"){
      $email = $_POST['email'];

      $password = $_POST['password'];

      $password = md5($password);
      // echo $password;
      $sql = "SELECT * FROM ADMIN WHERE `EMAIL` = '$email'";
      $result = mysqli_query($link, $sql);

      $results = mysqli_num_rows($result);
      if($results==0){
          echo "<script>alert('You are not a valid user!');</script>";
      }else{
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $passwordDB = $row['PASSWORD'];
        if($password == $passwordDB){
            // echo '<div class="alert alert-success"> Welcome to Beanstalk Franchise Portal </div>';
            $_SESSION["AdminLoggedIn"]=true;
            $_SESSION["userId"] = $row['USER_ID'];
            echo "<script>
                window.location.href='/admin/';
              </script>";
        }else{
            echo "<script>alert('Password is wrong!');</script>";
        }
      }

  }
}




?>
