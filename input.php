<?php
// session_start ();
// if ( $_SESSION['LOGIN']){
?>


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
            <a href="view.php" style="padding:0.4% 0.8%; background-color: #3300cc;color:#fff; border-radius: 2px; text-decoration:none;"><<] Kembali</a><br><br>
            <h2 class="text-center mb-4">INPUT DATA BARANG</h2>
            <div class="offset-lg-2 col-lg-8">
            <!--Form-->
            <form action=""method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="kd_barang">Kode Barang</label>
                  <input type="text" id="kd_barang" class="form-control" placeholder="Masukan Kode Barang" name="kd_barang">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="nama_barang">Nama Barang</label>
                  <input type="text" id="nama_barang" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="kategori">Kategori</label>
                  <select class="form-control"  id="kategori" name="kategori">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  </select>
                </div>
            </div>
            <div class="mb-3">
              <label for="deskripsi" class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi"cols="30" rows="5"></textarea>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" name="jumlah" class="form-control" id="jumlah" cols="30" rows="5">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="tanggal_masuk">Tanggal Masuk</label>
                  <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" cols="30" rows="5">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="harga_jual">Harga Jual</label>
                  <input type="text" name="harga_jual" class="form-control" id="harga_jual" cols="30" rows="5">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control" id="foto" cols="30" rows="5">
                </div>
            </div>
            <div class="mb-3">
              <button type="submit" name="simpan" class="btn btn-primary w-25">Simpan</button>
            </div>
                </form>
                <!--Form-->
            </div>
        </div>
    </div>
    <?php
    include "koneksi.php";
    if(isset($_POST['simpan'])){
    $kd_barang = $_POST['kd_barang'];
    $nama_barang = $_POST['nama_barang'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $harga_jual = $_POST['harga_jual'];
    $foto = $_FILES['foto'] ['name'];
    $dir="img/".$foto;
    $dirFile=$_FILES['foto'] ['tmp_name'];
    move_uploaded_file($dirFile,$foto);
    $sql=mysqli_query($conn, "insert into tab_barang values ('$kd_barang','$nama_barang','$kategori','$deskripsi','$tanggal_masuk','$jumlah','$harga_jual','$foto')");
    if($sql) {
        header('location:view.php');
    }else{
        echo "Data Tidak Tersimpan";
    }
    }
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
  // }else {
  //   echo "
  //   <script>
  //   alert('anda harus login');
  //   dokument.location.href ='login.php';
  //   </script>
  //   ";
  // }
  ?>
