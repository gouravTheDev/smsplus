<?php

if (isset($_POST['tokenId'])) {
include 'stripe/init.php';

include 'CONFIG/config-local.php';

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

$link = new \MySQLi(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
$link->set_charset("utf8");

  $tokenId = $_POST['tokenId'];
  $userId = $_POST['userId'];
  $amount = $_POST['amount'];

  $sqlF = "SELECT * FROM USERS WHERE USER_ID = '$userId'";
	$resultF = mysqli_query($link, $sqlF);

	$rowF = mysqli_fetch_array($resultF, MYSQLI_ASSOC);
	$wallet = $rowF['WALLET_MONEY'];
	$emailId = $rowF['EMAIL'];
	$fullName = $rowF['FIRST_NAME']." ".$rowF['LAST_NAME'];
  
  $stripe = new \Stripe\StripeClient(STRIPE_SK);
  
  $stripePayment = $stripe->charges->create([
    'amount' => $amount,
    'currency' => 'USD',
    'source' => $tokenId,
    'description' => 'My First Test Charge (created for API docs)',
  ]);

  if ($stripePayment->paid) {

  	$todayDate = date("Y-m-d");

  		$orderId = $tokenId;
      $status = "COMPLETED";
      $paymentId = $stripePayment->id;
      $currency = strtoupper($stripePayment->currency);
      $amountValue = $stripePayment->amount;
      $payerName = $stripePayment->billing_details->name;

      $sql = "INSERT INTO PAYMENTS (`ORDER_ID`, `PAYMENT_ID`, `USER_ID`, `AMOUNT`, `CURRENCY`, `PAYMENT_TYPE`, `DATE`, `STATUS`)VALUES('$orderId', '$paymentId', '$userId', '$amountValue', '$currency', 'Stripe', '$todayDate', '$status')";
      $result = mysqli_query($link, $sql);

      if ($result) {
      	if (!$wallet || $wallet == '') {
          $wallet = $amountValue;
        }else{
          $wallet = (double) $wallet;
          $wallet = $wallet + $amountValue;
        }

        //Update User Account 
        $sqlU = "UPDATE USERS SET `WALLET_MONEY` = '$wallet' WHERE USER_ID = '$userId'";
        $resultU = mysqli_query($link, $sqlU);

        echo json_encode($stripePayment);
        
      }else{
        echo json_encode(mysqli_error($link));
      }
  }
}
