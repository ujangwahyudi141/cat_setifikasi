<?php
require_once "ClassUser.php";
session_start();

$akses = new Akses;
$akses->Cek();
						
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<h3 class="text-uppercase">Profil Peserta</h3>
		<a href="" class="btn btn-edit">Edit Profil</a>
			<a href="form_pass_peserta.php" class="btn btn-warning">Ubah Pasword<a/>
	<link rel=stylesheet type=text/css href=assets/css/main.css>
	<div id="wrapper" class="flex ">
		<div class="box-login2">
			<div class="box-login-body">
				<div class="box-login-register2">
					<input type="text" name="kd" value="<?php echo $_SESSION['username']; ?>">
					<form id="register" method="POST" action="simpan_peserta.php" enctype="multipart/form-data" class="from2">
						<?php
						include 'koneksi.php';
						$user=$_SESSION['username'];

						$cari= mysqli_query($koneksi,"SELECT * from peserta where username='".$user."' ");
						$data = mysqli_fetch_array($cari);
						
						?>
						<input type="text" name="created" value="<?php echo date('Y-m-d h:i:s'); ?>">
						<div class="holder-form p">
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="nama">
											Nama Lengkap
										</label>
										<input type="text" name="nama" id="nama" maxlength="255" placeholder="Masukkan nama lengkap" class="form-control " value="<?php echo $data['nama']; ?>">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="username">
											Username
										</label>
										<input maxlength="30" type="text" name="username" placeholder="Masukkan username" class="form-control" value="<?php echo $data['username']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="email">
											Alamat Email
										</label>
										<input type="text" name="email" maxlength="50" placeholder="Masukkan Alamat Email" class="form-control " value="<?php echo $data['email']; ?>">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											NIK
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $data['nik']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tmp_lahir">
											Tempat Lahir
										</label>
										<input type="text" name="tmp_lahir" maxlength="50" placeholder="Masukkan Tempat Lahir" class="form-control " value="<?php echo $data['tmp_lahir']; ?>">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_lahir">
											Tanggal Lahir
										</label>
										<input maxlength="30" type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php echo $data['tgl_lahir']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jekel">
											Jenis Kelamin
										</label>
										<input maxlength="30" type="text" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php if($data['jekel']=='L'){
										echo 'Laki - Laki';
									}else{echo 'Peempuan';} ?>">
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											Agama
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $data['agama']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											No Handphone
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data['no_hp']; ?>">
									</div>						
								</div>
								
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Tipe Peserta
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php 
										if($data['status_peserta']=='Umum')
										{
											echo 'Masyarakat Umum';
										}
										else
										{
											echo 'Aparatur Sipil Negara ';
										}
										
										?>">
									</div>						
								</div>
								
							</div>


							<div>
								<h3 class="text-uppercase">Alamat KTP</h3>
							</div>
							
										
										
										
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
											$sql = mysqli_query($koneksi, "SELECT alamat_ktp.id_ktp,alamat_ktp.kd_pos,alamat_ktp.alamat, provinsi.provinsi, kabupaten.kabupaten
											FROM alamat_ktp, provinsi,kabupaten
											WHERE alamat_ktp.id_prov=provinsi.id_prov AND alamat_ktp.id_kab=kabupaten.id_kab AND alamat_ktp.id_ktp='".$data['id_ktp']."'");
											$data2 = mysqli_fetch_array($sql);
											
											?>
											
										<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jekel">
											Provinsi
										</label>
										<input maxlength="30" type="text" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php echo $data2['provinsi']; ?>">
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											Kabupaten
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $data2['kabupaten']; ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Kode POS
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data2['kd_pos']; ?>">
									</div>
								</div>
									</div>						
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Alamat
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data2['alamat']; ?>">
									</div>						
								</div>
								
							</div>
							<div>
								<h3 class="text-uppercase">Alamat Domisili</h3>
							</div>
							
										
										
										
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
											$sql = mysqli_query($koneksi, "SELECT alamat_domisili.id_domisili,alamat_domisili.kd_pos,alamat_domisili.alamat, provinsi.provinsi, kabupaten.kabupaten
											FROM alamat_domisili, provinsi,kabupaten
											WHERE alamat_domisili.id_prov=provinsi.id_prov AND alamat_domisili.id_kab=kabupaten.id_kab AND alamat_domisili.id_domisili='".$data['id_domisili']."'");
											$data2 = mysqli_fetch_array($sql);
											
											?>
											
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jekel">
											Provinsi
										</label>
										<input maxlength="30" type="text" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php echo $data2['provinsi']; ?>">
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											Kabupaten
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $data2['kabupaten']; ?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Kode POS
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data2['kd_pos']; ?>">
									</div>	
									</div>
									</div>					
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Alamat
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data2['alamat']; ?>">
									</div>						
								</div>
								
							</div>
							
							<div>
								<h3 class="text-uppercase">Riwayat Pendidikan</h3>
							</div>
									
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
										

											$sql = mysqli_query($koneksi, "SELECT riwa_pendidikan.id_riw_pendidikan,jenjang.jenjang,jurusan.nm_jurusan
											FROM riwa_pendidikan, jenjang,jurusan
											WHERE riwa_pendidikan.id_jurusan=jurusan.id_jurusan AND jenjang.id_jenjang=riwa_pendidikan.id_jenjang AND riwa_pendidikan.id_riw_pendidikan='".$data['id_riw_pendidikan']."'");
											$data3 = mysqli_fetch_array($sql);
											
											?>
											
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jekel">
											Jenjang
										</label>
										<input maxlength="30" type="text" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?php echo $data3['jenjang']; ?>">
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											Jurusan
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?php echo $data3['nm_jurusan']; ?>">
									</div>
								</div>
							</div>
							
								
								

						
						<div>
							<h3 class="text-uppercase">Riwayat Pekerjaan</h3>
						</div>

											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
										

											$sql = mysqli_query($koneksi, "SELECT * from riwa_pekerjaan where id_pekerjaan='".$data['id_pekerjaan']."'");
											$data3 = mysqli_fetch_array($sql);
											
											?>
						<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Status Bekerja
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control " value="<?php echo $data3['sts_pekerjaan']; ?>">
									</div>						
								</div>
								
							</div>
						<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tmp_kerja" id="tmp">
											Tempat Kerja
										</label>
										<input type="text" name="tmp_kerja" id="tmp_kerja" maxlength="50" placeholder="Masukkan Nama Tempat Bekerja" class="form-control " value="<?php echo $data3['nm_tmp_kerja']; ?>">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="pekerjaan" id="tmp2">
											Perkerjaan
										</label>
										<input maxlength="30" type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Perkerjaan" class="form-control" value="<?php echo $data3['pekerjaan']; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_mulai" id="tmp3">
											Tanggal Mulai
										</label>
										<input type="date" name="tgl_mulai" id="mulai" maxlength="50" placeholder="" class="form-control " value="<?php echo $data3['tgl_mulai']; ?>">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_selesai" id="tmp4">
											Tanggal Selesai
										</label>
										<input maxlength="30" type="date" name="tgl_selesai" id="selesai" placeholder="" class="form-control"value="<?php echo $data3['tgl_selesai']; ?>">
									</div>
								</div>
							</div>
						</div>

						
					
					</div>
							<br>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			
			
		</header>
	</main>

</body>
</html>