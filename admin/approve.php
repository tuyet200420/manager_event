<?php 
        // Kết nối database
    include 'connect_db.php';
    if (isset($_GET['approve'])) {
        $tmp = 1;
        $id = $_GET['approve'];
        $id_sk = $_GET['id_sk'];
        $trangthai=$_GET['trangthai'];
        if( $trangthai ==1){
            $tmp = 0;
        }
        $sql_update = "update dbo_danhsachdangky 
        set trangthai = $tmp
        where id_sv =  $id and id_sk = $id_sk;";
        mysqli_query($link, $sql_update);
        header('location: /quanlysukien/admin/join_event.php');
    }
   
           
?>