<?php
ob_start();
session_start();
?>
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .seating-layout {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(50px, 1fr));
        gap: 5px;
    }

    .custom-img {
        object-fit: cover;
        /* or contain, depending on your preference */
    }

    .seat {
        width: 50px;
        height: 50px;
        background-color: #fff;
        border: 1px solid #aaa;
        /* border-radius: 5px; */
        /* background-color: #444451;
  height: 26px;
  width: 32px;
  margin: 3px; */
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .seat.selected {
        background-color: #ff7200;
    }

    .showcase {
        background: rgba(0, 0, 0, 0.1);
        padding: 0% 40% 0% 30%;
        border-radius: 5px;
        color: #777;
        list-style-type: none;
        display: flex;
        justify-content: space-between;
    }

    .showcase li {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 10px;
    }

    .showcase li small {
        margin-left: 2px;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        color: #fff;
    }

    .screen {
        background-color: #fff;
        height: 120px;
        width: 50%;
        margin: 0% 25% 0% 25%;
        transform: rotateX(-48deg);  
        box-shadow: 0 50px 50px rgba(168, 170, 168, 0.7);

    }

    .container {
        perspective: 1000px;
        margin-bottom: 30px;
    }


    .rowk {
        display: flex;
        margin: 0% 10% 0% 10%;
    }

    .seat:nth-of-type(2) {
        margin-right: 10%;
    }

    .seat:nth-last-of-type(2) {
        margin-left: 10%;
    }

    /* .seat {
        width: 50px;
        height: 50px;
        background-color: #ddd;
        border: 1px solid #aaa;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        cursor: pointer;
    } */

    /* .seats {
        width: 50px;
        height: 50px;
        background-color: #fff;
        border: 1px solid #aaa; */
        /* border-radius: 5px; */
        /* background-color: #444451;
  height: 26px;
  width: 32px;
  margin: 3px; */
        /* display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        
        width: 50px;
        height: 50px;
        background-color: #ff7200;
        border: 1px solid #aaa;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        cursor: pointer;
    } */

    /* .seat.selected {
        background-color: #ff7200;
        color: #fff;
    } */

    /* body{
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
        } */
    .form {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
        transform: translate(0%, -5%);
        border-radius: 10px;
        padding: 25px;
    }

    .form input {
        background: transparent;
        border: 1px solid #ff7200;
        /* border-top: none;
        border-right: none;
        border-left: none; */
        color: #fff;
        font-size: 15px;
        letter-spacing: 1px;
        font-family: sans-serif;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        color: #ff7200;
    }

    .form input {
        background: transparent;
        border: 1px solid #ff7200;
        /* border-top: none;
        border-right: none;
        border-left: none; */
        color: #fff;
        font-size: 15px;
        letter-spacing: 1px;
        font-family: sans-serif;
        border-radius: 5px;
    }

    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group button {
        background-color: #ff7200;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    h2 {
        font-family: sans-serif;
        text-align: center;
        color: #ff7200;
        font-size: 22px;
        background-color: #fff;
        border-radius: 10px;
        margin: 2px;
        padding: 8px;
    }
</style>

<body class="main">
    <div class="sticky-top">
        <?php
        $movie_id = "";
        $user_id = "";
        $email = $_SESSION['email'];
        if (isset($_POST["submit"])) {
            $movie_id = $_POST['movie_id'];
            // $logedemail = $_POST['loged_email'];
        }
        if (!isset($email)) {
            header("Location: ./login.php");
            exit();
        } else {
            $user_id = $_SESSION["user_id"];
        }
        include('../includes/moviebooking.inc.php');
        include "navigationbar.php";
        $error = "";
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        } else {
            $error = "";
        }
        $customerdata = new userdata();
        $data = $customerdata->getcustomersdata($user_id);

        $moviedata1 = new moviedata();
        $data1 = $moviedata1->getmoviedata($movie_id);

        $theatrename = $data1['theatre'];
        $theatredetail = new theatredata();
        $data2 = $theatredetail->gettheatredata($theatrename);

        $theatreseats = new seatavailability();
        $data3 = $theatreseats->selectedseats($movie_id);
        $allSelectedSeatsArray = [];
        if (!empty($data3)) {
            $seats = $data3['seats'];
            $allSelectedSeatsArray = explode(',', $seats);
        }
        //    $seatsArray = array_column($data3, 'seats');
        // $seatno="seat94";
        // if (in_array('seat96', $allSelectedSeatsArray)) {
        //     echo "seat96 is contained in the array.";
        // } else {
        //     echo "seat96 is not contained in the array.";
        // }
        //        $allSelectedSeats = implode(',', $seatsArray);

        // // Convert the combined string into an array of seat numbers
        //        $allSelectedSeatsArray = explode(',', $allSelectedSeats);
        //        echo $allSelectedSeatsArray;
        //        var_dump($allSelectedSeatsArray);

        ?>
    </div>
    <div class="row" style="background:linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);">
        <div class="col-sm-12 col-lg-4 col-md-4" style="padding: 20px; text-align:center;">
            <img src="./images/<?php echo $data1['cover'] ?>" style="border-radius:40px;" alt="" class="img-fluid custom-img">
        </div>
        <div class="col-sm-12 col-lg-6 col-md-6" style="text-align:left;">
            <h3 style="color:#ff7200;"><?php echo strtoupper($data1['movie']) ?></h3>
            <p style="color:#fff;"><b><?php echo $data1['movie_description'] ?></b></p>
            <p style="color:#fff;"><b>Filming Date:: <?php echo $data1['date'] ?></b></p>
            <p style="color: #fff;"><b>Filming Time: <?php echo date("H:i", strtotime($data1['time'])); ?></b></p>
            <p style="color:#fff;"><b>Rating
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16" style="color:#fff;">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                    </svg> <i class='fa fa-imdb' style="color:gold;"></i>::
                    <?php echo $data1['rating'] ?> </b>
            </p>
            <p style="color:#fff;"><b>Actor:: <?php echo $data1['actor'] ?></b></p>
            <button disabled="disabled" style="background:#ff7200; color:#fff; border-radius:20px;">WELCOME</button>
        </div>
        <div class="col-sm-12 col-lg-2 col-md-2"></div>
    </div>
    <div class="row" style="background:linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);">
        <div class="col-sm-12 col-lg-2 col-md-2"></div>
        <div class="col-sm-12 col-lg-8 col-md-8" style="align-items:center">
            <h2>Please Make Sure You Have Selected your Preffered Seat Here</h2>
            <ul class="showcase">
                <li>
                    <div class="seat"></div>
                    <small>Available</small>
                </li>
                <li>
                    <div class="seat selected"></div>
                    <small>Selected</small>
                </li>
            </ul>
            <div class="container">
                <div class="screen" style="text-align:center; color:#ff7200;"><b>SCREEN</b></div>
                <div class="col-lg-12" style="align-items:center;">
                    <?php
                    $total_seats = $data2['seats'];
                    $number_Of_Rows =ceil($total_seats / 11);
                    $count = 0;
                    echo $number_Of_Rows;
                    for ($i = 0; $i < $number_Of_Rows; $i++) {
                    ?>
                        <div class="rowk" style="margin-bottom:2px;">
                            <?php
                            for ($j = 0; $j <11; $j++) {
                                $count = $count + 1;
                                $usedseat = "seat" . $count;
                                if (in_array($usedseat, $allSelectedSeatsArray)) {
                            ?>
                                    <div class="seat selected">
                                        <input type="checkbox" id="seat<?php echo $count ?>" class="seat-checkbox" disabled>
                                        <label for="seat<?php echo  $count ?>"><?php echo $count ?></label>
                                    </div>
                                <?php } else { ?>
                                    <div class="seat available">
                                        <input type="checkbox" id="seat<?php echo $count ?>" class="seat-checkbox">
                                        <label for="seat<?php echo  $count ?>"><?php echo $count ?></label>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>



            </div>
        </div>
    <div class="col-sm-12 col-lg-2 col-md-2"></div>
    </div>
    <div class="row" style="background:linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);">
    <div class="col-lg-3 col-md-3"></div>    
    <div class="col-sm-12 col-lg-6 col-md-6 mt-5">
            <div class="form">
                <h2>Book Your Tickets</h2>
                <form action="" method="post">
                    <div class="form-group col-lg-12">
                        <label for="name" class="form-group col-lg-12">Your Name:</label><br>
                        <input type="text" id="name" name="name" value="<?php echo $data['firstname'] ?>" class="form-group col-lg-12" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="phone" class="form-group col-lg-12">Your Phone Number:</label><br>
                        <input type="text" id="" class="form-group col-lg-12" name="phone" value="<?php echo $data['phone'] ?>" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="theatre" class="form-group col-lg-12">Theatre:</label><br>
                        <input type="text" id="theatre" name="theatre" value="<?php echo $data1['theatre'] ?>" class="form-group col-lg-12" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="selected_seats" class="form-group col-lg-12">Select Seats:</label>
                        <select id="selected_seats" class="form-group col-lg-12" name="selected_seats[]" multiple required>
                            <!-- Options will be dynamically added using JavaScript -->
                        </select>
                    </div>
                    <input type="text" name="movie_id" value="<?php echo $movie_id ?>" hidden>
                    <button type="submit" name="ticket_book" style="border-radius: 20px;" class="button col-lg-12">Book Now</button>
                </form>
            </div>
        </div>
    <div class="col-lg-3 col-md-3"></div>    
    </div>


    <div>
        <?php
        include("footer.php");
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all seat checkboxes
            const seatCheckboxes = document.querySelectorAll('.seat-checkbox');

            // Get the select element for selected seats
            const selectedSeatsSelect = document.getElementById('selected_seats');

            // Add event listener to each checkbox
            seatCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateSelectedSeats();
                });
            });

            // Update the selected seats in the dropdown
            function updateSelectedSeats() {
                // Clear existing options
                selectedSeatsSelect.innerHTML = '';

                // Add options for selected seats
                seatCheckboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        const option = document.createElement('option');
                        option.value = checkbox.id;
                        option.text = checkbox.id;
                        selectedSeatsSelect.add(option);
                    }
                });
            }
        });
    </script>
</body>

</html>