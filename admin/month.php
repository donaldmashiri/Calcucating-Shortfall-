<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');
?>

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
                        <h6 class="m-0 font-weight-bold text-primary">Monthly Report:
                            <?php
                            $month = $_GET['month'];
                            echo $month
                            ?>
                        </h6>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Monthly Reports</label>
                                <select name=""  class="form-control" id="" onchange="location = this.value;">
                                    <option value="">Select Month</option>
                                    <option value="month.php?month=January">January</option>
                                    <option value="month.php?month=February">February</option>
                                    <option value="month.php?month=March">March</option>
                                    <option value="month.php?month=April">April</option>
                                    <option value="month.php?month=May">May</option>
                                    <option value="month.php?month=June">June</option>
                                    <option value="month.php?month=July">July</option>
                                    <option value="month.php?month=August">August</option>
                                    <option value="month.php?month=September">September</option>
                                    <option value="month.php?month=October">October</option>
                                    <option value="month.php?month=November">November</option>
                                    <option value="month.php?month=December">December</option>
                                </select>

                            </div>
                        </form>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope='col'>Request No: </th>
                                <th scope='col'>Staff No: </th>
                                <th scope='col'>Title: </th>
                                <th scope='col'>Type: </th>
                                <th scope='col'>Status: </th>
                                <th scope='col'>Amount request: </th>
                                <th scope='col'>Amount Given: </th>
                                <th scope='col'>Date: </th>
                                <th scope='col'>Decision: </th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $janSQL = "SELECT * FROM patient_requests WHERE date >= '2022-01-01' AND date <= '2022-01-31'";
                            $febSQL = "SELECT * FROM patient_requests WHERE date >= '2022-02-01' AND date <= '2022-02-31'";
                            $marSQL = "SELECT * FROM patient_requests WHERE date >= '2022-03-01' AND date <= '2022-03-31'";
                            $aprSQL = "SELECT * FROM patient_requests WHERE date >= '2022-04-01' AND date <= '2022-04-31'";
                            $maySQL = "SELECT * FROM patient_requests WHERE date >= '2022-05-01' AND date <= '2022-05-31'";
                            $junSQL = "SELECT * FROM patient_requests WHERE date >= '2022-06-01' AND date <= '2022-06-31'";
                            $julSQL = "SELECT * FROM patient_requests WHERE date >= '2022-07-01' AND date <= '2022-07-31'";
                            $augSQL = "SELECT * FROM patient_requests WHERE date >= '2022-08-01' AND date <= '2022-08-31'";
                            $sepSQL = "SELECT * FROM patient_requests WHERE date >= '2022-09-01' AND date <= '2022-09-31'";
                            $octSQL = "SELECT * FROM patient_requests WHERE date >= '2022-10-01' AND date <= '2022-10-31'";
                            $novSQL = "SELECT * FROM patient_requests WHERE date >= '2022-11-01' AND date <= '2022-11-31'";
                            $decSQL = "SELECT * FROM patient_requests WHERE date >= '2022-12-01' AND date <= '2022-12-31'";



                            if($month === 'January'){ $search = $janSQL; }
                            if($month === 'February'){ $search = $febSQL; }
                            if($month === 'March'){ $search = $marSQL; }
                            if($month === 'April'){ $search = $aprSQL; }
                            if($month === 'May'){ $search = $maySQL; }
                            if($month === 'June'){ $search = $junSQL; }
                            if($month === 'July'){ $search = $julSQL; }
                            if($month === 'August'){ $search = $augSQL; }
                            if($month === 'September'){ $search = $sepSQL; }
                            if($month === 'October'){ $search = $octSQL; }
                            if($month === 'November'){ $search = $novSQL; }
                            if($month === 'December'){ $search = $decSQL; }


                            $sql = "$search";
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
                                        <td><?php echo $title ?></td>
                                        <td><?php echo $req_type ?></td>
                                        <td>
                                            <?php
                                            if ($req_status1 === "rejected") {
                                                echo "<p class='text-danger'> $req_status1 </p>";
                                            }elseif($req_status1 === "approved") {
                                                echo "<p class='text-success'> $req_status1 </p>";
                                            }
                                            else {
                                                echo "<p class='text-info'> $req_status1 </p>";
                                            }
                                            ?>
                                        </td>

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
                                echo "<p class='alert alert-danger'>No report for this month.</p>";
                            }
                            ?>

                            </tbody>
                        </table>
<!--                        <button onclick="window.print()">sdd</button>-->
                        <button onclick="window.print()" class="btn btn-primary">Print</button>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>