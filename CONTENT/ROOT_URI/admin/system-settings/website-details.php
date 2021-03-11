 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>

 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Website Details Manage</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">System Settings/Website Details</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <?php 

//Update Data
if (isset($_POST['submitWebsiteDetails'])) {
  $title = $_POST['title'];
  $meta = $_POST['meta'];
  $keywords = $_POST['keywords'];
  $happyClients = $_POST['happyClients'];
  $coffeCups = $_POST['coffeCups'];
  $orders = $_POST['orders'];
  $staffs = $_POST['staffs'];
  $email = $_POST['email'];

  $stmt = $link->prepare("UPDATE `WEBSITE_DETAILS` SET `TITLE` = ?, `META` = ?, `KEYWORDS` = ?, `HAPPY_CLIENTS` = ?, `COFFE_CUPS` = ?, `ORDERS` = ?, `STAFFS` = ?, `EMAIL` = ? WHERE ID = '1'");

  $stmt->bind_param("ssssssss", $title, $meta, $keywords, $happyClients, $coffeCups, $orders, $staffs, $email);

  if ($stmt->execute()) {
    echo '<div class="container mt-3"><div class="alert alert-success text-center">Website Details Updated Successfully</div></div>';
  } else {
    echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
  }
}

// Fetch Data
 $sql = "SELECT * FROM WEBSITE_DETAILS WHERE ID = '1'";
 $result = mysqli_query($link,$sql);
 if ($result) {
    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    }
  }

?>

 <div class="container" style="height: 100%; padding-bottom: 100px;">
  <?php include 'nav.php'; ?>
   <div class="card shadow mt-4 mb-4 col-md-8 col-sm-12 mx-auto">
    <div class="card-body">
      <h3 class="text-center">Website Details Management</h3>
      <form method="POST">
        <div class="row form-group">
          <div class="col-md-12">
            <label>Website Title</label>
            <input type="text" name="title" placeholder="Website Title" required class="form-control" value="<?php echo $row['TITLE']; ?>">
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <label>Website Description (Meta Description)</label>
            <textarea name="meta" placeholder="Website Meta Description" required class="form-control" rows="3" cols="3"><?php echo $row['META']; ?></textarea>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <label>Website Keywords</label>
            <textarea name="keywords" placeholder="Website keywords" required class="form-control" rows="3" cols="3"><?php echo $row['KEYWORDS']; ?></textarea>
          </div>
        </div>
         <div class="row form-group">
          <div class="col-md-6">
            <label>Happy Clients</label>
            <input type="text" name="happyClients" placeholder="Number of Happy Clients" required class="form-control" value="<?php echo $row['HAPPY_CLIENTS']; ?>">
          </div>
          <div class="col-md-6">
            <label>Coffe Cups</label>
            <input type="text" name="coffeCups" placeholder="Number of Coffe Cups" required class="form-control" value="<?php echo $row['COFFE_CUPS']; ?>">
          </div>
          <div class="col-md-6 mt-3">
            <label>Orders</label>
            <input type="text" name="orders" placeholder="Number of Orders" required class="form-control" value="<?php echo $row['ORDERS']; ?>">
          </div>
          <div class="col-md-6 mt-3">
            <label>Staffs</label>
            <input type="text" name="staffs" placeholder="Number of Staffs" required class="form-control" value="<?php echo $row['STAFFS']; ?>">
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <label>Email</label>
            <input type="email" name="email" placeholder="Website Email" required class="form-control" value="<?php echo $row['EMAIL']; ?>">
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12 text-right">
            <input type="submit" name="submitWebsiteDetails" class="btn btn-success" value="Update Changes">
          </div>
        </div>
      </form>
    </div>
   </div>
 </div>

 <script type="text/javascript">
  //  async function deleteCategory(categoryId) {
  //   var result = confirm("Are you sure you want to delete?");
  //   if (result) {
  //     var response = await fetch("api/?deleteCategory&categoryId=" + categoryId);
  //     response = await response.json();
  //     window.location.reload();
  //   }
  // }
  // async function fetchCategoryData(categoryId) {
  //   var response = await fetch("api/?getCategoryData&categoryId=" + categoryId);
  //   response = await response.json();
  //   console.log(response);
  //   document.getElementById('editname').value = response.NAME;
  //   document.getElementById('editdescription').value = response.DESCRIPTION;
  //   document.getElementById('editstatus').value = response.STATUS;
  //   document.getElementById('editcategoryId').value = response.CATEGORY_ID;
  // }
 </script>