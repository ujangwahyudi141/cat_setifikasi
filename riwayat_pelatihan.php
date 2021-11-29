<?php


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
			<h3 class="text-uppercase">Riwayat Pelatihan Saya</h3>
		</header>
		
		<div id="datatable" class="datatable card p">
			<table class="table no-footer">
					<thead>
						<tr >
							<th>Nama Perogram</th><th>Gelombang</th><th>Tanggal Pendaftaran</th><th>Tanggal Pelaksanaan</th><th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr ><?php
						include 'koneksi.php';
						session_start();
$sql = mysqli_query($koneksi, "SELECT  d_pelatihan.kd_pelatihan ,d_pelatihan.judul_pelatihan , d_pelatihan.gelombang ,peserta_pelatihan.tgl_daftar  , d_pelatihan.tgl_pelaksanaan  ,d_pelatihan.tgl_selesai  ,  peserta.username ,  peserta.kd_peserta,  peserta_pelatihan.ket 
					FROM d_pelatihan, peserta_pelatihan , peserta 
					WHERE d_pelatihan.kd_pelatihan=peserta_pelatihan.kd_pelatihan AND peserta.kd_peserta=peserta_pelatihan.kd_peserta AND peserta.username='".$_SESSION['username']."'");
				
					$baris = mysqli_num_rows($sql);	
				

										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($sql);
											?>
											

														
											<td><?php echo $data['judul_pelatihan']; ?></td>
											<td> Gelombang ke- <?php echo $data['gelombang']; ?></td>
											<td><?php echo $data['tgl_daftar']; ?></td>
											<td><?php echo $data['tgl_pelaksanaan']; ?></td>
											<td><?php if ($data['ket']=='tunggu') {
												echo "Menunggu Konfirmasi";
											}elseif ($data['ket']=='mulai') {
												echo "Belum Memulai Ujian Seleksi";
											}elseif ($data['ket']=='gagal') {
												echo "Tidak Lolos";
											}elseif ($data['ket']=='lolos') {
												echo "Lolos Seleksi";
											}
											?></td>

											<?php
										}
										?>
							
						
					</tbody>
			</table>		
		</div>
	</main>
</body>
</html>