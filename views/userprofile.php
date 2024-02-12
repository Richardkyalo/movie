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
    include("../includes/userprofile.inc.php");
    include "navigationbar.php";
    $data = new userprofile();
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    if (!isset($email)) {
        header("Location: login.php");
        exit();
    }
    $data1 = $data->getuserdata($user_id);
    // $data = $userDetails;
    $fname = $data1['firstname'];
    $secondname = $data1['secondname'];
    $address = $data1['address'];
    $town = $data1['town'];
    $phone = $data1['phone'];
    $street = $data1['street'];
    $email = $data1['email'];
    $error = "";
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = "";
    }
    ?>
    <div class="row">

    </div>
    <div class="row  align-content-center">
        <div class="col-lg-8 col-md-8 col-sm-12 mt-5 px-5">
            <form class="row g-3 form" action="" method="POST">
                <div class="col-lg-12">
                    <h3>
                        UPDATE DETAILS
                    </h3>
                    <div>
                        <p style="color:#ff7200;">*<?= $error ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="role" class="form-label shadow-sm">Role</label>
                    <input type="text" class="form-control" name="role" placeholder="ROLE" value="Customer" disabled style="color:#ff7200;">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="firstname" class="form-label shadow-sm">First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="FirstName" value=<?php echo htmlspecialchars($fname); ?>>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="secondname" class="form-label shadow-sm">Second Name</label>
                    <input type="text" class="form-control" name="secondname" placeholder="Second Name" value=<?php echo htmlspecialchars($secondname); ?>>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="inputAddress" class="form-label shadow-sm">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value=<?php echo htmlspecialchars($address); ?>>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="inputTown" class="form-label shadow-sm">Town / City</label>
                    <input type="text" class="form-control" name="town" placeholder="Town" value=<?php echo htmlspecialchars($town); ?>>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="inputStreet" class="form-label shadow-sm">Street</label>
                    <input type="text" class="form-control" name="street" placeholder="Street" value=<?php echo htmlspecialchars($street); ?>>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="phone" class="form-label shadow-sm">Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Phone" value=<?php echo htmlspecialchars($phone); ?>>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="email" class="form-label shadow-sm">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12" style="display:none;">
                    <input type="text" class="form-control" name="user" value="<?php echo $user_id; ?>">
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:right;">
                    <input type="submit" name="submit" value="Update" style="background-color: #ff7200;" class="btn shadow-sm text-dark">
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 mt-4 form" style="border-radius: 40px; text-align: center;">
            <!-- Check if image exists -->

            <?php
            $profile_image = "./images/".$data1['profiles']; // Path to default profile image
            if ($data1['profiles'] != "") {

                echo '<img src="' . $profile_image . '" alt="" style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover;">';
            } else {
                // If image doesn't exist, display icon
                echo '<i class="fas fa-user-circle fa-5x mt-3"></i>';
            }
            ?>
            <form action="../includes/imageprofile.inc.php" method="post" enctype="multipart/form-data">
                <label for="image">Update your Profile</label>
                <input type="text" name="user_id" value="<?php echo $user_id; ?>" style="display: none;" >
                <input type="file" name="image" id="image" placeholder="">  <br><br>
                <input type="submit" name="submit" value="Update" style="background-color: #ff7200;" class="btn shadow-sm text-dark">

            </form>
            <div class=""></div>
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