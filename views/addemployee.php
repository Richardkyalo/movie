<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richards</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .form {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
        transform: translate(0%, -5%);
        border-radius: 10px;
    }

    .form input {
        background: transparent;
        border-bottom: 1px solid #ff7200;
        border-top: none;
        border-right: none;
        border-left: none;
        color: #fff;
        font-family: sans-serif;
    }

    h3 {
        font-family: sans-serif;
        text-align: center;
        color: #ff7200;
        font-size: 22px;
        border-radius: 10px;
    }

    label {
        font-family: sans-serif;
        text-align: center;
        color: #ff7200;
        border-radius: 10px;
    }
</style>

<body class="main">
    <?php
    session_start(); //
    include "adminnavbar.php";
    include("../includes/add_employee.inc.php");
    $data = new theatres();
    $theatres = $data->getAllTheatreDetails();
    $email = $_SESSION['email'];
    if (!isset($email)) {
        header("Location: login.php");
        exit();
    }
    $error = "";
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = "";
    }
    ?>
    <div class="container mt-4 px-5">
        <div class="row  align-content-center">
            <!-- <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card shadow mb-5 bg-body ">
                    <img src="./images/2.jpg" style="height:10rem" class="shadow-lg card-img-top  rounded" alt="...">
                    <div class="card-body">

                        <p class="card-text text-center align-items-center">
                        <h4 class="text-center">Welcome ..</h4>
                        </p>
                        <form class="mb-3" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                            <input type="file" name="images" id="images">
                            <input type="submit" name="upload" value="upload" class="mt-4 btn shadow-sm text-dark" style="background-color: #ff7200;">
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <form class="row g-3 form" action="" method="POST">
                    <div class="col-lg-12">
                        <h3>
                            ADD EMPLOYEE DETAILS
                        </h3>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="firstname" class="form-label shadow-sm">Role</label>
                        <input type="text" class="form-control" name="role" placeholder="Employee" value="Employee" readonly style="color: black;">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="secondname" class="form-label shadow-sm">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="inputAddress" class="form-label shadow-sm">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="inputTown" class="form-label shadow-sm">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" aria-label="password" aria-describedby="basic-addon1" />
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide();">
                                    <i class="fas fa-eye" id="show_eye"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="theatre" class="form-label shadow-sm">Theatre</label>
                        <select id="theatre" name="theatre" class="form-control">
                            <?php 
                            foreach ($theatres as $theatre) {?>
                                <option value="<?php echo $theatre['theatre_name'] ?>"><?php echo $theatre['theatre_name'] ?></option>
                            <?php }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <label for="inputZip" class="form-label shadow-sm">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                    <div class="col-lg-12" style="text-align: right;">
                        <input type="submit" name="submit" value="Update" style="background-color: #ff7200;" class="btn shadow-sm text-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <footer class="col-12">
            <?php
            include "footer.php"
            ?>
        </footer>
    </div>
    <script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
        function password_show(){
            var x = document.getElementById("Confirm_password");
            var show_eye = document.getElementById("show_eyes");
            var hide_eye = document.getElementById("hide_eyes");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src=."/js/bootstrap.bundle.js"></script>
</body>

</html>