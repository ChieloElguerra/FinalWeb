<?php
session_start();
if($_SESSION["Role"] != 'admin'){
    header("Location: ../loginform.html");
}

include("../../included/DBUtil.php");
?>

<?php
    if (isset($_GET['getdata']) && $_GET['getdata'] === 'true') {
        $mysqli = new mysqli("localhost", "root", "", "sd_208");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

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

        $mysqli->close();

        header('Content-Type: application/json');
        echo json_encode($genderCounts);
    }
    ?>

<?php

$conn = getConnection();

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
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <!-- New css for datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- New Script fpr Datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Add these links in the <head> section of your HTML -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src=”https://d3js.org/d3.v5.min.js”></script>
</head>
<style>
    .datatable-wrapper {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px;
    }

    .datatable-selector {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
    }

    .datatable-input {
        border: 1px solid rgb(22, 20, 20);
        border-radius: 4px;
        padding: 5px;
    }

    .datatable-table {
        width: 100%;
        border-collapse: collapse;
    }

    .datatable-table th {
        background-color: #0a0a0a;
    }

    .datatable-table tr {
        background-color: #0a0a0a;
    }

    .datatable-table th,
    .datatable-table td {
        border: 1px solid rgb(22, 21, 21);
        padding: 8px;
        text-align: left;
    }

    .datatable-info {
        margin-top: 10px;
    }

    .datatable-pagination {
        margin-top: 10px;
    }

    .datatable-pagination-list {
        list-style: none;
        padding: 0;
    }

    .datatable-pagination-list-item {
        display: inline-block;
        margin-right: 5px;
    }

    .datatable-pagination-list-item-link {
        text-decoration: none;
        padding: 5px 10px;
        background-color: #131111;
        color: #333;
    }

    .datatable-pagination-list-item-link:hover {
        background-color: rgb(22, 20, 20);
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admindash.html">Admin Dashboard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="admindash.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="edit_user.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            List of Members/Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="edit_user.php">Show Users</a>

                            </nav>
                        </div>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../../User/401.html">401 Page</a>
                                        <a class="nav-link" href="../../User/404.html">404 Page</a>
                                        <a class="nav-link" href="../../User/500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">List of Charts</div>
                        <!-- <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link collapsed" href="piechart.html" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pie Chart of Gender
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Bar Graph of Activities
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </a> -->



                        <a class="nav-link" href="announcement.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Announcements
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                  Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Admin Dashboard</h1>
                    
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Members List</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="edit_user.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">User Chart</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="gender_piechart.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Announcements</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="announcement.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Pie Chart Example -->
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Pie Chart of Gender
                                </div>
                                <div class="card-body">
                                    <canvas id="myPieChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Bar Chart Example -->

                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart of Activities from January to December
                                </div>
                                <div class="card-body">
            <canvas id="activityBarChart" width="100%" height="40"></canvas>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        List of Members
                    </div>
                    <div class="datatable-top">
                        <div class="datatable-search">
                            <label>
                                <input id="tableSearch" class="datatable-input" type="search" placeholder="Search..." aria-controls="userTable">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- This is where your DataTable will be inserted by members.php -->
                    <div id="userTableContainer"></div>
                </div>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Chielo 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
        </div>

        <!--- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit User (ID: <span id="user_id_display"></span>)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-form" action="edit_user.php" method="GET">
                            <div class="mb-3">
                                <input type="text" name="edit_user_id" id="user_id_input" class="form-control" hidden>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Name</label>
                                <input type="text" name="edit_user_name" id="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="edit_user_email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Choose Role:</label>
                                <select name="edit_user_role" id="roles">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Choose gender:</label>
                                <select name="edit_user_gender" id="genders">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Status">Status:</label>
                                <select name="edit_user_login_status" id="status">
                                    <option value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load the HTML content from members.php into #userTableContainer
            $('#userTableContainer').load('members.php');
        });
    </script>
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
                    type: 'doughnut',
                    data: data,
                };

                // Create and render the chart.
                const ctx = document.getElementById('myPieChart').getContext('2d');
                const myChart = new Chart(ctx, config);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>

</body>

</html>