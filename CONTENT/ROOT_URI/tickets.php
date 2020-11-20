<title>SocialMySocial+ Tickets</title>

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
            <h4 class="page-title text-uppercase font-medium font-14">Manage your tickets</h4>
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

<div class="container-fluid pt-2">
    <!-- <h1 class="text-center">Tickets</h1> -->
    <div class="col-md-10 col-sm-12 mx-auto">
    	<div class="card card-tabs" >
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-active-tab" data-toggle="pill" href="#custom-tabs-one-active" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">New Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-archived" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Your Tickets</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-active" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="col-md-10 col-sm-12 mx-auto">
                    <form method="POST">
                        <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" name="subject">
                                <option value="order">Order</option>
                                <option value="payment">Payment</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order ID</label>
                            <input type="text" name="orderId" placeholder="For multiple orders, please separate them using comma" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Request</label>
                            <select class="form-control" name="subject">
                                <option value="refill">Refill</option>
                                <option value="cancel">Cancel</option>
                                <option value="speedUp">Speed Up</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Message (optional)</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group mt-4 pt-3">
                            <button type="button" class="btn btn-block btnSmm">Submit Ticket</button>
                        </div>
                    </form>
                </div>
                
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-archived" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your tickets" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No ticket is raised till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Ticket Id</th>
                          <th scope="col">Order Id</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Request</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
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
