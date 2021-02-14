<title>SocialMySocial+ Tickets</title>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<?php include '_menuL.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{

?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">Manage your tickets</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">Tickets</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-2">
<?php 
//Submit Tickets
if (isset($_POST['submitTicket'])) {
  $userId = $_SESSION["userId"];
  $subject = $_POST['subject'];
  $orderId = $_POST['orderId'];
  $request = $_POST['request'];
  $message = $_POST['message'];

  $ticketId = "T-".D_create_UserId();
  date_default_timezone_set("America/New_York");
  $dateTime = date("Y-m-d")." ".date("h:i");

  $stmt = $link->prepare("INSERT INTO `TICKETS` (`USER_ID`, `TICKET_ID`, `SUBJECT`, `ORDER_ID`, `REQUEST`, `MESSAGE`, `DATE_TIME`) VALUES (?, ?, ?, ?, ?, ?, ?)");

  $stmt->bind_param("sssssss", $userId, $ticketId, $subject, $orderId, $request, $message, $dateTime);
  if ($stmt->execute()) {
    echo '<div class="container mt-3"><div class="alert alert-success text-center">Ticket Raised Successfully!</div></div>';
  }else{
    echo '<div class="container mt-3"><div class="alert alert-danger text-center">An error occured! Please try again or contact administrator!</div></div>';
  }
}
?>
    <!-- <h1 class="text-center">Tickets</h1> -->
    <div class="col-md-10 col-sm-12 mx-auto">
    	<div class="card card-tabs" >
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-active-tab" data-toggle="pill" href="#custom-tabs-one-active" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">New Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-archived" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Your Tickets</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-active" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="col-md-10 col-sm-12 mx-auto">
                    <form method="POST">
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" name="subject">
                                <option value="Order">Order</option>
                                <option value="Payment">Payment</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order ID</label>
                            <input type="text" name="orderId" placeholder="For multiple orders, please separate them using comma" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Request</label>
                            <select class="form-control" name="request">
                                <option value="Refill">Refill</option>
                                <option value="Cancel">Cancel</option>
                                <option value="Speed Up">Speed Up</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message (optional)</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group mt-4 pt-3">
                            <button type="submit" name="submitTicket" class="btn btn-block btnSmm">Submit Ticket</button>
                        </div>
                    </form>
                </div>
                
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-archived" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
               
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="ticketList">
                      <thead>
                        <tr>
                          <th scope="col">Serial</th>
                          <th scope="col">Ticket Id</th>
                          <th scope="col">Order Id</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Request</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                         <?php
                         $userId = $_SESSION["userId"];
                          $sql = "SELECT * FROM TICKETS WHERE USER_ID = '$userId'";
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
                          <th scope="col">Action</th>
                        </tr>
                      </tfoot>
                    </table>
                </div> 
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php 
	}
?>
