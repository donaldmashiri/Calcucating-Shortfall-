<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php');

$view = $_GET['view'];

$sql = "SELECT * FROM patient_requests WHERE request_id = '{$view}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $request_id = $row["request_id"];
        $staff_id = $row["staff_id"];
        $title = $row["title"];
        $description = $row["description"];
        $amount = $row["amount"];
        $req_type = $row["req_type"];
        $date = $row["date"];
        $req_status1 = $row["req_status1"];
    }
}


?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-11 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">View Requests And Send proof of payment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">



                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header font-weight-bold">RefNo:00<?php echo $request_id; ?></div>
                                    <div class="card-body">
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

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h6 class="font-weight-bolder">Proof of payment</h6>
                                <?php
                                if($req_status1 === 'approved'){

                                    if(isset($_POST['proof'])){
                                        $image = $_FILES['image']['name'];
                                        $image_temp = $_FILES['image']['tmp_name'];
                                        move_uploaded_file($image_temp, "../img/$image");

                                        $sql = "INSERT INTO proof_payment (ref_no, image, date)
                                            VALUES ('{$view}','{$image}',now())";

                                        if ($conn->query($sql) === TRUE) {

                                            echo "<p class='alert alert-success'>Your proof of payment was successfully sent</p>";

                                        }else {
                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                        }

                                    }

                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <button type="submit" name="proof" class="btn btn-primary float-right mb-5">Send</button>
                                </form>
                                    <?php }
                                else{
                                echo "<p class='alert alert-warning'>Your request has not been approved</p>";
                                } ?>
                            </div>
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