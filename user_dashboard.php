<?php
require 'db_config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    echo "Access denied.";
    exit;
}

echo "Welcome, User!";
?>
