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
            <a href="view.pelanggan.php" style="padding:0.4% 0.8%; background-color:#3300cc;color:#fff; border-radius: 2px; text-decoration:none;"><<] Kembali</a><br><br>
            <h2 class="text-center mb-4">EDIT DATA PELANGGAN</h2>
            <div class="offset-lg-2 col-lg-8">
            <?php
            include "koneksi.php";
            $id_pelanggan=$_GET['id_pelanggan'];
            $query=mysqli_query($conn, "SELECT * FROM tab_pelanggan WHERE id_pelanggan='$id_pelanggan'");
            $rows=mysqli_fetch_array($query);
            ?>
            <!--Form-->
            <form action=""method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="id_pelanggan">Id Pelanggan</label>
                  <input type="text" id="id_pelanggan" class="form-control" value="<?=$rows['id_pelanggan'] ?>" placeholder="Masukan Id Pelanggan" name="id_pelanggan">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="nama_pelanggan">Nama Pelanggan</label>
                  <input type="text" id="nama_pelanggan" class="form-control" value="<?=$rows['nama_pelanggan'] ?>" placeholder="Masukan Nama Pelanggan" name="nama_pelanggan">
                </div>
            </div>
            <div>
            <label for="jk">Jenis Kelamin</label>
            <div class="mb-3 form-check">
              <input type="radio" value="perempuan" class="form-check-input" id="perempuan" name="jk">
              <label for="perempuan" class="form-check-label">Perempuan</label>
            </div>
            <div class="mb-3 form-check">
              <input type="radio" value="laki-laki" class="form-check-input" id="laki-laki" name="jk">
              <label for="laki-laki" class="form-check-label">Laki-laki</label>
            </div>
            </div>
            <div class="mb-3">
            <div class="col-lg-9">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" value="<?=$rows['alamat'] ?>" id="alamat" cols="30" rows="5"></textarea>
            </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="telepon">Telepon</label>
                  <input type="text" name="telepon" class="form-control" value="<?=$rows['telepon'] ?>" id="telepon" cols="30" rows="5">
                </div>
            </div>
            <div class="mb-3">
                <div class="col-lg-9">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" value="<?=$rows['email'] ?>" id="email" cols="30" rows="5">
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
    if(isset($_POST['simpan'])){
    $id_pelanggan = $_POST['id_pelanggan'];
    $kategori = $_POST['kategori'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_FILES['email'];
    if(empty($foto)){
        $query=mysqli_query($conn, "UPDATE tab_pelanggan SET nama_pelanggan='$nama_pelanggan',jk='$jk',alamat='$alamat',telepon='$telepon',email='$email' WHERE id_pelanggan='$id_pelanggan'");
    }else{
        $query=mysqli_query($conn, "UPDATE tab_pelanggan SET nama_pelanggan='$nama_pelanggan',jk='$jk',alamat='$alamat',telepon='$telepon',email='$email' WHERE id_pelanggan='$id_pelanggan'");
    }
    if($query){
        echo "<script>location='view.pelanggan.php' </script>";
    }else{
        echo "<script>alert ('Data Gagal di Edit') </script>";
        echo "<script>location='view.pelanggan.php'</script>";
    }
    }
    ?>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
