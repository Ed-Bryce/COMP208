<?php
    require "includes/loginSession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling/styling.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chess Game - Play</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style = "background-color: #2C3289;">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container-fluid">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="board.php">Play</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="social.php">Friends</a>
                    </li>
                </ul>
                <a href="login.php" class="btn btn-outline-danger" type="submit">Log Out</a>
            </div>     
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

        </div>
    </div>

    <!-- Body   ratio ratio-1x1-->
    <div class="row">

        <!-- Game Info -->
        <div class = "container m-10 border col-3 shadow-lg" style="background-color:#212529;  margin-top: 60px">
            <div style="color:white">
                <h3 class="m-1" style="text-align:center">Game Info</h3>
            </div> 
        </div>

        <!-- Board -->
        <div class="container d-flex align-items-center border shadow-lg" style="width: 48%; height: 80vh; margin-top: 60px">
            <p style="color: white;">add board here</p>
        </div>
    </div>
    </div>
</body>
</html>