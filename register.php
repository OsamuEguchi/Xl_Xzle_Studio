<?php
require 'db_config.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $name = trim($_POST['name']);  // รับชื่อผู้ใช้
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = 'user'; // กำหนดบทบาทผู้ใช้เป็น 'user'

    // ตรวจสอบว่าผู้ใช้กรอกข้อมูลครบหรือไม่
    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // ตรวจสอบรูปแบบอีเมล
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // แฮชรหัสผ่าน
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // เตรียม SQL สำหรับบันทึกผู้ใช้ในฐานข้อมูล
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        
        // ตรวจสอบว่าการบันทึกสำเร็จหรือไม่
        if ($stmt->execute([$name, $email, $hashed_password, $role])) {
            echo "Registration successful!";
            header("Location: login_form.php"); // รีไดเร็กต์ไปที่หน้า Login_form หลังจากสมัครเสร็จ
            exit;
        } else {
            echo "Failed to register user.";
        }
    } catch (PDOException $e) {
        // แสดงข้อผิดพลาดหากการ query ล้มเหลว
        echo "Error: " . $e->getMessage();
    }
}
?>
