 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Category List</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">Category/List</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container" style="height: 100%;">
   <?php
    // Add Category
    if (isset($_POST['createCategory'])) {
      $description = $_POST['description'];
      $name = $_POST['name'];
      $status = $_POST['status'];

      $categoryId = "Cat-" . D_create_UserId();

      $stmt = $link->prepare("INSERT INTO `CATEGORY` (`CATEGORY_ID`, `NAME`, `DESCRIPTION`, `STATUS`) VALUES (?, ?, ?, ?)");

      $stmt->bind_param("ssss", $categoryId, $name, $description, $status);

      if ($stmt->execute()) {
        echo '<div class="container mt-3"><div class="alert alert-success text-center">Category Added Successfully</div></div>';
      } else {
        echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
      }
    }

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
       <a href="add" class="btn btn-primary shadow" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus"></i> Add Category</a>
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
               <th scope="col">Status</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody id="ticketListBody">
             <?php
              $sql = "SELECT * FROM CATEGORY WHERE DELETED = 'FALSE'";
              $result = mysqli_query($link, $sql);
              if ($result) {
                if (mysqli_num_rows($result) > 0) {
                  $i = 1;
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    if ($row['STATUS'] == 'ACTIVE') {
                      $categoryStatus = '<span class="badge badge-success" style="color: #fff;">Active</span>';
                    } else {
                      $categoryStatus = '<span class="badge badge-danger" style="color: #fff;">Inactive</span>';
                    }

                    echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['NAME'] . '</td>
                         <td>' . $categoryStatus . '</td>
                         <td>
                          <div class="btn-group">
                            <button onclick= "fetchCategoryData(`'.$row['CATEGORY_ID'].'`)" data-toggle="modal" data-target="#editCategoryModal" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            <button onclick= "deleteCategory(`'.$row['CATEGORY_ID'].'`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </div>
                         </td>';
                    $i++;
                  }
                } else {
                  echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No Category Found!
            </div>';
                }
              }
              ?>
           </tbody>
           <tfoot>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col">Status</th>
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
         <h5 class="modal-title" id="exampleModalLongTitle">Create New Category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="createCategory">
         <div class="modal-body">
           <div class="row">
             <div class="col-md-8 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                 <p class="lead emoji-picker-container">
                  <input type="text" class="form-control emojiPick" name="name" placeholder="Enter Category Name" required>
                 </p>
               </div>
             </div>
             <div class="col-md-4 col-sm-12">
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

 <!-- Add Category ends -->

  <!-- Edit Category starts -->

 <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Update Category</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="updateCateory">
         <input type="hidden" name="editcategoryId" id="editcategoryId">
         <div class="modal-body">
           <div class="row">

             <div class="col-md-9 col-sm-12">
               <div class="form-group">
                 <label>Name</label>
                  <p class="lead emoji-picker-container">
                  <input type="text" id="editname" class="form-control" name="editname" placeholder="Enter Category Name" required>
                 </p>
               </div>
             </div>
             <div class="col-md-3 col-sm-12">
               <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" name="editstatus" id="editstatus">
                   <option value="ACTIVE">Active</option>
                   <option value="INACTIVE">Inactive</option>
                 </select>
               </div>
             </div>
             <div class="col-12">
               <label>Description</label>
               <textarea name="editdescription" id="editdescription" rows="5" cols="5">Write Description Here</textarea>
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
 <script>
   CKEDITOR.replace('description');
   CKEDITOR.replace('editdescription');
 </script>

 <script type="text/javascript">
  async function deleteCategory(categoryId) {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
      var response = await fetch("api/?deleteCategory&categoryId=" + categoryId);
      response = await response.json();
      window.location.reload();
    }
  }
  async function fetchCategoryData(categoryId) {
    var response = await fetch("api/?getCategoryData&categoryId=" + categoryId);
    response = await response.json();
    console.log(response);
    document.getElementById('editname').value = response.NAME;
    document.getElementById('editdescription').value = response.DESCRIPTION;
    document.getElementById('editstatus').value = response.STATUS;
    document.getElementById('editcategoryId').value = response.CATEGORY_ID;
  }
 </script>