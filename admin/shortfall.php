<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Short Falls</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>Request No: </th>
                                <th scope='col'>Staff No: </th>
                                <th scope='col'>Name(s): </th>
                                <th scope='col'>Title: </th>
                                <th scope='col'>Type: </th>
                                <th scope='col'>Amount request: </th>
                                <th scope='col'>Amount Given: </th>
                                <th scope='col'>Date: </th>
                                <th scope='col'>Decision: </th>
<!--                                <th scope='col'>Status: </th>-->
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql = "SELECT * FROM patient_requests JOIN msustaff ON patient_requests.staff_id = msustaff.staff_id 
                                    WHERE patient_requests.req_status1 = 'approved' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $request_id = $row["request_id"];
                                    $staff_id = $row["staff_id"];
                                    $firstName = $row["firstName"];
                                    $lastName = $row["lastName"];
                                    $title = $row["title"];
                                    $amount = $row["amount"];
                                    $amountgiven = $row["amountgiven"];
                                    $req_type = $row["req_type"];
                                    $date = $row["date"];
                                    $req_status1 = $row["req_status1"];
                                    $shortfall = $amount - $amountgiven;
                                    $overpay = $amountgiven - $amount;
                                    ?>

                                    <tr>
                                        <td><?php echo "R00".$staff_id ?></td>
                                        <td><?php echo "MSU00".$staff_id ?></td>
                                        <td><?php echo $firstName .' '. $lastName ?></td>
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $req_type ?></td>
                                        <td><?php echo "USD". $amount ?></td>
                                        <td><?php echo "USD". $amountgiven ?></td>
                                        <td><?php echo $date ?></td>
                                        <td>
                                            <?php
                                               if($amount === $amountgiven){
                                                   echo "<p class='alert alert-success'>Completed</p>";
                                               }elseif($amount >= $amountgiven){
                                                   echo "<ul class='list-group '>
                                                          <li class='list-group-item bg-danger text-white'>There is shortfall of : <strong>
                                                          USD$shortfall</strong> </li> </ul>";
                                               }elseif($amount <= $amountgiven){
                                                   echo "<ul class='list-group '>
                                                          <li class='list-group-item bg-success text-white'>There is Over Payment of : <strong>
                                                           USD$overpay</strong> </li> </ul>";
                                               }else{
                                                   echo "<p class='alert alert-success'>Completed</p>";
                                               }
                                            ?>
                                        </td>
                                    </tr>

                                    <?php

                                }
                            } else {
                                echo "0 results";
                            }
                            ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>