<?php 
    include('../PHP-Project/php/config.php');
    if(!isset($_COOKIE['AdminEmail']) && !isset($_COOKIE['AdminPassword'])) {
        header("location:../PHP-Project/php/adminLoginForm.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>StreamVerse Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">StreamVerse Admin</a>
            <!-- Sidebar Toggle-->
            <div class="d-flex justify-content-between w-100">
                <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <!-- Navbar-->
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="">Profile</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="#" onclick="logout()">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="./">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Users Dashboard
                            </a>
                            <a class="nav-link active" href="adminDashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin Dashboard
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-table me-1"></i>
                                    Admin Users
                                </div>
                                <a href="/PHP-Project/php/adminSignupForm.php" class="btn btn-primary">Add new User</a>
                            </div>
                            <div class="card-body">
                                <table border=1 class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Remove Access</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Remove Access</th>
                                            <th>Edit</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $result = mysqli_query($conn, 'SELECT * FROM admin');
                                            $id = 1;
                                            while ($data = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $id . "</td>";
                                                echo "<td>" . $data["firstName"] . "</td>";
                                                echo "<td>" . $data["lastName"] . "</td>";
                                                echo "<td>" . $data["Email"] . "</td>";
                                                echo "<td>" . $data["Password"] . "</td>";
                                                echo '<td><a href="#" onclick="confirmDelete(' . $data['id'] . ')" class="btn btn-danger" id="deleteBtn">Remove Access <i class="bx bx-trash"></i></a></td>';
                                                echo '<td><a href="#" onclick="confirmEdit(' . $data['id'] . ')" class="btn btn-primary" id="deleteBtn">Edit User<i class="bx bx-trash"></i></a></td>';
                                                echo "</tr>";
                                                $id += 1;
                                            }
                                        ?>
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
            function confirmDelete(id) {
                if(confirm('Are you sure you want to remove access?')) {
                    window.location.href = '../PHP-Project/php/deleteAdmin.php?id='+id
                }
            }
            function confirmEdit(id) {
                if(confirm('Are you sure you want to delete this item?')) {
                    window.location.href = '../PHP-Project/php/delete.php?id='+id
                }
            }
            function confirmDeleteAll() {
                if(confirm('Are you sure you want to delete all the items')) {
                    window.location.href = './PHP-Project/php/deleteAll.php'
                }
            }
            function logout() {
                if(confirm('Are you sure do you want to logout?')) {
                    window.location.href = './logout.php';
                }
            }
        </script>
    </body>
</html>
