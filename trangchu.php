<?php
session_start();

// Kiểm tra nếu chưa đăng nhập thì chuyển về login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trang Chủ</title>
</head>
<body>
    <h2>Chào mừng, <?= $_SESSION['username'] ?>!</h2>
    <p>Đăng nhập thành công.</p>
    <a href="Logout.php">Đăng xuất</a>
</body>
</html>
