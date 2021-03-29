<?php

// Capture Payment

namespace Sample\CaptureIntentExamples;
require __DIR__ . '/vendor/autoload.php';
include 'paypalClient.php';

use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
// use PayPalCheckoutSdk\Orders\OrdersGetRequest;

class CaptureOrder
{
  public static function captureOrder($orderId, $debug=false, $userId)
  {

    $link = new \MySQLi(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
    $link->set_charset("utf8");

    $sqlF = "SELECT * FROM USERS WHERE USER_ID = '$userId'";
    $resultF = mysqli_query($link, $sqlF);

    $rowF = mysqli_fetch_array($resultF, MYSQLI_ASSOC);
    $wallet = $rowF['WALLET_MONEY'];
    $emailId = $rowF['EMAIL'];
    $fullName = $rowF['FIRST_NAME']. " ".$rowF['LAST_NAME'];

    $request = new OrdersCaptureRequest($orderId);

    // 3. Call PayPal to capture an authorization
    $client = PayPalClient::client();
    $response = $client->execute($request);

    if ($response) {

      $todayDate = date("Y-m-d");

      $orderId = $response->result->id;
      $status = $response->result->status;
      $paymentId = $response->result->purchase_units[0]->payments->captures[0]->id;
      $currency = $response->result->purchase_units[0]->payments->captures[0]->amount->currency_code;
      $amountValue = $response->result->purchase_units[0]->payments->captures[0]->amount->value;
      $payerName = $response->result->purchase_units[0]->shipping->name->full_name;

      $sql = "INSERT INTO PAYMENTS (`ORDER_ID`, `PAYMENT_ID`, `USER_ID`, `AMOUNT`, `CURRENCY`, `PAYMENT_TYPE`, `DATE`, `STATUS`)VALUES('$orderId', '$paymentId', '$userId', '$amountValue', '$currency', 'Paypal', '$todayDate', '$status')";
      $result = mysqli_query($link, $sql);

      if ($result) {

        if (!$wallet || $wallet == '') {
          $wallet = $amountValue;
        }else{
          $wallet = (double) $wallet;
          $wallet = $wallet+$amountValue;
        }

        //Update User Account 
        $sqlU = "UPDATE USERS SET `WALLET_MONEY` = '$wallet' WHERE USER_ID = '$userId'";
        $resultU = mysqli_query($link, $sqlU);

        // //Send notification to admin
        // $dateTime = date('Y-m-d H:i:s');
        // $title = "New Payment received";
        // $message = "Payment has been done for assignment- ".$assignmentId;
        // $linkToGo = "assignmentdetails?assignmentId=".$assignmentId;

        // $stmtNo = $link->prepare("INSERT INTO NOTIFICATIONS (`USER_TYPE`, `USER_ID`, `TITLE`, `MESSAGE`, `LINK`, `DATE_TIME`, `STATUS`)VALUES('ADMIN', ?, ?, ?, ?, ?, 'pending')");

        // $stmtNo->bind_param("sssss", $userId, $title, $message, $linkToGo, $dateTime);

        // $resultInsertNo = $stmtNo->execute();

        // SEND MAIL TO USER
        // $mailSubject = "Balance Added to Wallet";
        // $mailMessage = " <html>
        //           <h3>Welcome ". $fullName." to Best Grade Assignment. We have the best professional experts and we provide the best solution to every assignment. We provide the best assignment solution at a cheap rate and fast. </h3>
        //           <h3>You have paid for assignment with assignment Id:- ".$assignmentId."</h3>
        //           <h3>Payment Details:- </h3>
        //           <h3>Amount:- ".$currency."-".$amountValue."</h3>
        //           <h3>Payer Name:- ".$payerName."</h3>
        //           <h3>Your payment will be processed and approved by our experts. For any update regarding your assignment you will be notified in your dashboard. </h3>
        //           <h3>You can manage your assignments in your <a href='https://web.bestgradeassignment.com/'>dashboard </a> anytime.</h3>
        //           <p>You can check our <a href='https://bestgradeassignment.com/'>website </a>for more information. </p>
        //           <p>Thanks and regards.</p>
        //           </body>
        //           </html>";
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // $headers .= 'From: Best Grade<no-reply@bestgradeassignment.com>' . "\r\n";

        // mail($emailId = $rowF['EMAIL'];,$mailSubject,$mailMessage,$headers);

        // //Send mail to admin
        // $mailSubject = "Payment Received for assignment Id:- ".$assignmentId;
        // $mailMessage = " <html>
        //           <h3>Welcome to Best Grade Assignment Admin Panel. </h3>
        //           <h3>A new payment has been received for an assignment with Assignment Id:- ".$assignmentId.". </h3>
        //           <h3>Payment Id:- ".$captureId."</h3>
        //           <h3>User Id:- ".$userId."</h3>
        //           <h3>Amount:- ".$currency."-".$amountValue."</h3>
        //           <h3>Payer Name:- ".$payerName."</h3>
        //           <h3>Please review the payment and approve the assignment.  </h3>
        //           <h3>You can manage the assignments in your <a href='https://web.bestgradeassignment.com/admin/'>dashboard </a> anytime.</h3>
        //           <p>Thanks and regards.</p>
        //           </body>
        //           </html>";
        // $headers = "MIME-Version: 1.0" . "\r\n";
        // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // $headers .= 'From: Best Grade<no-reply@bestgradeassignment.com>' . "\r\n";

        // mail(ADMIN_MAIL,$mailSubject,$mailMessage,$headers);


        echo json_encode($response);
      }else{
        echo json_encode(mysqli_error($link));
      }
    }

    // echo json_encode($response);
  }
}

if (isset($_POST['orderID'])) {
  $orderId = $_POST['orderID'];
  $userId = $_POST['userId'];
  CaptureOrder::captureOrder($orderId, true, $userId);
}


?>