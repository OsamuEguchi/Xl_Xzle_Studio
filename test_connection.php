<?php
require 'db_config.php';

try {
    // ลองเชื่อมต่อฐานข้อมูล
    $stmt = $pdo->query("SELECT 1");
    echo "Database connection successful!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>