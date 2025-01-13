<?php
// รวมไฟล์ db_config.php เพื่อเชื่อมต่อฐานข้อมูล
include 'db_config.php';

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์มสมัคร
$email = $_POST['email'];
$password = $_POST['password'];

// คำสั่ง SQL เพื่อบันทึกข้อมูลผู้ใช้ใหม่ลงในฐานข้อมูล
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql) === TRUE) {
    // หากบันทึกข้อมูลสำเร็จ ให้แสดง alert แจ้งเตือน และเปลี่ยนเส้นทางไปที่ login.php
    echo "<script>
            alert('คุณได้ทำการสมัครสมาชิกสำเร็จ');
            window.location.href = 'login.php';
          </script>";
    exit(); // หยุดการทำงานหลังจาก redirect เพื่อไม่ให้โค้ดทำงานต่อ
} else {
    // หากเกิดข้อผิดพลาดในการบันทึกข้อมูล
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
