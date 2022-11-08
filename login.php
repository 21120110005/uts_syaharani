<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="vh-200" style="background-image:  url(paswa.jpg); background-size: cover">

    <div class="container py-5 h-200">

                        <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-4 mt-md-1 pb-4">
                            </div>
                                    <div class="text-center">
                                        <h1 class="text-center text-white">PASWA</h1>
                                    </div>
                                    <?php
                                    include("connection.php");
                                    if (isset($_POST['submit'])) {
                                        $user = mysqli_real_escape_string($mysqli, $_POST['username']);
                                        $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

                                        if ($user == "" || $pass == "") {
                                            echo "<script language=javascript>
                                    alert('Username atau Password Kosong');
                                    window.location='login.php';
                                </script>";
                                        } else {
                                            $result = mysqli_query($mysqli, "SELECT * FROM tab_user 
                                WHERE username='$user' AND password='$pass'")
                                                or die("Instruksi tidak ditemukan");
                                            $row = mysqli_fetch_assoc($result);

                                            if (is_array($row) && !empty($row)) {
                                                $validuser = $row['username'];
                                                $_SESSION['valid'] = $validuser;
                                                $_SESSION['id'] = $row['id'];
                                            } else {
                                                echo "<script language=javascript>
                                            alert('Username atau Password salah');
                                            window.location='login.php';
                                        </script>";
                                            }

                                            if (isset($_SESSION['valid'])) {
                                                header('Location: dashboard.php');
                                            }
                                        }
                                    } else {
                                    ?>

                                        <form class="user" method="POST" action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" aria-describedby="Username" placeholder="Enter Username" name="username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                                            <hr>
                                        </form>
                                    <?php } ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>