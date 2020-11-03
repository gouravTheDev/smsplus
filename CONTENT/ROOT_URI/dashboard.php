<?php include '_menu.php'; ?>
<?php 
	if (!$_SESSION['LoggedIn']) {
		echo "<script>window.location.href='login';</script>";
	}else{
?>

<div class="content" style="background: black; color: #fff;">
	<main id="main">
		<div class="container" style="padding-top: 10%;">
			<h1 class="text-center">Dashboard Coming Soon!</h1>
			<br><br><br><br><br>
		</div>
	</main>
</div>
<?php 
	}
 ?>
