 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>

 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Website CMS Manage</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">System Settings/CMS</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <?php

  // Update Privacy Policy
    if (isset($_POST['updatePrivacyPolicy'])) {
      $content = $_POST['contentP'];

      $stmt = $link->prepare("UPDATE CMS SET `CONTENT` = ? WHERE SLUG = 'privacy-policy'");

      $stmt->bind_param("s", $content);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Privacy Policy Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

    // Update Terms and Conditions
    if (isset($_POST['updateTerms'])) {
      $content = $_POST['contentT'];

      $stmt = $link->prepare("UPDATE CMS SET `CONTENT` = ? WHERE SLUG = 'terms-and-conditions'");

      $stmt->bind_param("s", $content);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Terms & Conditions Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

    // Update Refund Policy
    if (isset($_POST['updateRefund'])) {
      $content = $_POST['contentR'];

      $stmt = $link->prepare("UPDATE CMS SET `CONTENT` = ? WHERE SLUG = 'refund-policy'");

      $stmt->bind_param("s", $content);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Terms & Conditions Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }
  ?>

 <div class="container" style="height: 100%; padding-bottom: 100px;">
   <?php include 'nav.php'; ?>
   <div class="card shadow mt-4 mb-4 col-md-8 col-sm-12 mx-auto">
     <div class="card-body">
       <h3 class="text-center">Website CMS Management</h3>
       <!-- Privacy Policy -->
       <?php
       // Fetch Data
        $sqlPrivacy = "SELECT * FROM CMS WHERE SLUG = 'privacy-policy'";
        $resultPrivacyPolicy = mysqli_query($link, $sqlPrivacy);
        if ($resultPrivacyPolicy) {
          if (mysqli_num_rows($resultPrivacyPolicy) > 0) {
            $rowP = mysqli_fetch_array($resultPrivacyPolicy, MYSQLI_ASSOC);
            $slug = $rowP['SLUG'];
            $field = $rowP['FIELD'];
            $content = $rowP['CONTENT'];
             
        ?>
             <form method="POST">
               <div class="row form-group">
                 <div class="col-md-12">
                   <label>Privacy Policy</label>
                   <textarea class="form-control" name="contentP"><?php echo $content; ?></textarea>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12 text-right">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                   <input type="submit" name="updatePrivacyPolicy" class="btn btn-success" value="Update Privacy Policy">
                 </div>
               </div>
             </form>
       <?php 
          }
        }
        ?>

        <!-- Terms & Condition -->
       <?php
       // Fetch Data
        $sqlTermsCond = "SELECT * FROM CMS WHERE SLUG = 'terms-and-conditions'";
        $resultTermsCond = mysqli_query($link, $sqlTermsCond);
        if ($resultTermsCond) {
          if (mysqli_num_rows($resultTermsCond) > 0) {
            $rowT = mysqli_fetch_array($resultTermsCond, MYSQLI_ASSOC);
            $slug = $rowT['SLUG'];
            $field = $rowT['FIELD'];
            $content = $rowT['CONTENT'];
             
        ?>
             <form method="POST">
               <div class="row form-group">
                 <div class="col-md-12">
                   <label>Terms and Condition</label>
                   <textarea class="form-control" name="contentT"><?php echo $content; ?></textarea>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12 text-right">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                   <input type="submit" name="updateTerms" class="btn btn-success" value="Update Terms and Condition">
                 </div>
               </div>
             </form>
       <?php 
          }
        }
        ?>

        <!-- Terms & Condition -->
       <?php
       // Fetch Data
        $sqlRefund = "SELECT * FROM CMS WHERE SLUG = 'refund-policy'";
        $resultRefund = mysqli_query($link, $sqlRefund);
        if ($resultRefund) {
          if (mysqli_num_rows($resultRefund) > 0) {
            $rowR = mysqli_fetch_array($resultRefund, MYSQLI_ASSOC);
            $slug = $rowR['SLUG'];
            $field = $rowR['FIELD'];
            $content = $rowR['CONTENT'];
             
        ?>
             <form method="POST">
               <div class="row form-group">
                 <div class="col-md-12">
                   <label>Refund Policy</label>
                   <textarea class="form-control" name="contentR"><?php echo $content; ?></textarea>
                 </div>
               </div>
               <div class="row form-group">
                 <div class="col-md-12 text-right">
                  <input type="hidden" name="slug" value="<?php echo $slug; ?>">
                   <input type="submit" name="updateRefund" class="btn btn-success" value="Update Refund Policy">
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
   CKEDITOR.replace('contentT');
   CKEDITOR.replace('contentR');
 </script>