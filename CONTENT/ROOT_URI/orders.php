<title>SMS+ Tickets</title>

<?php include '_menuL.php'; ?>
<?php 
    if (!$_SESSION['LoggedIn']) {
        echo "<script>window.location.href='login';</script>";
    }else{
?>

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">Manage Your Orders</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ml-auto">
                    <li><a href="#">Orders</a></li>
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
                <a class="nav-link active" id="custom-tabs-one-active-tab" data-toggle="pill" href="#custom-tabs-one-all" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">All</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-pending" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Pending</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-processing" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Processing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-completed" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Completed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-archive-tab" data-toggle="pill" href="#custom-tabs-one-canceled" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Canceled</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
            <!-- All tab Starts -->

              <div class="tab-pane fade show active" id="custom-tabs-one-all" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your orders" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No Orders made till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Date</th>
                          <th scope="col">Link</th>
                          <th scope="col">Charge</th>
                          <th scope="col">Start Count</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Service</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
                </div>
                
              </div>

              <!-- All tab Starts -->

              <!-- Pending tab Starts -->

              <div class="tab-pane fade" id="custom-tabs-one-pending" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your orders" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No Orders made till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Date</th>
                          <th scope="col">Link</th>
                          <th scope="col">Charge</th>
                          <th scope="col">Start Count</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Service</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
                </div> 
              </div>
              <!-- Pending tab Ends -->

              <!-- Processing tab Starts -->

              <div class="tab-pane fade" id="custom-tabs-one-processing" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your orders" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No Orders made till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Date</th>
                          <th scope="col">Link</th>
                          <th scope="col">Charge</th>
                          <th scope="col">Start Count</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Service</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
                </div> 
              </div>
              <!-- Processing tab Ends -->

              <!-- Completed tab Starts -->

              <div class="tab-pane fade" id="custom-tabs-one-completed" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your orders" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No Orders made till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Date</th>
                          <th scope="col">Link</th>
                          <th scope="col">Charge</th>
                          <th scope="col">Start Count</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Service</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
                </div> 
              </div>
              <!-- Completed tab Ends -->

              <!-- Canceled tab Starts -->

              <div class="tab-pane fade" id="custom-tabs-one-canceled" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <div class="row">
                    <div class="col-md-4 col-sm-12 float-left">
                    </div>
                    <div class="col-md-8 col-sm-12 float-right">
                        <div class="input-group input-group-sm float-right" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search your orders" id="searchActiveStudent">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning font-weight-bold text-center mt-3">
                    No Orders made till now!
                </div>
                <div class="table-responsive p-0 mt-4">
                    <table class="table table-hover text-nowrap" id="activeStudentList">
                      <thead>
                        <tr>
                          <th scope="col">Order Id</th>
                          <th scope="col">Date</th>
                          <th scope="col">Link</th>
                          <th scope="col">Charge</th>
                          <th scope="col">Start Count</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Service</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="ticketListBody">
                      
                        
                      </tbody>
                    </table>
                </div> 
              </div>
              <!-- Canceled tab Ends -->
            </div>
          </div>
        </div>
    </div>
</div>
<?php 
    }
?>
