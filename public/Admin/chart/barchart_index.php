<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sd_208";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT MONTH(created_at) AS month, COUNT(*) AS count FROM activities GROUP BY month";
$result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);
?>


<?php
$monthCounts = array_fill(1, 12, 0);

foreach ($data as $row) {
    $month = $row['month'];
    $count = $row['count'];
    $monthCounts[$month] = $count;
}

$monthLabels = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$monthCountsJSON = json_encode($monthCounts);
$monthLabelsJSON = json_encode($monthLabels);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart of Activies</title>
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
            <canvas id="activityBarChart" width="400" height="400"></canvas>
<script>
    var monthLabels = <?php echo $monthLabelsJSON; ?>;
    var monthCounts = <?php echo $monthCountsJSON; ?>;
    var ctx = document.getElementById('activityBarChart').getContext('2d');

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: monthLabels,
            datasets: [{
                label: 'Activities by Month',
                data: monthCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Customize colors
                borderColor: 'rgba(75, 192, 192, 1)', // Customize colors
                borderWidth: 1 // Customize border width
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</body>
</html>
