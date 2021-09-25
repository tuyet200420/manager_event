<?php 
        // Kết nối database
    include 'connect_db.php';
        $tmp = 1;
        $id_sv = $_GET['id_sv'];
        $id_sk = $_GET['id_sk'];
        $hienthi = $_GET['hienthi'];
        if($hienthi==1){
            $tmp = 0;
        }
            $sql_update = "update dbo_danhsachdangky 
            set hienthi =  $tmp
            where id_sv = $id_sv and id_sk = $id_sk;";
            mysqli_query($link, $sql_update);?>
            <script>
                alert("hihi");
            </script>
            <?php
            header('location: /quanlysukien/admin/join_event.php');
       
       
  
           
?>