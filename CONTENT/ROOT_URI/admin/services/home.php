 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Services List</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">Service/List</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container" style="height: 100%;">
   <?php
    // Add Service
    if (isset($_POST['createService'])) {
      $description = $_POST['description'];
      $name = $_POST['name'];
      $status = $_POST['status'];
      $dripFeed = $_POST['dripFeed'];
      $typeId = $_POST['typeId'];
      $categoryId = $_POST['categoryId'];
      $minAmount = $_POST['minAmount'];
      $maxAmount = $_POST['maxAmount'];
      $rate = $_POST['rate'];


      $serviceId = "Ser-" . D_create_UserId();

      $stmt = $link->prepare("INSERT INTO `SERVICE` (`SERVICE_ID`, `NAME`, `CATEGORY_ID`, `TYPE_ID`, `MIN_AMOUNT`, `MAX_AMOUNT`, `RATE`, `DRIP_FEED`, `DESCRIPTION`, `STATUS`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bind_param("ssssssssss", $serviceId, $name, $categoryId, $typeId, $minAmount, $maxAmount, $rate, $dripFeed, $description, $status);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Service Added Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }
    ?>
   <div class="row mt-3">
     <div class="col-12">
       <a href="add" class="btn btn-primary shadow" data-toggle="modal" data-target="#addServiceModal"><i class="fa fa-plus"></i> Add Service</a>
     </div>
   </div>
   <!-- Category wise Cards -->
   <?php
    $sqlC = "SELECT * FROM CATEGORY WHERE DELETED = 'FALSE'";
    $resultC = mysqli_query($link, $sqlC);
    if ($result) {
      if (mysqli_num_rows($resultC) > 0) {
        while ($rowC = mysqli_fetch_array($resultC, MYSQLI_ASSOC)) { $catId = $rowC['CATEGORY_ID']; ?>
         <div class="card shadow mt-4 mb-4">
           <div class="card-header">
             <h4 class="font-weight-bold"><?php echo $rowC['NAME']; ?></h4>
           </div>
           <div class="card-body">
             <div class="table-responsive p-0 mt-4">
               <table class="table table-hover text-nowrap serviceList">
                 <thead>
                   <tr style="text-align: center;">
                     <th scope="col">No.</th>
                     <th scope="col">Name</th>
                     <th scope="col">Service Type</th>
                     <th scope="col">Rate Per 1000</th>
                     <th scope="col">Min/Max Order</th>
                     <th scope="col">Drip Feed</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   </tr>
                 </thead>
                 <tbody id="ticketListBody">
                   <?php
                    $sql = "SELECT SERVICE.*, CATEGORY.NAME AS categoryName, SERVICE_TYPE.NAME AS typeName FROM SERVICE INNER JOIN CATEGORY ON SERVICE.CATEGORY_ID = CATEGORY.CATEGORY_ID INNER JOIN SERVICE_TYPE ON SERVICE.TYPE_ID = SERVICE_TYPE.TYPE_ID WHERE SERVICE.DELETED = 'FALSE' AND SERVICE.CATEGORY_ID = '$catId'";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                      if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                          if ($row['STATUS'] == 'ACTIVE') {
                            $serviceStatus = '<span class="badge badge-success" style="color: #fff;">Active</span>';
                          } else {
                            $serviceStatus = '<span class="badge badge-danger" style="color: #fff;">Inactive</span>';
                          }

                          if ($row['DRIP_FEED'] == 'ACTIVE') {
                            $dripFeed = '<span class="badge badge-success" style="color: #fff;">Active</span>';
                          } else {
                            $dripFeed = '<span class="badge badge-danger" style="color: #fff;">Deactive</span>';
                          }
                          echo  '<tr style="text-align: center;">
                         <td>' . $i . '</td>
                         <td>' . $row['NAME'] . '</td>
                         <td>' . $row['typeName'] . '</td>
                         <td>' . $row['RATE'] . '</td>
                         <td>' . $row['MIN_AMOUNT']."/". $row['MAX_AMOUNT'] . '</td>
                         <td>' . $dripFeed . '</td>
                         <td>' . $serviceStatus . '</td>
                         <td>
                          <div class="btn-group">
                            <a href="edit?serviceid='.$row['SERVICE_ID'].'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                            <button onclick= "deleteService(`' . $row['SERVICE_ID'] . '`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </div>
                         </td>';
                          $i++;
                        }
                      } else {
                        echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No Service Found!
            </div>';
                      }
                    }
                    ?>
                 </tbody>
                 <tfoot>
                   <tr style="text-align: center;">
                     <th scope="col">No.</th>
                     <th scope="col">Name</th>
                     <th scope="col">Service Type</th>
                     <th scope="col">Rate Per 1000</th>
                     <th scope="col">Min/Max Order</th>
                     <th scope="col">Drip Feed</th>
                     <th scope="col">Status</th>
                     <th scope="col">Action</th>
                   </tr>
                 </tfoot>
               </table>
             </div>
           </div>
         </div>
   <?php }
      }
    }
    ?>
 </div>

 <!-- Add Service starts -->


 <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Create New Service</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="createService">
         <div class="modal-body">
           <div class="row">
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                  <p class="lead emoji-picker-container">
                    <input type="text" class="form-control emojiPick" name="name" placeholder="Enter Service Name" required data-emojiable="true">
                  </p>
               </div>
             </div>
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Category Id</label>
                 <select class="form-control" name="categoryId">
                   <?php
                    $sql = "SELECT * FROM CATEGORY WHERE DELETED = 'FALSE'";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                         <option value="<?php echo $row['CATEGORY_ID']; ?>"><?php echo $row['NAME']; ?></option>
                   <?php }
                      }
                    }
                    ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label>Service Type</label>
                 <select class="form-control" name="typeId">
                   <?php
                    $sql = "SELECT * FROM SERVICE_TYPE WHERE DELETED = 'FALSE'";
                    $result = mysqli_query($link, $sql);
                    if ($result) {
                      if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                         <option value="<?php echo $row['TYPE_ID']; ?>"><?php echo $row['NAME']; ?></option>
                   <?php }
                      }
                    }
                    ?>
                 </select>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label>Drip-feed</label>
                 <select class="form-control" name="dripFeed">
                   <option value="ACTIVE">Active</option>
                   <option value="DEACTIVE">Deactive</option>
                 </select>
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Minimum Amount</label>
                 <input type="text" class="form-control " name="minAmount" placeholder="Enter Minimum Amount" required>
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Maximum Amount</label>
                 <input type="text" class="form-control " name="maxAmount" placeholder="Enter Maximum Amount" required>
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
               <div class="form-group">
                 <label>Rate per 1000</label>
                 <input type="text" class="form-control " name="rate" placeholder="Enter Rate" required>
               </div>
             </div>
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="status">
                   <option value="ACTIVE">Active</option>
                   <option value="INACTIVE">Inactive</option>
                 </select>
               </div>
             </div>
             <div class="col-12">
               <label>Description</label>
               <textarea name="description" id="editor" rows="5" cols="5">Write Description Here</textarea>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save changes</button>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- Add Service ends -->


 <script>
   CKEDITOR.replace('description');
   // CKEDITOR.replace('editdescription');
 </script>

 <script type="text/javascript">
   async function deleteService(serviceId) {
     var result = confirm("Are you sure you want to delete?");
     if (result) {
       var response = await fetch("api/?deleteService&serviceId=" + serviceId);
       response = await response.json();
       window.location.reload();
     }
   }
   async function fetchData(serviceId) {
     var response = await fetch("api/?getCategoryData&serviceId=" + serviceId);
     response = await response.json();
     console.log(response);
     document.getElementById('editname').value = response.NAME;
     document.getElementById('editdescription').value = response.DESCRIPTION;
     document.getElementById('editstatus').value = response.STATUS;
     document.getElementById('editcategoryId').value = response.CATEGORY_ID;
   }
 </script>