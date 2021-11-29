<?php
// Load file koneksi.php
include "../koneksi.php";

// Ambil data ID Provinsi yang dikirim via ajax post
$jenjang = $_POST['jenjang'];

// Buat query untuk menampilkan data kota dengan provinsi tertentu (sesuai yang dipilih user pada form)
$sql = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jenjang='".$jenjang."' ORDER BY nm_jurusan");

// Buat variabel untuk menampung tag-tag option nya
// Set defaultnya dengan tag option Pilih
$html = "<option value=''>Pilih</option>";

while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$html .= "<option value='".$data['id_jurusan']."'>".$data['nm_jurusan']."</option>"; // Tambahkan tag option ke variabel $html
}

$callback = array('data_pendidikan'=>$html); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
