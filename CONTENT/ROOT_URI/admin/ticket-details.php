<title>SocialMySocial+ Admin</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<script>
  if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
  }
</script>

<?php include '_menu.php'; ?>
<?php
$ticketId = $_GET['ticketid'];

//Fetch Ticket Details
$sql = "SELECT * FROM TICKETS WHERE TICKET_ID = '$ticketId'";
$result = mysqli_query($link, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $userId = $row['USER_ID'];
        $subject = $row['SUBJECT'];
        $orderId = $row['ORDER_ID'];
        $request = $row['REQUEST'];
        $message = $row['MESSAGE'];
        $dateTime = $row['DATE_TIME'];
    } else {
        echo '<script>window.location.href="tickets"</script>';
    }
} else {
    echo '<script>window.location.href="tickets"</script>';
}

//Fetch User Details
if ($userId && $userId != '') {
    $sqlU = "SELECT * FROM USERS WHERE USER_ID = '$userId'";
    $resultU = mysqli_query($link, $sqlU);
    if ($resultU) {
        if (mysqli_num_rows($resultU) > 0) {
            $rowU = mysqli_fetch_array($resultU, MYSQLI_ASSOC);
            $firstName = $rowU['FIRST_NAME'];
            $lastName = $rowU['LAST_NAME'];
            $userName = $rowU['USER_NAME'];
            $email = $rowU['EMAIL'];
        } else {
            echo '<script>window.location.href="tickets"</script>';
        }
    } else {
        echo '<script>window.location.href="tickets"</script>';
    }

}?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">SocialMySocial+ Ticket Details</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">Ticket Details</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container pt-4" style="height: 100%;">
    <div class="card shadow">
    	<div class="card-body">
			 <div class="row">
            <div class="col-md-12 col-sm-12 mb-2">
            	<h3 class="font-weight-bold">User Details</h3>
            </div>
             <div class="col-md-4 col-sm-12 mb-2">
            	<h5>Name:- <?php echo $firstName." ".$lastName;  ?></h5>
            </div>
             <div class="col-md-4 col-sm-12 mb-2">
            	<h5>Email:- <?php echo $email;  ?></h5>
            </div>
             <div class="col-md-4 col-sm-12 mb-2">
            	<h5>User Name:- <?php echo $userName;  ?></h5>
            </div>
        </div> 
        <div class="row mt-4">
            <div class="col-md-12 col-sm-12 mb-2">
            	<h3 class="font-weight-bold">Ticket Details</h3>
            </div>
            <div class="col-md-6 col-sm-12 mb-2">
            	<h5>Ticket Id:- <?php echo $ticketId;  ?></h5>
            </div>
            <div class="col-md-6 col-sm-12 mb-2">
            	<h5>Raised Time:- <?php echo $dateTime;  ?></h5>
            </div>
             <div class="col-md-4 col-sm-12 mb-2">
            	<h5>Subject:- <?php echo $subject;  ?></h5>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">
            	<h5>Order Id:- <?php echo $orderId;  ?></h5>
            </div>
            <div class="col-md-4 col-sm-12 mb-2">
            	<h5>Request:- <?php echo $request;  ?></h5>
            </div>
            <div class="col-md-12 col-sm-12">
            	<h5>Message:- <?php echo $message;  ?></h5>
            </div>
        </div>    		
    	</div>
    </div>
    <div class="row mt-4 mb-3">
    	<div class="col-md-12">
    		<h3 class="font-weight-bold ml-2">Replies:-</h3>
    	</div>
    </div>
    <?php 
    //Submit Reply
	if ($_POST['submitReply']) {
		$replyText = $_POST['replyText'];
		if($replyText && $replyText!=''){
			$ticketId = $_POST['ticketId'];
			$userId = $_SESSION['userId'];
			$userRole = 'ADMIN';
			$replyId = "R-".D_create_UserId();
			date_default_timezone_set("America/New_York");
			$dateTime = date("Y-m-d")." ".date("h:i");
			$stmt = $link->prepare("INSERT INTO REPLIES (`REPLY_ID`, `TICKET_ID`, `USER_ID`, `USER_ROLE`, `TEXT`, `DATE_TIME`)VALUES(?, ?, ?, ?, ?, ?)");

			$stmt->bind_param("ssssss", $replyId, $ticketId, $userId, $userRole, $replyText, $dateTime);

			$resultInsert = $stmt->execute();
			if($resultInsert){
				echo '<div class="alert alert-success text-center font-weight-bold">Your reply has been submitted!</div>';
			}else{
				echo '<div class="alert alert-warning text-center font-weight-bold">Your reply could not be submitted!</div>';
			}
		}
	}
    ?>
    <div class="card shadow">
    	<div class="card-body">
    		<form method="POST">
    			<input type="hidden" name="ticketId" value="<?php echo $ticketId; ?>">
				<textarea class="form-control mb-1" rows="2" placeholder="Write a comment" name="replyText" required></textarea>
				<div class="mr-auto text-right">
					<input type="submit" name="submitReply" class="btn btn-success mt-2" value="Reply">
				</div>
			</form>
    	</div>
    </div>
    <?php 
    	 $sqlR = "SELECT * FROM REPLIES WHERE TICKET_ID = '$ticketId' ORDER BY ID ASC";
          $resultR = mysqli_query($link, $sqlR);
          if ($resultR) {
            if (mysqli_num_rows($resultR) > 0) {
              $i = 1;
              while ($rowR = mysqli_fetch_array($resultR, MYSQLI_ASSOC)) { ?>
              	<div class="card shadow" style="background: ">
              		<div class="card-body">
              			<?php if ($rowR['USER_ROLE'] == 'ADMIN') { ?>
              				<h3><span class="badge badge-warning">Admin Reply</span></h3>
              			<?php }else{ ?>
              				<h3><span class="badge badge-primary">User Reply</span></h3>
              			<?php } ?>
              			<span><?php echo $rowR['DATE_TIME']; ?></span>
              			<h4 class="mt-3"><?php echo $rowR['TEXT']; ?></h4>
              		</div>
              	</div>
            <?php }
          }else{

          }
      }
    ?>
</div>