 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>

 <?php
  if (isset($_GET['serviceid']) && !is_null($_GET['serviceid'])) {
    //To-DO
    $serviceId = $_GET['serviceid'];
    $sql = "SELECT SERVICE.*, CATEGORY.NAME AS categoryName, CATEGORY.CATEGORY_ID AS categoryId, SERVICE_TYPE.NAME AS typeName, SERVICE_TYPE.TYPE_ID AS typeId FROM SERVICE INNER JOIN CATEGORY ON SERVICE.CATEGORY_ID = CATEGORY.CATEGORY_ID INNER JOIN SERVICE_TYPE ON SERVICE.TYPE_ID = SERVICE_TYPE.TYPE_ID WHERE SERVICE.SERVICE_ID = '$serviceId' AND SERVICE.DELETED = 'FALSE'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $name = $row['NAME'];
      $categoryId = $row['categoryId'];
      $categoryName = $row['categoryName'];
      $minAmount = $row['MIN_AMOUNT'];
      $maxAmount = $row['MAX_AMOUNT'];
      $typeId = $row['typeId'];
      $typeName = $row['typeName'];
      $rate = $row['RATE'];
      $dripFeed = $row['DRIP_FEED'];
      $status = $row['STATUS'];
      $description = $row['DESCRIPTION'];

      //Fetch Category List
      $sqlC = "SELECT * FROM CATEGORY WHERE DELETED = 'FALSE'";
      $resultC = mysqli_query($link, $sqlC);

      //Fetch Service Type List
      $sqlT = "SELECT * FROM SERVICE_TYPE WHERE DELETED = 'FALSE'";
      $resultT = mysqli_query($link, $sqlT);
    } else {
      echo '<script>window.location.href="/admin/services/"</script>';
    }
  } else {
    echo '<script>window.location.href="/admin/services/"</script>';
  }
  ?>

 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Service Edit</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">Service/Edit</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container pt-4" style="height: 100%;">
   <?php
    // Update Service
    if (isset($_POST['updateService'])) {

      $serviceId = $_GET['serviceid'];
      
      $editname = $_POST['editname'];
      $editcategoryId = $_POST['editcategoryId'];
      $editminAmount = $_POST['editminAmount'];
      $editmaxAmount = $_POST['editmaxAmount'];
      $edittypeId = $_POST['edittypeId'];
      $editrate = $_POST['editrate'];
      $editdripFeed = $_POST['editdripFeed'];
      $editstatus = $_POST['editstatus'];
      $editdescription = $_POST['editdescription'];

      $stmt = $link->prepare("UPDATE SERVICE SET `NAME` = ?, `CATEGORY_ID` = ?, `TYPE_ID` = ?, `MIN_AMOUNT` = ?, `MAX_AMOUNT` = ?, `RATE` = ?, `DRIP_FEED` = ?, `DESCRIPTION` = ?, `STATUS` = ? WHERE SERVICE_ID = ?");

      $stmt->bind_param("ssssssssss", $editname, $editcategoryId, $edittypeId, $editminAmount, $editmaxAmount, $editrate, $editdripFeed, $editdescription, $editstatus, $serviceId);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Service Updated Successfully</div></div>';
        echo '<script>location.reload();</script>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }
    ?>

   <div class="card shadow">
     <div class="card-body">
       <form method="POST">
         <input type="hidden" name="updateService" value="true">
         <div class="modal-body">
           <div class="row">
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control" name="editname" placeholder="Enter Service Name" required value="<?php echo $name; ?>">
               </div>
             </div>
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Category Id</label>
                 <select class="form-control" name="editcategoryId">
                   <?php
                    if (mysqli_num_rows($resultC) > 0) {
                      while ($rowC = mysqli_fetch_array($resultC, MYSQLI_ASSOC)) {
                        if ($rowC['CATEGORY_ID'] == $categoryId) { ?>
                         <option value="<?php echo $rowC['CATEGORY_ID']; ?>" selected><?php echo $rowC['NAME']; ?></option>
                       <?php   } else {  ?>
                         <option value="<?php echo $rowC['CATEGORY_ID']; ?>"><?php echo $rowC['NAME']; ?></option>
                   <?php  }
                      }
                    }
                    ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label>Service Type</label>
                 <select class="form-control" name="edittypeId">
                   <?php
                    if (mysqli_num_rows($resultT) > 0) {
                      while ($rowT = mysqli_fetch_array($resultT, MYSQLI_ASSOC)) {

                        if ($rowT['TYPE_ID'] == $typeId) { ?>
                         <option value="<?php echo $rowT['TYPE_ID']; ?>" selected><?php echo $rowT['NAME']; ?></option>
                       <?php   } else {  ?>
                         <option value="<?php echo $rowT['TYPE_ID']; ?>"><?php echo $rowT['NAME']; ?></option>
                   <?php  }
                      }
                    }
                    ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label>Drip-feed</label>
                 <select class="form-control" name="editdripFeed">
                  <?php 
                  if($dripFeed == 'ACTIVE'){
                    echo '<option value="ACTIVE" selected>Active</option>
                          <option value="DEACTIVE">Deactive</option>';
                  }else{
                    echo '<option value="ACTIVE">Active</option>
                          <option value="DEACTIVE" selected>Deactive</option>';
                  }
                  ?>
                   
                 </select>
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Minimum Amount</label>
                 <input type="text" class="form-control" name="editminAmount" placeholder="Enter Minimum Amount" required value="<?php echo $minAmount; ?>">
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Maximum Amount</label>
                 <input type="text" class="form-control " name="editmaxAmount" placeholder="Enter Maximum Amount" required value="<?php echo $maxAmount; ?>">
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Rate per 1000</label>
                 <input type="text" class="form-control " name="editrate" placeholder="Enter Rate" required value="<?php echo $rate; ?>">
               </div>
             </div>
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="editstatus">
                  <?php 
                    if($status == 'ACTIVE'){
                    echo '<option value="ACTIVE" selected>Active</option>
                          <option value="INACTIVE">Inactive</option>';
                  }else{
                    echo '<option value="ACTIVE">Active</option>
                          <option value="INACTIVE" selected>Inactive</option>';
                  }
                  ?>
                 </select>
               </div>
             </div>
             <div class="col-12">
               <label>Description</label>
               <textarea name="editdescription" id="editor" rows="5" cols="5"><?php echo $description; ?></textarea>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <a href="home" class="btn btn-warning">Back</a>
           <button type="submit" class="btn btn-primary">Update changes</button>
         </div>
       </form>
     </div>
   </div>

 </div>

 <script>
   CKEDITOR.replace('editdescription');
 </script>