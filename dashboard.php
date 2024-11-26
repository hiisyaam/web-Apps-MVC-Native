<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php?error=Harap login terlebih dahulu');
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
    <h1>Selamat Datang, <?= $_SESSION['username'] ?>!</h1>
    <p>Ini adalah halaman dashboard.</p>
    <?php 
    
    include_once("c_programKerja.php");
    $controller = new c_programKerja();
    $controller->route();
    
    ; ?>
    <a href="logout.php">Logout</a>
</body>
</html>
