<?php include ("includes/db.php")?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medical Aid System</title>

    <!-- Custom fonts for this template-->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
   

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/msu.jpg" width="70" height="70" alt="">
                                        <h1 class="h4 text-gray-900 mb-4">Log In As Msu Staff</h1>
                                    </div>

                                    <?php
                                    if(isset($_POST['staff_login'])){
                                        $email = $_POST['msuemail'];
                                        $password = $_POST['msupassword'];

                                        $query = "select * from msustaff where email = '$email' and password = '$password'";
                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        $count = mysqli_num_rows($result);

                                        if ($count == 1) {
                                            $_SESSION['staff_id'] = $row['staff_id'];
                                            header('location: staff/index.php');
//                                            echo "<script>window.location.href='home.php';</script>";
                                        } else {
                                            echo "<p class='alert alert-danger'>Incorrect Password</p>";
                                        }
                                    }
                                    ?>

                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" name="msuemail" class="form-control form-control-user"
                                                   id="MsuEmail" aria-describedby="emailHelp"
                                                   placeholder="Enter Email Your Msu Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="msupassword" class="form-control form-control-user"
                                                   id="MsuPassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" name="staff_login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="img/firstmutual.jfif" width="150" height="70" alt="">
                                        <h1 class="h4 text-gray-900 mb-4">First Mutual Login</h1>
                                    </div>
                                    <?php
                                    if(isset($_POST['admin'])){
                                        $admin_email = $_POST['admin_email'];
                                        $admin_password = $_POST['admin_password'];

                                        if ($admin_email === "admin@gmail.com" && $admin_password === "12345") {
                                            header('location: admin/index.php');
                                        } else {
                                            echo "<p class='alert alert-danger'>Incorrect credentials</p>";
                                        }
                                    }
                                    ?>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" name="admin_email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="admin_password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <button name="admin" type="submit" class="btn btn-dark btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <h3 style="color: black" class="font-weight-bolder text-center">Medical aid payment system and shortfall processing system</h3>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>