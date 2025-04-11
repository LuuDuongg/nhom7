<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kiểm tra tài khoản đã tồn tại chưa
    $check = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Tên đăng nhập đã tồn tại!'); window.location.href='register.html';</script>";
    } else {
        // Thêm tài khoản mới
        $insert = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Đăng ký thành công!'); window.location.href='login.html';</script>";
        } else {
            echo "<script>alert('Lỗi khi đăng ký tài khoản.'); window.location.href='register.html';</script>";
        }
    }
    $stmt->close();
    $conn->close();
}
?>
