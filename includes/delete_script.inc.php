<?php
if (isset($_POST['delete_submit'])) {
    $movie = $_POST['movie'];
    include '../classes/connect.php';
    include '../classes/admins/add_movie.php';

    $deletemovie= new add_movie();
    $deletemovie->deleteMovie($movie);
}
