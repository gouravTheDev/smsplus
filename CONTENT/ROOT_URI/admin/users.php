<title>SocialMySocial+ Admin</title>
<meta content="" name="descriptison">
<meta content="" name="keywords">

<?php include '_menu.php'; ?>
 <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 pt-2">
                <h4 class="page-title text-uppercase font-medium font-14">SocialMySocial+ Users List</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <div class="d-md-flex">
                    <ol class="breadcrumb ml-auto">
                        <li><a href="#">User List</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<div class="container" style="height: 100%;">
	<div class="card shadow mt-4">
        <div class="card-body">
            <div class="table-responsive p-0 mt-4">
                <table class="table table-hover text-nowrap" id="ticketList">
                  <thead>
                    <tr>
                      <th scope="col">Serial</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody id="ticketListBody">
                  
                     <?php
                     $userId = $_SESSION["userId"];
                      $sql = "SELECT * FROM USERS";
                      $result = mysqli_query($link, $sql);
                      if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                          $i = 1;
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        echo  '<tr>
                         <td>' . $i . '</td>
                         <td>' . $row['FIRST_NAME'] . '</td>
                         <td>' . $row['LAST_NAME'] . '</td>
                         <td>' . $row['USER_NAME'] . '</td>
                         <td>' . $row['EMAIL'] . '</td>
                         <td>' . $row['PHONE'] . '</td>
                         <td>' . $row['STATUS'] . '</td>';
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
                      <th scope="col">User Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Status</th>
                    </tr>
                  </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>