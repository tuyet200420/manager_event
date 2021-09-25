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
        $loc = 1;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["select_active"])) { $loc = $_POST['select_active']; }}
         ?>
        <section class="section_event">
        <form action="" method="post">
                <div class="seach">
                   
                        <input class="input" type="text" name="search">
                        <input class = "button" style="padding: 2px;" type="submit" value="Tìm kiếm">
                   
                    <!-- <button ><i class="fas fa-search"></i></button> -->
                </div>
                <div>
                    
                </div>
                
                </form>
        <form action="" method="post" class="form-loc">
                    <select name="select_active" id="" class="select_active">
                    <option value = "1" <?php if($loc == '1'){echo("selected");}?>>Danh sách hiển thị</option>
                    <option value="0" <?php if($loc == '0'){echo("selected");}?>>Danh sách bị ẩn</option>
                    <option value="" <?php if($loc == ''){echo("selected");}?>>Tất cả</option>
                    </select>
                    <input class="btn btn-outline-success" type="submit" value="Lọc">
        </form>
                <div id="wrapper">
                    <section>
                        <div class="data-container"></div>
                        <div id="pagination-demo1"></div>
                        <div class="data-container"></div>
                        <div id="pagination-demo2"></div>
                    </section>
                </div>
            
              
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
            include 'connect_db.php';
            
                $sql = "SELECT * FROM dbo_danhsachdangky where hienthi like '%$loc%' ORDER BY id_sv DESC ";
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $count = $count + 1;
                                    ?>
        result.push(
           ' <th scope="row" ><?php echo $count  ?></th>'+
           ' <td >'+'<?php $id_sv = $row['id_sv'];$sql_msv = "SELECT * FROM dbo_sinhvien where id_sv = $id_sv ";
                    if ($result_msv = mysqli_query($link, $sql_msv)) {
                        if (mysqli_num_rows($result_msv) > 0) {
                            $row_msv = mysqli_fetch_array($result_msv);
                                echo $row_msv['matk'];?>'+
                           
                    '</td>'+
                    '<td >'+
                       ' <?php echo $row_msv['hoten']; ?>'+
                    '</td>'+
                '<?php }} ?>'+
                    '<td ><div style="width:700px">'+
                    '<?php 
                    $id_sk = $row['id_sk'];
                    $sql_sk = "SELECT * FROM dbo_sukien where id_sk = $id_sk ";
                    if ($result_sk = mysqli_query($link, $sql_sk)) {
                        if (mysqli_num_rows($result_sk) > 0) {
                            $row_sk = mysqli_fetch_array($result_sk);
                                echo $row_sk['tensukien'];}}?>'+
                    '</div></td>'+
                    '<td>'+
                    '<?php echo $row['thoigian']?>'+
                    '</td>'+
                    '<td>'+
                        '<div>'+
                       ' <?php $trangthai =  $row['trangthai'];?>'+
                            '<a href="./approve.php?approve=<?php echo $row['id_sv'];?>&id_sk=<?php echo $row['id_sk'];?>&trangthai=<?php echo $row['trangthai'];?>"><button style="margin-right:10px" type="button"'+ 
                            '<?php
                             if($trangthai == 1){
                                echo ' class="btn btn-secondary"';?>><?php echo "Hủy Duyệt";
                            }
                            else{
                                 echo'class="btn btn-info"';
                                 ?>><?php echo "Duyệt";}
                            ?>'+
                            '</button></a>'+
                            '<a href="./showEvent.php?id_sv=<?php echo $row['id_sv'];?>&id_sk=<?php echo $row['id_sk'];?>&hienthi=<?php echo $row['hienthi'];?>">'+
                            '<?php 
                            $hienthi =  $row['hienthi'];
                             ?>'+
                            '<button type="button" <?php  if($hienthi == 1){   echo 'class="btn  btn-danger"'; ?>>'+
                             '<?php echo 'Ẩn'; } else{
                                echo 'class="btn  btn-success"';
                                ?>> <?php echo 'Hiện';}
                                ?>'+
                             '</button>'+
                            '</a>'+
                        '</div>'+
                    '</td>'
        );
        <?php }}} ?>
      
        return result;
    }();

    var options = {
      dataSource: sources,
      pageSize: 5,
      callback: function (response, pagination) {
        window.console && console.log(response, pagination);

        var dataHtml = '<table class="table table-bordered">'+
                '<thead>'+
                  '<tr>'+
                    '<th scope="col"></th>'+
                    '<th scope="col">Mã sinh viên</th>'+
                    '<th scope="col">Tên sinh viên</th>'+
                    '<th scope="col">Sự kiện</th>'+
                    '<th scope="col">Thời gian đăng ký</th>'+
                    '<th scope="col">Trạng thái</th>'+
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