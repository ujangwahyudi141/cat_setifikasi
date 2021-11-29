<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
	<!-- Load librari/plugin jquery nya -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	
	<!-- Load File javascript config.js -->
	<script src="assets/js/config.js" type="text/javascript"></script>


</head>
<body>
	<link rel=stylesheet type=text/css href=assets/css/main.css>
	<div id="wrapper" class="flex justify">
		<div class="box-login">
			<div class="box-login-body">
				<div class="box-login-register">
					<div class="title-login p">
						<h2 class="text-uppercase">Daftar Akun</h2>
					</div>
					<div>
						<h3 class="text-uppercase">Informasi Pribadi</h3>
					</div>
					
					<form id="register" method="POST" action="simpan_peserta.php" enctype="multipart/form-data">
						<?php
						include 'koneksi.php';

						$carikode = mysqli_query($koneksi,"SELECT max(kd_peserta) FROM peserta");
						$datakode = mysqli_fetch_array($carikode);
						if ($datakode)
						{
							$nilaikode = substr($datakode[0]);
				   			// menjadikan $nilaikode ( int )
				   			$kode = (int) $nilaikode;
				   			// setiap $kode di tambah 1
				   			$kode = $datakode[0] + 1;
				   			
				   			
				  		}
				  		else
				  		{
				   			$kode_otomatis = "1";
				  		}
						?>
						<input type="text" name="kd_peserta" value="<?php echo $kode; ?>" hidden><input type="text" name="created" value="<?php echo date("Y-m-d h:i:s"); ?>" hidden>
						<div class="holder-form p"> 
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="nama">
											Nama Lengkap
										</label>
										<input type="text" name="nama" id="nama" maxlength="255" placeholder="Masukkan nama lengkap" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="username">
											Username
										</label>
										<input maxlength="30" type="text" name="username" placeholder="Masukkan username" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="email">
											Alamat Email
										</label>
										<input type="text" name="email" maxlength="50" placeholder="Masukkan Alamat Email" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="nik">
											NIK
										</label>
										<input maxlength="30" type="text" name="nik" placeholder="Masukkan NIK" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tmp_lahir">
											Tempat Lahir
										</label>
										<input type="text" name="tmp_lahir" maxlength="50" placeholder="Masukkan Tempat Lahir" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_lahir">
											Tanggal Lahir
										</label>
										<input maxlength="30" type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jekel">
											Jenis Kelamin
										</label>
										<select name="jekel" id="jekel" class="form-control">
											<option>--Pilih--</option>
											<option value="L">Laki-Laki</option>
											<option value="P">Perempuan</option>
										</select>
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="agama">
											Agama
										</label>
										<select name="agama" id="agama" class="form-control">
											<option>--Pilih--</option>
											<option value="islam">Islam</option>
											<option value="kristen">Kristen</option>
											<option value="budha">Budha</option>
											<option value="katolik">Katolik</option>
											<option value="hindu">Hindu</option>
											<option value="kong hu cu">Kong Hu Cu</option>
										</select>
										
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											No Handphone
										</label>
										<input type="text" name="no_hp" maxlength="50" placeholder="Masukkan Nomor Handphone" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="no_tlp">
											Telephone Rumah
										</label>
										<input maxlength="30" type="text" name="no_tlp" placeholder="Masukkan Nomot Tlp Rumah" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">

							<div class="form-group">
								<label for="upload_ktp">
									Upload KTP
								</label>
								<br>
								<input type="file" name="ktp"
								class="form-control form-control-white" id="upload_ktp">
								
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="upload_foto">
									Upload Foto Background Merah
								</label>
								<br>
								<input type="file" name="foto"
								class="form-control form-control-white" id="upload_foto">
								
							</div>

						</div>
						<div class="form-group-small">
							<small > Upload KTP & Foto dengan format: png, jpg, jpeg, atau pdf dengan maximal size: 2mb.</small>
						</div>
						
					</div>


							<div class="form-group">
								<p class="mb2">Pilih Tipe Peserta</p>
								<div class="mb1">
									<div class="control radio">
										<input type="radio" name="tipe" class="control-input" value="Umum">
										<label class="control-label">Masyarakat Umum</label>
									</div>
									<div class="control radio">
										<input type="radio" name="tipe" class="control-input" value="ASN">
										<label class="control-label">Aparatur Sipil Negara</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="password">
											Password
										</label>
										<input type="Password" name="pass" maxlength="55" placeholder="Masukkan Password" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="password2">
											Ulangi Pasword
										</label>
										<input maxlength="30" type="Password" name="pass2" placeholder="Masukkan Password" class="form-control">
									</div>
								</div>
							</div>
							<div>
								<h3 class="text-uppercase">Alamat KTP</h3>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										
										<label for="provinsi">
											Provinsi
										</label>
										<select name="provinsi" id="provinsi" class="form-control">
											<option>Pilih</option>
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
											$sql = mysqli_query($koneksi, "SELECT * FROM provinsi");
									
											while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
												echo "<option value='".$data['id_prov']."'>".$data['provinsi']."</option>";
											}
											?>
											
										</select>
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="kabupaten">
											Kota Kabupaten
										</label>
										<select name="kota" id="kota" class="form-control">
											<option value="">Pilih</option>
										</select>

										<div id="loading" style="margin-top: 15px;">
											<img src="assets/img/loading.gif" width="18"> <small>Loading...</small>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="pos">
											Kode Pos
										</label>
										<input type="text" name="pos" maxlength="20" placeholder="Masukkan Kode Pos KTP" class="form-control ">
									</div>						
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="alamat">
											Alamat Lengkap
										</label>
										<input type="text" name="alamat" maxlength="20" placeholder="Masukkan Alamat Lengkap KTP" class="form-control ">
									</div>						
								</div>
								
							</div>
							<div>
								<h3 class="text-uppercase">Alamat Domisili</h3>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										
										<label for="provinsi">
											Provinsi
										</label>
										<select name="provinsi2" id="provinsi2" class="form-control">
											<option>Pilih</option>
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
											$sql = mysqli_query($koneksi, "SELECT * FROM provinsi");
									
											while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
												echo "<option value='".$data['id_prov']."'>".$data['provinsi']."</option>";
											}
											?>
											
										</select>
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="kabupaten">
											Kota Kabupaten
										</label>
										<select name="kota2" id="kota2" class="form-control">
											<option value="">Pilih</option>
										</select>

										<div id="loading2" style="margin-top: 15px;">
											<img src="assets/img/loading.gif" width="18"> <small>Loading...</small>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="pos2">
											Kode Pos
										</label>
										<input type="text" name="pos2" maxlength="20" placeholder="Masukkan Kode Pos Domisili" class="form-control ">
									</div>						
								</div>
							</div>
							
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="alamat_dom">
											Alamat Lengkap
										</label>
										<input type="text" name="alamat2" maxlength="200" placeholder="Masukkan Alamat Lengkap Domisili" class="form-control ">
									</div>						
								</div>
								</div>
							
							<div>
								<h3 class="text-uppercase">Riwayat Pendidikan</h3>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="jenjang">
											Jenjang Pendidikan
										</label>
										<select name="jenjang" id="jenjang" class="form-control">
											<option>--Pilih--</option>
											<?php
											// Load file koneksi.php
											include "koneksi.php";
											
											// Buat query untuk menampilkan semua data siswa
											$sql = mysqli_query($koneksi, "SELECT * FROM jenjang");
									
											while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
												echo "<option value='".$data['id_jenjang']."'>".$data['jenjang']."</option>";
											}
											?>

										</select>
										
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="jurusan">
											Jurusan Pendidikan
										</label>
										<select name="jurusan" id="jurusan" class="form-control">
											<option>--Pilih--</option>
											
										</select>
										
										<div id="loading3" style="margin-top: 15px;">
											<img src="assets/img/loading.gif" width="18"> <small>Loading...</small>
										</div>
									</div>
								</div>
							</div>
								
								<div class="col-md">

							<div class="form-group">
								<label for="ijazah1">
									Ijazah Halaman Depan / Surat Keterangan Lulus Sementara
								</label>
								<br>
								<input type="file" name="ijazah1"
								class="form-control form-control-white" id="ijazah1">
								<div class="form-group-small">
							<small > Upload Gambar dengan format: png, jpg, jpeg, atau pdf dengan maximal size: 2mb.</small>
						</div>
							</div>

						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="ijazah2">
									Ijazah Halaman Belakang / Surat Keterangan Lulus Sementara
								</label>
								<br>
								<input type="file" name="ijazah2"
								class="form-control form-control-white" id="ijazah2">
								<div class="form-group-small">
							<small > Upload Gambar dengan format: png, jpg, jpeg, atau pdf dengan maximal size: 2mb.</small>
						</div>
							</div>

						</div>

						<div>
							<h3 class="text-uppercase">Riwayat Pekerjaan</h3>
						</div>
						<div class="row">
						<div class="col-md">
									<div class="form-group">
										<label for="sts_kerja">
											Status Pekerjaan
										</label>

										<select name="sts_kerja" id="sts_kerja" class="form-control" onchange="tampilkan()">
											<option>--Pilih--</option>
												<option value="Bekerja">Bekerja</option>
												<option value="Belum Bekerja">Belum Bekerja</option>
										</select>
										<script type="text/javascript">

										function tampilkan(){
										  var sts_kerja=document.getElementById("register").sts_kerja.value;
										  if (sts_kerja=="Bekerja")
										    {
										       	 $('#tmp_kerja').show();
										         $('#mulai').show();
										         $('#tmp').show();
										         $('#selesai').show();
										         $('#pekerjaan').show();
										         $('#tmp2').show();
										         $('#tmp3').show();
										         $('#tmp4').show();
										    }
										  else if (sts_kerja=="Belum Bekerja")
										    {
										         $('#tmp_kerja').hide();
										         $('#tmp').hide();
										         $('#mulai').hide();
										         $('#selesai').hide();
										         $('#pekerjaan').hide();
										         $('#tmp2').hide();
										         $('#tmp3').hide();
										         $('#tmp4').hide();

										    }
										}
										</script>
										
									</div>						
								</div>
							</div>
						<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tmp_kerja" id="tmp">
											Tempat Kerja
										</label>
										<input type="text" name="tmp_kerja" id="tmp_kerja" maxlength="50" placeholder="Masukkan Nama Tempat Bekerja" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="pekerjaan" id="tmp2">
											Perkerjaan
										</label>
										<input maxlength="30" type="text" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Perkerjaan" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_mulai" id="tmp3">
											Tanggal Mulai
										</label>
										<input type="date" name="tgl_mulai" id="mulai" maxlength="50" placeholder="" class="form-control ">
									</div>						
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="tgl_selesai" id="tmp4">
											Tanggal Selesai
										</label>
										<input maxlength="30" type="date" name="tgl_selesai" id="selesai" placeholder="" class="form-control">
									</div>
								</div>
							</div>
						
						
					
					</div>
							<br>
							<div class="flex justify">
								<button id="submit" type="submit" class="btn btn-register mb">
									Daftar
								</button>
								
							</div>

								<a href="index.php"><h5>Kembali Ke Login....</h5></a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>