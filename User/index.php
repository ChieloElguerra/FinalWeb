<?php
include_once('../included/userSession.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>User Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="est.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">User Dashboard</a>
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
                        <li><hr class="dropdown-divider" /></li>
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
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a> -->
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <!-- <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav> -->
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
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
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                             <a class="nav-link" href="announcement.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Announcements
                            </a>
                            <!-- <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>  -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                     User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
               <main>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="activities.css">
                    <title>Activity Planner</title>
                </head>
                <body>
                    <div class="container">
                        <h1>Activity Planner</h1>
                        <form id="activity-form" action="activity/addActivity.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" id="date" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="time" id="time" name="time" required>
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" id="location" name="location" required>
                            </div>
                            <div class="form-group">
                                <label for="ootd">Outfit of the Day:</label>
                                <textarea id="ootd" name="ootd"></textarea>
                            </div>
                            <div class="btn-group">
                                <button type="submit" id="submit-btn" class="btn">Add Activity</button>
                                <button type="submit" id="edit-btn" class="btn btn-edit" style="display: none;">Update Activity</button>
                            </div>
                        </form>
                        <div class="activity-list">
                            <h2>Activity List</h2>
                            <!-- <div id="activity-items"></div> -->
                            <div id="activity-items">
                                <table class="activity-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Location</th>
                                            <th>OOTD</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include_once("../included/DBUtil.php");
                                            $conn = getConnection();
                                            $userId = $_SESSION["id"];
                                            $sql = "SELECT * FROM activities WHERE userID = $userId";
                                            $result = mysqli_query($conn, $sql);

                                            if (mysqli_num_rows($result) > 0) :
                                                while ($row = mysqli_fetch_assoc($result)) :
                                        ?>
                                        <tr>
                                            <td><?= $row['name']?></td>
                                            <td><?= $row['date']?></td>
                                            <td><?= $row['time']?></td>
                                            <td><?= $row['location']?></td>
                                            <td><?= $row['ootd']?></td>
                                            <td>
                                                <button onclick="editActivity(
                                                    <?= $row['id']?>, 
                                                    '<?= $row['name']?>', 
                                                    '<?= $row['date']?>', 
                                                    '<?= $row['time']?>', 
                                                    '<?= $row['location']?>',
                                                    '<?= $row['ootd']?>'
                                                    )">Edit</button>
                                                <button onclick="deleteActivity(<?= $row['id']?>)">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                            endwhile;
                                        else :
                                            echo "0 results";
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- JavaScript Functionality -->
                    <!-- <script src="act.js"></script> -->
                </body>
                </html>
                
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
        <script>
            const form = document.getElementById('activity-form');
            const nameInput = document.getElementById('name');
            const dateInput = document.getElementById('date');
            const timeInput = document.getElementById('time');
            const locationInput = document.getElementById('location');
            const ootdInput = document.getElementById('ootd');
            const submitButton = document.getElementById('submit-btn');
            const activityItems = document.getElementById('activity-items');
            const editButton = document.getElementById('edit-btn');

        
        function editActivity(id, name, date, time, location, ootd) {
            nameInput.value = name;
            dateInput.value = date;
            timeInput.value = time;
            locationInput.value = location;
            ootdInput.value = ootd;

            submitButton.style.display = 'none';
            editButton.style.display = 'block';
            
            const newAction = `activity/updateActivity.php?id=${id}`;
            form.setAttribute('action', newAction);
            
            editButton.onclick = function () {
                updateActivityInDatabase();
            };
        }
        function deleteActivity(id) {
            const confirmDelete = window.confirm("Are you sure you want to delete this activity?");
            
            if (confirmDelete) {
                window.location.href = `activity/deleteActivity.php?id=${id}`;
            }
        }
        function updateActivityInDatabase() {
            alert("Activity updated successfully!");
        }
        
        
        // document.getElementById("activity-form").addEventListener("submit", function (event) {
        //     // event.preventDefault();
        //     alert("Activity added successfully!");
        // });
        function clearForm() {
            nameInput.value = '';
            dateInput.value = '';
            timeInput.value = '';
            locationInput.value = '';
            ootdInput.value = '';
        }

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>