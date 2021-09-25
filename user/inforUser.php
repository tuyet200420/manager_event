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
                <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin cá nhân</li>
            </ol>
        </nav>
        <?php
       
        $id = $_GET['id_sv'];
        $email= $row_sv["email"];
        $diachi=$row_sv["diachi"];
        $sdt=$row_sv["sdt"];
        $noisinh=$row_sv["noisinh"];

         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["email"])){
               $email = $_POST['email'];
            };
            if(isset($_POST["address"])) { 
                $diachi = $_POST['address'];
            };
            if(isset($_POST["birthplace"])) { 
                $noisinh = $_POST['birthplace'];
            };
            if(isset($_POST["phoneNumber"])) { 
                $sdt = $_POST['phoneNumber'];
            };
            $sql_update = "update dbo_sinhvien 
            set email = '$email', diachi='$diachi',noisinh='$noisinh',sdt='$sdt'
            where id_sv =  $id ";
            if( mysqli_query($link, $sql_update)){
                ?>
                <script>
                    alert("Cập nhật thành công");
                </script>
                <?php
            }
            else
                {
                    ?>
                <script>
                    alert("Cập nhật không thành công");
                </script>
                <?php

                }
            
            
         };
    ?>
    <div class="container">
        <section class="section_event">
            <div class="update_infor">
                <h2 style="text-align:center; margin-bottom:25px; color: red">Thông tin cá nhân</h2>
                <form action="" method="post"  id="submitChangeInfor">
                    
                    <div class="form-group row">
                    <label for="inputbirthplace3" class="col-sm-2 col-form-label">Mã sinh viên:</label>
                        <div class="col-sm-10">
                        <p><?php echo $row_sv["matk"]?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputbirthplace3" class="col-sm-2 col-form-label">Họ và tên:</label>
                        <div class="col-sm-10">
                        <p><?php echo $row_sv["hoten"]?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputbirthplace3" class="col-sm-2 col-form-label">Ngày sinh:</label>
                        <div class="col-sm-10">
                        <p><?php echo $row_sv["ngaysinh"]?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputbirthplace3" class="col-sm-2 col-form-label">Giới tính:</label>
                        <div class="col-sm-10">
                        <p><?php  if($row_sv["gioitinh"]== 1) echo "Nữ"; else echo "Nam"; ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputbirthplace3" class="col-sm-2 col-form-label">Nơi sinh:</label>
                        <div class="col-sm-10">
                        <input type="text" value="<?php echo $noisinh?>" name="birthplace"class="form-control" id="inputbirthplace3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAddress3" class="col-sm-2 col-form-label">Địa chỉ:</label>
                        <div class="col-sm-10">
                        <input type="text" value="<?php echo $diachi?>" name="address" class="form-control" id="inputAddress3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone3" class="col-sm-2 col-form-label">Số điện thoại:</label>
                        <div class="col-sm-10">
                        <input type="text" value="<?php echo $sdt?>" name="phoneNumber" class="form-control" id="inputPhone3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                        <input type="email"  value="<?php echo $email?>" name="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                        <button type="button"class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cập nhật</button>
                        </div>
                    </div>
                </form>
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
        Bạn có chăc chắn muốn cập nhật thông tin không
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
        <button id="submit_modal_updateInfor" type="button" class="btn btn-primary">Cập nhật</button>
      </div>
    </div>
  </div>
</div>
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