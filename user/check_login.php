<?php
   include '../admin/connect_db.php';
        $user ="";
        $pass = "";
    session_start();
            
            //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["uname"])) { $user = $_POST['uname']; }
        if(isset($_POST["psw"])) { $pass = $_POST['psw']; 
        }}
    if( $result = mysqli_query($link, "SELECT * FROM dbo_sinhvien WHERE matk like $user and matkhau like $pass")){
        if (mysqli_num_rows($result) > 0) {

            $_SESSION['masv']=$user;
            ?>
            
            <script>
                var infoUser ={
                    name: '<?php echo $user?>',
                    pass:'<?php echo $pass ?>'
                };
                localStorage.setItem('user',JSON.stringify(infoUser))
                alert("Đăng nhập thành công");
                
            </script>
            <?php
            header('location:/quanlysukien/user/index.php');
        }
    else {
    ?>
    <script>
                alert("Đăng nhập Thất bại");

    </script>
    <?php 
    header('location:/quanlysukien/user/login.php');
    }

}
    
?>