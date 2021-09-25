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
        $search = "" ;  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["search"])) { $search = $_POST['search']; }}
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
        <form action="" method="post" style="margin:40px; display:flex; justify-content: flex-end;">
                <div class="seach">
                    
                <input class="input" type="text" name="search" value="<?php echo $search ?>">
                <input style="padding:0px" class = "button" type="submit" value="Tìm kiếm">
                    
                        <!-- <button ><i class="fas fa-search"></i></button> -->
            </div>
        </form>
            <div class="container">
            <div id="wrapper">
                    <section style="margin-top: 15px">
                        <div class="data-container"></div>
                        <div id="pagination-demo1"></div>
                        <div class="data-container"></div>
                        <div id="pagination-demo2"></div>
                    </section>
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
    <script src="../asset/js/pagination.js"></script>
    <script>
    
$(function() {
  (function(name) {
    var container = $('#pagination-' + name);
    var sources = function () {
      var result = [];
      <?php
                      
                include '../admin/connect_db.php';
                
                $sql = "SELECT * FROM dbo_sukien where  tensukien like '%$search%'  ORDER BY id_sk DESC ";               
                if ($result = mysqli_query($link, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {?>
        result.push(
            '<div class="card" style="width: 100%; margin-bottom:30px;">'+
                                    '<img src="<?php echo $row["hinhanh"]?>" class="card-img-top" style="height:200px; width:100%;object-fit: cover;">'+
                                 '   <div class="card-body">'+
                                        '<h5 class="card-title title"><?php echo $row["tensukien"]?></h5>'+
                                        '<p class="card-text content">'+
                                        '<?php echo $row["tensukien"]?>'+
                                        '</p>'+
                                        '<a href="./event_detail.php?detail=<?php echo $row['id_sk']; ?>&id_sv=<?php if($row_sv) echo $row_sv['id_sv']; else echo 0;?>" class="btn btn-primary">Xem chi tiết</a>'+
                                   ' </div>'+
                               ' </div>'
        );
        <?php }}} ?>
      
        return result;
    }();

    var options = {
      dataSource: sources,
      pageSize: 6,
      callback: function (response, pagination) {
        window.console && console.log(response, pagination);

        var dataHtml = '<div class="row">'

        $.each(response, function (index, item) {
          dataHtml += '<div class="col-4">' + item + '</div>';
        });

        dataHtml += '</div>';

        container.prev().html(dataHtml);
      }
    };

 

    container.addHook('beforeInit', function () {
      window.console && console.log('beforeInit...');
    });
    container.pagination(options);

    container.addHook('beforePageOnClick', function () {
      window.console && console.log('beforePageOnClick...');
      //return false
    });
  })('demo1');
})
  </script>
</body>
</html>