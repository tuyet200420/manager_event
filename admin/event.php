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
    <link rel="stylesheet" href="../asset/css/pagination.css">
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
            <a href="./index.html">
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
        $search = "" ;                  
        include 'connect_db.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["search"])) { $search = $_POST['search']; }}
        ?>
        <section class="section_event table-responsive">
            <div>
            <form action="" method="post">
                <div class="seach">
                   
                        <input class="input" type="text" name="search" value="<?php echo $search ?>">
                        <input style="padding:0px" class = "button" type="submit" value="Tìm kiếm">
                   
                    <!-- <button ><i class="fas fa-search"></i></button> -->
                </div>
                </form>
            </div>
            <div style="clear: both;margin-bottom:15px">
                <a href="./create_event.php">
                    <button type="button" class="btn btn-success">Thêm mới</button>
                </a>
            </div>
            
                <div id="wrapper">
                    <section>
                        <div class="data-container"></div>
                        <div id="pagination-demo1"></div>
                        <div class="data-container"></div>
                        <div id="pagination-demo2"></div>
                    </section>
                </div>
                <tbody>
                
              
        </section>
    </main>
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
         $count=0;
         
         $sql = "SELECT * FROM dbo_sukien where  tensukien like '%$search%'  ORDER BY id_sk DESC ";
                        
                        if ($result = mysqli_query($link, $sql)) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    
                                    ?>
        result.push(
            '<th scope="row" ><?php $count=$count+1; echo $count ?></th>'+
                                        '<td style="width: 300px ">'+
                                                ' <?php echo $row['tensukien']; ?>'+
                                          
                                        '</td>'+
                                       ' <td>'+
                                            '<?php  echo '<img src='.$row["hinhanh"].' style="width: 100px" />'; ?>'+
                                       ' </td>'+
                                        '<td><?php echo $row['ngaybatdau']; ?></td>'+
                                        '<td><?php echo $row['ngayketthuc']; ?></td>'+
                                        '<td style="width: 300px ">'+
                                            '<?php echo $row['diadiem']; ?>'+
                                        '</td>'+
                                        '<td><?php echo $row['soluong'] ?></td>'+
                                        '<td><?php echo $row['soluongdadangky'] ?></td>'+
                                       ' <td>'+
                                           ' <div>'+
                                               ' <a href="./detail_event.php?detail=<?php echo $row['id_sk']; ?>">'+
                                                    '<button type="button" class="btn btn_active btn-info">Xem chi tiết</button>'+
                                                '</a>'+
                                                
                                          '  </div>'+
                                       ' </td>'
        );
        <?php }}} ?>
      
        return result;
    }();

    var options = {
      dataSource: sources,
      pageSize: 4,
      callback: function (response, pagination) {
        window.console && console.log(response, pagination);

        var dataHtml = '<table class="table table-bordered">'+
                '<thead>'+
                  '<tr>'+
                    '<th scope="col"></th>'+
                    '<th scope="col">Tên sự kiện</th>'+
                    '<th scope="col">Hình ảnh</th>'+
                    '<th scope="col">Ngày bắt đầu</th>'+
                    '<th scope="col">Ngày kết thúc</th>'+
                    '<th scope="col">Địa điểm</th>'+
                    '<th scope="col">Số lượng</th>'+
                    '<th scope="col">đăng ký</th>'+
                    '<th scope="col">Hoạt động</th>'+
                 ' </tr>'+
                '</thead><tbody>'

        $.each(response, function (index, item) {
          dataHtml += '<tr>' + item + '</tr>';
        });

        dataHtml += '</tbody></table>';

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