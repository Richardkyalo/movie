<?php
session_start();

// Include DomPDF library
require_once '../vendor/autoload.php'; 

use Dompdf\Dompdf;

// Check if the table data is available in the session
if (isset($_SESSION['tableData'])) {
    // Unserialize the table data
    $theatres = unserialize($_SESSION['tableData']);

    // Define PDF headers
    $pdfHeaders = '<tr>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Theatre Name</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">County</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Town</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Streat</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Number of Seats</th>';
    $pdfHeaders .= '</tr>';

    $pdfData = $pdfHeaders;
    foreach ($theatres as $theatre) {
        $pdfData .= '<tr>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $theatre['theatre_name'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $theatre['county'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $theatre['town'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $theatre['streat'].'</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $theatre['seats'] . '</td>';
        $pdfData .= '</tr>';
    }

    // Total number of th$theatres
    $totaltheatres = count($theatres);

    // HTML content with logo, table, and footer
    $htmlContent = '
        <div style="text-align: center; color:#ff7200">
           <h3 >RK Movie Theatres: List of Theatres</h3>
        </div>
        <table style="width: 100%; margin-top: 20px;">
            <tbody>' . $pdfData . '</tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="border-top: 1px solid #000; padding: 5px; text-align: right;">Total: ' . $totaltheatres . ' Theatres</td>
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
    header('Content-Disposition: attachment; filename="theatres.pdf"');
    echo $dompdf->output();

    // Clear the session variable
    unset($_SESSION['tableData']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}
