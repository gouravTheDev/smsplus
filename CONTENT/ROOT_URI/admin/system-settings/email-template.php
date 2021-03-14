 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>

 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Website Email Template Manage</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">System Settings/Email Template</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <?php

  // Update Regsitration Mail
    if (isset($_POST['updateRegistrationMail'])) {
      $content = $_POST['contentR'];
      $subject = $_POST['subjectR'];

      $stmt = $link->prepare("UPDATE EMAIL_TEMPLATE SET `SUBJECT` = ?, `CONTENT` = ? WHERE SLUG = 'registration'");

      $stmt->bind_param("ss", $subject, $content);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Regsitration Mail Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

    // Update Payment Mail
    if (isset($_POST['updatePaymentMail'])) {
      $content = $_POST['contentP'];
      $subject = $_POST['subjectP'];

      $stmt = $link->prepare("UPDATE EMAIL_TEMPLATE SET `SUBJECT` = ?, `CONTENT` = ? WHERE SLUG = 'payment'");

      $stmt->bind_param("ss", $subject, $content);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Payment Mail Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

  ?>

 <div class="container" style="height: 100%; padding-bottom: 100px;">
   <?php include 'nav.php'; ?>
   <div class="card shadow mt-4 mb-4 col-md-8 col-sm-12 mx-auto">
     <div class="card-body">
       <h3 class="text-center mb-2">Website Email Template Management</h3>
       <!-- Registration Mail -->
       <?php
       // Fetch Data
        $sqlPrivacy = "SELECT * FROM EMAIL_TEMPLATE WHERE SLUG = 'registration'";
        $resultPrivacyPolicy = mysqli_query($link, $sqlPrivacy);
        if ($resultPrivacyPolicy) {
          if (mysqli_num_rows($resultPrivacyPolicy) > 0) {
            $rowR = mysqli_fetch_array($resultPrivacyPolicy, MYSQLI_ASSOC);
            $slug = $rowR['SLUG'];
            $subject = $rowR['SUBJECT'];
            $content = $rowR['CONTENT'];
             
        ?>
             <form method="POST">
              <h4 class="font-weight-bold mt-3">Registration Welcome Mail</h4>
               <div class="row form-group">
                 <div class="col-md-12 mt-3">
                  <label>Mail Subject</label>
                   <input type="text" class="form-control" name="subjectR" value="<?php echo $subject; ?>">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12">
                  <label>Mail Content</label>
                   <textarea class="form-control" name="contentR"><?php echo $content; ?></textarea>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12 text-right">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                   <input type="submit" name="updateRegistrationMail" class="btn btn-success" value="Update Registration Mail">
                 </div>
               </div>
             </form>
       <?php 
          }
        }
        ?>

       <!--Payment Mail-->
       <?php
       // Fetch Data
        $sqlPayment = "SELECT * FROM EMAIL_TEMPLATE WHERE SLUG = 'payment'";
        $resultPayment = mysqli_query($link, $sqlPayment);
        if ($resultPayment) {
          if (mysqli_num_rows($resultPayment) > 0) {
            $rowP = mysqli_fetch_array($resultPayment, MYSQLI_ASSOC);
            $slug = $rowP['SLUG'];
            $subject = $rowP['SUBJECT'];
            $content = $rowP['CONTENT'];
             
        ?>
             <form method="POST">
              <h4 class="font-weight-bold mt-3">Payment Accept Mail</h4>
               <div class="row form-group">
                 <div class="col-md-12 mt-3">
                  <label>Mail Subject</label>
                   <input type="text" class="form-control" name="subjectP" value="<?php echo $subject; ?>">
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12">
                  <label>Mail Content</label>
                   <textarea class="form-control" name="contentP"><?php echo $content; ?></textarea>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12 text-right">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                   <input type="submit" name="updatePaymentMail" class="btn btn-success" value="Update Payment Mail">
                 </div>
               </div>
             </form>
       <?php 
          }
        }
        ?>
     </div>
   </div>
 </div>

  <script>
   CKEDITOR.replace('contentP');
   CKEDITOR.replace('contentR');
 </script>