<title>SocialMySocial+ Admin</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php include '_menu.php'; ?>
<?php
$userId = $_GET['userId'];

// Send Mail
if (isset($_POST['sendEmailTrue'])) {
  $emailSubject = $_POST['emailSubject'];
  $userEmail = $_POST['userEmail'];
  $emailBody = $_POST['emailBody'];

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= 'From: Admin<admin@smseplus.com>' . "\r\n";

    $sendMail = mail($userEmail,$emailSubject,$emailBody,$headers);
  if ($sendMail) {
    echo '<div class="container mt-3"><div class="alert alert-success text-center">Mail Sent Successfully</div></div>';
  } else {
    echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
  }
}

//Fetch User Details
if ($userId && $userId != '') {
    $sqlU = "SELECT * FROM USERS WHERE USER_ID = '$userId'";
    $resultU = mysqli_query($link, $sqlU);
    if ($resultU) {
        if (mysqli_num_rows($resultU) > 0) {
            $rowU = mysqli_fetch_array($resultU, MYSQLI_ASSOC);
            $firstName = $rowU['FIRST_NAME'];
            $lastName = $rowU['LAST_NAME'];
            $userName = $rowU['USER_NAME'];
            $email = $rowU['EMAIL'];
            $website = $rowU['WEBSITE'];
            $phone = $rowU['PHONE'];
            $telegramId = $rowU['TELEGRAM_ID'];
            $whatsapp = $rowU['WHATSAPP'];
            $address = $rowU['ADDRESS'];
            $regDate = $rowU['REG_DATE'];
            $profilePic = $rowU['PROFILE_PIC'];
        } else {
            echo '<script>window.location.href="/users/"</script>';
        }
    } else {
        echo '<script>window.location.href="/users/"</script>';
    }
} 

?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">SocialMySocial+ User Details</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">User Details</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container pt-2" style="height: 100%;">
    <div class="row">
        <div class="col-12 text-center mb-4">
            <?php if ($profilePic && $profilePic != '') : ?>
                <img src="/CONTENT/UPLOADS/PROFILE_PIC/<?php echo $userId ?>/<?php echo $profilePic; ?>" alt="user-img" width="100" height="100" class="mb-2" style="border-radius: 50%; cursor: pointer; border: 1px solid #D9CEDE;" title="Update Profile Picture" onclick="triggerFile();">
            <?php else : ?>
                <img src="/assets/images/user.png" alt="user-img" width="100" height="100" class="mb-2" style="border-radius: 50%; cursor: pointer; border: 1px solid #D9CEDE;" title="Update Profile Picture" onclick="triggerFile();">
            <?php endif; ?>

        </div>
        <div class="col-12 text-right mb-2">
            <button class="btn btn-danger shadow" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-envelope"></i> Send Mail</button>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h3 class="font-weight-bold">Basic Details</h3>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Name:- <?php echo $firstName . " " . $lastName;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Email:- <?php echo $email;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>User Name:- <?php echo $userName;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Phone:- <?php echo $phone;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Email:- <?php echo $email;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Address:- <?php echo $address;  ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h3 class="font-weight-bold">More Details</h3>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Website:- <?php echo $website;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>WhatsApp:- <?php echo $whatsapp;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Telegram Id:- <?php echo $telegramId;  ?></h5>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h5>Registration Date:- <?php echo $regDate;  ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 mb-2">
                            <h3 class="font-weight-bold">Recent Orders</h3>
                        </div>
                        <div class="col-md-12 col-sm-12 mb-2">
                            <div class="alert alert-warning text-center font-weight-bold">No Orders</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Send Email starts -->


 <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Create New Category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="createCategory">
         <div class="modal-body">
           <div class="row">
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Email Subject</label>
                  <p class="lead emoji-picker-container">
                  <input type="text" class="form-control" name="emailSubject" placeholder="Enter Email Subject" required>
                 </p>
               </div>
             </div>
             <div class="col-12">
               <label>Email Body</label>
               <textarea name="emailBody" id="editor" rows="5" cols="5">Email Body</textarea>
             </div>
           </div>
         </div>
         <div class="modal-footer">
            <input type="hidden" name="sendEmailTrue" value="YES">
            <input type="hidden" name="userId" value="<?php echo $userId; ?>">
            <input type="hidden" name="userEmail" value="<?php echo $email; ?>">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Send Email</button>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- Send Email ends -->

 <script type="text/javascript">
   CKEDITOR.replace('editor');
   async function closeTicket(userId) {
    var result = confirm("Are you sure you want to close the ticket?");
    if (result) {
      var response = await fetch("api/?closeTicket&userId=" + userId);
      response = await response.json();
      window.location.reload();
    }
  }
 </script>