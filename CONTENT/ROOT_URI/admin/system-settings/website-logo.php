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

     $sqlF2 = "SELECT * FROM WEBSITE_LOGO WHERE ID = '1'";
     $resultF2 = mysqli_query($link,$sqlF2);
     if ($resultF2) {
        if(mysqli_num_rows($resultF2)>0){
          $row2 = mysqli_fetch_array($resultF2,MYSQLI_ASSOC);
          $logoF = $row2['MAIN_LOGO'];
          $faviconF = $row2['FAVICON'];
        }
      }
    $mainLogoPath = $_FILES['mainLogo']['tmp_name'];
    $mainLogoName = $_FILES['mainLogo']['name'];
    $mainLogoName = basename($mainLogoName);

    $mainLogoName = str_replace(' ', '-', $mainLogoName);
    $t=time();
    $mainLogoName = $t.$mainLogoName;

    if ($mainLogoPath != ""){
      //Setup our new file path
      $target = $basePath."/LOGOS/".$mainLogoName;

      //Upload the file into the temp dir
      if(move_uploaded_file($_FILES['mainLogo']['tmp_name'], $target)) {
        unlink($basePath."/LOGOS/".$logoF);
        $sql2 = "UPDATE `WEBSITE_LOGO` SET `MAIN_LOGO` = '$mainLogoName' WHERE `ID` = '1'";
        $result2 = mysqli_query($link,$sql2);

        if ($result2) {
           echo '<div class="container mt-3"><div class="alert alert-success text-center">Website Logo has been Updated</div></div>';
        }else{
          echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
        }
      }else{
        echo 'Cant upload';
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
      $target =  $basePath."/LOGOS/".$faviconName;

      //Upload the file into the temp dir
      if(move_uploaded_file($_FILES['favicon']['tmp_name'], $target)) {
        unlink($basePath."/LOGOS/".$faviconF);
        $sql = "UPDATE WEBSITE_LOGO SET FAVICON = '$faviconName' WHERE ID = '1'";
        $result = mysqli_query($link,$sql);

        if ($result) {
           echo '<div class="container mt-3"><div class="alert alert-success text-center">Website Favicon has been Updated</div></div>';
        }else{
          echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact developer!</div></div>';
        }
      }
    } 
  }
}

// Fetch Data
 $sqlF = "SELECT * FROM WEBSITE_LOGO WHERE ID = '1'";
 $resultF = mysqli_query($link,$sqlF);
 if ($resultF) {
    if(mysqli_num_rows($resultF)>0){
      $row = mysqli_fetch_array($resultF,MYSQLI_ASSOC);
      $logo = $row['MAIN_LOGO'];
      $favicon = $row['FAVICON'];
    }
  }

?>

 <div class="container" style="height: 100%; padding-bottom: 100px;">
  <?php include 'nav.php'; ?>
   <div class="card shadow mt-4 mb-4 col-md-8 col-sm-12 mx-auto">
    <div class="card-body">
      <h3 class="text-center">Website Details Management</h3>
      <form method="POST" enctype="multipart/form-data">
        <div class="row form-group">
          <div class="col-md-6">
            <label>Website Main Logo</label>
            <input type="file" name="mainLogo" class="form-control">
          </div>
          <div class="col-md-6 text-center">
            <?php if ($logo && $logo!='') { ?>
              <img style="height: 100px; width: 160px; background: #06319C; padding: 10px;" src="/LOGOS/<?php echo $logo; ?>">
            <?php } ?>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-6">
            <label>Website Favicon</label>
            <input type="file" name="favicon" class="form-control">
          </div>
          <div class="col-md-6 text-center">
            <?php if ($favicon && $favicon!='') { ?>
              <img style="height: 100px; width: 160px; background: #06319C; padding: 10px;" src="/LOGOS/<?php echo $favicon; ?>">
            <?php } ?>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-md-12 text-center mt-4">
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