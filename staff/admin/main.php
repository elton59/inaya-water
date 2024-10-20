<?php
include("sidebar.php");
include("topbar.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
                        // Query for counting pending users across multiple tables
                        $pendingUsersQuery = "
                            SELECT 
                                (SELECT COUNT(*) FROM financemanager WHERE status='pending') +
                                (SELECT COUNT(*) FROM driver WHERE status='pending') +
                                (SELECT COUNT(*) FROM customer WHERE status='pending') +
                                (SELECT COUNT(*) FROM manager WHERE status='pending') AS total_pending_users
                        ";

                        $result = $mysqli->query($pendingUsersQuery) or die($mysqli->error);
                        $pendingUsersCount = 0;
                        if ($row = $result->fetch_assoc()) {
                            $pendingUsersCount = $row["total_pending_users"];
                        }

                        // Query for counting total users across multiple tables
                        $totalUsersQuery = "
                            SELECT 
                                (SELECT COUNT(*) FROM financemanager) +
                                (SELECT COUNT(*) FROM driver) +
                                (SELECT COUNT(*) FROM customer) +
                                (SELECT COUNT(*) FROM manager) AS total_users
                        ";

                        $result = $mysqli->query($totalUsersQuery) or die($mysqli->error);
                        $totalUsersCount = 0;
                        if ($row = $result->fetch_assoc()) {
                            $totalUsersCount = $row["total_users"];
                        }

                        // Function to render a card
                        function renderCard($title, $count, $color) {
                            echo "
                            <div class='col-xl-3 col-md-6 mb-4'>
                                <div class='card border-left-$color shadow h-100 py-2'>
                                    <div class='card-body'>
                                        <div class='row no-gutters align-items-center'>
                                            <div class='col mr-2'>
                                                <div class='text-xs font-weight-bold text-$color text-uppercase mb-1'>$title</div>
                                                <div class='h5 mb-0 font-weight-bold text-gray-800'>$count</div>
                                            </div>
                                            <div class='col-auto'>
                                                <!-- Optional Icon -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }

                        // Render the card for pending users
                        renderCard("Pending Users", $pendingUsersCount, "primary");

                        // Render the card for total users
                        renderCard("Total Users", $totalUsersCount, "success");
                        ?>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- Footer Content -->
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../assets/js/sb-admin-2.min.js"></script>
</body>
</html>
