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
        padding: 25px;
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
    .textarea {
            width: 100%;
            max-width: 500px; /* Set a maximum width if needed */
            height: 150px; /* Set an initial height */
            resize: vertical; /* Allow vertical resizing */
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
    <div>
        <div class="col-12">
            <?php
            session_start();    
            include "adminnavbar.php";
            include("../includes/add_movie.inc.php");
            $data= new profile();
            $email = $_SESSION['email'];
            $data1= $data->getuserdata($email);
            $theatre=$data1['theatre'];
            $error = "";
            if (isset($_GET['error'])) {
                $error = $_GET['error'];
            } else {
                $error = "";
            }
            ?>
        </div>
    </div>
    <br><br>
    <div class="container-fluid position-relative align-content-center mt-5">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12"></div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data" id="checkBoxForm">
                    <div class="form">
                        <h3>ADD MOVIE</h3><br>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <input name="movie_name" type="text" value="" class="input form-control" id="" placeholder="Movie Name" aria-label="Username" aria-describedby="basic-addon1" />
                        </div><br>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <p style="color: #ff7200;">Choose Theatres</p>
                        <div class="row mb-3">
                            <div class="col col-md-4 colo-lg-4 col-sm-12">
                                <input name="theatre" class="form-control" type="text" value="<?php echo $theatre?>" readonly style="color: black;" >
                            </div>
                            <div class="col col-md-4 colo-lg-4 col-sm-12">
                                <input type="date" name="date">
                            </div>
                            <div class="col col-md-4 colo-lg-4 col-sm-12">
                                <input type="time" name="time">
                            </div>
                        </div><br>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <p style="color: #ff7200;">Length of the Movie</p>
                        <div class="input-group mb-3">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input name="hours" type="number" value="" class="input form-control" id="" placeholder="" aria-label="" aria-describedby="basic-addon1" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3" style="color:#ff7200;">Hrs</div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input name="minutes" type="number" value="" class="input form-control" id="" placeholder="" aria-label="" aria-describedby="basic-addon1" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3" style="color:#ff7200;">Minutes</div>
                        </div><br>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <p style="color: #ff7200;">Charges of the Movie</p>
                        <div class="input-group mb-3">
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input name="charge" type="number" value="" class="input form-control" id="" placeholder="Charges" aria-label="street" aria-describedby="basic-addon1" />
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3"></div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <input name="rating" type="number" value="" class="input form-control" id="" placeholder="Rating" aria-label="street" aria-describedby="basic-addon1" />
                            </div>
                        </div><br>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <label for="actor">Main Actor</label>
                        </div>
                        <div class="input-group mb-3">
                            <input name="actor" type="text" value="" class="input form-control" id="" placeholder="Actor" aria-label="street" aria-describedby="basic-addon1" />
                        </div>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <div>
                                <label for="comment">Movie Description</label>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <textarea class="textarea" name="movie_description" placeholder="Enter movie description here"></textarea>
                            </div>
                        </div>
                        <div>
                            <p style="color:#ff7200;">*<?= $error ?></p>
                        </div>
                        <div class="input-group mb-3">
                            <label for="image">Add Movie Cover Pictures</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="image" id="image" placeholder="add displays">
                        </div>
                        <div>
                            <p id="message" style="color: #ff7200;"></p>
                        </div>
                        <button class="button btn btn-block col-12" type="submit" name="submit">ADD</button><br>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12"></div>
    </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            include "footer.php"
            ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src=."/js/bootstrap.bundle.js"></script>
</body>

</html>