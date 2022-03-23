<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Add New Requests</h6>
                        <a class="btn btn-secondary justify-content-end" href="request.php">Back</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <?php
                        if(isset($_POST['submit'])){

                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $amount = $_POST['amount'];
                            $req_type = $_POST['req_type'];

                            $sql = "INSERT INTO patient_requests (staff_id, title, description, amount, req_type, date)
                            VALUES ('{$_SESSION['staff_id']}','{$title}', '{$description}', '{$amount}','{$req_type}',now())";

                            if ($conn->query($sql) === TRUE) {

                                echo "<h4 class='alert alert-success'>Your Request Was successfully Send</h4>";

                            }else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        ?>


                        <form action="" method="post">
                            <div class="form-group">
                                <label for="title">Purpose</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Purpose" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Form of request</label>
                                <select name="req_type" class="form-control" id="type">
                                    <option value="cash">Cash</option>
                                    <option value="credit payment">credit payment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description of Your Request</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" name="amount" placeholder="Enter Amount (USD)">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>