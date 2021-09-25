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
    <style>
     
            main {
                display:flex;
                justify-content: flex-end;
                background-repeat: no-repeat;
                margin: 0;
                background-size: 100% 100%;
                background-image: url(../asset/img/dhspkt.jpg);
            }
            form {border: 3px solid #f1f1f167; 
                padding: 30px;
                width: 30%;
                margin: 50px;
                background-color: var(--blue_bg);
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.267);
            }
            
            input[type=text], input[type=password] {
              width: 100%;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              background-color: #f1f1f156;
              border: 1px solid rgb(204, 204, 204);
              box-sizing: border-box;
              border-radius: 30px;
              outline: unset;
            }
            
            .button_login {
              background-color: #04aa6dea;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              cursor: pointer;
              width: 50%;
              border-radius: 40px;
            }
            
            .button_login:hover {
              opacity: 0.8;
            }
            img.avatar {
              width: 30%;
              border-radius: 50%;
            }
            
            .container {
              padding: 16px;
            }
            
            span.psw {
              float: right;
              padding-top: 16px;
            }
            h4{
                text-align: center;
                font-size: 20px;
                color: white;
            }
            label{
                color: white;
                font-weight: 300;
            }
            footer{
                margin:0;
            }
    </style>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="row" style="align-items: center; ">
                <div class="col-9">
                    <div class="logo"></div>
                </div>
                <div class="col-3" >
                    <div class="buton-login">
                        <a href="">
                        <button style="font-size: 20px;" type="button" class="btn btn-danger">Đăng nhập vào hệ thống</button>
                        </a>
                    </div>
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
                <form action="./check_login.php" method="post">
                    <h4>ĐĂNG NHẬP</h4>
                    <div style="text-align: center;">
                        <img src="../asset/img/logo.png" alt="" width="90px">
                    </div>
                <div class="container">
                    <label for="uname">Username</label><br>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw">Password</label><br>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <div style="text-align: center;">
                        <button class="button_login" type="submit">Login</button>
                    </div> 
                </div>

            </form>
            
    </main>
    <footer>
        <p>Copyright © 2021 - Bản quyền thuộc về Trung tâm Phát triển Phần mềm – Đại học Đà Nẵng.</p>
    </footer>
    <t src="../bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/javascrip.js"></script>
    <script src="../asset/js/pagination.js"></script>
    
</body>
</html>