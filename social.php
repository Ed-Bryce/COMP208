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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button type="button" class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#menu">Menu</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="board.php">Play</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="social.php">Friends</a>
                    </li>
                </ul>
                <a href="login.php" class="btn btn-outline-danger" type="submit">Log Out</a>
            </div>     
        </div>
    </nav>

    <!-- body -->
    <div class="row m-3">
        <div class="container-flex m-5 col border shadow-lg" style="background-color:#212529; color:white">
            <h2 style="text-align:center"><u> Friends List </u></h2>
        </div>
        <div class="container-flex m-5 col border shadow-lg" style="background-color:#212529; color:white">
            <h2 style="text-align:center"><u> Column 2 </u></h2>

        </div>
        <div class="container-flex m-5 col border shadow-lg" style="background-color:#212529; color:white">
            <h2 style="text-align:center"><u> Column 3 </u></h2>

        </div>
    </div> 

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
