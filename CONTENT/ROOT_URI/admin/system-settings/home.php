 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">System Settings List</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">System Settings/List</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container" style="height: 100%; padding-bottom: 100px;">
  <?php include 'nav.php'; ?>
   <div class="card shadow mt-4 mb-4">
    <div class="card-body">
      <h3 class="text-center">System Settings</h3>
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