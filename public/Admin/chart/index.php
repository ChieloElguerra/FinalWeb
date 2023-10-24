<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart of Gender</title>
        <!-- Include the Chart.js library here -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src=”https://d3js.org/d3.v5.min.js”></script>
</head>
<body>
    <a class="nav-link" href="dashboard.html">Back to Dashboard</a>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
                Pie Chart Example
            </div>
            <div class="card-body">
                <canvas id="myChart" width="100%" height="300"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>

    <script>
        const data = {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Gender Count',
                data: [], // Leave this empty for now; we'll populate it dynamically.
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)'
                ],
                hoverOffset: 4
            }]
        };

        // Fetch the gender data from your database using PHP.
        fetch('gender_piechart.php?getdata=true')
            .then(response => response.json())
            .then(genderCounts => {
                // Update the data with the retrieved counts.
                data.datasets[0].data = [genderCounts.male, genderCounts.female];

                // Now, create the chart using the updated data.
                const config = {
                    type: 'bar',
                    data: data,
                };

                // Create and render the chart.
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, config);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>

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
</body>
</html>
