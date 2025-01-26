<?php
$plainPassword = 'password'; // รหัสผ่านที่คุณต้องการ
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
echo "Plain Password: " . $plainPassword . "<br>";
echo "Hashed Password: " . $hashedPassword;
?>
