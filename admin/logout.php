<?php
    session_start();
     unset($_SESSION['admin']); 
     header("location:/quanlysukien/admin/login.php")
?>  