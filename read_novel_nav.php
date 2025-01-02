<!-- nav.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-1 px-lg-4">
        <a class="navbar-brand" href="index.php"><img width="120px" height="60px" src="./assets/img/white_logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-0 mb-lg-0 ms-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!" data-episode="1">ตอนที่ 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#!" data-episode="2">ตอนที่ 2</a></li>
                <li class="nav-item"><a class="nav-link" href="#!" data-episode="3">ตอนที่ 3</a></li>
                <!-- เพิ่มลิงก์ไปยังตอนอื่นๆ ตามต้องการ -->
            </ul>

            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>

                <button class="btn btn-outline-dark" type="submit" data-bs-toggle="modal" data-bs-target="#loginModal" >
                    <i class="bi-person-fill me-1"></i>
                    Login
                </button>

                <button class="btn btn-outline-dark" type="submit" data-bs-toggle="modal" data-bs-target="#registerModal" >
                    <i class="bi-person-fill me-1"></i>
                    Register
                </button>
            </form>
        </div>
    </div>
</nav>
