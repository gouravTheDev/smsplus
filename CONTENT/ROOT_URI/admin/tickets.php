<title>SocialMySocial+ Admin</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<?php include '_menu.php'; ?>
 <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
                <h4 class="page-title text-uppercase font-medium font-14">SocialMySocial+ Ticket List</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="#">Ticket List</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="height: 100%;">
	<div class="card shadow mt-4 mb-4">
        <div class="card-body">
            <div class="table-responsive p-0 mt-4">
                <table class="table table-hover text-nowrap" id="ticketList">
                  <thead>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">Ticket Id</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Request</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="ticketListBody">
                  
                     <?php
                     $userId = $_SESSION["userId"];
                      $sql = "SELECT * FROM TICKETS";
                      $result = mysqli_query($link, $sql);
                      if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                          $i = 1;
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['TICKET_ID'] . '</td>
                         <td>' . $row['SUBJECT'] . '</td>
                         <td>' . $row['ORDER_ID'] . '</td>
                         <td>' . $row['REQUEST'] . '</td>
                         <td>' . $row['STATUS'] . '</td>
                         <td>
                          <div class="btn-group">
                            <a href="ticket-details?ticketid='.$row['TICKET_ID'].'" class="btn btn-primary"><i class="fas fa-external-link-alt"></i></a>
                          </div>
                         </td>';
                         $i++;
                          }
                        } else {
                          echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No ticket is raised till now!
            </div>';
                        }
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">Ticket Id</th>
                      <th scope="col">Order Id</th>
                      <th scope="col">Subject</th>
                      <th scope="col">Request</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>