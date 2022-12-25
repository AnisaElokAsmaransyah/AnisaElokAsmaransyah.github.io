<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Menampilkan semua data dari table siswa berdasarkan nis secara Descending
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY no ASC");

// Membuat nama file
$filename = "data mahasiswa-" . date('Ymd') . ".xls";

// Kodingam untuk export ke excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Mahasiswa.xls");

?>
<table class="text-center" border="1">
    <thead class="text-center">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>FOTO</th>
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
                </tr>
        <?php endforeach; ?>
    </tbody>
</table>