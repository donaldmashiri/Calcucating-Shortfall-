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
                        <h6 class="m-0 font-weight-bold text-primary">Add employee registration </h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        if(isset($_POST['submit'])){

                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $department = $_POST['department'];
                            $password = $_POST['password'];
                            $rpassword = $_POST['rpassword'];

                            if($password === $rpassword){
                                $sql = "INSERT INTO msustaff (firstName, lastName, email, department, password)
                            VALUES ('{$firstName}', '{$lastName}', '{$email}','{$department}','{$password}')";

                                if ($conn->query($sql) === TRUE) {

                                    echo "<h4 class='alert alert-success'>Account was successfully created</h4>";

                                }else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }else{
                                echo "<h4 class='alert alert-danger'> Password didn't Match </h4>";
                            }


                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">First Name :</label>
                                <input type="text" name="firstName" class="form-control" placeholder="Enter First Name :">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name :</label>
                                <input type="text" name="lastName" class="form-control" placeholder="Enter Last Name :">
                            </div>
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email :">
                            </div>
                            <div class="form-group">
                                <label for="">Department :</label>
                                <select name="department" class="form-control" id="">
                                    <option value="">select Department</option>
                                    <option value="ICT Department">ICT Department</option>
                                    <option value="Social Sciences">Social Sciences</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Structural Engineer">Structural Engineer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Password :</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password :">
                            </div>
                            <div class="form-group">
                                <label for="">Re-Enter Password :</label>
                                <input type="password" name="rpassword" class="form-control" placeholder="Enter Re-Enter Password :">
                            </div>
                            <button name="submit" class="btn btn-primary float-right mb-5"> Submit <i class="fa fa-lock"></i></button>
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