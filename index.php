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

// Menampilkan semua data dari table mahasiswa berdasarkan nim secara Descending
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY nim DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/css">
    <link rel="icon" type="image/jpg" href="pict.jpg">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


    <title>DATA MAHASISWA | KEL 5</title>
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

    <!--Container-->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase"><i class="bi bi-person-lines-fill"></i> Data Mahasiswa</h3>
                <hr>
            </div>
        </div>

        <!--Button Tambah & Ekspor-->
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="addData.php" class="btn btn-outline-success"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <a href="export.php" target="_blank" class="btn btn-outline-success"><i class="bi bi-file-earmark-arrow-up-fill"></i>&nbsp;Ekspor ke Excel</a>
            </div>
        <!--End-->

        <!--Tabel Data-->
        <div class="row my-3">
                <div class="col-md">
                    <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>NO</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>FOTO</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                         <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td><?= $row['no']; ?></td>
                                    <td><?= $row['nim']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['gambar']; ?></td>
                                    <td>
                                        <button class="btn btn-info btn-sm text-white detail" data-id="<?= $row['no']; ?>" style="font-weight: 600;"><i class="bi bi-info-square"></i></button>

                                        <a href="ubah.php?no=<?= $row['no']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i></a>

                                        <a href="hapus.php?no=<?= $row['no']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $row['nama']; ?> ?');"><i class="bi bi-trash3"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        </div>
        <!--End Table-->

    </div>
        <!--End Container-->

    <!--Detail-->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="fw-bold text-uppercase"><i class="bi bi-person-circle"></i>&nbsp; Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-mahasiswa">
                </div>
            </div>
        </div>
    </div>
    <!--End-->

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!--Data Tables-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi Table
            $('#data').DataTable();
            // Fungsi Table

            // Fungsi Detail
            $('.detail').click(function() {
                var datamahasiswa = $(this).attr("data-id");
                $.ajax({
                    url: "detail.php",
                    method: "post",
                    data: {
                        datamahasiswa,
                        datamahasiswa
                    },
                    success: function(data) {
                        $('#detail-mahasiswa').html(data);
                        $('#detail').modal("show");
                    }
                });
            });
            // Fungsi Detail
        });
    </script>
</body>

</html>