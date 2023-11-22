<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "username"; // Thay username bằng tên người dùng MySQL của bạn
$password = "password"; // Thay password bằng mật khẩu của bạn
$dbname = "job_database"; // Thay job_database bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối đến cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Thực hiện truy vấn để lấy danh sách công việc từ cơ sở dữ liệu
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách công việc
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["job_title"] . "</strong><br>"
            . $row["job_description"] . "<br>"
            . "<em>Công ty: " . $row["company"] . "</em></p>";
    }
} else {
    echo "Không có công việc nào được tìm thấy";
}

$conn->close();
?>
