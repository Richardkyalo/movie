<?php
session_start();

// Check if the table data is available in the session
if (isset($_SESSION['tableData'])) {
    // Unserialize the table data
    $users = unserialize($_SESSION['tableData']);

    // Define CSV headers
    $csvHeaders = array('Firstname', 'Email', 'Role', 'Phone');

    // Generate CSV content
    $outputCsv = fopen('php://temp', 'w+');
    fputcsv($outputCsv, $csvHeaders);
    foreach ($users as $user) {
        fputcsv($outputCsv, array($user['firstname'], $user['email'], $user['roles'], $user['phone']));
    }
    rewind($outputCsv);
    $csvData = stream_get_contents($outputCsv);
    fclose($outputCsv);

    // Output CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="employees.csv"');
    echo $csvData;

    // Clear the session variable
    unset($_SESSION['tableData']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}