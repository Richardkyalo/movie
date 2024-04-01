<?php
session_start();

// Include DomPDF library
require_once '../vendor/autoload.php'; 

use Dompdf\Dompdf;

// Check if the table data is available in the session
if (isset($_SESSION['tableData']) && isset($_SESSION['booked'])) {
    // Unserialize the table data
    $movies = unserialize($_SESSION['tableData']);
    $bookings = unserialize($_SESSION['booked']);

    // Define PDF headers for movies table
    $pdfHeaders = '<tr>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Movie Name</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Charges</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Date of Filming</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Length</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Actor</th>';
    $pdfHeaders .= '</tr>';

    // Construct HTML for movies table
    $pdfData = $pdfHeaders;
    foreach ($movies as $movie) {
        $pdfData .= '<tr>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie['movie'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie['charge'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie['date'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie['length_hours'] .'Hrs '. $movie['length_minutes'] .'Min</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie['actor'] . '</td>';
        $pdfData .= '</tr>';
    }

    // Define PDF headers for bookings table
    $bookingPdfHeaders = '<tr>';
    $bookingPdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Movie Name</th>';
    $bookingPdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Booked Tickets</th>';
    $bookingPdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Total Amount</th>';
    $bookingPdfHeaders .= '</tr>';

    // Construct HTML for bookings table
    $bookingPdfData = $bookingPdfHeaders;
    foreach ($bookings as $movie_name => $seats) {
        $bookingPdfData .= '<tr>';
        $bookingPdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $movie_name . '</td>';
        $bookingPdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $seats['total_booked_seats'] . '</td>';
        $bookingPdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $seats['charge']*$seats['total_booked_seats'] . '</td>';
        $bookingPdfData .= '</tr>';
    }

    // Total number of movies
    $totalMovies = count($movies);
    // Total number of booked movies
    $totalBookedMovies = count($bookings);

    // HTML content with logo, table, and footer
    $htmlContent = '
        <div style="text-align: center; color:#ff7200">
           <h3 >RK Movie Theatres:</h3>
           <h3> List of Movies</h3>
        </div>
        <table style="width: 100%; margin-top: 20px;">
            <tbody>' . $pdfData . '</tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="border-top: 1px solid #000; padding: 5px; text-align: right;">Total: ' . $totalMovies . ' Movies</td>
                </tr>
            </tfoot>
        </table>

        <div style="text-align: center; color:#ff7200; margin-top: 50px;">
           <h3 >Number Of Booked Tickets Per Movie</h3>
        </div>
        <table style="width: 100%; margin-top: 20px;">
            <tbody>' . $bookingPdfData . '</tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="border-top: 1px solid #000; padding: 5px; text-align: right;">Total: ' . $totalBookedMovies . ' Movies</td>
                </tr>
            </tfoot>
        </table>

        <div style="text-align: center; margin-top: 20px;">
            <p style="font-size: 12px; color: #ff7200;">@copyright.RK Movie Theatres</p>
        </div>
    ';

    // Create PDF object
    $dompdf = new Dompdf();
    $dompdf->loadHtml($htmlContent);

    // (Optional) Set paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output PDF
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="movies.pdf"');
    echo $dompdf->output();

    // Clear the session variables
    unset($_SESSION['tableData']);
    unset($_SESSION['booked']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}
