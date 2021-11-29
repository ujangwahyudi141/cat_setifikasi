<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			<h3 class="text-uppercase">Pelatihan Saya</h3>
		</header>
		
		<div class="list-pelatihan row-half">
			<div class="row">
				<?php
				require_once 'ClassUser.php';
				session_start();
					include 'koneksi.php';
					
										
					$sql = mysqli_query($koneksi, "SELECT d_pelatihan.judul_pelatihan , d_pelatihan.tgl_pelaksanaan  , d_pelatihan.gelombang, d_pelatihan.id_soal , d_pelatihan.waktu_pengerjaan , d_pelatihan.tgl_pelaksanaan , peserta_pelatihan.ket, peserta.kd_peserta , peserta.username
					FROM d_pelatihan, peserta_pelatihan , peserta 
					WHERE d_pelatihan.kd_pelatihan=peserta_pelatihan.kd_pelatihan AND peserta.kd_peserta=peserta_pelatihan.kd_peserta AND peserta.username='".$_SESSION['username']."'");
				
					$baris = mysqli_num_rows($sql);

					


					$carikode = mysqli_query($koneksi,"select max(kd_pespel) from peserta_pelatihan");
					$datakode = mysqli_fetch_array($carikode);
					if ($datakode)
					{
			   			//$nilaikode = substr($datakode[0]);
					   			// menjadikan $nilaikode ( int )
					   			$kode = (int) $datakode;
					   			// setiap $kode di tambah 1
					   			$kode = $datakode[0] + 1;
			   			//$kode_otomatis = $this->id_soal.str_pad($kode, 2, "0", STR_PAD_LEFT);
			  		}
			  		else
			  		{
			   			$kode='1';
			  		}

					for($i=1;$i<=$baris;$i++)
					{
						$data = mysqli_fetch_array($sql);
						
						echo "<div class='col-md'>
							<div class='pelatihan-vertikal'>
					<div class='pelatihan navy' style='width: 210px;'>
						<div class='pelatihan-cover page'>
							::before
							<div class='title-pelatihan'>
								<span>$data[judul_pelatihan]</span>
							</div>
							<div class='gelombang'>
								<span>Gelombang ke-11</span>
							</div>
						</div>
						
						
					</div>
				</div>

				</div><div class='pelatihan-vertikal2'>
					<div class='pelatihan2 navy'>
					
						<div class='pelatihan-vertikal-desc'>
							<span class='judul'>$data[judul_pelatihan]</span><br>
							<span class='periode'>Tanggal Pelaksanaan:<br>
							$data[tgl_pelaksanaan]</span><br>";	


							if ($data['ket']=='mulai') {
								
								echo "
								<form action='coba2.php' method='POST'>
									<input type='text' name='id_soal' value='$data[id_soal]' hidden>
									<input type='text' name='waktu' value='$data[waktu_pengerjaan]' hidden>
								
								<div ><input type='submit' name='mulai' class='bg-mulai' value='Mulai Ujian'></div>
								</form>
								<br>
								<span class='deskripsi'>Klick Mulai Ujian Untuk Memulai Seleksi Ujian Masuk</span>";
							}elseif ($data['ket']=='tunggu') {
								echo "<div class='bg-tunggu'>Menunggu Konformasi</div><br>
								<span class='deskripsi'>Menunggu Hasil Ujian Seleksi</span>";
							}elseif ($data['ket']=='lolos') {
								echo "<div class='bg-lolos'>Selamat Anda DI Terima</div><br>
								<span class='deskripsi'>Anda telah memenuhi syarat kireteria kami untuk mengikuti pelatihan</span>";
							}elseif ($data['ket']=='gagal') {
								echo "<div class='bg-danger'>Tidak Di Terima</div><br>
								<span class='deskripsi'>Anda belum memenuhi syarat kireteria kami untuk mengikuti pelatihan</span>";
							}

							echo"
							
						</div>
						
					</div>
				</div>";
					}

				?>
				
			</div>
		</div>
	</main>
</body>
</html>
