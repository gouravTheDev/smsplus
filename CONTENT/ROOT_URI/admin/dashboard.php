<title>SocialMySocial+ Admin</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<?php include '_menu.php'; ?>
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
            <h4 class="page-title text-uppercase font-medium font-14">SocialMySocial+ Admin Dashboard</h4>
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

<div class="container" style="height: 100%;">
    <div class="row mt-4">
        <div class="col-md-3 col-sm-12">
            <div class="card shadow" style="background: #045C91; color: #ffffff;">
                <div class="card-body" style="color: #ffffff">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>80</h2>
                            <h4>Total Users</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card shadow" style="background: #7203BF; color: #ffffff;">
                <div class="card-body" style="color: #ffffff">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>$150.000</h2>
                            <h5>Total Amount Recieved</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card shadow" style="background: #C73C0C; color: #ffffff;">
                <div class="card-body" style="color: #ffffff">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>4</h2>
                            <h4>Total Orders</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card shadow" style="background: #23A509; color: #ffffff;">
                <div class="card-body" style="color: #ffffff">
                    <div class="row">
                        <div class="col-3 d-flex p-2">
                            <h2><i class="fa fa-cart-plus" aria-hidden="true" style="font-size: 2em;"></i></h2>
                        </div>
                        <div class="col-9 text-right">
                            <h2>21</h2>
                            <h4>Total Tickets</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body" style="padding-bottom: 5%;">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h3 class="font-weight-bold">Latest Orders</h3>
                    <div class="alert alert-warning">No Orders</div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <h3 class="font-weight-bold">Latest Tickets</h3>
                    <div class="table-responsive p-0 mt-4">
                        <table class="table table-hover text-nowrap" id="ticketDashboard">
                            <thead>
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Ticket Id</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Request</th>
                                </tr>
                            </thead>
                            <tbody id="ticketListBody">

                                <?php
                                $sql = "SELECT * FROM TICKETS WHERE DELETED = 'FALSE' ORDER BY ID DESC LIMIT 5";
                                $result = mysqli_query($link, $sql);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $ticketStatus = '<span class="badge badge-primary" style="color: #fff;">' . $row['STATUS'] . '</span>';
                                            echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['TICKET_ID'] . '</td>
                         <td>' . $row['USER_ID'] . '</td>
                         <td>' . $row['SUBJECT'] . '</td>
                         <td>' . $row['REQUEST'] . '</td>
                         ';
                                            $i++;
                                        }
                                    } else {
                                        echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No ticket is raised till now!
            </div>';
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Ticket Id</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Request</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <h3 class="font-weight-bold">Latest Users</h3>
                    <div class="table-responsive p-0 mt-4">
                <table class="table table-hover text-nowrap" id="ticketList2">
                  <thead>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                    </tr>
                  </thead>
                  <tbody id="ticketListBody">
                  
                     <?php
                      $sql = "SELECT * FROM USERS WHERE DELETED = 'FALSE' ORDER BY ID DESC LIMIT 5";
                      $result = mysqli_query($link, $sql);
                      if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                          $i = 1;
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['FIRST_NAME'] . '</td>
                         <td>' . $row['LAST_NAME'] . '</td>
                         <td>' . $row['EMAIL'] . '</td>
                         ';
                         $i++;
                          }
                        } else {
                          echo ' <div class="alert alert-warning font-weight-bold text-center mt-3">
                No users till now!
            </div>';
                        }
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                    </tr>
                  </tfoot>
                </table>
            </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <h3 class="font-weight-bold">Latest Transactions</h3>
                    <div class="alert alert-warning">No Transactions</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-md-8 col-sm-12" style="height: 350px">
        <canvas id="myChart" style="height: 100%;"></canvas>
        
    </div>
    <div class="col-md-4 col-sm-12" style="height: 350px">
        <canvas id="myChart2" style="height: 100%;"></canvas>
        
    </div>
</div> -->