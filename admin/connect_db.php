<?php
    $link = mysqli_connect("localhost", "root", "", "doan1");
    if ($link === false) {
        die("ERROR: Không thể kết nối. " . mysqli_connect_error());
    }
?>