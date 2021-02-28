<?php 
$link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
$link->set_charset("utf8mb4");

if ($_SESSION['AdminLoggedIn']) {

	if (isset($_GET['deleteTicket'])) {
	 $ticketId = $_GET['ticketId'];
	 $sql = "UPDATE TICKETS SET DELETED = 'TRUE' WHERE TICKET_ID = '$ticketId'";
	 $result = mysqli_query($link,$sql);
	 if ($result) {
	    $data = json_encode("Deleted Successfully");
	  }else{
	    $data = null;
	  }

	}

	if (isset($_GET['closeTicket'])) {
	 $ticketId = $_GET['ticketId'];
	 $sql = "UPDATE TICKETS SET STATUS = 'Closed' WHERE TICKET_ID = '$ticketId'";
	 $result = mysqli_query($link,$sql);
	 if ($result) {
	    $data = json_encode("Ticket Updated!");
	  }else{
	    $data = null;
	  }

	}

	echo $data;
}
?>