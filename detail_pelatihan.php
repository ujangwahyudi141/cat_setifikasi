<?php 
require_once "ClassUser.php";
session_start();


	

	include 'koneksi.php';
	$kode=$_GET['kode'];
	$sql=mysqli_query($koneksi,"select*from d_pelatihan where kd_pelatihan = '$kode'");
	$data = mysqli_fetch_array($sql);
	
	
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			<h3 class="text-uppercase">Detail Pelatihan</h3>
		</header>
		<div class="pelatihan-detail">
			<span class="text-mute">Gelombang ke-<?php echo $data['gelombang'];?></span>
			<h1 ><?php echo $data['judul_pelatihan'];?></h1>
			<hr>
			<span class="periode">
				<span class="text-mute">Tanggal Buka Pendaftaran : </span>
				<span class="text-biasa"> <?php echo date("d F Y", strtotime($data['tgl_buka']));?> </span>
			</span><br>
			<span class="periode">
				<span class="text-mute">Tanggal Tutup Pendaftaran : </span>
				<span class="text-biasa"> <?php echo date("d F Y", strtotime($data['tgl_tutup']));?> </span>
			</span><br><br>
			<span class="periode">
				<span class="text-mute">Tanggal Pelaksanaan Pendaftaran : </span>
				<span class="text-biasa"> <?php echo date("d F Y", strtotime($data['tgl_pelaksanaan']));?> </span>
			</span><br>
			<span class="periode">
				<span class="text-mute">Lokasi Pelatiahan : </span>
				<span class="text-biasa"> KOMINFO </span>
			</span><br><br>

			<strong>Pelatihan dan Sertifikasi </strong>
			<i>
				<strong><?php echo $data['judul_pelatihan'];?> </strong>
			</i>
			<strong>Gelombang ke -<?php echo $data['gelombang'];?></strong>
			<br><br>
			<p>
				Kegiatan ini diprioritaskan untuk angkatan kerja muda serta tidak dipungut biaya apapun (gratis). Biaya transportasi pergi-pulang ditanggung oleh masing-masing peserta.
			</p><br>
			<strong>A. Tanggal Pelaksanaan</strong>
			<br><br>
			<figure class="table">
				<table>
					<tr>
						<td><strong>Hari</strong></td><td>:</td><td>Senin – Jum’at</td>
					</tr>
					<tr>
						<td><strong>Tanggal</strong></td><td>:</td><td><?php echo date("d F", strtotime($data['tgl_buka']));?> - <?php echo date("d F Y", strtotime($data['tgl_selesai']));?></td>
					</tr>
					<tr>
						<td><strong>Lokasi</strong></td><td>:</td><td>Balai Pelatihan dan Pengembangan Teknologi Informasi dan Komunikasi (BPPTIK) Kementerian Kominfo, Jl. Sekolah Hijau No. 2, Jababeka, Cikarang, Kabupaten Bekasi, Jawa Barat.</td>
					</tr>
				</table>
			</figure><br>
			<strong>B. Persyaratan Umum Calon Peserta</strong><br>
			<ol>
				<li>Memenuhi Persyaratan Khusus Calon Peserta (lihat di nomor C).</li>
				<li>Diutamakan berusia 18 – 29 tahun.</li>
				<li>Diutamakan belum bekerja.</li>
				<li>Mengupload scan ijazah pendidikan SMK/SMA/sederajat pada saat pendaftaran (atau Surat Keterangan Lulus Sementara bagi yang baru saja lulus namun ijazahnya belum diterima).</li>
				<li>Selama kegiatan mengenakan pakaian rapi dan sopan (laki-laki dan perempuan: kemeja berwarna putih dan bawahan berwarna hitam/gelap; tidak diperbolehkan mengenakan celana jeans; mengenakan sepatu).</li>
				<li>Membawa pas foto berwarna berlatar belakang merah ukuran 3×4 cm sebanyak 3 lembar.</li>
				<li>Mengisi formulir pendaftaran online hanya melalui website SIPS BPPTIK (klik tombol “Daftar Pelatihan” di bawah ini).</li>
				<li>Tidak mengundurkan diri jika dinyatakan lulus seleksi.</li>
				<li>Bersedia mengikuti peraturan dan tata tertib.</li>
				<li>Bersedia mengikuti kegiatan hingga akhir.</li>
				<li>Opsional: membawa notebook pribadi jika menggunakan perangkat lunak tersendiri.</li>
				<li>Opsional, dianjurkan: membawa sertifikat pelatihan bidang TIK yang pernah diikutnya.</li>
			</ol><br>
			<strong>C. Persyaratan Khusus Calon Peserta:</strong>
			<ol>
				<li>Pendidikan minimal lulusan SMK/SMA/sederajat.</li>
				<li>Memiliki kemampuan: 
					<ol>
						<li>Menggunakan Peralatan Peripheral</li>
						<li>Menggunakan Perangkat Lunak Pengolah Kata Tingkat Dasar</li>
						<li>Menggunakan Perangkat Lunak Lembar Sebar (Spreadsheet) Tingkat Dasar</li>
						<li>Menggunakan Perangkat Lunak Presentasi Tingkat Dasar</li>
						<li>Menggunakan Perangkat Lunak Pengakses Surat Elektronik  (e-Mail Client)</li>
						<li>Menggunakan Aplikasi Berbasis Internet (Internet Based Applications Literacy)</li>
						<li>Menggunakan Aplikasi Media Sosial</li>
						<li>Memastikan Validitas Data</li>
						<li>Mengidentifikasi Aspek Keamanan Informasi Pengguna</li>
					</ol>
				</li>
			</ol><br>
			<strong>D. Fasilitas:</strong>
			<ol>
				<li>Training kit</li>
				<li>1 peserta 1 komputer di laboratorium</li>
				<li>Sertifikat Keikutsertaan Pelatihan dan Sertifikasi</li>
				<li>Konsumsi</li>
				<li>Asrama Penginapan</li>
			</ol><br>
			<hr>
			<a href="simpan_pilih_pelatihan.php?kd_pelatihan=<?php echo $data['kd_pelatihan'];?>"><button class="btn" style="background-color: gray">Daftar</button></a>



		</div>
		
	</main>
</body>
</html>

