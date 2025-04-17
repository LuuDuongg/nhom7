<?php
$servername = "localhost";
$db_username = "root";
$db_password = "123456"; // Nếu bạn dùng XAMPP, thường là rỗng
$dbname = "web_demo";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
