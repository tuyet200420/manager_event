<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quanlysukien</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <style>
     
            body {
            margin: 0;
               background-color: rgba(95, 95, 212, 0.822);
               position: relative;
               width: 100vw;
               height: 100vh;
            }
            form {border: 3px solid #f1f1f167;
                position: absolute;
                top: 50%;
                width: 30%;
                left: 50%;
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.267);
                transform: translate(-50%, -50%);
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
            
            button {
              background-color: #04aa6dea;
              color: white;
              padding: 14px 20px;
              margin: 8px 0;
              border: none;
              cursor: pointer;
              width: 50%;
              border-radius: 40px;
            }
            
            button:hover {
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
    </style>
</head>
<body>
<?php 
  $error="";
  $user="";
  $pass="";
 $admin=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["uname"])) { $user = $_POST['uname']; }
    if(isset($_POST["psw"])) { $pass = $_POST['psw']; }
    if($user == "admin" && $pass== "admin"){
      session_start();

      $_SESSION['admin']=$user;
      
      header('location:/quanlysukien/admin');
    }
    else
     $error="mật khẩu hoặc pass không đúng";
  }
?>

<form action="" method="post">
    <h4>ĐĂNG NHẬP ĐỂ VÀO HỆ THỐNG</h4>
    <div style="text-align: center;">
        <img src="../asset/img/logo.png" alt="" width="90px">
    </div>
  <div class="container">
    <label for="uname">Username</label><br>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw">Password</label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <label style="color:red" for=""><?php echo $error; ?></label>
    <div style="text-align: center;">
        <button type="submit">Login</button>
    </div> 
  </div>

</form>
</body>
</html>