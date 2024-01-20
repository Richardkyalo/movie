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
        border: 1px solid #ff7200;;
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
                 $data= new users();
                 $email = $_SESSION['email'];
                 $users = $data->getAllUserDetails();
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
            <a href="addemployee.php" class="btn shadow-sm text-dark" style="background-color: #ff7200;">ADD EMPLOYEE</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bordered mt-4">
                    <thead>
                        <tr>
                            <th style="text-align: right;">#NUMBER</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>FIRSTNAME</th>
                            <th>PHONE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                        if (!empty($users)) {
                            $count=0;
                            foreach ($users as $user) {
                                ?>
                    <tr>
                                <td style="text-align: right;">
                                   <?php $count=$count+1;
                                   echo $count;
                                   ?>
                                </td>
                                <td><?php echo $user['email']?></td>
                                <td><?php echo $user['roles']?></td>
                                <td><?php 
                                if($user['firstname']==0){
                                    echo 'Not Updated';
                                }else{
                                echo $user['firstname'];
                                }
                                ?>
                                </td>
                                <td><?php
                                if($user['phone']==0){
                                    echo 'Not Updated';
                                }else{
                                    echo $user['phone'];
                                }?>
                                </td>
                                <td>
                                    <input type="submit" name="Submit" value="UPDATE" class="btn shadow-sm text-dark" style="background-color: #ff7200;">
                                    <input type="submit" name="Submit" value="DELETE" class="btn shadow-sm text-dark" style="background-color: #ff7200;">
                                </td>
   <?php }?>
<?php } else {
    // Handle the case when there are no users
    echo "No users found.";
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
    <script src=."/js/bootstrap.bundle.js"></script>
</body>

</html>