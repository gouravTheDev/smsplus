<title>SocialMySocial+ Services</title>

<?php include '_menuL.php'; ?>
<?php 
if (!$_SESSION['LoggedIn']) {
	echo "<script>window.location.href='login';</script>";
}else{
$text = "Fast Delivery
5 comments (per 1000 order quantity)
All comments from accounts with 10 000+ Followers";
?>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">Services</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-0">
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
                     <th scope="col">Details</th>
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
                         <td>
                          <div class="btn-group">
                            <button onclick= "fetchServiceDetails(`' . $row['SERVICE_ID'] . '`)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-info-circle"></i></button>
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
                     <th scope="col">Details</th>
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
<!-- Service Details Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="serviceTitle"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="serviceDetails">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Service Details End -->
 <script type="text/javascript">
   async function fetchServiceDetails(serviceId) {
     var response = await fetch("/API/V1/?getServiceDetails&serviceId=" + serviceId);
     response = await response.json();
     response = response.data;
     document.getElementById('serviceTitle').innerHTML = response.NAME;
     document.getElementById('serviceDetails').innerHTML = response.DESCRIPTION;
   }
 </script>
<?php 
	}
?>
