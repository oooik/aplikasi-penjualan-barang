<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <script src="jquery.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <title>L O G I N </title>

</head>
<style>
  html,
  body {
    height: 100%;
    background-color: #f1f1f1 !important;
    font-family: sans-serif;
  }

  .global-container {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-form {
    width: 380px;
    height: 450px;
    padding: 20px;
    border-radius: 10px !important;
  }

  input[type="text"],
  input[type="password"] {
    border: 2px solid gray;
    border-radius: 10px;
    margin-bottom: 25px;
  }
  .card-title {
    color: cornflowerblue;
    font-weight: 600;
    padding-top: 20px;
  }
</style>

<body background="https://i.pinimg.com/564x/55/0a/bf/550abf4f442868f3e257571268dd4ceb.jpg">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div class="global-container">
    <div class="card login-form">
      <div class="body">
        <h1 class="card-title text-center">L O G I N</h1>
      </div>
      <div class="card-text">
        <!--form-->
        <form method="post">
          <div class="mb-3">
            <label for="Username">Username</label>
            <input type="text" name="fusername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="fpassword" class="form-control">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ingatkan Saya</label>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="fmasuk">submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  include "koneksi.php";
  if (isset($_POST['fmasuk'])) {
    $Username = $_POST['fusername'];
    $Password = $_POST['fpassword'];
    $qry = mysqli_query($conn, "SELECT * FROM login WHERE Username='$Username' AND Password=md5('$Password')");
    $cek = mysqli_num_rows($qry);
    if ($cek==1) {
      $_SESSION['login'] = $Username;
      $_SESSION['login'] = 1;
      header ("location:aku.html");
      exit;
    }
    else {
      echo "Maaf Username Atau Password Anda Salah!";
    }
  }
  ?>
</body>

</html>
