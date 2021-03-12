 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>

 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Website Logo Manage</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">System Settings/Website Logo</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <?php 

//Update Data
if (isset($_POST['submitWebsiteDetails'])) {
  $basePath = realpath($_SERVER["DOCUMENT_ROOT"]);

  mkdir($basePath.'/LOGOS', 0755, true);

  //Main Logo Upload
  if ($_FILES['mainLogo']['name'] && $_FILES['mainLogo']['name'] != '') {
    $mainLogoPath = $_FILES['mainLogo']['tmp_name'];
    $mainLogoName = $_FILES['mainLogo']['name'];
    $mainLogoName = basename($mainLogoName);

    $mainLogoName = str_replace(' ', '-', $mainLogoName);
    $t=time();
    $mainLogoName = $t.$mainLogoName;

    if ($mainLogoPath != ""){
      //Setup our new file path
      $target = "$basePath.'/LOGOS/".$mainLogoName;

      //Upload the file into the temp dir
      if(move_uploaded_file($_FILES['mainLogo']['tmp_name'], $target)) {
        array_push($imgNames,$mainLogoName);
      }
    }
  }

  //Favicon Upload

  if ($_FILES['favicon']['name'] && $_FILES['favicon']['name'] != '') {
    $faviconPath = $_FILES['favicon']['tmp_name'];
    $faviconName = $_FILES['favicon']['name'];
    $faviconName = basename($faviconName);

    $faviconName = str_replace(' ', '-', $faviconName);
    $t=time();
    $faviconName = $t.$faviconName;

    if ($faviconPath != ""){
      //Setup our new file path
      $target = "$basePath.'/LOGOS/".$faviconName;

      //Upload the file into the temp dir
      if(move_uploaded_file($_FILES['favicon']['tmp_name'], $target)) {
        // $sqlUpload = "SELECT "
      }
    } 
  }

  // if ($stmt->execute()) {
  //   echo '<div class="container mt-3"><div class="alert alert-success text-center">Website Details Updated Successfully</div></div>';
  // } else {
  //   echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
  // }
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
          <div class="col-md-6">
            <label>Website Main Logo</label>
            <input type="file" name="mainLogo" class="form-control" >
          </div>

        </div>
        <div class="row form-group">
          <div class="col-md-12">
            <label>Website Favicon</label>
            <textarea name="meta" placeholder="Website Meta Description"  class="form-control" rows="3" cols="3"><?php echo $row['FAVICON']; ?></textarea>
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