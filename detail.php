<?php
// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika datamahasiswa diklik maka
if (isset($_POST['datamahasiswa'])) {
    $output = '';

    // mengambil data mahasiswa dari nim yang berasal dari datamahasiswa
    $sql = "SELECT * FROM mahasiswa WHERE no = '" . $_POST['datamahasiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                        <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                            <td colspan="2"><img src="img/' . $row['gambar'] . '" width="50%"></td>
                        </tr>
                        <tr>
                            <th width="40%">NIM</th>
                            <td width="60%">' . $row['nim'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Nama</th>
                            <td width="60%">' . $row['nama'] . '</td>
                        </tr>
                        <tr>
                            <th width="40%">Alamat</th>
                            <td width="60%">' . $row['alamat'] . '</td>
                        </tr>
                        ';
    }
    $output .= '</table></div>';
    // Tampilkan $output
    echo $output;
}
