<?php
if (isset($_POST['delete_submit'])) {
    $employee = $_POST['employee'];
    include '../classes/connect.php';
    include '../classes/admins/addemployee.db.php';

    $deleteemployee= new Add_employee();
    $deleteemployee->deleteeemployee($employee);
}
