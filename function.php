<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "db_logcrud");

// membuat fungsi query dalam bentuk array
function query($query)
{
    // Koneksi database
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    // membuat varibale array
    $rows = [];

    // mengambil semua data dalam bentuk array
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//membuat register
function register($data){

    global $koneksi;

    //huruf menjadi kecil -- membersihkan sles
    $username =strtolower(stripslashes($data['username']));
    $password =mysqli_real_escape_string($koneksi, $data['password']);
    $re_password =mysqli_real_escape_string($koneksi, $data['re_password']);

    //cek konfirmasi password
    if ($password !== $re_password) {
        echo "<script>
                alert('Konfirmasi Password Anda Salah!');
            </script>";
            return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username','$password')");


    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi tambah
function tambah($data)
{
    global $koneksi;
    $no = htmlspecialchars($data['no']);
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);
    $gambar = upload();
    

    if (!$gambar) {
        return false;
    }

    $sql = "INSERT INTO mahasiswa VALUES ('$no','$nim','$nama','$alamat','$gambar')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi hapus
function hapus($no)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE no = $no");
    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi ubah
function ubah($data)
{
    global $koneksi;

    $no = $data['no'];
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $alamat = htmlspecialchars($data['alamat']);

    $gambarLama = $data['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama',  alamat = '$alamat' , gambar = '$gambar' WHERE no = $no";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Membuat fungsi upload gambar
function upload()
{
    // Syarat
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Jika tidak mengupload gambar atau tidak memenuhi persyaratan diatas maka akan menampilkan alert dibawah
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // format atau ekstensi yang diperbolehkan untuk upload gambar adalah
    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $namaFile);
    $ext = strtolower(end($ext));

    // Jika format atau ekstensi bukan gambar maka akan menampilkan alert dibawah
    if (!in_array($ext, $extValid)) {
        echo "<script>alert('Yang anda upload bukanlah gambar!');</script>";
        return false;
    }

    // Jika ukuran gambar lebih dari 3.000.000 byte maka akan menampilkan alert dibawah
    if ($ukuranFile > 3000000) {
        echo "<script>alert('Ukuran gambar anda terlalu besar!');</script>";
        return false;
    }

    // nama gambar akan berubah angka acak/unik jika sudah berhasil tersimpan
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ext;

    // memindahkan file ke dalam folde img dengan nama baru
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}
