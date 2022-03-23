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
                        <h6 class="m-0 font-weight-bold text-primary">Verify employee registration </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Search Employee by ID">
                            </div>
                            <button name="submit" class="btn btn-primary float-right mb-5">Search <i class="fa fa-search"></i></button>
                        </form>

                        <hr>
                        <br>

                        <?php
if(isset($_POST['submit'])) {

    $search = $_POST['search'];

    $rest = substr($search, -3);


    if (is_numeric($rest)){
        $number = $rest + 0;
    }
    else {
        $number = 0;
    }



    $query = "SELECT * FROM msustaff WHERE staff_id = $number";

    $all_msgs = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($all_msgs)) {
            $staff_id = $row["staff_id"];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
            $email = $row["email"];
            $department = $row["department"];

            echo "<ul class='list-group '>
                  <li class='list-group-item bg-success text-white'>Employee verification is granted</li> 
                  <li class='list-group-item'>Staff ID :</span>  MSU00$staff_id </li> 
                  <li class='list-group-item'>Name(s) :</span>  $firstName $lastName </li> 
               </ul>";
        }
    }else{
        echo "<ul class='list-group '>
                  <li class='list-group-item bg-danger text-white'>Employee with MSU$staff_id is  not found</li> 
               </ul>";
    }
}
                        ?>


                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

<?php include_once ('../includes/footer.php'); ?>