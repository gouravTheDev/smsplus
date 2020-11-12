<title>SMS+ Dashboard</title>

<?php include '_menuL.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{
?>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">SMS+ Dashboard</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">Dashboard</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card shadow" style="background: #2F90F0;">
        <div class="card-body text-center">
            <img src="assets/images/demouser.jpg" alt="user-img" width="80" height="80" 
                                class="mb-2" style="border-radius: 50%;">
            <h1 style="color: #ffffff;">Welcome <?php echo $userName; ?> to SMS+ User Dashboard</h1>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>0</h2>
                            <h4>Your Total Orders</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>$0.000</h2>
                            <h4>Account Spending</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>Not Verified</h2>
                            <h4>Account Status</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
	}
?>
