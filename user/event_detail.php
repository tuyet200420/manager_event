<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sự kiện</title>
    <link rel="shortcut icon" href="../asset/img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/pagination.css">
    <link rel="stylesheet" href="../asset/css/base.css">
 
    <link rel="stylesheet" href="../asset/css/style_user.css">
    
</head>
<body>
<?php
        include '../admin/connect_db.php';
        $user_msv ="";
        $id = 0;
        $row_sv="";
        session_start();
        ?>
        
        <?php
        
        if(isset($_SESSION['masv'])){
            $user_msv = $_SESSION['masv'];
           
        }
        
        if($user_msv !=""){
           
                $sql_sv = "SELECT * FROM dbo_sinhvien where  matk like  '".$user_msv."'  ";
              
                if ($result_sv = mysqli_query($link, $sql_sv)) {
                    
                    if (mysqli_num_rows($result_sv) > 0) {
                        $row_sv = mysqli_fetch_array($result_sv);
                        
            
                    }
                   
                } 
                
            }
           
         
?>
    <header>
        <div class="container-fluid">
            <div class="row" style="align-items: center; ">
                <div class="col-9">
                    <div class="logo" ></div>
                </div>
                <div class="col-3" >
                    
                <?php if($user_msv !=""){?>
                    <div class="user-info">
                    <p style="margin-right:10px; font-size:17px">Xin chào: <?php echo $row_sv["hoten"] ?></p>
                    <p style="margin-right:10px; font-size:17px"><a  href="./inforUser.php?id_sv=<?php echo $row_sv["id_sv"] ?>">> Thông tin cá nhân</a></p>
                    <p style="margin-right:10px; font-size:17px"><a href="./changePassword.php?id_sv=<?php echo $row_sv["id_sv"] ?>">> Đổi mật khẩu</a></p>
                    <p style="margin-right:10px; font-size:17px"><a href="./logout.php">> Thoát</a></p>
                    </div>
                        <?php }
                        else{?>
                            <div class="buton-login">
                            <a href="<?php echo './login.php';?>" >
                                <button style="font-size: 20px;" 
                                
                                type="button" class="btn btn-danger">Đăng Nhập Vào Hệ Thống
                                </button>
                            </a>
                            </div>
                        
                        <?php
                        }
                         ?>
                        
                
                </div>
            </div>
        </div>
    </header>
    <nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <ul class="nav_list">
                        <li class="nav-item active">
                            <a href="./index.php" class="link-item">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="link-item">Hướng dẫn sử dụng hệ thống</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="link-item">Liên hệ quản trị</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="link-item">Quy chế & Quy định</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="link-item">Biểu mẫu dành cho sinh viên</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Xem chi tiết sự kiện</li>
            </ol>
        </nav>
    <div class="container">
        <section class="section_event">
        <!-- <h3 style="text-align: center; color:brown;font-weight: 900;">Xem chi tiết</h3> -->
            <?php
                include '../admin/connect_db.php';
                if (isset($_GET['detail'])) {
                    $id = $_GET['detail'];
                    $id_sv = $_GET['id_sv'];
                    $setButton=0;
                    if( $result = mysqli_query($link, "SELECT * FROM dbo_danhsachdangky WHERE id_sk = $id and id_sv=$id_sv")){
                        if (mysqli_num_rows($result) > 0) {
                            $setButton=1;
                        }}
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
                            <div class="spending_event_detail text_event_detail">
                            <h4 class="event_detail_type">số lượng đã đăng ký :</h4>
                                <span><?php echo $row["soluongdadangky"]?></span>
                            </div>
                            
                            <?php
                            
                        }
                    }                                  
                }
                else
                    echo "sai r";
            ?>
            <div class="button-ground">
            <a class="registration" href="./Registration.php?id_sk=<?php echo $row['id_sk']; ?>&id_sv=<?php echo $id_sv;?>&thuctrang=<?php echo $setButton ?>">
                <button type="button" class="btn <?php if($setButton == 0){?>btn-primary btn-info">ĐĂNG KÝ THAM GIA<?php } else { ?>btn-danger">HỦY ĐĂNG KÝ THAM GIA<?php }  ?></button>
            </a>
            </div>
        </section>
            
    </main>
    <footer>
        <p>Copyright © 2021 - Bản quyền thuộc về Trung tâm Phát triển Phần mềm – Đại học Đà Nẵng.</p>
    </footer>
    <script src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
</body>
</html>