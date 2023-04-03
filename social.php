<?php
    require "includes/loginSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling/styling.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chess Game - Friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container justify-content-start">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <ul class="navbar-nav pl-3">
                <li class="nav-item">
                    <a class="nav-link" href="board.php">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="social.php">Friends</a>
                </li>
            </ul>
        </div>
        <div class="container-fluid justify-content-center">
            <span class="navbar-brand">Chess Game</span>
        </div>
        <div class="container justify-content-end">
            <a href="login.php" class="btn btn-danger" role="button">Logout</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" id="menu">
    <div class="offcanvas-header">
        <!-- sidebar header -->

        <h1 class="offcanvas-title">Menu</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>

    </div>
    <div class="offcanvas-body">
        
        <!-- sidebar body -->

    <p>cheese</p>

    </div>

</div>

</body>
</html>
