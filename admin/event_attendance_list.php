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
                            <a href="./login.php">
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
            <a href="./index.php">
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
        <?php
        $search= "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["search"])) { $search = $_POST['search']; }} 
        ?>
        <section class="section_event table-responsive">
            
            <form action="" method="post">
            <div class="seach">
                   
                   <input class="input" type="text" name="search" value = "<?php echo $search ?>">
                   <input class = "button" style="padding: 2px;" type="submit" value="Tìm kiếm">
              
               <!-- <button ><i class="fas fa-search"></i></button> -->
           </div>
                </form>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Mã sinh viên</th>
                    <th scope="col">Tên sinh viên</th>
                    <th scope="col">Sự kiện</th>
                   
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $count=0;
                    
                    include 'connect_db.php';
                    $sql = "SELECT DISTINCT dbo_danhsachthamgia.id_sv, dbo_danhsachthamgia.id_sk  FROM dbo_danhsachthamgia, dbo_sinhvien ,dbo_sukien 
                    where dbo_danhsachthamgia.id_sv = dbo_sinhvien.id_sv and dbo_danhsachthamgia.id_sk = dbo_sukien.id_sk and  (dbo_sinhvien.matk like '%$search%' or dbo_sinhvien.hoten like '%$search%' or dbo_sukien.tensukien like '%$search%')
                    ORDER BY dbo_danhsachthamgia.id_sv DESC ";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $count = $count + 1;
                                ?>
                  <tr>
                    <th scope="row" ><?php echo $count ?></th>
                    <td >
                    <?php 
                    $id_sv = $row['id_sv'];
                    $sql_msv = "SELECT * FROM dbo_sinhvien where id_sv = $id_sv ";
                    if ($result_msv = mysqli_query($link, $sql_msv)) {
                        if (mysqli_num_rows($result_msv) > 0) {
                            $row_msv = mysqli_fetch_array($result_msv);
                                echo $row_msv['matk'];?>
                    </td>
                    <td >
                    <?php echo $row_msv['hoten']; ?>
                    </td>
                    <?php }} ?>

                    <td >
                    <?php 
                    $id_sk = $row['id_sk'];
                    $sql_sk = "SELECT * FROM dbo_sukien where id_sk = $id_sk ";
                    if ($result_sk = mysqli_query($link, $sql_sk)) {
                        if (mysqli_num_rows($result_sk) > 0) {
                            $row_sk = mysqli_fetch_array($result_sk);
                                echo $row_sk['tensukien'];}}?>
                    </td>
                   
                   
                  </tr>
                  <?php }}} ?>
                </tbody>
               
              </table>
              
        </section>
        
    </main>

    <script src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
</body>
</html>