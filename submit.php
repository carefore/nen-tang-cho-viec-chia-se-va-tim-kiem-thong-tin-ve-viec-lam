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

// Lấy dữ liệu từ form
$jobTitle = $_POST['jobTitle'];
$jobDescription = $_POST['jobDescription'];
$company = $_POST['company'];

// Chuẩn bị và thực hiện truy vấn để lưu thông tin công việc vào cơ sở dữ liệu
$sql = "INSERT INTO jobs (job_title, job_description, company) VALUES ('$jobTitle', '$jobDescription', '$company')";

if ($conn->query($sql) === TRUE) {
    echo "Thông tin công việc đã được lưu thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
