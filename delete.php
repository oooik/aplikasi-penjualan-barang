<?php
include'koneksi.php';
if(isset($_GET['kd_barang'])){
    $delete=mysqli_query($conn, "DELETE FROM tab_barang WHERE kd_barang='".$_GET['kd_barang']."'");
    header('location:view.php');
}
?>
