<?php
    session_start();
    $_SESSION["logged_in"] = "false";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styling/styling.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chess Game - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!-- Nav Bar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Chess Game</span>
    </div>
</nav>

<!-- Login Form -->
<div class = "container d-flex align-items-center border" style = "max-height:600px; min-height:600px">
    <div class = "container d-flex justify-content-center border">  
        <div class = "border-5 border-top border-primary shadow-lg" style = "width:50%;">
            <div class = "p-5 border border-2 border-top-0 shadow-lg">
                <div class = "d-flex justify-content-center border">
                    <h3>Create Account</h3> 
                </div>
                <form action="ENTER LATER">
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-outline-dark" type="submit">Login</button>
                    </div>
                    <div class = "pt-2 d-flex justify-content-center border">
                        <p class="small"><a class="text-primary" href="#########">Forgot password?</a></p>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
</body>
</html>