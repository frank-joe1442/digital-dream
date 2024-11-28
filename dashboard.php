<?php
session_start();
if(!isset($_SESSION['id'])){
    header("locatin: login.php");
    exit();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
  <a href="index.html">BR Homes</a> 
  <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username'])?></h1> 
  <p><a href="logout.php">Logout</a></p>
</body>
</html>