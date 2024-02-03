<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book Movie - Your Movie Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .seating-layout {
            display: grid;
            grid-template-columns: repeat(6, 50px);
            gap: 5px;
        }

        .seat {
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
        }

        .seat.selected {
            background-color: #ff7200;
            color: #fff;
        }
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
</head>

<body class="main">
    <div>
    <?php
include ("navigationbar.php");
?>
    </div>

    <div class="container-fluid position-relative align-content-center mt-5">
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-md-6">
            <div class="seating-layout">
            <!-- Sample seating layout with checkboxes -->
            <div class="seat">
                <input type="checkbox" id="seat1" class="seat-checkbox">
                <label for="seat1">1</label>
            </div>
            <div class="seat">
                <input type="checkbox" id="seat2" class="seat-checkbox">
                <label for="seat2">2</label>
            </div>
            <div class="seat">
                <input type="checkbox" id="seat3" class="seat-checkbox">
                <label for="seat3">3</label>
            </div>
            <!-- Add more seats as needed -->
        </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6">
                <div class="form">
            <h2>Book Your Tickets</h2>
            <form action="process_booking.php" method="post">
                <div class="form-group col-lg-12">
                    <label for="name" class="form-group col-lg-12">Your Name:</label><br>
                    <input type="text" id="name" name="name" class="form-group col-lg-12" required>
                </div>
                <div class="form-group col-lg-12">
                    <label for="phone" class="form-group col-lg-12">Your Phone Number:</label><br>
                    <input type="text" id="" class="form-group col-lg-12" name="phone" required>
                </div>
                <div class="form-group col-lg-12">
                    <label for="selected_theatre" class="form-group col-lg-12">Select Theatre:</label>
                    <select id="" class="form-group col-lg-12" name="selected_theatre" required>
                        <option value="" disabled selected>Select Theatre</option>
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                        <!-- Add more seat options as needed -->
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label for="selected_seats" class="form-group col-lg-12">Select Seats:</label>
                    <select id="selected_seats"  class="form-group col-lg-12" name="selected_seats[]" multiple required>
                        <!-- Options will be dynamically added using JavaScript -->
                    </select>
                </div>
                <button type="submit" class="button col-lg-12">Book Now</button>
            </form>
        </div>
            </div>
        </div>

    </div>
<div>
    <?php
    include ("footer.php");
    ?>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all seat checkboxes
            const seatCheckboxes = document.querySelectorAll('.seat-checkbox');

            // Get the select element for selected seats
            const selectedSeatsSelect = document.getElementById('selected_seats');

            // Add event listener to each checkbox
            seatCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    updateSelectedSeats();
                });
            });

            // Update the selected seats in the dropdown
            function updateSelectedSeats() {
                // Clear existing options
                selectedSeatsSelect.innerHTML = '';

                // Add options for selected seats
                seatCheckboxes.forEach(function (checkbox) {
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