<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.21.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .table {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
        border-radius: 10px;
        border: 1px solid #ff7200;
        ;
        text-align: center;
        color: #fff;
        font-size: 15px;
        letter-spacing: 1px;
        font-family: sans-serif;
    }
</style>

<body class="main">
    <div class="row">
        <div class="col-12">
            <?php
            session_start(); //
            include "adminnavbar.php";
            include("../includes/adminprofile.inc.php");
            $data = new theatres();
            $email = $_SESSION['email'];
            $theatres = $data->getAllTheatreDetails();
            $logedinadmin = new profile();
            $loggeddata = $logedinadmin->getuserdata($email);
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
            $_SESSION['tableData'] = serialize($theatres);
            ?>
        </div>
    </div>

    <div class="container text-end">
            <div class="d-flex flex-row-reverse">
                <div class="p-2">
                <a href="addtheatres.php" class="btn shadow-sm text-dark" style="background-color: #ff7200;">ADD THEATRE</a>
                </div>
                <div class="p-2">

                    <style>
                        .dropdown-item:hover {
                            background-color: #ffc107 !important;
                            color: #000 !important;
                        }

                        .bt {
                            background-color: #ff7200;
                            color: #000;
                        }

                        .bt:hover {
                            background-color: #ff7200;
                            color: #000;
                        }
                    </style>
                    <div class="input-group mb-3">
                        <button class="btn bt btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Download</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="tabletheatresscsv.php">CSV FILE</a></li>
                            <li><a class="dropdown-item" href="tabletheatrespdf.php">PDF Format</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:end;">
        </div>
    </div>
    <div class="container">
        <div class="col-12 table-responsive">
            <div style="color: #ff7200;">*<?php echo $error ?></div>
            <table class="table table-hover table-bordered caption-top">
                <caption style="color:#ff7200; font-family:'Times New Roman', Times, serif; font-weight:bold; font-size:30px;">List of Theatres</caption>
                <thead>
                    <tr>
                        <th style="text-align: right;">#NUMBER</th>
                        <th>THEATRE NAME</th>
                        <th>SEATS</th>
                        <th>COUNTY</th>
                        <th>CITY/TOWN</th>
                        <th style="text-align:left;">ACTION</th>
                    </tr>
                </thead>
                <?php
                if (!empty($theatres)) {
                    $count = 0;
                    foreach ($theatres as $theatre) {
                ?>
                        <tr>
                            <td style="text-align: right;">
                                <?php $count = $count + 1;
                                echo $count;
                                ?>
                            </td>
                            <td><?php echo $theatre['theatre_name'] ?></td>
                            <td><?php echo $theatre['seats'] ?></td>
                            <td><?php echo $theatre['county'] ?></td>
                            <td><?php echo $theatre['town'] ?></td>
                            <td>
                                <div style="display: flex; gap: 50px;">
                                    <?php
                                    // if ($loggeddata['theatre'] === $theatre['theatre_name']) {
                                    ?>
                                    <form action="updatetheatre.php" method="post">
                                        <input type="hidden" name="theatre" value=<?php echo $theatre['theatre_name']; ?>>
                                        <button type="submit" name="update_submit" class="btn btn-sm btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="../includes/delete_theatre_script.inc.php" method="post">
                                        <input type="hidden" name="theatre" value="<?php echo $theatre['theatre_name']; ?>">
                                        <button type="submit" name="delete_submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Theatre?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <?php //} 
                                    ?>
                                </div>
                            </td>
                    <?php }
                } else {
                    echo "No theatres found.";
                }
                    ?>
                        </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            include "footer.php"
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>