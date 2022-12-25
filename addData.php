<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Data Mahasiswa gagal ditambahkan!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/jpg" href="pict.jpg">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


    <title>TAMBAH DATA | KEL 5</title>
</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
    <h1 class="text-white text-center fs-3"><b>CYBERSECURITY</b></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--End-->


    <!-- Container -->
    <div class="container col-md-9">
        <div class="row">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data Mahasiswa</h3>
            </div>
            <hr>
        </div>

            <!--Input Data-->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row g-2">
                    <div class="col-md-6">
                        <label for="no" class="form-label">NO</label>
                        <input type="number" class="form-control w-50" id="no" name="no" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="number" class="form-control w-50" id="nim" placeholder="Masukkan NIM" name="nim" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label for="alamat" class="form-label">ALAMAT</label>
                        <textarea class="form-control w-50" id="alamat" rows="5" style="border: 2px solid #48e248; border-radius: 10px;" name="alamat" placeholder="Masukkan Alamat" autocomplete="off" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">NAMA</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Masukkan Nama" name="nama" autocomplete="off" required>
                    </div>
                    <div class="col-md-6">
                        <label for="gambar" class="form-label">FOTO</label>
                        <input class="form-control form-control-sm w-50" style="border: 2px solid #48e248; border-radius: 10px;" id="gambar" name="gambar" type="file">
                    </div>
                    <div class="col-md-6">
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                    </div>
                </form>
                <!--End-->

    </div>
    <!--End Container-->


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>