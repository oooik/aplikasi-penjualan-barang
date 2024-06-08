<?php
include'koneksi.php';
if(isset($_GET['id_transaksi'])){
    $delete=mysqli_query($conn, "DELETE FROM tab_trans_penjualan WHERE id_transaksi='".$_GET['id_transaksi']."'");
    header('location:view.penjualan.php');
}
?>
