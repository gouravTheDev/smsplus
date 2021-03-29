<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<title>SocialMySocial+ Add Funds</title>

<?php include '_menuL.php'; ?>

<style>
  .StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }

  .CardField-postalCode {
    display: none;
  }
</style>

<script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID; ?>">
</script>
<script src="https://js.stripe.com/v3/"></script>
<?php
if (!$_SESSION['LoggedIn']) {
  echo "<script>window.location.href='login';</script>";
} else {
?>

  <div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-3">
        <h4 class="page-title text-uppercase font-medium font-14">Add Funds</h4>
      </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <div class="d-md-flex">
          <ol class="breadcrumb ml-auto">
            <!-- <li><a href="#">Funds</a></li> -->
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid pt-3 col-md-8 col-sm-12 mx-auto">
    <div class="card card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-active-tab" data-toggle="pill" href="#paypal-payment" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Paypal Payment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#stripe-payment" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Stripe Payment</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">

          <!-- Paypal tab Starts -->

          <div class="tab-pane fade show active" id="paypal-payment" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <div class="text-center mb-3">
              <img src="/assets/images/paypal.png" style="height: 80px; width: 280px;">
              <p>You can deposit funds with Paypal®. They will be automaticly added into your account!</p>
            </div>
            <div class="row">
              <div class="col-md-11 col-sm-12 mx-auto">
                <div class="form-group">
                  <label>Amount (USD)</label>
                  <input type="number" name="amount" id="amount" class="form-control" placeholder="10">
                </div>
              </div>
              <?php $userId = $_SESSION["userId"]; ?>
              <input type="hidden" id="userId" value="<?php echo $userId; ?>">
              <div class="col-md-11 col-sm-12 mx-auto">
                <h5>Note:</h5>
                <ul>
                  <li>Minimum Payment: $10</li>
                  <li>Maximum Payment: $10000000</li>
                  <li>Your Payment Credentials are safe with us.</li>
                </ul>
              </div>
              <div class="col-md-8 col-sm-12 mx-auto text-center mt-4">
                <div id="paypal-button-container"></div>
              </div>
              <div class="col-12 mx-auto">
                <div class="msgs">
                  <div class="alert alert-warning my-2 text-center font-weight-bold" id="paymentWarningPaypal" style="display: none;">Please wait. Don't refresh the page. We are processing your payment.</div>
                  <div class="alert alert-warning my-2 text-center font-weight-bold" id="paymentWarningPaypal2" style="display: none;"></div>
                  <div class="alert alert-danger my-2 text-center font-weight-bold" id="paymentFailedPaypal" style="display: none;">Payment could not be completed. Please try again or contact support!</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Paypal tab Starts -->

          <!-- Stripe tab Starts -->

          <div class="tab-pane fade" id="stripe-payment" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <div class="text-center mb-3">
              <img src="/assets/images/stripe.png" style="height: 100px;">
              <p>You can deposit funds with Stripe. They will be automaticly added into your account!</p>
            </div>
            <div class="col-12">
              <div class="col-md-12 col-sm-12 mx-auto">
                <div class="form-group">
                  <label>Amount (USD)</label>
                  <input type="number" name="amount" id="amountStripe" class="form-control" placeholder="10">
                </div>
              </div>
              <div class="col-md-11 col-sm-12 mx-auto">
                <h5>Note:</h5>
                <ul>
                  <li>Minimum Payment: $10</li>
                  <li>Maximum Payment: $10000000</li>
                  <li>Your Payment Credentials are safe with us.</li>
                </ul>
              </div>
              <div id="card-element" class="mx-auto shadow" style="
                      width: 40em;
                      margin-top: 2em;
                      margin-bottom: 4em;
                      border: 1px solid #CEC8CE;
                    ">
                <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display form errors. -->
              <div id="card-errors" role="alert"></div>
            </div>

            <div class="col-12 text-center">
              <button type="button" class="btn btn-success" onclick="submitStripe();" id="submitBtn">Pay Using Stripe</button>
            </div>

            <div class="msgs">
              <div class="alert alert-warning my-2 text-center font-weight-bold" id="paymentWarningStripe" style="display: none;">Please wait. Don't refresh the page. We are processing your payment.</div>
              <div class="alert alert-warning my-2 text-center font-weight-bold" id="paymentWarningStripe2" style="display: none;"></div>
            </div>

          </div>

          <!-- Stripe tab Ends -->

        </div>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="display: none; " id="SuccessmodalButton">
    Launch demo modal
  </button>

  <!-- Success Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="row my-4 py-4">
            <div class="col-12 text-center">
              <img src="/assets/images/checked.svg" style="height: 150px; width: 150px;">
              <h3 class="font-weight-bold mt-3">Thank You.</h3>
              <h3 class="font-weight-bold mt-3">Your Transaction is successful.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2" style="display: none; " id="ErrormodalButton">
    Launch demo modal2
  </button>

  <!-- Success Modal -->
  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="row my-4 py-4">
            <div class="col-12 text-center">
              <img src="/assets/images/cancel.svg" style="height: 150px; width: 150px;">
              <h3 class="font-weight-bold mt-3">We are sorry.</h3>
              <h3 class="font-weight-bold mt-3">Your Transaction could not be completed. Please try again!</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID; ?>">
  </script>
  <script src="https://js.stripe.com/v3/"></script>

  <script>
    // Paypal
    paypal.Buttons({
      createOrder: function(data, actions) {
        document.getElementById('paymentWarningPaypal').style.display = "block";
        // This function sets up the details of the transaction, including the amount and line item details.
        var priceAmount = document.getElementById('amount').value;
        if (!priceAmount || priceAmount == '' || parseInt(priceAmount) < 10) {
          document.getElementById('paymentWarningPaypal').style.display = "none";
          document.getElementById('paymentWarningPaypal2').style.display = "block";
          document.getElementById('paymentWarningPaypal2').innerHTML = "Minimum Amount is $10";
          return;
        } else {
          document.getElementById('paymentWarningPaypal2').style.display = "none";
          return actions.order.create({
            purchase_units: [{
              amount: {
                "value": priceAmount
              }
            }]
          });
        }
      },
      onApprove: function(data) {
        document.getElementById('paymentWarningPaypal2').style.display = "none";
        var userId = document.getElementById('userId').value;
        let formData = new FormData();
        formData.append('orderID', data.orderID);
        formData.append('userId', userId);
        return fetch('/paypalPaymentHandle.php', {
          method: "POST",
          body: formData
        }).then(function(res) {
          return res.json();
        }).then(function(details) {
          document.getElementById('paymentWarningPaypal').style.display = "none";
          if (details.result.status == 'COMPLETED') {
            document.getElementById('amount').value = '';
            document.getElementById('SuccessmodalButton').click();
          }
        });
      },
      onCancel: function(data) {
        document.getElementById('paymentWarningPaypal2').style.display = "none";
        document.getElementById('paymentWarningPaypal').style.display = "none";
        document.getElementById('ErrormodalButton').click();
      }
    }).render('#paypal-button-container');
  </script>
  <script>
    var stripe = Stripe("pk_test_51IaQykHj7GRvLBRUVA9yxqeY780RadiWpRW6ES2cBgfJnd1oZdVaivHV8kJfEs2NT3brGURoaa88RogaGAUaXiyR002OOUGsYP");

    var elements = stripe.elements();
    var style = {
      base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
          color: "#aab7c4",
        },
      },
      invalid: {
        color: "#fa755a",
        iconColor: "#fa755a",
      },
    };
    // Create an instance of the card Element.
    var card = elements.create("card", {
      hidePostalCode: true,
      style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount("#card-element");

    // Handle real-time validation errors from the card Element.
    card.on("change", function(event) {

      var displayError = document.getElementById("card-errors");
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = "";
      }
    });

    // Handle form submission.
    function submitStripe() {
      document.getElementById('paymentWarningStripe').style.display = "block";
      document.getElementById("submitBtn").disabled = true;
      let amount = document.getElementById('amountStripe').value;
      if (!amount || amount == '' || parseInt(amount) < 10) {
        document.getElementById('paymentWarningStripe').style.display = "none";
        document.getElementById('paymentWarningStripe2').style.display = "block";
        document.getElementById('paymentWarningStripe2').innerHTML = "Minimum Amount is $10";
        return;
      } else {
        stripe.createToken(card).then(function(result) {
          if (result.error) {
            document.getElementById("submitBtn").disabled = false;
            // Inform the user if there was an error.
            var errorElement = document.getElementById("card-errors");
            errorElement.textContent = result.error.message;
          } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
          }
        });
      }

    }

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      let userId = document.getElementById('userId').value;
      let amountToPay = document.getElementById('amountStripe').value;
      let formData = new FormData();
      formData.append('tokenId', token.id);
      formData.append('userId', userId);
      formData.append('amount', amountToPay);
      return fetch('/stripeHandle.php', {
        method: "POST",
        body: formData
      }).then(function(res) {
        return res.json();
      }).then(function(details) {
        document.getElementById('paymentWarningStripe').style.display = "none";
        console.log(details)
        if (details.paid) {
            card.mount("#card-element");
            document.getElementById('amountStripe').value = '';
            document.getElementById('SuccessmodalButton').click();
        }else{
            document.getElementById('paymentWarningStripe2').style.display = "none";
            document.getElementById('paymentWarningStripe').style.display = "none";
            document.getElementById('ErrormodalButton').click();
        }
      });

    }
  </script>
<?php
}
?>