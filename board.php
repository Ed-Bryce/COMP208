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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container justify-content-start">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <ul class="navbar-nav pl-3">
                <li class="nav-item">
                    <a class="nav-link active" href="board.php">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="social.php">Friends</a>
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

        </div>
    </div>

    <!-- Body   ratio ratio-1x1-->
    <div class="row">

        <!-- Game Info -->
        <div class = "container m-5 border col-3" style="background-color:#212529">
            <div style="color:white">
                <h3 class="m-1" style="text-align:center">Game Info</h3>
            </div> 
        </div>

        <!-- Board -->
        <div class = "container d-flex align-items-center border" style = "max-width:300px; min-width:900px; max-height:300px; min-height:900px">
            <div class = "container d-flex justify-content-center border">
        
            <p style = "color: white"> add board here </p>

            </div>
        </div>
    </div>
</body>
</html>