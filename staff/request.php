<?php include_once ('../includes/header.php'); ?>

<?php include_once ('topbar.php'); ?>

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
                        <a class="btn btn-primary justify-content-end" href="newRequest.php">Add New</a>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">ref no:</th>
                                <th scope="col">Purpose</th>
                                <th scope="col">Form of Request</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
<?php
$sql = "SELECT * FROM patient_requests WHERE staff_id = '{$_SESSION['staff_id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        $request_id = $row["request_id"];
        $staff_id = $row["staff_id"];
        $title = $row["title"];
        $description = $row["description"];
        $amount = $row["amount"];
        $req_type = $row["req_type"];
        $date = $row["date"];
        $req_status1 = $row["req_status1"];

        ?>
                            <tr>
                                <th scope="row">M00<?php echo $request_id ?></th>
                                <td><?php echo $title ?></td>
                                <td><?php echo $req_type .' USD'.$amount ?></td>
                                <td><?php echo $description ?></td>
                                <td><?php echo $date ?></td>
                                <td>
                                    <?php
                                    if ($req_status1 === "rejected") {
                                        echo "<p class='text-danger'> $req_status1 </p>";
                                    }elseif($req_status1 === "approved") {
                                        echo "<p class='text-success'>$req_status1 </p>";
                                    }
                                    else {
                                        echo "<p class='text-info'> $req_status1 </p>";
                                    }
                                    ?>
<!--                                    <p class="text-danger">--><?php //echo $req_status1 ?><!--</p>-->
                                </td>
                                <td>
                                    <a href="view.php?view=<?php echo $request_id ?>" class="btn btn-info btn-sm">view</a>
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