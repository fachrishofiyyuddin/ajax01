<?php
$koneksi = mysqli_connect("localhost", "root", "root", "ajax");
// if ($koneksi) {
//     echo "berhasil";
// }
if ($_GET['title'] == "mahasiswa") {
    if ($_GET['id'] == "default") {
        // Query untuk mengambil data dari database
        $sql = "SELECT * FROM mahasiswa join matkul on mahasiswa.id=matkul.id_mahasiswa order by matkul.id desc";
        $result = mysqli_query($koneksi, $sql);

        // Inisialisasi array untuk menyimpan data
        $data = array();

        // Cek apakah ada baris hasil
        if (mysqli_num_rows($result) > 0) {
            // Ambil setiap baris data dan simpan ke dalam array
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            echo "Tidak ada data yang ditemukan";
        }

        // Keluarkan data sebagai JSON
        echo json_encode($data);
    } else {
        // Query untuk mengambil data dari database
        $sql = "SELECT * FROM mahasiswa join matkul on mahasiswa.id=matkul.id_mahasiswa where matkul.id_mahasiswa='" . $_GET['id'] . "' order by matkul.id desc";
        $result = mysqli_query($koneksi, $sql);

        // Inisialisasi array untuk menyimpan data
        $data = array();

        // Cek apakah ada baris hasil
        if (mysqli_num_rows($result) > 0) {
            // Ambil setiap baris data dan simpan ke dalam array
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        } else {
            echo "Tidak ada data yang ditemukan";
        }

        // Keluarkan data sebagai JSON
        echo json_encode($data);
    }
}
