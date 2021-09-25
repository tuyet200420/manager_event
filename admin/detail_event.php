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
            <a href="#">
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
        <section class="section_event">
        <h3 style="text-align: center; color:brown;font-weight: 900;">Xem chi tiết</h3>
            <?php
                include 'connect_db.php';
                if (isset($_GET['detail'])) {
                    $id = $_GET['detail'];
                    if( $result = mysqli_query($link, "SELECT * FROM dbo_sukien WHERE id_sk = $id")){
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            ?>
                            <div class="name_event_detail">
                                <h1><?php echo $row["tensukien"] ?></h1>
                            </div>
                            <div class="img_event_detail">
                                <?php echo '<img src='.$row["hinhanh"].'>' ?>
                            </div>
                          
                            <div class="content_event_detail text_event_detail">
                                <h4 class="event_detail_type">Nội dung:</h4>
                                <p>
                                <?php echo $row["noidung"] ?>
                                </p>
                            </div>
                            <div class="time_event_detail text_event_detail">
                            <h4 class="event_detail_type">Thời gian bắt đầu :</h4>
                                <span><?php echo $row["thoigianbatdau"].' Ngày '.$row["ngaybatdau"]?></span>
                            </div>
                            <div class="time_event_detail text_event_detail">
                            <h4 class="event_detail_type">Thời gian kết thúc :</h4>
                                <span><?php echo $row["thoigianketthuc"].' Ngày '.$row["ngayketthuc"]?></span>
                            </div>
                            <div class="adress_event_detail text_event_detail">
                            <h4 class="event_detail_type">Địa chỉ :</h4>
                                <span><?php echo $row["diadiem"]?></span>
                            </div>
                            <div class="spending_event_detail text_event_detail">
                            <h4 class="event_detail_type">Chỉ tiêu tham gia :</h4>
                                <span><?php echo $row["soluong"]?></span>
                            </div>
                            
                            <?php
                            
                        }
                    }                                  
                }
                else
                    echo "sai r tuyet0";
            ?>
            <div class="button-ground">
            <a href="./edit_event.php?update=<?php echo $row['id_sk']; ?>">
                <button type="button" class="btn btn_active btn-info">Sửa</button>
            </a>
           
            
                <button type="button" class="btn btn_active btn-danger" data-toggle="modal" data-target="#exampleModal"
            >Xóa</button>
            </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn có chăc chắn muốn xóa không
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <a href="deleted.php?del=<?php echo $row['id_sk']; ?>" class="del_btn">
                    <button id="submit_modal_updateInfor" type="button" class="btn btn-danger">Xóa</button></a>
                </div>
                </div>
            </div>
            </div>
    </main>

    <script src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
</body>
</html>