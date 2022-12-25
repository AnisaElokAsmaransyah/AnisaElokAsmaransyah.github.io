<?php

// Memanggil atau membutuhkan file function.php
require 'function.php';

    if (isset($_POST['register'])) {
      if (register($_POST) > 0) {
        echo "<script>
                alert('Akun Anda telah berhasil ditambahkan!');
                document.location.href = 'login.php';
            </script>";
     } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Akun Anda gagal ditambahkan!');
            </script>";
      }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="pict.jpg">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>CYBER SECURITY | KEL 5</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body class="bg-dark">
    <br>

    <!--Navbar-->
    <p class="text-white text-center fs-2"><b>CYBER SECURITY</b></p>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php"><p class="text-color">Login</p></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php"><p class="text-color">Register</p></a>
        </li>
      </ul>
    <!--End-->


    <!--Container Register-->
        <div class="global-container">
          <div class="card login-form bg-light">
            <div class="card-body">
              <h1 class="card-title text-center">REGISTER</h1>
            </div>

              <div class="card-text">
                <form action="" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label"><b><u>Username</u></b></label>
                  <input type="text" class="form-control bg-light text-black" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><b><u>Username</u></b></label>
                  <input type="password" class="form-control bg-light text-black" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><b><u>Repeat Password</u></b></label>
                  <input type="password" class="form-control bg-light text-black" placeholder="Masukkan Re-enter Password" name="re_password" autocomplete="off" required>
                </div>
                
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-success" name="register">Submit</button>
                </div>
                </form>
              </div>
          </div>
        </div>
    <!--End-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  </body>
</html>