<?php
session_start();
require("connect.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra tài khoản
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header("Location: Main.php"); // ✅ chuyển đến trang chủ nếu thành công
        exit();
    } else {
        echo "Sai tài khoản hoặc mật khẩu. <a href='login.html'>Thử lại</a>";
    }
} else {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='login.html'>Thử lại</a>";
}
?>
