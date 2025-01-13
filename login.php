<?php
require 'db_config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // ตรวจสอบข้อมูลที่กรอก
    if (empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // ค้นหาผู้ใช้จากฐานข้อมูล
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // ตั้งค่า session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // เปลี่ยนเส้นทางไปยัง dashboard.php หลังจาก 3 วินาที
            header("Refresh:3; url=dashboard.php");
            echo "Login successful! You will be redirected in 3 seconds.";
            exit; // ทำให้การทำงานหยุดหลังจาก redirect
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }
}
?>
