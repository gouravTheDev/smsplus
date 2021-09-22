 <script>
   if (window.history.replaceState) {
     window.history.replaceState(null, null, window.location.href);
   }
 </script>
 <title>SocialMySocial+ Admin</title>


 <div class="page-breadcrumb bg-white">
   <div class="row align-items-center">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
       <h4 class="page-title text-uppercase font-medium font-14">Contact List</h4>
     </div>
     <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
       <div class="d-md-flex">
         <ol class="breadcrumb ml-auto">
           <li><a href="#">Contacts</a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div class="container" style="height: 100%;">
   <div class="card shadow mt-4 mb-4">
     <div class="card-body">
       <div class="table-responsive p-0 mt-4">
         <table class="table table-hover text-nowrap" id="categoryList">
           <thead>
             <tr>
               <th scope="col">No.</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Date</th>
               <th scope="col">Subject</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody id="ticketListBody">
             <?php
              $sql = "SELECT * FROM CONTACTS ORDER BY ID DESC";
              $result = mysqli_query($link, $sql);
              if ($result) {
                if (mysqli_num_rows($result) > 0) {
                  $i = 1;
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['NAME'] . '</td>
                         <td>' . $row['EMAIL'] . '</td>
                         <td>' . date("d/m/Y", strtotime($row['DATE'])) . '</td>
                         <td>' . substr($row['SUBJECT'], 0, 40) . '...</td>
                         <td>
                          <div class="pl-3">
                            <button onclick= "fetchData(`' . $row['ID'] . '`)" data-toggle="modal" data-target="#contactDetailsModal" title="Details" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></button>
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
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Date</th>
               <th scope="col">Action</th>
             </tr>
           </tfoot>
         </table>
       </div>
     </div>
   </div>
 </div>

 <!-- Contact Details modal -->

 <div class="modal fade" id="contactDetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content" style="background: #F7F0FA;">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLongTitle">Contact Details</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form method="POST">
         <input type="hidden" name="updateFormServiceType" value="true">
         <div class="modal-body">
           <div class="row">
             <input type="hidden" class="form-control" name="editcontactId" id="editcontactId" required>

             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label class="font-weight-bold">Name</label>
                 <h5 id="editName"></h5>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label class="font-weight-bold">Email</label>
                 <h5 id="editMail"></h5>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label class="font-weight-bold">Subject</label>
                 <h5 id="editSub"></h5>
               </div>
             </div>
             <div class="col-md-6 col-sm-12">
               <div class="form-group">
                 <label class="font-weight-bold">Message</label>
                 <h5 id="editMessage"></h5>
               </div>
             </div>
           </div>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- Edit Category ends -->

 <script type="text/javascript">
   async function deleteData(contactId) {
     var result = confirm("Are you sure you want to delete this record?");
     if (result) {
       var response = await fetch("api/?deleteData&contactId=" + contactId);
       response = await response.json();
       window.location.reload();
     }
   }
   async function fetchData(contactId) {
     console.log(contactId);
     var response = await fetch("api/?getData&contactId=" + contactId);
     response = await response.json();
     console.log(response);
     document.getElementById('editName').innerHTML = response.NAME;
     document.getElementById('editMessage').innerHTML = response.MESSAGE;
     document.getElementById('editSub').innerHTML = response.SUBJECT;
     document.getElementById('editMail').innerHTML = response.EMAIL;
   }
 </script>