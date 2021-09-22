<?php
$link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
$link->set_charset("utf8mb4");

if ($_SESSION['AdminLoggedIn']) {

	if (isset($_GET['getData'])) {
		$contactId = $_GET['contactId'];
		$sql = "SELECT * FROM CONTACTS WHERE `ID` = '$contactId'";
		$result = mysqli_query($link, $sql);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
			} else {
				$data = null;
			}
			$data = json_encode($data);
		}
	}

	if (isset($_GET['deleteServiceType'])) {
		$contactId = $_GET['contactId'];
		$sqlS = "SELECT * FROM SERVICE WHERE ID = '$contactId'";
		$resultS = mysqli_query($link, $sqlS);

		if (mysqli_num_rows($resultS) > 0) {
			$data = json_encode("Could Not Delete Category");
		} else {
			$sql = "UPDATE CONTACTS SET DELETED = 'TRUE' WHERE ID = '$contactId'";
			$result = mysqli_query($link, $sql);
			if ($result) {
				$data = json_encode("Deleted Successfully");
			} else {
				$data = null;
			}
		}
	}

	echo $data;
}
