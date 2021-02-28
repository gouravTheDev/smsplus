<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
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
            $sql = "SELECT * FROM TICKETS WHERE DELETED = 'FALSE'";
            $result = mysqli_query($link, $sql);
            if ($result) {
              if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $ticketStatus = '<span class="badge badge-primary" style="color: #fff;">'.$row['STATUS'].'</span>';
                  echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['TICKET_ID'] . '</td>
                         <td>' . $row['SUBJECT'] . '</td>
                         <td>' . $row['ORDER_ID'] . '</td>
                         <td>' . $row['REQUEST'] . '</td>
                         <td>' . $ticketStatus . '</td>
                         <td>
                          <div class="btn-group">
                            <a href="details?ticketid=' . $row['TICKET_ID'] . '" class="btn btn-sm btn-primary"><i class="fas fa-external-link-alt"></i></a>
                            <button onclick= "deleteTicket(`'.$row['TICKET_ID'].'`)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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

 <script type="text/javascript">
   async function deleteTicket(ticketId) {
    var result = confirm("Are you sure you want to delete?");
    if (result) {
      var response = await fetch("api/?deleteTicket&ticketId=" + ticketId);
      response = await response.json();
      window.location.reload();
    }
  }
 </script>