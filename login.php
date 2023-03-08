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
<div class = "container d-flex align-items-center" style = "max-height:600px; min-height:600px">
    <div class = "container d-flex justify-content-center">  
        <div class = "p-5 rounded" style = "background-color:#b5b5b5;">
        <h3>Login</h3>  
        <form action="ENTER LATER">
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
        </div>
    </div>
</div>
</body>
</html>