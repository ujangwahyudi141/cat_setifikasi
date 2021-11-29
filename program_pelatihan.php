<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			<h3 class="text-uppercase">Daftar Program pelatihan</h3>
		</header>
		<div class="card p">
			<div class="form-inline">
				<div class="input-group m">
					<span>Search :</span>
				</div>
				<div class="input-group m">
					<form action="" id="form-gelombang">
						<input type="search" name="q" value>
					</form>
				</div>
			</div>
		</div>

		<div id="datatable" class="datatable card p">
			<table class="table no-footer" >
					<thead>
						<tr align="center">
							<th>No</th><th>Nama Perogram</th><th>Kode</th><th>Tipe Peserta</th><th>Lama Pelaksanaan</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
					<?php
						include 'koneksi.php';

						$ambildata = mysqli_query($koneksi,"select kd_pelatihan, judul_pelatihan, sts,tgl_buka, tgl_tutup,tgl_pelaksanaan,tgl_selesai from d_pelatihan");
						$baris = mysqli_num_rows($ambildata);

						for($i=1;$i<=$baris;$i++)
						{
							$data = mysqli_fetch_array($ambildata);
							$selesai= new DateTime($data['tgl_selesai']);
							$pelaksanaan = new DateTime($data['tgl_pelaksanaan']);
							$jarak = $selesai->diff($pelaksanaan);
							echo"<tr align='center'>
								<td>$i</td><td>$data[judul_pelatihan]</td><td>$data[kd_pelatihan]</td><td>$data[sts]</td><td>$jarak->d hari</td>
							</tr>";
						}
					?>
					
					</tbody>
			</table>		
		</div>
	</main>
</body>
</html>