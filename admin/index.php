<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sự kiện</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/base.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    
</head>
<body>
    <?php 
        $admin="";
        session_start();
        if(isset($_SESSION['admin'])){
            $admin = $_SESSION['admin'];
          
          }
        if($admin == ""){
            header('location:/quanlysukien/admin/login.php');
        }
    ?>
    <header>
        <div class="container-fluid container_header">
            <div class="row">
                <div class="col-4 logo">
                    <img src="../asset/img/logo.png" alt="" width="80px">
                    <div class="menu">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div class="col-8 ">
                    <div class="header_right">
                        <div class="icon_admin">
                            <img src="../asset/img/icon_admin.png" alt="" width="32px">
                        </div>
                        <div class="name_admin">
                            <p>HELLO ADMIN</p>
                        </div>
                        <div>
                            <a href="./logout.php">
                                <button id="btn_logout">
                                    Đăng xuất
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <main>
        <nav style="display: none;">
            <a href="index.php">
                <div class="nav_item">
                    <i class="fas fa-home"></i>
                    <h3>TRANG CHỦ</h3>
                </div>
            </a>
            <a href="./event.php">
                <div class="nav_item">
                    <i class="fas fa-atom"></i>
                    <h3>QUẢN LÝ SỰ KIỆN</h3>
                </div>
            </a>
            <a href="./join_event.php">
                <div class="nav_item">
                    <i class="fas fa-atom"></i>
                    <h3>QUẢN LÝ ĐĂNG KÝ THAM GIA SỰ KIỆN</h3>
                </div>
            </a>
            <a href="./event_attendance_list.php">
                <div class="nav_item">
                    <i class="fas fa-atom"></i>
                    <h3>DANH SÁCH THAM GIA SỰ KIỆN</h3>
                </div>
            </a>
            <a href="#">
                <div class="nav_item">
                    <i class="fas fa-atom"></i>
                    <h3>QUẢN LÝ SINH VIÊN</h3>
                </div>
            </a>
            
        </nav>
        <section class="section_homepage">
            <h3>CHÀO MỪNG BẠN ĐẾN VỚI TRANG ADMIN QUẢN LÝ SỰ KIỆN </h3>
            <p style="padding:10px;font-size:20px; background: blue; color:white"> Quản Lý Sự Kiện | được thực hiện bởi nhóm 05</p>
        </section>
    </main>

    <script src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
</body>
</html>