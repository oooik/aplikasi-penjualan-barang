<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATA PENJUALAN</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    include "koneksi.php";
    $tampil=mysqli_query($conn,"select * from tab_trans_penjualan");
    ?>
    <div class="container mt-3">
        <h2>Data Penjualan</h2><br>
        <a href="input.penjualan.php" style="padding:0.6% 0.8%; background-color: red;color:#fff; border-radius: 6px; text-decoration:none;">Input</a><br><br>
        <table class="table table-hover table-striped">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Toko</th>
                    <th>Nama Barang</th>
                    <th>Nama Pelanggan</th>
                    <th>Sistem Bayar</th>
                    <th>CS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $no=1;
                    $tampil=mysqli_query($conn,"SELECT * FROM tab_trans_penjualan INNER JOIN tab_barang ON tab_barang.kd_barang=tab_trans_penjualan.kd_barang INNER JOIN tab_pelanggan ON tab_pelanggan.id_pelanggan=tab_trans_penjualan.id_pelanggan");
                    while($r=mysqli_fetch_array ($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++;?> </td>
                            <td><?= $r['id_transaksi']?> </td>
                            <td><?= $r['tanggal_transaksi']?> </td>
                            <td><?= $r['toko']?></td>
                            <td><?= $r['nama_barang']?> </td>
                            <td><?= $r['nama_pelanggan']?> </td>
                            <td><?= $r['sistem_bayar']?> </td>
                            <td><?= $r['cs']?> </td>
                            <td>
                                <a type='button' class='btn btn-primary' href="edit.penjualan.php?id_transaksi=<?php echo $r['id_transaksi']?>">Edit</a>
                                </a>
                                <a type='button' class='btn btn-danger' href="delete.penjualan.php?id_transaksi=<?php echo $r['id_transaksi']?>">Hapus</a>
                                </a>
                            </td>
                        </tr>
                        <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
        <a href="aku.html" style="padding:0.6% 0.8%; background-color: #3300cc;color:#fff; border-radius: 6px; text-decoration:none;">back</a><br><br>
    </div>
    <script>
        $(document).ready(function (){
            $('#example').DataTable();
        })
    </script>
</body>
</html>
