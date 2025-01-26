<?php 
$password = 'password';  // รหัสผ่านที่ผู้ใช้กรอก

 
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

?>