<?php
session_start();
require 'db_config.php';  // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าเข้าสู่ระบบหรือยัง
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");  // ถ้ายังไม่ล็อกอิน ให้ไปหน้า login
    exit();
}

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found!";
    exit();
}

// ฟังก์ชันสำหรับอัปเดตข้อมูลโปรไฟล์
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $new_password = trim($_POST['new_password']);
    $profile_image = $_FILES['profile_image'];

    // อัปเดตรูปโปรไฟล์
    if ($profile_image['error'] == 0) {
        $upload_dir = 'uploads/';
        
        // ตรวจสอบว่าโฟลเดอร์ uploads/ มีอยู่หรือไม่
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // สร้างโฟลเดอร์ uploads ถ้าไม่มี
        }

        $image_name = basename($profile_image['name']);
        $target_file = $upload_dir . $image_name;

        // ย้ายไฟล์ที่อัปโหลดไปยังโฟลเดอร์ uploads/
        if (move_uploaded_file($profile_image['tmp_name'], $target_file)) {
            $profile_image_path = $target_file;
        } else {
            $profile_image_path = $user['profile_image']; // ใช้รูปเดิมในกรณีที่ไม่สามารถอัปโหลดได้
        }
    } else {
        $profile_image_path = $user['profile_image'];  // ใช้รูปเดิม
    }

    // อัปเดตข้อมูลในฐานข้อมูล
    $update_query = "UPDATE users SET name = ?, email = ?, profile_image = ? WHERE id = ?";
    if (!empty($password) && !empty($new_password)) {
        // เปลี่ยนรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET name = ?, email = ?, password = ?, profile_image = ? WHERE id = ?";
            $stmt = $pdo->prepare($update_query);
            $stmt->execute([$name, $email, $hashed_password, $profile_image_path, $user_id]);
        } else {
            echo "Current password is incorrect!";
        }
    } else {
        $stmt = $pdo->prepare($update_query);
        $stmt->execute([$name, $email, $profile_image_path, $user_id]);
    }

    // รีเฟรชหน้าหลังจากอัปเดต
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Xl_Xzle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h1 {
            font-size: 2.5em;
            color: #343a40;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 10px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #343a40;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 1.1em;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-header">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
        <img src="<?php echo $user['profile_image'] ?: 'uploads/default_profile.png'; ?>" alt="Profile Image">
        <p>Your current email: <?php echo htmlspecialchars($user['email']); ?></p>
    </div>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <h3>Edit Profile</h3>

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image">
            </div>

            <h3>Change Password</h3>

            <div class="form-group">
                <label for="password">Current Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password">
            </div>

            <button type="submit" class="btn-primary">Update Profile</button>
        </form>

        <a href="dashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
