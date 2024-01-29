<?php
if (isset($_POST['delete_submit'])) {
    $theatre = $_POST['theatre'];
    include '../classes/connect.php';
    include '../classes/admins/add_theatre.php';

    $deletetheatre= new add_theatre();
    $deletetheatre->deletetheatre($theatre);
}
