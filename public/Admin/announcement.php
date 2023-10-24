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
<style>
    .table-striped tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    .table thead th {
        background-color: #337ab7;
        color: #fff; 
        font-weight: bold;
    }

    .add-announcement-button {
        margin-top: 10px;
    }

    .modal-dialog {
        max-width: 600px;
    }
</style>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admindash.html">Admin Dashboard</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                        <a class="nav-link collapsed" href="members.php" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            List of Members/Users
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="members.php">Show Users</a>

                            </nav>
                        </div>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
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
                        <a class="nav-link collapsed" href="piechart.html" data-bs-toggle="collapse"
                        data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                         Pie Chart of Gender
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Bar Graph of Activities
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </a> -->
                    

                  
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                           Announcements
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Admin Dashboard</h1>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        List of Announcements
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
                    <div class="container">
    <h1>Announcements</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
        Add Announcement
    </button>

    <!-- Announcement Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Content</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to your database (replace with your connection details)
            $conn = new mysqli('localhost', 'root', '', 'sd_208');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch announcements from the database
            $sql = "SELECT * FROM announcements";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["announcementID"] . "</td>";
                    echo "<td>" . $row["announcementContent"] . "</td>";
                    echo "<td>" . $row["announcementDate"] . "</td>";
                    echo "<td>" . $row["announcementStatus"] . "</td>";
                    echo '<td><button class="btn btn-danger delete-button" data-announcement-id="' . $row["announcementID"] . '">Delete</button></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No announcements found.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Add Announcement Modal -->
<div class="modal fade" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnnouncementModalLabel">Add Announcement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="add_announcement.php">
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" id="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="important">Important</option>
                            <option value="not_important">Not Important</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Announcement</button>
                </form>
            </div>
        </div>
    </div>
</div>
                    </div>
                </div>
        </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Load the HTML content from members.php into #userTableContainer
            $('#userTableContainer').load('members.php');
        });
        
    </script>
    <script>
    $(document).ready(function() {
        $(".delete-button").click(function() {
            if (confirm("Are you sure you want to delete this announcement?")) {
                var announcementID = $(this).data("announcement-id");

                $.ajax({
                    type: "POST",
                    url: "delete_announcement.php", 
                    data: { announcementID: announcementID },
                    success: function(response) {
                        if (response === "success") {
                            location.reload();
                        } else {
                            alert("An error occurred while deleting the announcement.");
                        }
                    }
                });
            }
        });
    });
</script>

</body>

</html>