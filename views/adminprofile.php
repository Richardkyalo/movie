<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richards</title>
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
    session_start();
    // // $adminProfileInstance = new adminprofile();
    // // $userDetails = $adminProfileInstance->getUserDetails($email); //
    include "adminnavbar.php";
    include("../includes/adminprofile.inc.php");
    $error = "";
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = "";
    }
    ?>
    <div class="container-fluid align-content-center mt-4 px-5">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="card shadow mb-5 bg-body ">
                    <img src="./images/2.jpg" style="height:10rem" class="shadow-lg card-img-top  rounded" alt="...">
                    <div class="card-body">

                        <p class="card-text text-center align-items-center">
                        <h4 class="text-center">Welcome ..</h4>
                        </p>
                        <form class="mb-3" action="profile_image_update.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="image" id="image">
                            <input type="submit" name="Submit" value="Submit" class="mt-4 btn shadow-sm text-dark" style="background-color: #ff7200;">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 mt-5">
                <form class="row g-3 form" action="" method="POST">
                    <div class="col-lg-12">
                        <h3>
                            PERSONAL DETAILS
                        </h3>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="firstname" class="form-label shadow-sm">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="FirstName" >
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="secondname" class="form-label shadow-sm">Second Name</label>
                        <input type="text" class="form-control" name="secondname" placeholder="Second Name">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="inputAddress" class="form-label shadow-sm">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="inputTown" class="form-label shadow-sm">Town / City</label>
                        <input type="text" class="form-control" name="town" placeholder="Town">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="inputStreet" class="form-label shadow-sm">Street</label>
                        <input type="text" class="form-control" name="street" placeholder="Street">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="inputZip" class="form-label shadow-sm">Theatre</label>
                        <input type="text" class="form-control" name="theatre" placeholder="Theatre Name">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <label for="phone" class="form-label shadow-sm">Phone Number</label>
                        <input type="number" class="form-control" name="phone" placeholder="Phone Number">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12" style="display: none;">
                        <label for="email" class="form-label shadow-sm">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
                    </div>
                    <div class="col-lg-12">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src=."/js/bootstrap.bundle.js"></script>
</body>

</html>