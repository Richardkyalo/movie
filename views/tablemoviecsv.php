<?php
session_start();

// Check if the table data is available in the session
if (isset($_SESSION['tableData'])) {
    // Unserialize the table data
    $movies = unserialize($_SESSION['tableData']);

    // Define CSV headers
    $csvHeaders = array('Name', 'Charges', 'Date of Filming', 'Time', 'Hours', 'Minutes', 'Actor');

    // Generate CSV content
    $outputCsv = fopen('php://temp', 'w+');
    fputcsv($outputCsv, $csvHeaders);
    foreach ($movies as $movie) {
        fputcsv($outputCsv, array($movie['movie'], $movie['charge'], $movie['date'], 
        $movie['time'], $movie['length_hours'], $movie['length_minutes'], $movie['actor']));
    }
    rewind($outputCsv);
    $csvData = stream_get_contents($outputCsv);
    fclose($outputCsv);

    // Output CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="movies.csv"');
    echo $csvData;

    // Clear the session variable
    unset($_SESSION['tableData']);
} else {
    // Handle the case when table data is not available
    echo "Table data not found.";
}