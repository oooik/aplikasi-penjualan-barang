<?php
include'koneksi.php';
if(isset($_GET['id_pelanggan'])){
    $delete=mysqli_query($conn, "DELETE FROM tab_pelanggan WHERE id_pelanggan='".$_GET['id_pelanggan']."'");
    header('location:view.pelanggan.php');
}
?>
