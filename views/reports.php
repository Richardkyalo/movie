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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="main">
    <div>
        <div class="row">
            <div class="col-12">
                <?php
                session_start(); //
                include "adminnavbar.php";
                include("../classes/admins/reports.db.php");
                $email = $_SESSION['email'];
                $error = "";
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                } else {
                    $error = "";
                }
                if (!isset($email)) {
                    header("Location: login.php");
                    exit();
                }

                // Include and instantiate the reports class
                $chartdatagenerator = new reports();
                // Generate report data
                $chartdata = $chartdatagenerator->generate_report();
                ?>
            </div>
        </div>
        <div class="container">
            <div class="row">
            <div class="mb-3 mt-3 text-white col-lg-6 col-md-6 col-sm-12" style="background-color:white;">
            <h3 style="color: #ff7200; text-align:center; font-family: 'Times New Roman', Times, serif; background-color:aliceblue;">A Graph Showing Total Bookings And Amount Of Money Collected The Previous Week </h3>
            <canvas id="bookingChart"></canvas>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php include "footer.php"; ?>
            </div>
        </div>
    </div>

    <script>
        var data = <?php echo json_encode($chartdata); ?>;
        for (let i = 0; i < data.revenues.length; i++) {
            if (data.revenues[i] === null) {
                data.revenues[i] = 0;
            }
        }

        var ctx = document.getElementById('bookingChart').getContext('2d');

        var bookingChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.dates,
                datasets: [{
                        label: 'Total Bookings',
                        data: data.bookings,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Amount',
                        data: data.revenues,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
