<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

<?php

// REJECT
if (isset($_GET['reject'])) {

    $request_id = $_GET['req_id'];
    $amountgiven = 0;
    $approve = "rejected";

    $query = "UPDATE patient_requests SET ";
    $query .= "req_status1  = '{$approve}', ";
    $query .= "amountgiven  = '{$amountgiven}' ";
    $query .= "WHERE request_id = {$request_id} ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }

};


// APPROVE
if (isset($_GET['approve'])) {

    $request_id = $_GET['req_id'];
    $amountgiven = $_GET['amountgiven'];
    $approve = "approved";

    $query = "UPDATE patient_requests SET ";
    $query .= "req_status1  = '{$approve}', ";
    $query .= "amountgiven  = '{$amountgiven}' ";
    $query .= "WHERE request_id = {$request_id} ";


    $update_query = mysqli_query($conn, $query);
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
};

?>


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Requests</h6>
                        <a class="btn btn-warning text-white btn-sm justify-content-end" href="verify.php">Verify Employee</a>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM patient_requests JOIN msustaff ON patient_requests.staff_id = msustaff.staff_id
                                        WHERE req_status1 != 'approved'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {

                                    $request_id = $row["request_id"];
                                    $staff_id = $row["staff_id"];
                                    $firstName = $row["firstName"];
                                    $lastName = $row["lastName"];
                                    $title = $row["title"];
                                    $description = $row["description"];
                                    $amount = $row["amount"];
                                    $req_type = $row["req_type"];
                                    $date = $row["date"];
                                    $req_status1 = $row["req_status1"];
?>

                                    <div class="col-md-4 mt-2">
                                        <div class="card">
                                            <div class="card-header font-weight-bold">RefNo:00<?php echo $request_id; ?></div>
                                            <div class="card-body">
                                                <div class="mb-2 ng-binding font-weight-bold ">
                                        <span class="text-dark">
                                                    <?php echo $firstName .' '.$lastName; ?>
                                                    <br>
                                                    <small>(<?php echo "MSU0". $staff_id; ?>)</small>
                                                </div>
                                                <hr>
                                                <div class="mb-2 ng-binding">
                                                    <span class="font-weight-bold text-dark">Purpose :</span> <?php echo $title; ?>
                                                </div>
                                                <div class="mb-2 ng-binding bg-light">
                                                    <span class="font-weight-bold text-dark">Message :</span> <?php echo $description; ?>
                                                </div>
                                                <small class="text-muted text-info">Date: <?php echo $date; ?></small>
                                                <br>
                                                <small class="text-info font-weight-bold text-capitalize">Request Type: <?php echo $req_type ." USD". $amount; ?></small>
                                                <br>
                                                <small class="text-muted text-secondary">Status: <?php echo $req_status1; ?></small>

                                                <div class="mb-2 ng-binding bg-light">
                                                    <p>
                                                        <?php
                                                        if ($req_status1 === "rejected") {
                                                            echo "<p class='text-danger'> Status : $req_status1 </p>";
                                                        }elseif($req_status1 === "approved") {
                                                            echo "<p class='text-success'> Status : $req_status1 </p>";
                                                        }
                                                        else {
                                                            echo "<p class='text-info'> Status : $req_status1 </p>";
                                                        }
                                                        ?>
                                                    </p>
<!--                                                    <a href="pass_request.php?action=approve&req_id=--><?//= $request_id ?><!--" class="btn btn-success btn-sm">approve</a>-->
<!--                                                    <a href="pass_request.php?action=decline&req_id=--><?//= $request_id ?><!--" class="btn btn-danger btn-sm">reject </a>-->

                                                </div>

                                                <div class="mb-2 ng-binding bg-light">
                                                    <form action="" method="get">
                                                        <input type="hidden" name="req_id" value="<?php echo $request_id ?>">
                                                        <select class="form-control" name="amountgiven" id="">
                                                            <option value="">select amount to be given</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                            <option value="200">200</option>
                                                            <option value="550">550</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                        <button name="approve" type="submit" class="btn btn-success btn-sm mt-2">approve</button>
                                                        <button name="reject" type="submit" class="btn btn-danger btn-sm mt-2">Reject</button>
<!--                                                        <a href="pass_request.php?action=decline&req_id=--><?//= $request_id ?><!--" class="mt-2 btn btn-danger btn-sm">reject </a>-->

                                                    </form>


                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                        <?php
                                }
                            } else {
                                echo "0 results";
                            }


                            ?>
                        </div>



                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>