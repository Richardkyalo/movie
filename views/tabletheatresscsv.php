<?php
session_start();

// Check if the table data is available in the session
if (isset($_SESSION['tableData'])) {
    // Unserialize the table data
    $theatres = unserialize($_SESSION['tableData']);

    // Define CSV headers
    $csvHeaders = array('Theatre Name', 'County', 'Town', 'Number of Seats', 'Streat');

    // Generate CSV content
    $outputCsv = fopen('php://temp', 'w+');
    fputcsv($outputCsv, $csvHeaders);
    foreach ($theatres as $theatre) {
        fputcsv($outputCsv, array($theatre['theatre_name'], $theatre['county'], $theatre['town'], 
        $theatre['seats'], $theatre['streat']));
    }
    rewind($outputCsv);
    $csvData = stream_get_contents($outputCsv);
    fclose($outputCsv);

    // Output CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="theatres.csv"');
    echo $csvData;

    // Clear the session variable
    unset($_SESSION['tableData']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}