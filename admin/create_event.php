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
          
            // Kết nối database tintuc
           include 'connect_db.php';
            
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

            
            //Lấy giá trị POST từ form vừa submit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST["nameEvent"])) { $tensukien = $_POST['nameEvent']; }
                if(isset($_POST["content"])) { $noidung = $_POST['content']; }
                if (!isset($_FILES["fileupload"]))
                    {
                        echo "Dữ liệu không đúng cấu trúc";
                        die;
                    }
                    // Kiểm tra dữ liệu có bị lỗi không
                    if ($_FILES["fileupload"]['error'] != 0)
                    {
                        echo "Dữ liệu upload bị lỗi";
                        die;
                    }
                    //Thư mục bạn sẽ lưu file upload
                    $target_dir    = "../asset/img/";
                    //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
                    $target_file   = $target_dir . basename($_FILES["fileupload"]["name"]);
                    $allowUpload   = true;
                    //Lấy phần mở rộng của file (jpg, png, ...)
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Cỡ lớn nhất được upload (bytes)
                    $maxfilesize   = 800000;
                    ////Những loại file được phép upload
                    $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
                    if(isset($_POST["submit"])) {
                        //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                        $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                        if($check !== false)
                        {
                            echo "Đây là file ảnh - " . $check["mime"] . ".";
                            $allowUpload = true;
                        }
                        else
                        {
                            echo "Không phải file ảnh.";
                            $allowUpload = false;
                        }
                    }
                    if (file_exists($target_file))
                    {
                        echo "Tên file đã tồn tại trên server, không được ghi đè";
                        $allowUpload = false;
                    }
                    // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
                    if ($_FILES["fileupload"]["size"] > $maxfilesize)
                    {
                        echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
                        $allowUpload = false;
                    }
                    // Kiểm tra kiểu file
                    if (!in_array($imageFileType,$allowtypes ))
                    {
                        echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                        $allowUpload = false;
                    }


                    if ($allowUpload)
                    {
                        // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                        if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
                        {   
                        }
                        else
                        {
                            echo "Có lỗi xảy ra khi upload file.";
                        }
                    }
                    else
                    {
                        echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
                    }
                    $hinhanh= $target_file;
                if(isset($_POST["time_start"])) { $thoigianbatdau = $_POST['time_start']; }
                if(isset($_POST["date_start"])) { $ngaybatdau = $_POST['date_start']; }
                if(isset($_POST["time_end"])) { $thoigianketthuc = $_POST['time_end']; }
                if(isset($_POST["date_end"])) { $ngayketthuc = $_POST['date_end']; }
                if(isset($_POST["amount"])) { $soluong = $_POST['amount']; }
                if(isset($_POST["address"])) { $diadiem = $_POST['address']; }
                if(isset($_POST["organizer"])) { $organizer = $_POST["organizer"] ;}
                if(isset($_POST["category"])) { $id_loaisk = $_POST["category"]; }
                

                //Code xử lý, insert dữ liệu vào table
                $sql_inset = "insert into dbo_SUKIEN(tensukien,noidung,hinhanh,thoigianbatdau,ngaybatdau,thoigianketthuc,ngayketthuc,soluong,diadiem,soluongdadangky,nguoitochuc,id_loaisk)
                values ('$tensukien','$noidung','$hinhanh',' $thoigianbatdau','$ngaybatdau','$thoigianketthuc','$ngayketthuc',$soluong,'$diadiem',0,'$organizer',$id_loaisk )";

                if ($link->query($sql_inset) === TRUE) {
                    echo "<script type='text/javascript'>alert('Thêm dữ liệu thành công');</script>";
                    header('location: /quanlysukien/admin/event.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }
            }
            //Đóng database
            mysqli_close($link);
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
            <h3 style="text-align: center; color:brown;font-weight: 900;">Thêm sự kiện </h3>
            <form class="form"action="" method="post" enctype="multipart/form-data">
                <div class="formItem">
                    <label for="nameEvent">Tên sự kiện</label>
                    <input type="text" name="nameEvent" id="nameEvent" require>
                </div>
                <div class="formItem" >
                    <label for="content ">Nội dung</label>
                    <textarea name="content" id="content" style="min-height:150px" require></textarea>
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="date_start">Ngày bắt đầu</label>
                        <input type="date" name="date_start" id="date_start"require>
                    </div>
                    <div class="forItemChild">
                        <label for="time_start">Thời gian bắt đầu</label>
                        <input type="time" name="time_start" id="time_start" require>
                    </div>
                    
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="date_end">Ngày kết thúc</label>
                        <input type="date" name="date_end" id="date_end" require>
                    </div>
                    <div class="forItemChild">
                        <label for="time_end">Thời gian kết thúc</label>
                        <input type="time" name="time_end" id="time_end" require>
                    </div>
                </div>
                <div class="formItem">
                    <label for="address">Địa đểm</label>
                    <input type="text" name="address" id="address" require>
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
                        <label for="teacher">Người tổ chức</label>
                        <input type="text" name="organizer" id="organizer">
                        
                    </div>
                    
                </div>
                <div class="formItem">
                    <div class="forItemChild">
                        <label for="fileupload">Hình ảnh</label>
                        <input type="file" name="fileupload" id="fileupload" require>
                    </div>
                    <div class="forItemChild">
                        <label for="time_end">Số lượng</label>
                        <input type="number" name="amount" id="amount" require>
                    </div>
                </div>
               <div style="text-align: center;margin:30px">
                <button type="submit" name="add-Event" class="btn btn-primary">Thêm</button>
               </div>
            </form>
        </section>
    </main>

    <script src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
</body>
</html>