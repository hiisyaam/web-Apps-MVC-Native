<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE pengguna = ? AND pw = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['pengguna'];
    $_SESSION['role'] = $user['role'];
    header('Location: dashboard.php');
} else {
    header('Location: index.php?error=Username atau password salah');
}
