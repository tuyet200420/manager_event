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
    <?php 
        // Kết nối database
       include 'connect_db.php';
       $id = $_GET['update'];
       
        $tensukien="";
        $noidung="";
        $hinhanh="";
        $thoigianbatdau="";
        $ngaybatdau="";
        $thoigianketthuc="";
        $ngayketthuc="";
        $soluong="";
        $diadiem="";
        $organizer=0;
        $id_loaisk=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["nameEvent"])) { $tensukien = $_POST['nameEvent']; }
            if(isset($_POST["content"])) { $noidung = $_POST['content']; }
            include 'upload.php';}
            if(isset($_POST["time_start"])) { $thoigianbatdau = $_POST['time_start']; }
            if(isset($_POST["date_start"])) { $ngaybatdau = $_POST['date_start']; }
            if(isset($_POST["time_end"])) { $thoigianketthuc = $_POST['time_end']; }
            if(isset($_POST["date_end"])) { $ngayketthuc = $_POST['date_end']; }
            if(isset($_POST["amount"])) { $soluong = $_POST['amount']; }
            if(isset($_POST["address"])) { $diadiem = $_POST['address']; }
            if(isset($_POST["organizer"])) { $organizer = $_POST["organizer"] ;}
            if(isset($_POST["category"])) { $id_loaisk = $_POST["category"]; }
            if($hinhanh!="../asset/img/"){
                $sql_update = "update dbo_SUKIEN 
                set tensukien = '$tensukien', noidung='$noidung',hinhanh='$hinhanh',thoigianbatdau=' $thoigianbatdau',ngaybatdau ='$ngaybatdau',thoigianketthuc='$thoigianketthuc',ngayketthuc='$ngayketthuc',soluong=$soluong,diadiem='$diadiem',nguoitochuc='$organizer',id_loaisk=$id_loaisk
                where id_sk =  $id;";
            }
            else
            {
                $sql_update = "update dbo_SUKIEN 
                set tensukien = '$tensukien', noidung='$noidung',thoigianbatdau=' $thoigianbatdau',ngaybatdau ='$ngaybatdau',thoigianketthuc='$thoigianketthuc',ngayketthuc='$ngayketthuc',soluong=$soluong,diadiem='$diadiem',nguoitochuc='$organizer',id_loaisk=$id_loaisk
                where id_sk =  $id;";
            }
            
           
                if ($link->query($sql_update) === TRUE) {
                    echo "<script type='text/javascript'>alert('cập nhật dữ liệu thành công');</script>";
                    header('location: /quanlysukien/admin/event.php');
                } else {
                    // echo "Error: " . $sql . "<br>" . $link->error;
                }
            
    ?>
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
            <a href="./join_event.html">
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
            
            <h3 style="text-align: center; color:brown;font-weight: 900;">Sửa sự kiện </h3>
            <?php
                include 'connect_db.php';
                if (isset($_GET['update'])) {
                   
                    if( $result = mysqli_query($link, "SELECT * FROM dbo_sukien WHERE id_sk = $id")){
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_array($result);
                            ?>
            <form id="formUpdateEvent"  class="form" action="" method="post" enctype="multipart/form-data">
                <div class="formItem">
                    <label for="nameEvent">Tên sự kiện</label>
                    <input value="<?php echo $row['tensukien'] ?>" type="text" name="nameEvent" id="nameEvent">
                </div>
                <div class="formItem" >
                    <label for="content ">Nội dung</label>
                    <textarea  name="content" id="content" rows=9><?php echo $row['noidung'] ?></textarea>
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="date_start">Ngày bắt đầu</label>
                        <input value="<?php echo $row['ngaybatdau'] ?>" type="date" name="date_start" id="date_start">
                    </div>
                    <div class="forItemChild">
                        <label for="time_start">Thời gian bắt đầu</label>
                        <input type="time" name="time_start" id="time_start" value="<?php echo $row['thoigianbatdau'] ?>">
                    </div>
                    
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="date_end">Ngày kết thúc</label>
                        <input value="<?php echo $row['ngayketthuc'] ?>" type="date" name="date_end" id="date_end">
                    </div>
                    <div class="forItemChild">
                        <label for="time_end">Thời gian kết thúc</label>
                        <input type="time" value="<?php echo $row['thoigianketthuc'] ?>" name="time_end" id="time_end">
                    </div>
                </div>
                <div class="formItem">
                    <label for="address">Địa đểm</label>
                    <input value="<?php echo $row['diadiem'] ?>"  type="text" name="address" id="address">
                </div>
                <div class="formItem">
                    
                    <div class="forItemChild">
                        <label for="category">Loại sự kiện</label>
                        <select name="category" id="category">
                            <option value=1>Giáo dục</option>
                            <option value=2>Văn hóa</option>
                            <option value=3>Tuyên truyền</option>
                            <option value=4>Thể thao</option>
                        </select>
                    </div>
                    <div class="forItemChild">
                        <label for="organizer">Người tổ chức</label>
                        
                        <input value="<?php echo $row['nguoitochuc'] ?>" type="text" name="organizer" id="organizer">
                    </div>
                    
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="image_event">Hình ảnh</label>
                        <?php
                        $target_file=$row['hinhanh']
                        ?>
                        <img src="<?php echo $target_file ?>" alt="" style="width:50px">
                        <input value="<?php echo $row['hinhanh']?>" type="file" name="fileupload" id="fileupload">
                    </div>
                    <div class="forItemChild">
                        <label for="time_end">Số lượng</label>
                        <input value="<?php echo $row['soluong']?>" type="number" name="amount" id="amount">
                    </div>
                </div>
               <div style="text-align: center;margin:30px">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">CẬP NHẬT</button>
               </div>
            </form><?php }}} ?>
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
                    Bạn có chăc chắn muốn cập nhật không
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    
                    <button id="submit_modal_updateEvent" type="button" class="btn btn-primary">Cập nhật</button>
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