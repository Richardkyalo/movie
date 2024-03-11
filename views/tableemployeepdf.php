<?php
session_start();

// Include DomPDF library
require_once '../vendor/autoload.php'; 

use Dompdf\Dompdf;

// Check if the table data is available in the session
if (isset($_SESSION['tableData'])) {
    // Unserialize the table data
    $users = unserialize($_SESSION['tableData']);

    // Define PDF headers
    $pdfHeaders = '<tr>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Firstname</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Email</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Role</th>';
    $pdfHeaders .= '<th style="border: 1px solid #000; padding: 5px;">Phone</th>';
    $pdfHeaders .= '</tr>';

    $pdfData = $pdfHeaders;
    foreach ($users as $user) {
        $pdfData .= '<tr>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $user['firstname'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $user['email'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $user['roles'] . '</td>';
        $pdfData .= '<td style="border: 1px solid #000; padding: 5px;">' . $user['phone'] . '</td>';
        $pdfData .= '</tr>';
    }

    // Total number of users
    $totalUsers = count($users);

    // HTML content with logo, table, and footer
    $htmlContent = '
        <div style="text-align: center;">
            <img src="logo.png" alt="Logo" style="width: 200px;">
        </div>
        <table style="width: 100%; margin-top: 20px;">
            <tbody>' . $pdfData . '</tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="border-top: 1px solid #000; padding: 5px; text-align: right;">Total: ' . $totalUsers . ' Employees</td>
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
    header('Content-Disposition: attachment; filename="employees.pdf"');
    echo $dompdf->output();

    // Clear the session variable
    unset($_SESSION['tableData']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}
