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
                    <p style="margin-right:10px; font-size:17px"><a href="<?php if($user_msv !="") echo'./logout.php'?>">> Thoát</a></p>
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
                        <li class="nav-item ">
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
                <li class="breadcrumb-item active" aria-current="page">Đổi mật khẩu</li>
            </ol>
        </nav>
        <?php
       
        $id = $_GET['id_sv'];
        $error_pass=""; 
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["password_old"])){
               $passOld = $_POST['password_old'];
            };
            if(isset($_POST["password"])) { 
                $passNew = $_POST['password'];
            };
            if(isset($_POST["re_password"])) { 
                $re_password = $_POST['re_password'];
            };
            if($passOld != $row_sv["matkhau"] ){
                 $error_pass="Mật khẩu không đúng";
            }
            else {
                $error_pass=""; 
                $sql_update = "update dbo_sinhvien 
                set matkhau = $passNew
                where id_sv =  $id ";
                 mysqli_query($link, $sql_update);
                 $notica="Đổi mật khẩu thành công";
                 
            }
         };
    ?>
    <div class="container">
    
        <section class="section_event">
                <div class="wp_change_pass">
                <h1 class="title"><span class="fa fa-fw fa-unlock-alt"></span>Đổi mật khẩu</h1>
                <div class="form_login">
                    <form action="" method="post" accept-charset="utf-8" id="form_change_pass">
                               <div class="change-password-sv">
                    <div class="row">
                        <div class="col-md-3">
                            Mật khẩu cũ
                        </div>
                        <div class="col-md-9">
                            <input type="password" name="password_old" autocomplete="off" placeholder="Mật khẩu cũ" required>
                        </div>
                        <?php
                        if($error_pass != ""){
                            ?>
                            <p style="color: red;
                                width: 100%;
                                margin-right: 17px;
                                text-align: end;">Sai mật khẩu vui lòng nhập lại</p>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            Mật khẩu mới
                        </div>
                        <div class="col-md-9">
                            <input type="password" name="password" id="password" autocomplete="off" placeholder="Mật khẩu mới" required>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 30px">
                        <div class="col-md-3">
                            Nhập lại mật khẩu mới
                        </div>
                        <div class="col-md-9">
                            <input type="password" name="re_password" autocomplete="off" placeholder="Nhập lại mật khẩu mới" required>
                        </div>
                        <p id="error"style="color: red;
                                width: 100%;
                                margin-right: 17px;
                                text-align: end;">
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input id="submit_change"type="submit" value="Đổi mật khẩu">
                              
                        </div>
                    </div>
                </form> 
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