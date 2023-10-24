<?php
if (isset($_GET['getdata']) && $_GET['getdata'] === 'true') {
    // Connect to your MySQL database (adjust these settings as needed).
    $mysqli = new mysqli("localhost", "root", "", "sd_208");

    // Check connection.
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Query to retrieve gender data.
    $query = "SELECT gender, COUNT(*) as count FROM users GROUP BY gender";
    $result = $mysqli->query($query);

    $genderCounts = [
        'male' => 0,
        'female' => 0,
    ];

    while ($row = $result->fetch_assoc()) {
        if ($row['gender'] === 'male') {
            $genderCounts['male'] = (int)$row['count'];
        } elseif ($row['gender'] === 'female') {
            $genderCounts['female'] = (int)$row['count'];
        }
    }

    // Close the database connection.
    $mysqli->close();

    // Send the gender counts as JSON.
    header('Content-Type: application/json');
    echo json_encode($genderCounts);
}
?>
