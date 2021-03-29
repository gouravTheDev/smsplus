<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<title>SocialMySocial+ Account Details</title>

<?php include '_menuL.php'; ?>
<?php
if (!$_SESSION['LoggedIn']) {
    echo "<script>window.location.href='login';</script>";
} else { ?>

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="#">Account</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php
    //Get Profile Details
    $userId = $_SESSION["userId"];
    $sql = "SELECT * FROM USERS WHERE USER_ID = '$userId'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $firstName = $row["FIRST_NAME"];
            $lastName = $row["LAST_NAME"];
            $userName = $row["USER_NAME"];
            $fullName = $firstName . " " . $lastName;
            $email = $row["EMAIL"];
            $website = $row["WEBSITE"];
            $phone = $row["PHONE"];
            $telegramId = $row["TELEGRAM_ID"];
            $whatsapp = $row["WHATSAPP"];
            $address = $row["ADDRESS"];
            $profilePic = $row["PROFILE_PIC"];
            $wallet = $row["WALLET_MONEY"];
        }
    }

    //Update Basic info
    if (isset($_POST['submitBasicFormDetails'])) {
        $userId = $_SESSION["userId"];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $userName = $_POST['userName'];

        if (isset($_POST['password']) && $_POST['password'] != null) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            if ($password != $password2) {
                echo '<div class="container mt-3"><div class="alert alert-danger text-center">Passwords are not same!</div></div>';
            } else if (strlen($password) < 6) {
                echo '<div class="container mt-3"><div class="alert alert-danger text-center">Password must be 6 or more characters!</div></div>';
            } else {
                $hashedPass = md5($password);
                $stmt = $link->prepare("UPDATE `USERS` SET `FIRST_NAME` = ?, `LAST_NAME` = ?, `EMAIL` = ?, `PASSWORD` = ?, `USER_NAME` = ? WHERE `USER_ID` = ? ");

                $stmt->bind_param("ssssss", $firstName, $lastName, $email, $hashedPass, $userName, $userId);
                if ($stmt->execute()) {
                    echo '<div class="container mt-3"><div class="alert alert-success text-center">Basic Details Updated Successfully!</div></div>';
                }
            }
        } else {
            $stmt = $link->prepare("UPDATE `USERS` SET `FIRST_NAME` = ?, `LAST_NAME` = ?, `EMAIL` = ?, `USER_NAME` = ? WHERE `USER_ID` = ? ");

            $stmt->bind_param("sssss", $firstName, $lastName, $email, $userName, $userId);
            if ($stmt->execute()) {
                echo '<div class="container mt-3"><div class="alert alert-success text-center">Basic Details Updated Successfully!</div></div>';
            }
        }
    }

    //Update Basic info
    if (isset($_POST['updateMoreDetails'])) {
        $userId = $_SESSION["userId"];
        $website = $_POST['website'];
        $phone = $_POST['phone'];
        $telegramId = $_POST['telegramId'];
        $whatsapp = $_POST['whatsapp'];
        $address = $_POST['address'];
        $stmt = $link->prepare("UPDATE `USERS` SET `WEBSITE` = ?, `PHONE` = ?, `TELEGRAM_ID` = ?, `WHATSAPP` = ?, `ADDRESS` = ? WHERE `USER_ID` = ? ");

        $stmt->bind_param("ssssss", $website, $phone, $telegramId, $whatsapp, $address, $userId);
        if ($stmt->execute()) {
            echo '<div class="container mt-3"><div class="alert alert-success text-center">Additional Details Updated Successfully!</div></div>';
        }
    }

    //Upload Profile Picture
    if (isset($_POST['uploadProfilePic'])) {

        $userId = $_SESSION["userId"];

        mkdir("CONTENT/UPLOADS/PROFILE_PIC/" . $userId, 0755, true);

        $tmpFilePath = $_FILES['profile_pic']['tmp_name'];
        $fileName = $_FILES['profile_pic']['name'];

        $allowed = array('jpeg', 'png', 'jpg', 'svg');
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo '<div class="container mt-3"><div class="alert alert-warning text-center">Please Upload an image!</div></div>';
        } else {
            if (file_exists("CONTENT/UPLOADS/PROFILE_PIC/" . $userId . "/" . $profilePic)) {
                unlink("CONTENT/UPLOADS/PROFILE_PIC/" . $userId . "/" . $profilePic);
            }
            $fileName = basename($fileName);

            $fileName = str_replace(' ', '-', $fileName);
            $t = time();
            $fileName = $t . $fileName;

            $target = "CONTENT/UPLOADS/PROFILE_PIC/" . $userId . "/" . $fileName;

            //Upload the file into the temp dir
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
                $stmt = $link->prepare("UPDATE `USERS` SET `PROFILE_PIC` = ? WHERE `USER_ID` = ? ");

                $stmt->bind_param("ss", $fileName, $userId);
                if ($stmt->execute()) {
                    echo '<div class="container mt-3"><div class="alert alert-success text-center">Profile Picture Updated!</div></div>';
                    echo '<script>location.reload();</script>';
                }
            } else {
                echo '<div class="container mt-3"><div class="alert alert-warning text-center">Profile Picture could not be uploaded</div></div>';
            }
        }
    }
    ?>

    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-12 text-right">
                <img src="/assets/images/wallet.svg" style="height: 30px; width: 30px;" class="mr-2"><span class="font-weight-bold" style="font-size: 1.3em;">$<?php echo $wallet; ?></span>
            </div>
            <div class="col-12 text-center mb-4">
                <?php if ($profilePic && $profilePic != '') : ?>
                    <img src="CONTENT/UPLOADS/PROFILE_PIC/<?php echo $userId ?>/<?php echo $profilePic; ?>" alt="user-img" width="100" height="100" class="mb-2" style="border-radius: 50%; cursor: pointer; border: 1px solid #D9CEDE;" title="Update Profile Picture" onclick="triggerFile();">
                <?php else : ?>
                    <img src="assets/images/user.png" alt="user-img" width="100" height="100" class="mb-2" style="border-radius: 50%; cursor: pointer; border: 1px solid #D9CEDE;" title="Update Profile Picture" onclick="triggerFile();">
                <?php endif; ?>

            </div>
            <form method="POST" enctype="multipart/form-data" id="profileForm">
                <input type="file" name="profile_pic" style="display: none;" id="profile_pic" onchange="submitForm();">
                <input type="hidden" name="uploadProfilePic" value="YES">
            </form>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header" style="border-bottom: 1px #D9CEDE solid;">
                        <h3>Basic Information</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" id="basicForm">
                            <input type="hidden" id="userId" value="<?php echo $userId; ?>">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input type="text" name="userName" class="form-control" placeholder="Enter Unique User Name" value="<?php echo $userName; ?>" id="userName" required>
                                        <p class="mt-2" id="errorMsg" style="color: #F7462C; display: none;">User Name is already taken</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstName" class="form-control" placeholder="First Name" value="<?php echo $firstName; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastName" class="form-control" placeholder="Last Name" value="<?php echo $lastName; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <p class="mt-2" style="color: #F7462C;">Password should be equal or more than 6 characters</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-12 mt-0">
                                    <p class="mt-0" style="color: #F7462C;">Note: If you don't want to change password then leave these password fields empty!</p>
                                </div>
                                <input type="hidden" name="submitBasicFormDetails" value="yes">
                                <div class="col-12 text-right">
                                    <input type="submit" name="updateBasicDetails" class="btn btn-success" value="Save" style="color: #000;" id="submitButtonBasic">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="card shadow">
                    <div class="card-header" style="border-bottom: 1px #D9CEDE solid;">
                        <h3>More Information</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="Eg. https:xyz.com" value="<?php echo $website; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone" value="<?php echo $phone; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Telegram Id</label>
                                        <input type="text" name="telegramId" class="form-control" placeholder="Telegram Id" value="<?php echo $telegramId; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>WhatsApp Number</label>
                                        <input type="number" name="whatsapp" class="form-control" placeholder="WhatsApp Number" value="<?php echo $whatsapp; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $address; ?>">
                                        <p class="mt-2" style="color: #F7462C;">Note: If you don't want add more information then leave these informations fields empty!</p>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <input type="submit" name="updateMoreDetails" class="btn btn-success" value="Save" style="color: #000;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function triggerFile() {
            document.getElementById('profile_pic').click();
        }

        function submitForm() {
            document.getElementById('profileForm').submit();
        }

        document.getElementById("submitButtonBasic").addEventListener("click", async function(event){

          event.preventDefault();
          var userName = document.getElementById('userName').value;
          var userId = document.getElementById('userId').value;
          var errorMsg = document.getElementById('errorMsg');
          errorMsg.style.display = "none";

          fetch('/API/V1/?checkUserNameEdit&userName='+userName+'&userId='+userId)
          .then(function(response) {
            if (response.status !== 200) {
              console.log(
                "Looks like there was a problem. Status Code: " + response.status
              );
              return;
            }
            response.json().then(function(data) {
              if (data.data == 'present') {
                errorMsg.style.display = "block";
              }else{
                document.getElementById("basicForm").submit();
              }
            });
          })
          .catch(function(err) {
            console.log("Fetch Error :-S", err);
          });
        });
    </script>
<?php } ?>