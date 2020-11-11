<title>SMS+ Tickets</title>

<?php include '_menuL.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{
$text = "Fast Delivery
5 comments (per 1000 order quantity)
All comments from accounts with 10 000+ Followers";
?>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
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

<div class="container-fluid pt-0">
    <h1 class="text-center">Raise Your Ticket</h1>
    <div class="col-md-6 col-sm-12 mx-auto">
    	<div class="card shadow">
    		<div class="card-body" style="font-size: 1.2em;">
    			<form method="POST">
    				<div class="form-group">
    					<label>Method</label>
    					<select class="form-control" name="method">
    						<option value="paypal">PayPal / Credit Card (Min. $20)</option>
    						<option value="visa">Visa / Master Card - 5% Bonus</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Amount</label>
						<input type="number" name="amount" class="form-control">
    				</div>
    				<div class="form-group mt-4 pt-3">
    					<button type="button" class="btn btn-block btnSmm">Proceed to Pay</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
</div>
<?php 
	}
?>
