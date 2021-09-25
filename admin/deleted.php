<?php
include 'connect_db.php';
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($link, "DELETE FROM dbo_sukien WHERE id_sk = $id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: /quanlysukien/admin/event.php');
    }
    else
        echo "sai r";
?>
