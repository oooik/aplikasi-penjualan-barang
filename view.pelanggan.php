<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATA PELANGGAN</title>
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
    $tampil=mysqli_query($conn,"select * from tab_pelanggan");
    ?>
    <div class="container mt-3">
        <h2>Data Pelanggan</h2><br>
        <a href="input.pelanggan.php" style="padding:0.6% 0.8%; background-color: red;color:#fff; border-radius: 6px; text-decoration:none;">Input</a><br><br>
        <table class="table table-hover table-striped">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Id Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $no=1;
                    $tampil=mysqli_query($conn,"SELECT * FROM tab_pelanggan");
                    while($r=mysqli_fetch_array ($tampil)){
                        ?>
                        <tr>
                            <td><?= $no++;?> </td>
                            <td><?= $r['id_pelanggan']?> </td>
                            <td><?= $r['nama_pelanggan']?> </td>
                            <td><?= $r['jk']?></td>
                            <td><?= $r['alamat']?> </td>
                            <td><?= $r['telepon']?> </td>
                            <td><?= $r['email']?> </td>
                            <td>
                                <a type='button' class='btn btn-primary' href="edit.pelanggan.php?id_pelanggan=<?php echo $r['id_pelanggan']?>">Edit</a>
                            </a>
                            <a type='button' class='btn btn-danger' href="delete.pelanggan.php?id_pelanggan=<?php echo $r['id_pelanggan']?>">Hapus</a>
                        </a>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
            </tbody>
        </table>
        <a href="aku.html" style="padding:0.6% 0.8%; background-color: #3300cc;color:#fff; border-radius: 6px; text-decoration:none;">Back</a><br><br>
    </div>
    <script>
        $(document).ready(function (){
            $('#example').DataTable();
        })
    </script>
</body>
</html>
