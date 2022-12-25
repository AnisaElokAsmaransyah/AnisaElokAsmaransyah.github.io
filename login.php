<?php
session_start();
// Jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

//cek username jika berhasil ada nilai = 1, jika gaada nilai = 0
    if (mysqli_num_rows($result) === 1) {

      // jika ada cek passwordnya
      $row = mysqli_fetch_assoc($result);
       if (password_verify($password, $row["password"]) ) {
          $_SESSION['login'] = true;

          header('location: index.php');
          exit;
       }
    } 

    // jika nilai 0
    $error = true;  
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

    <!--Container Login-->
      <div class="global-container">
          <div class="card login-form ">
            <div class="card-body">
              <h1 class="card-title text-center">LOGIN</h1>
            </div>
            
            <!-- Ini Error jika tidak bisa login -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Username atau Password Anda Salah!");</script>'; ?>
                <?php endif; ?>

              <div class="card-text">
                <form action="" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label"><b><u>Username</u></b></label>
                  <input type="text" class="form-control bg-light text-black" placeholder="Masukkan Username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><b><u>Password</u></b></label>
                  <input type="password" class="form-control bg-light text-black" placeholder="Masukkan Password" name="password" autocomplete="off" required>
                </div>
                
                <div class="d-grid gap-2">
                  <button type="submit" name="login" class="btn btn-success">Submit</button>
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