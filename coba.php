<?php
echo 'Waktu sekarang: ' . date('Y-m-d H:i:s') . '<br/>';
echo '1 menit kedepan: ' . date('Y-m-d H:i:s', time() + 60*15) . '<br/>';
echo '1 jam kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60)) . '<br/>';
echo '1 hari kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60 * 24)) . '<br/>';
echo '7 hari kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 7)) . '<br/>';
https://jagowebdev.com/fungsi-time-strtotime-mktime-pada-php/
$jam1 = date('Y-m-d H:i:s');
$jam2= date('Y-m-d H:i:s',time()+(60*20));
$jam4= date('2019-11-24 23:28:48',date('Y-m-d H:i:s'));
$jam3 = strtotime($jam4) - strtotime($jam1);
echo $jam1;
echo "<br>";
echo $jam2;
echo "<br>";
echo $jam3;
echo $jam4;

$jawaban = "a,b,a,c";
$arr_kata = explode (",", $jawaban);
$arr_kata2 = explode (" ", $string, 2);


$ar = count($_POST['array']);
$ar2= $_POST['array[]'];

?>
<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
	<form action="#" method="post" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload">
	</form>
<?php
	$nama_ktp = $_FILES['file']['name'];
	$ktp = $_FILES['file']['tmp_name'];
	move_uploaded_file($file_tmp, 'assets/img/upload/'.$nama);
?>
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
			<a href="" class="btn btn-warning">Ubah Pasword<a/>
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
										<select name="jekel" id="jekel" class="form-control" value="<?php echo $data['jekel']; ?>">
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


	<link rel=stylesheet type=text/css href=isi.css>
	<main id="content" class="pad">
		<header class="title-content">
			
			
		</header>
	</main>

</body>
</html>
