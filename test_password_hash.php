<?php 
$password = '123123123';  // รหัสผ่านที่ผู้ใช้กรอก

 
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

?>