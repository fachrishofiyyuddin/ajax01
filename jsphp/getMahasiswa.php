<?php
$koneksi = mysqli_connect("localhost", "root", "root", "ajax");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Periksa apakah parameter id tersedia
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']); // Escape parameter untuk mencegah SQL Injection

    // Query untuk mengambil data dari database
    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
    $result = mysqli_query($koneksi, $sql);

    // Inisialisasi array untuk menyimpan data
    $data = array();

    // Periksa apakah ada baris hasil
    if (mysqli_num_rows($result) > 0) {
        // Ambil setiap baris data dan simpan ke dalam array
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        // Keluarkan data sebagai JSON
        echo json_encode($data);
    } else {
        // Tidak ada data yang ditemukan
        echo json_encode(array("message" => "Tidak ada data yang ditemukan"));
    }
} else {
    // Parameter id tidak tersedia
    echo json_encode(array("message" => "Parameter id tidak tersedia"));
}
