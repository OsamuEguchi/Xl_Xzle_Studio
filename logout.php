<?php
session_start();
session_unset();  // ลบข้อมูลทั้งหมดใน session
session_destroy();  // ทำลาย session

// รีไดเรกต์ไปที่หน้า login
header("Location: login_form.php");
exit();
?>
