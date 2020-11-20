<title>SocialMySocial+ New Order</title>

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
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">Place New Order</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">New Order</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-3">
    <!-- <h1 class="text-center"></h1> -->
    <div class="col-md-10 col-sm-12 mx-auto">
    	<div class="card shadow">
    		<div class="card-body" style="font-size: 1.2em;">
    			<form method="POST" class="col-md-11 col-sm-12 mx-auto">
    				<div class="form-group">
    					<label>Category</label>
    					<select class="form-control" name="category">
    						<option value="Instagram Comments">Instagram Comments</option>
    						<option value="Instagram Likes">Instagram Likes</option>
    						<option value="Instagram Follows">Instagram Follows</option>
    						<option value="Youtube Subs">Youtube Subscibers</option>
    						<option value="Youtube Engagement">Youtube Engagement</option>
    						<option value="Facebook Likes">Facebook Likes</option>
    						<option value="Facebook Comments">Facebook Comments</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Service</label>
    					<select class="form-control" name="service">
    						<option value="0">Instagram Comments [from 10K+ Followers accounts] [Random 5 Comments] [1 Hour Delivery] — $3.78 per 1000</option>
    						<option value="Instagram Likes">Instagram Comments [from 10K+ Followers accounts] [Random 10 Comments] [1 Hour Delivery] — $7.56 per 1000</option>
    						<option value="Instagram Follows">Instagram Comments [from 10K+ Followers accounts] [Random ARABIC 10 Comments] [1 Hour Delivery] — $7.56 per 1000</option>
    					</select>
    				</div>
    				<div class="form-group">
    					<label>Description</label>
						<textarea class="form-control" rows="3" readonly><?php echo $text; ?></textarea>
    				</div>
    				<div class="form-group">
    					<label>Link</label>
						<input type="text" name="link" class="form-control" placeholder="Enter the link here">
    				</div>
    				<div class="form-group">
    					<label>Quantity</label>
						<input type="text" name="quantity" class="form-control" placeholder="Enter the quantity here">
						<p style="font-size: .8em; color: #9D9C95;">Min: 1000 - Max: 1000</p>
    				</div>
    				<div class="form-group">
    					<label>Charge</label>
						<input type="text" name="charge" class="form-control" placeholder="Calculated Charge" readonly>
    				</div>
    				<div class="form-group mt-4 pt-3">
    					<button type="button" class="btn btn-block btnSmm">Submit Order</button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
</div>
<?php 
	}
?>
