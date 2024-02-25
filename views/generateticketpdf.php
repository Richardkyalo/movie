<?php
require_once '../vendor/autoload.php'; // Include autoloader for Dompdf

// Retrieve data from GET parameters
$name = $_GET['name'];
$age = $_GET['age'];
$email = $_GET['email'];

// Generate ticket details HTML
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
        color: #333;
    }
    .ticket {
        width: 500px;
        padding: 20px;
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
        color: #777;
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
                <th>Date and Time</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>' . $name . '</td>
                <td>' . $age . '</td>
                <td>' . $email . '</td>
                <td>2024-02-24 18:00</td>
            </tr>
            <!-- Add more rows for additional booking details -->
        </tbody>
    </table>
</div>
<footer>
    <p>@copyright.RK Movie Theatres</p>
</footer>';

// Width and height of the ticket in pixels
$ticketWidth = 500;
$ticketHeight = 250;

// Setup Dompdf
$dompdf = new Dompdf\Dompdf();
$dompdf->loadHtml($html);

// Set paper size based on ticket dimensions (add margins if needed)
$dompdf->setPaper(array(0, 0, $ticketWidth + 20, $ticketHeight + 20));

// Render PDF (output)
$dompdf->render();

// Optionally, you can add meta information to the PDF
$dompdf->addInfo("Title", "RK Movie Theatres");
$dompdf->addInfo("Author", "RK Movie Theatres");
$dompdf->addInfo("Subject", "Booking Ticket");
$dompdf->addInfo("Keywords", "movie, theatre, booking");

// Output PDF
$dompdf->stream('booking_ticket.pdf', array('Attachment' => 0));
