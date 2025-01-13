<?php
session_start();  // เริ่มต้น session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="This is a Website for E-Book Community" />
    <meta name="author" content="Osamu" />
    <title>Xl_Xzle</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" /> <!-- ใช้ไฟล์ styles.css ที่อยู่ในโฟลเดอร์ css -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MDB CSS -->
    <link href="https://cdn.jsdelivr.net/npm/mdbootstrap@5.3.0-beta1/dist/css/mdb.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-1 px-lg-4">
            <a class="navbar-brand" href="index.php">
                <img width="120px" height="60px" src="./assets/img/white_logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-0 mb-lg-0 ms-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Xzle</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">By_Xzle</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">See more</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Novel</a></li>
                            <li><a class="dropdown-item" href="#">Comic</a></li>
                            <li><a class="dropdown-item" href="#">Anime</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <!-- ถ้าผู้ใช้ล็อกอินแล้ว -->
                        <a class="btn btn-outline-dark" href="logout.php">
                            <i class="bi-person-fill me-1"></i>Logout
                        </a>

                    <?php else: ?>
                        <!-- ถ้าผู้ใช้ยังไม่ได้ล็อกอิน -->
                        <a class="btn btn-outline-dark" href="login_form.php">
                            <i class="bi-person-fill me-1"></i>Login
                        </a>
                        <a class="btn btn-outline-dark" href="register_form.php">
                            <i class="bi-person-fill me-1"></i>Register
                        </a>
                        
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JavaScript and dependencies (Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
