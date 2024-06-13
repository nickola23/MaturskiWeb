<?php
// File path
$filePath = 'prilog/imenik.txt';

// Read the file content
$fileContent = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Extract the headers
$headers = explode('|', array_shift($fileContent));

// Trim headers
$headers = array_map('trim', $headers);

// Prepare the table rows
$rows = [];
foreach ($fileContent as $line) {
    $columns = explode('|', $line);
    $columns = array_map('trim', $columns);
    $rows[] = $columns;
}

// Function to filter rows based on search parameters
function filterRows($rows, $trazi) {
    return array_filter($rows, function($row) use ($trazi) {
        foreach ($trazi as $key => $value) {
            if (!empty($value) && stripos($row[$key], $value) !== 0) {
                return false;
            }
        }
        return true;
    });
}

// Map search parameters to column indices
$kolona = [
    'ime' => 1,
    'prezime' => 2,
    'adresa' => 3,
    'mesto' => 4,
    'telefon' => 5,
    'email' => 6,
];

// Get search parameters from GET request
$trazi = [];
foreach ($kolona as $param => $index) {
    if (isset($_GET[$param])) {
        $trazi[$index] = trim($_GET[$param]);
    }
}

// Filter rows based on search parameters
if (!empty($trazi)) {
    $rows = filterRows($rows, $trazi);
}
?>
