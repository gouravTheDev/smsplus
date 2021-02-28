 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Service Type List</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">Service Type/List</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container" style="height: 100%;">
   <?php
    // Add Category
    if (isset($_POST['createForm'])) {
      $description = $_POST['description'];
      $name = $_POST['name'];
      $status = $_POST['status'];

      $typeId = "ST-" . D_create_UserId();

      $stmt = $link->prepare("INSERT INTO `SERVICE_TYPE` (`TYPE_ID`, `NAME`) VALUES (?, ?)");

      $stmt->bind_param("ss", $typeId, $name);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Service Type Added Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

    // Edit Category
    if (isset($_POST['updateFormServiceType'])) {
      $name = $_POST['editname'];
      $typeId =  $_POST['edittypeId'];

      $stmt = $link->prepare("UPDATE SERVICE_TYPE SET `NAME` = ? WHERE `TYPE_ID` = ?");

      $stmt->bind_param("ss", $name, $typeId);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Service Type Updated Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }
    ?>
   <div class="row mt-3">
     <div class="col-12">
       <a href="add" class="btn btn-primary shadow" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus"></i> Add Service Type</a>
     </div>
   </div>
   <div class="card shadow mt-4 mb-4">
     <div class="card-body">
       <div class="table-responsive p-0 mt-4">
         <table class="table table-hover text-nowrap" id="categoryList">
           <thead>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody id="ticketListBody">
             <?php
              $sql = "SELECT * FROM SERVICE_TYPE WHERE DELETED = 'FALSE'";
              $result = mysqli_query($link, $sql);
              if ($result) {
                if (mysqli_num_rows($result) > 0) {
                  $i = 1;
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['NAME'] . '</td>
                         <td>
                          <div class="btn-group">
                            <button onclick= "fetchData(`'.$row['TYPE_ID'].'`)" data-toggle="modal" data-target="#editCategoryModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button onclick= "deleteServiceType(`'.$row['TYPE_ID'].'`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </div>
                         </td>';
                    $i++;
                  }
                } else {
                  echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No Type Found!
            </div>';
                }
              }
              ?>
           </tbody>
           <tfoot>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col">Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>

 <!-- Add Category starts -->


 <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Create New Service Type</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="createForm">
         <div class="modal-body">
           <div class="row">
             <div class="col-md-12 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control " name="name" placeholder="Enter Name" required>
               </div>
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

 <!-- Add Category ends -->

  <!-- Edit Category starts -->

 <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Update Service Type</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="updateFormServiceType" value="true">
         <div class="modal-body">
           <div class="row">
            <input type="hidden" class="form-control" name="edittypeId" id="edittypeId" required>

             <div class="col-md-8 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control" name="editname" placeholder="Enter Name" id="editname" required>
               </div>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Update changes</button>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- Edit Category ends -->

 <script type="text/javascript">
   async function deleteServiceType(typeId) {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
      var response = await fetch("api/?deleteServiceType&typeId=" + typeId);
      response = await response.json();
      window.location.reload();
    }
  }
  async function fetchData(typeId) {
    var response = await fetch("api/?getData&typeId=" + typeId);
    response = await response.json();
    console.log(response);
    document.getElementById('editname').value = response.NAME;
    document.getElementById('edittypeId').value = response.TYPE_ID;
  }
 </script>