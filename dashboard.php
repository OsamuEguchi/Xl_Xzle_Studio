<?php
session_start();  // เริ่มต้น session

// ตรวจสอบว่าได้เข้าสู่ระบบหรือยัง
if (!isset($_SESSION['user_id'])) {
    // ถ้ายังไม่ได้เข้าสู่ระบบ
    header("Location: login_form.php"); // เปลี่ยนเส้นทางไปยังหน้าเข้าสู่ระบบ
    exit();
}

// ดึงข้อมูลจาก session
$username = $_SESSION['email']; // ชื่อผู้ใช้
$role = $_SESSION['role']; // สิทธิ์ของผู้ใช้ (user, admin, super_admin)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Xzle</title>
    <link rel="stylesheet" href="styles.css"> <!-- ใช้ไฟล์ CSS ที่คุณต้องการ -->
</head>
<body>

    <!-- แสดงชื่อผู้ใช้และสิทธิ์การเข้าถึง -->
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1> <!-- ใช้ htmlspecialchars เพื่อป้องกันการโจมตี Cross-site scripting -->
        <p>คุณเข้าสู่ระบบสำเร็จ!</p>
        
        <!-- แสดงข้อมูลผู้ใช้ -->
        <p>Your user ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
        
        <!-- แสดงสิทธิ์การเข้าถึง -->
        <p>Your role: <?php echo ucfirst($role); ?> </p>

        <!-- ตัวอย่างการแสดงข้อมูลตามบทบาท -->
        <?php if ($role == 'user'): ?>
            <h2>Welcome to your user dashboard</h2>
            <p>ที่นี่คือพื้นที่ของผู้ใช้ทั่วไป</p>
        <?php elseif ($role == 'admin'): ?>
            <h2>Admin Dashboard</h2>
            <p>ที่นี่คือพื้นที่ของผู้ดูแลระบบ, คุณสามารถจัดการผู้ใช้ได้</p>
        <?php elseif ($role == 'super_admin'): ?>
            <h2>Super Admin Dashboard</h2>
            <p>ที่นี่คือพื้นที่ของผู้ดูแลระบบสูงสุด, คุณสามารถจัดการทุกสิ่งทุกอย่างได้</p>
        <?php endif; ?>

        <!-- หลังจากที่แสดงผลเสร็จแล้ว ให้เปลี่ยนเส้นทางไปหน้า index.php -->
        <script>
            setTimeout(function() {
                window.location.href = 'index.php'; // เปลี่ยนเส้นทางไปยังหน้า index.php หลังจาก 3 วินาที
            }, 3000);  // 3000 มิลลิวินาที = 3 วินาที
        </script>
    </div>

</body>
</html>
