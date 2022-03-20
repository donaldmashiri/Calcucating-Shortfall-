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
                        <h6 class="m-0 font-weight-bold text-primary">Proof of Payments</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM patient_requests JOIN proof_payment 
                            ON patient_requests.request_id = proof_payment.ref_no
                                    WHERE patient_requests.req_status1 = 'approved' ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $request_id = $row["request_id"];
                                    $image = $row["image"];
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

                                    <div class="col-md-3 border border-1" style="width: 18rem;">
                                        <img src="../img/<?php echo $image ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $title ?></h5>
                                            <p class="card-text">Amount requested: <?php echo $amount ?>
                                                Amount given: <?php echo $amountgiven ?>  </p>
<!--                                            <a href="#" class="btn btn-primary">View</a>-->
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