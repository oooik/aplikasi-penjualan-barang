<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATA BARANG</title>
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
    $tampil=mysqli_query($conn,"select * from tab_barang");
    ?>
    <div class="container mt-3">
        <h2>Data Barang</h2>
        <a href="input.php" style="padding:0.6% 0.8%; background-color: red;color:#fff; border-radius: 7px; text-decoration:none;">Input</a><br><br>
        <p> </p>
        <table class="table table-hover table-striped">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Harga Jual</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $no=1;
                    $tampil=mysqli_query($conn,"SELECT * FROM tab_barang");
                    while($r=mysqli_fetch_array ($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++;?> </td>
                            <td><?= $r['kd_barang']?> </td>
                            <td><?= $r['nama_barang']?> </td>
                            <td><?= $r['kategori']?></td>
                            <td><?= $r['deskripsi']?> </td>
                            <td><?= $r['jumlah']?> </td>
                            <td><?= $r['tanggal_masuk']?> </td>
                            <td><?= $r['harga_jual']?> </td>
                            <td><img src="img/<?= $r['foto'] ?>" alt="img" style="width: 100px;"></td>
                            <td>
                                <a type='button' class='btn btn-primary' href="edit.php?kd_barang=<?php echo $r['kd_barang']?>">Edit</a>
                                </a>
                                <a type='button' class='btn btn-danger' href="delete.php?kd_barang=<?php echo $r['kd_barang']?>">Hapus</a>
                                </a>
                            </td>
                        </tr>
                        <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
        <a href="aku.html" style="padding:0.6% 0.8%; background-color: #3300cc;color:#fff; border-radius: 7px; text-decoration:none;">back</a><br><br>
    </div>
    <script>
        $(document).ready(function (){
            $('#example').DataTable();
        })
    </script>
</body>
</html>
