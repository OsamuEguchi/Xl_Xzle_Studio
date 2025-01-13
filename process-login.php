<?php
session_start();  // เริ่มต้น session

require_once 'db_config.php';  // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับข้อมูลจากฟอร์ม
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    // คำสั่ง SQL เพื่อค้นหาผู้ใช้ตามอีเมล
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // ผูกตัวแปรและทำการ execute
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // หากพบผู้ใช้
        if ($result->num_rows > 0) {
            // ดึงข้อมูลผู้ใช้จากผลลัพธ์
            $user = $result->fetch_assoc();

            // ตรวจสอบรหัสผ่าน
            if (password_verify($password, $user['password'])) {
                // หากรหัสผ่านตรงกัน
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];

                // รีไดเรกต์ไปยังหน้า dashboard หรือหน้าอื่น ๆ
                header("Location: dashboard.php");
                exit();
            } else {
                // หากรหัสผ่านไม่ตรงกัน
                $_SESSION['error'] = "Invalid email or password.";
            }
        } else {
            // หากไม่พบผู้ใช้ในฐานข้อมูล
            $_SESSION['error'] = "Invalid email or password.";
        }

        // ปิดการเตรียมคำสั่ง
        $stmt->close();
    } else {
        // หากมีข้อผิดพลาดในการเตรียมคำสั่ง SQL
        $_SESSION['error'] = "Database error: " . $conn->error;
    }
    
    // รีไดเรกต์กลับไปยังหน้า login
    header("Location: login.php");
    exit();
} else {
    // หากไม่ได้ส่งข้อมูลผ่าน POST
    header("Location: login.php");
    exit();
}
?>
