<?php
$link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
$link->set_charset("utf8mb4");

if ($_SESSION['AdminLoggedIn']) {

	if (isset($_GET['getCategoryData'])) {
		$categoryId = $_GET['categoryId'];
		$sql = "SELECT * FROM CATEGORY WHERE `CATEGORY_ID` = '$categoryId' AND DELETED = 'FALSE'";
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

	if (isset($_GET['deleteUsers'])) {
		$userId = $_GET['userId'];

		$sql = "UPDATE USERS SET DELETED = 'TRUE' WHERE USER_ID = '$userId'";
		$result = mysqli_query($link, $sql);
		if ($result) {
			$data = json_encode("Deleted Successfully");
		} else {
			$data = null;
		}

	}

	echo $data;
}
