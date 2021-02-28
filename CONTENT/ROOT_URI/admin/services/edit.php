 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


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

 <div class="container" style="height: 100%;">
  <?php 
    // Edit Category
    if (isset($_POST['updateCateory'])) {
      $description = $_POST['editdescription'];
      $name = $_POST['editname'];
      $status = $_POST['editstatus'];
      $categoryId =  $_POST['editcategoryId'];

      $stmt = $link->prepare("UPDATE CATEGORY SET `NAME` = ?, `DESCRIPTION` = ?, `STATUS` = ? WHERE CATEGORY_ID = ?");

      $stmt->bind_param("ssss", $name, $description, $status, $categoryId);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Category Updated Successfully</div></div>';
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
                          echo  '<tr style="text-align: center;">
                         <td>' . $i . '</td>
                         <td>' . $row['NAME'] . '</td>
                         <td>' . $row['typeName'] . '</td>
                         <td>' . $row['RATE'] . '</td>
                         <td>' . $row['MIN_AMOUNT']."/". $row['MAX_AMOUNT'] . '</td>
                         <td>' . $row['DRIP_FEED'] . '</td>
                         <td>' . $row['STATUS'] . '</td>
                         <td>
                          <div class="btn-group">
                            <button onclick= "fetchData(`' . $row['SERVICE_ID'] . '`)" data-toggle="modal" data-target="#editCategoryModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
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