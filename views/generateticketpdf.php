<?php
require_once '../vendor/autoload.php'; 

$name = $_GET['name'] ?? '';
$phone = $_GET['phone'] ?? '';
$movie_id = $_GET['movie_id'] ?? '';
$seats = $_GET['seats'] ?? '';
$totalamount = $_GET['totalamount'] ?? '';
$date = $_GET['date'] ?? '';
$time = $_GET['time'] ?? '';
$moviename = $_GET['moviename'] ?? '';

$formattedDate = date("F j, Y", strtotime($date)); 
$formattedTime = date("g:i A", strtotime($time)); 

$html = '
<style>
    .table1 {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }
    .table1 th,
    .table1 td {
        padding: 8px;
        border: 1px solid #ddd;
    }
    .table1 th {
        background-color: #f2f2f2;
        color:#ff7200;
        
    }
    .ticket {
        width: 100%;
        border: 2px solid #000;
        border-radius: 10px;
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }
    .ticket h1 {
        font-size: 24px;
        text-align: center;
    }
    .ticket p {
        font-size: 16px;
        margin-bottom: 10px;
    }
    .ticket strong {
        font-weight: bold;
    }
    footer {
        text-align: center;
        margin-top: 20px;
    }
    footer p {
        font-size: 12px;
        color: #ff7200;
    }
</style>
<div class="ticket">
    <h1>Booking Ticket</h1>
    <table class="table1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Movie ID</th>
                <th>Movie Name</th>
                <th>Seats</th>
                <th>Amount</th>
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $name . '</td>
                <td>' . $phone . '</td>
                <td>' . $movie_id . '</td>
                <td>' . $moviename . '</td>
                <td>' . $seats . '</td>
                <td>' . $totalamount . '</td>
                <td>' . $formattedDate . ' at ' . $formattedTime . '</td>
            </tr>
        </tbody>
    </table>
    <footer>
    <p>@copyright.RK Movie Theatres</p>
</footer>
</div>
'; 

$ticketWidth = 600;
$ticketHeight = 300;

$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper(array(0, 0, $ticketWidth + 20, $ticketHeight + 20));

$dompdf->render();

$dompdf->stream('booking_ticket.pdf', array('Attachment' => 0));
