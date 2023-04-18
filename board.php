<?php
    //require "includes/loginSession.php";
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
<body style = "background-color: white;">
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container justify-content-start">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <ul class="navbar-nav pl-3">ye
                <li class="nav-item">
                    <a class="nav-link" href="board.php">Play</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="social.php">Friends</a>
                </li>
            </ul>
        </div>
        <div class="container-fluid justify-content-center">
            <span class="navbar-brand">Chess Game - Player: <?=$id?></span>
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
        <div class = "container m-10 border col-3 shadow-lg" style="background-color:#212429;  margin-top: 60px; border-radius: 25px;">
            <div style="color:white"><br>
                <h3 class="m-1" style="text-align:center; font-family: Futura">Game Info</h3>
            </div> 
        </div>

        <!-- Board -->
        <div class="container d-flex align-items-center border shadow-lg" style="width: 48%; height: 80vh; margin-top: 60px">
            <p style="color: black;">add board here</p>
        </div>
    </div>
</body>
</html>
