<title>SMS+ Dashboard</title>

<?php include '_menuL.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{
?>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
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
    <h1 class="text-center">Dashboard Elements are coming soon!</h1>
</div>
<?php 
	}
?>
