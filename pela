<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			<h3 class="text-uppercase">Jadwal Pelatihan</h3>
		</header>
		<div class="card p">
			<div class="form-inline">
				<div class="input-group m">
					<span>URUTKAN</span>
				</div>
				<div class="input-group m">
					<form action="" id="form-gelombang">
						<input type="hidden" name="q" value>
						<select onchange="" name="gl" class="select2 form-control ">
							<option>--Gelombang--</option>
							<option>Gelombang ke-1</option>
							<option>Gelombang ke-2</option>
						</select>
					</form>
				</div>
			</div>
		</div>

		<div class="list-pelatihan row-half">
			<div class="row">
				<?php
					include 'koneksi.php';
										

					$ambildata = mysqli_query($koneksi,"select kd_pelatihan,judul_pelatihan, tgl_buka, tgl_tutup,tgl_pelaksanaan from d_pelatihan");
					$baris = mysqli_num_rows($ambildata);

					for($i=1;$i<=$baris;$i++)
					{
						$data = mysqli_fetch_array($ambildata);
						
						echo "<div class='col-md'>
					<div class='pelatihan navy'>
						<div class='pelatihan-cover page'>
							::before
							<div class='title-pelatihan'>
								<span>$data[judul_pelatihan]</span>
							</div>
							<div class='gelombang'>
								<span>Gelombang ke-11</span>
							</div>
						</div>
						<div class='pelatihan-periode'>
							<span class='date-label'>
								<span>Tanggal Pendaftaran  : </span> 
								<span> $data[tgl_buka] - $data[tgl_tutup]</span><br>
							</span>
							<span class='date-label'>
								<span>Tanggal Pelaksanaan : </span> 
								<span> $data[tgl_pelaksanaan] - $data[tgl_pelaksanaan]</span>
							</span>
						</div>
						<div class='pelatihan-link'>
							<a href='detail_pelatihan.php?kode=$data[kd_pelatihan]' class='detailPelatihan'>Info Lebih Lanjut</a>
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