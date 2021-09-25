<?php
 include '../admin/connect_db.php';
    
        $id = $_GET['id_sk'];
        $id_sv = $_GET['id_sv'];
        $thuctrang = $_GET['thuctrang'];
        if($id_sv  == 0){
          echo "<script type='text/javascript'>alert('Đăng nhập để đăng ký');</script>";
          header("location:/quanlysukien/user/login.php");
        }else{
      if($thuctrang==0){
        $sql_inset = "insert into dbo_danhsachdangky(id_sv,id_sk)
                values ('$id_sv','$id')";
      }
      else
      $sql_inset="DELETE FROM dbo_danhsachdangky WHERE id_sk = $id and id_sv = $id_sv ";
                if ($link->query($sql_inset) === TRUE) {
                    
                    $local = "location:/quanlysukien/user/event_detail.php?detail=".$id."&id_sv=".$id_sv;
                    header($local);
                    echo "<script type='text/javascript'>alert('thành công');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $link->error;
                }}
    
   
   
?>
