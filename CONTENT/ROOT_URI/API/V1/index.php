<?php
$link = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
$link->set_charset("utf8");
if (mysqli_connect_error()) {
  die("ERROR: UNABLE TO CONNECT: " . mysqli_connect_error());
}

// if (isset($_POST['submitContact'])){
// 	$name = $_POST['name'];
// 	$email = $_POST['email'];
// 	$subject = $_POST['subject'];
// 	$phone = $_POST['phone'];
// 	$message = $_POST['message'];

// 	$stmt = $link->prepare("INSERT INTO CONTACT (`NAME`, `EMAIL`, `PHONE`, `SUBJECT`, `MESSAGE`)VALUES(?, ?, ?, ?, ?)");

// 	$stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

// 	$resultInsert = $stmt->execute();
// 	if ($resultInsert) {
// 		$data = "success";
// 	}else{
// 		$errorm = "Sorry";
// 	}
// }

// Check Quotation exists
if (isset($_GET['checkUserName'])) {
  $userName = $_GET['userName'];
  $sql = "SELECT * FROM USERS WHERE `USER_NAME` = '$userName'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "present";
  } else {
    $data = null;
  }
}

// Check User Name edit
if (isset($_GET['checkUserNameEdit'])) {
  $userName = $_GET['userName'];
  $userId = $_GET['userId'];
  $sql = "SELECT * FROM USERS WHERE `USER_NAME` = '$userName' AND `USER_ID` != '$userId'";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    $data = "present";
  } else {
    $data = null;
  }
}

// Check User Name edit
if (isset($_GET['getServiceDetails'])) {
  $serviceId = $_GET['serviceId'];
  $sql = "SELECT * FROM SERVICE WHERE `SERVICE_ID` = '$serviceId' AND DELETED = 'FALSE'";
  $result = mysqli_query($link, $sql);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    } else {
      $data = null;
    }
  }
}

// Get Categories

if (isset($_GET['getCategories'])) {
  $sql = "SELECT * FROM CATEGORY WHERE DELETED = 'FALSE'";
  $result = mysqli_query($link, $sql);
  $response = [];
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($response, $row);
      }
    }
    $data = $response;
  }
}

// Get Service

if (isset($_GET['getServices'])) {
  $categoryId = $_GET['categoryId'];
  $sql = "SELECT * FROM SERVICE WHERE CATEGORY_ID = '$categoryId' AND DELETED = 'FALSE'";
  $result = mysqli_query($link, $sql);
  $response = [];
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        array_push($response, $row);
      }
    }
    $data = $response;
  }
}

// Send back response
$myObj = new stdClass();
$myObj->data = $data;
$myObj->errorm = $errorm;
$myJSON = json_encode($myObj);
echo $myJSON;
