<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Chủ - Cửa Hàng Điện Thoại</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <?php include 'header.html'; ?>

    <div class="container">
        <?php include 'sanpham.html'; ?>
    </div>
</body>
</html>
