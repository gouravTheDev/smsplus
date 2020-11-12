<title>SMS+ Add Funds</title>

<?php include '_menuL.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{
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

<div class="container-fluid pt-3">
    <!-- <h1 class="text-center">Add Funds</h1> -->
    <div class="col-md-8 col-sm-12 mx-auto">
    	<div class="card shadow">
    		<div class="card-body" style="font-size: 1.2em;">
    			<form method="POST" class="col-md-10 col-sm-12 mx-auto">
    				<div class="form-group">
    					<label>Method</label>
    					<select class="form-control" name="method">
    						<option value="paypal">PayPal / Credit Card (Min. $20)</option>
    						<option value="visa">Visa / Master Card - 5% Bonus</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Amount</label>
						<input type="number" name="amount" class="form-control" placeholder="Enter Amount">
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
