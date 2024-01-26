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
    .table {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
        transform: translate(0%, -5%);
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
    <div>
        <div class="row">
            <div class="col-12">
                <?php
                session_start(); //
                include "adminnavbar.php";
                include("../includes/add_movie.inc.php");
                $data = new movies();
                $email = $_SESSION['email'];
                $movies = $data->get_movies();
                $error = "";
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                } else {
                    $error = "";
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="text-align:end;">
                <a href="add_movie.php">
                    <input type="submit" name="Submit" value="ADD MOVIE" class="btn shadow-sm text-dark" style="background-color: #ff7200;">
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered mt-4">
                    <thead>

                        <tr>
                            <th style="text-align: right;">SERIAL NUMBER</th>
                            <th>MOVIE NAME</th>
                            <th>LENGTH</th>
                            <th>CHARGE</th>
                            <th>DATE</th>
                            <th style="text-align: left;">ACTION</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($movies)) {
                        $count = 0;
                        foreach ($movies as $movie) {
                    ?>
                            <tr>
                                <td style="text-align: right;">
                                    <?php $count = $count + 1;
                                    echo $count;
                                    ?>
                                </td>
                                <td><?php echo $movie['movie'] ?></td>
                                <td><?php echo $movie['length_hours'] . " HRS " . $movie['length_minutes'] . " MINS" ?></td>
                                <td><?php echo $movie['charge'] ?></td>
                                <td><?php echo $movie['date'] ?></td>
                                <td>
                                    <div style="display: flex; gap: 50px;">
                                        <form action="update_script.php" method="post">
                                            <input type="hidden" name="movie_id" value="<?php echo $movie['movie']; ?>">
                                            <input type="submit" name="update_submit" value="UPDATE" class="btn shadow-sm text-dark" style="background-color: #ff7200;">
                                        </form>

                                        <!-- Delete Form -->
                                        <form action="delete_script.php" method="post">
                                            <input type="hidden" name="movie_id" value="<?php echo $movie['movie']; ?>">
                                            <input type="submit" name="delete_submit" value="DELETE" class="btn shadow-sm text-dark" style="background-color: #ff7200;">
                                        </form>
                                    </div>
                                </td>

                        <?php }
                    } else {
                        echo "No Movies found.";
                    }
                        ?>
                            </tr>
                </table>
                <!-- Your table code remains the same -->

                <!-- Modal for Update -->
                <div class="modal" id="updateModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Movie</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <!-- Form to update movie details -->
                                <form id="updateForm" action="update_script.php" method="post">
                                    <input type="hidden" id="update_movie_id" name="movie_id" value="">
                                    <label for="update_movie_name">Movie Name:</label>
                                    <input type="text" id="update_movie_name" name="movie_name" class="form-control" required>

                                    <!-- Add other fields as needed -->

                                    <button type="submit" name="update_submit" class="btn btn-primary mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    // jQuery script to handle modal and data population
                    $(document).ready(function() {
                        // Function to open the modal and populate data
                        $('.update-btn').click(function() {
                            var movieId = $(this).data('movie-id');
                            var movieName = $(this).data('movie-name');
                            // Add other data variables as needed

                            // Populate modal fields
                            $('#update_movie_id').val(movieId);
                            $('#update_movie_name').val(movieName);
                            // Populate other fields as needed

                            // Open the modal
                            $('#updateModal').modal('show');
                        });
                    });
                </script>

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