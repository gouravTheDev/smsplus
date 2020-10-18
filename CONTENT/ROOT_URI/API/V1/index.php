<?php
$link = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
$link->set_charset("utf8");
if(mysqli_connect_error()){
    die("ERROR: UNABLE TO CONNECT: ".mysqli_connect_error());
}

if (isset($_POST['submitContact'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	$stmt = $link->prepare("INSERT INTO CONTACT (`NAME`, `EMAIL`, `PHONE`, `SUBJECT`, `MESSAGE`)VALUES(?, ?, ?, ?, ?)");

	$stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

	$resultInsert = $stmt->execute();
	if ($resultInsert) {
		$data = "success";
	}else{
		$errorm = "Sorry";
	}
}
$myObj = new stdClass();
$myObj->data = $data;
$myObj->errorm = $errorm;
$myJSON = json_encode($myObj);
echo $myJSON;
	
?>
