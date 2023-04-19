<!doctype html>
<html lang="en">
<style>
  body {
    font-family: arial;
  }

  body {
    color: #fff;
  }
</style>

<body>
  <?php
  $id = $_GET["id"];
  $msgs = file_get_contents("$id/msgs.txt");
  echo $msgs;
  //header("Refresh:4");
  ?>