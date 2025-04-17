<?php
// Kết nối database
$servername = "localhost";
$username = "root";
$password = ""; // Nếu bạn có mật khẩu thì điền vào
$dbname = "web_demo"; // đổi lại theo tên DB bạn dùng

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy từ khóa tìm kiếm
$query = isset($_GET['query']) ? trim($_GET['query']) : '';

$sql = "SELECT * FROM sanpham WHERE ten LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%$query%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <h2>Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($query); ?>"</h2>

    <div class="product-list">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <img src="<?php echo $row['hinhanh']; ?>" alt="Ảnh SP" width="150">
                    <h3><?php echo $row['ten']; ?></h3>
                    <p>Giá: <?php echo number_format($row['gia']); ?> VND</p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Không tìm thấy sản phẩm nào phù hợp.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
