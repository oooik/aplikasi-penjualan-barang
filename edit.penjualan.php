<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid py-5 bg-dark text-white">
        <div class="container">
            <a href="view.penjualan.php" style="padding:0.4% 0.8%; background-color:#3300cc;color:#fff; border-radius: 2px; text-decoration:none;"><<] Kembali</a><br><br>
            <h2 class="text-center mb-4">EDIT DATA PENJUALAN</h2>
            <div class="offset-lg-2 col-lg-8">
            <?php
            include "koneksi.php";
            $id_transaksi=$_GET['id_transaksi'];
            $query=mysqli_query($conn, "SELECT * FROM tab_trans_penjualan WHERE id_transaksi='$id_transaksi'");
            $rows=mysqli_fetch_array($query);
            ?>
            <!--Form-->
            <form action=""method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="id_transaksi">Id Transaksi</label>
                  <input type="text" id="id_transaksi" class="form-control" value="<?=$rows['id_transaksi'] ?>"placeholder="Masukan Id Transaksi" name="id_transaksi">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="tanggal_transaksi">Tanggal Transaksi</label>
                  <input type="date" id="tanggal_transaksi" class="form-control" value="<?=$rows['tanggal_transaksi'] ?>" placeholder="Masukan Tanggal Transaksi" name="tanggal_transaksi">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="toko">Toko</label>
                  <input type="text" class="form-control" value="<?=$rows['toko'] ?>" id="toko" name="toko">
                </div>
            </div>
            <div class="mb-3">
                    <div class="col-lg-6">
                        <label for="kd_barang" class="form-label">nama Barang</label>
                        <select type="text" name="kd_barang" id="kd_barang" cols="30" rows="5" class="form-select">
                            <?php
                            include("koneksi.php");
                            $sql = mysqli_query($conn, "SELECT * FROM tab_barang");
                            ?>
                            <?php
                            while ($r = mysqli_fetch_array($sql)) {
                                echo "<option value=$r[kd_barang]>$r[nama_barang]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-lg-6">
                        <label for="id_pelanggan" class="form-label">Nama Pelanggan</label>
                        <select type="text" name="id_pelanggan" id="id_pelanggan" class="form-select">
                            <?php
                            include("koneksi.php");
                            $sql = mysqli_query($conn, "SELECT * FROM tab_pelanggan");
                            ?>
                            <?php
                            while ($r = mysqli_fetch_array($sql)) {
                                echo "<option value=$r[id_pelanggan]>$r[nama_pelanggan]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

            <!-- <div class="mb-3">
            <div class="col-lg-9">
              <label for="kd_barang" class="form-label">Kode Barang</label>
              <input type="text" name="kd_barang" class="form-control" value="<?=$rows['kd_barang'] ?>" id="kd_barang"cols="30" rows="5">
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="id_pelanggan">Id Pelanggan</label>
                  <input type="text" name="id_pelanggan" class="form-control" value="<?=$rows['id_pelanggan'] ?>" id="id_pelanggan" cols="30" rows="5">
                </div>
            </div>
            <div> -->
            <div class="col-lg-9">
                  <label for="sistem_bayar">Sistem Bayar</label>
                  <select type="text" name="sistem_bayar" class="form-control" value="<?=$rows['sistem_bayar'] ?>" id="sistem_bayar" cols="30" rows="5">
                    <option value="cash/tunai">Cash/tunai</option>
                    <option value="kredit">Kredit</option>
                    <option value="kartu debit">Kartu debit</option>
                  </select>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="cs">CS</label>
                  <input type="text" name="cs" class="form-control" value="<?=$rows['cs'] ?>" id="cs" cols="30" rows="5">
                </div>
            </div>
            </div>
            <div class="mb-3">
            <div class="col-lg-5">
              <button type="submit" name="simpan" class="btn btn-primary w-25">Simpan</button>
            </div>
                </form>
                <!--Form-->
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['simpan'])){
    $id_transaksi = $_POST['id_transaksi'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $toko = $_POST['toko'];
    $kd_barang = $_POST['kd_barang'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $sistem_bayar = $_POST['sistem_bayar'];
    $cs = $_POST['cs'];
    if(empty($foto)){
      $query=mysqli_query($conn, "UPDATE tab_trans_penjualan SET tanggal_transaksi='$tanggal_transaksi',toko='$toko',kd_barang='$kd_barang',id_pelanggan='$id_pelanggan',sistem_bayar='$sistem_bayar',cs='$cs' WHERE id_transaksi='$id_transaksi'");
  }else{
      $query=mysqli_query($conn, "UPDATE tab_trans_penjualan SET tanggal_transaksi='$tanggal_transaksi',toko='$toko',kd_barang='$kd_barang',id_pelanggan='$id_pelanggan',sistem_bayar='$sistem_bayar',cs='$cs' WHERE id_transaksi='$id_transaksi'");
  }
  if($query){
      echo "<script>location='view.penjualan.php' </script>";
  }else{
      echo "<script>alert ('Data Gagal di Edit') </script>";
      echo "<script>location='view.penjualan.php'</script>";
  }
    }
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
