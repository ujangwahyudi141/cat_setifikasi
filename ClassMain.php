<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	
</head>
<body>
	<?php 
	require_once 'ClassAdmin.php';
	require_once 'ClassUser.php';
	session_start();
	
		class Main{
			function FormLogin(){
				echo "<link rel=stylesheet type=text/css href=assets/css/login.css>
		<div class='container'>
			<div class='col'>
				<form  action='login.php' method='post' name='f1' id='f_login' onsubmit='/*returnlogin();*/'>
					<div class='panel panel-default top150'>
						<div class='panel-heading'>
							<h4 style='margin:5px'>
								Login Aplikasi
							</h4>
						</div>
						<div class='panel-body'>
							<div id='konfirmasi'></div>
							<div class='input-group top col'>
								<span class='input-group-addon'>U</span>
								<input class='form-control' type='text' name='username' id='username' autofocus value placeholder='  Username'>
							</div>
							<div class='input-group top mid col'>
								<span class='input-group-addon'>P</span>
								<input class='form-control' type='password' name='password' id='password' value placeholder='  Password'>
							</div>
							<div class='login_actions col'>
							
								<button type='submit' class='button btn btn-default large top col bot btn-login'>LOGIN</button>
							
							</div>
							<div class='login_actions col'>
								<a href='daftar.php' class='button btn btn-default large top col bot btn-daftar'>DAFTAR</a>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>";
				
			}
			function HalamanUtama(){
				echo "<link rel='stylesheet' type='text/css' href='assets/css/main.css'>";
			echo"			<div id='wrapper'>
			<header id='header'>
				<div class='row no-gutters'>
					<div class='col-md-auto align-self-md-center'>
						<div class='logo text-center'>
							<img src='assets/img/logo2.png'>
						</div>
					</div>
					<div class='col-md'>
						<form>
							<div class='search-form ml-3'>
								<div class='search-form-icon align-self-center'>
									<i class='bx bx-search'>
										<img src='assets/img/search2.png'>
									</i>
								</div>
								<div class='search-form-input'>
									<input value type='text' name='q' id='search' 
									class='form-control' placeholder='Pencarian..''>
								</div>
							</div>
						</form>
					</div>
					<div class='col-md-auto align-self-md-center'>
						<div class='pl-3 pr-5'>
							<a href='profil.php' target='isicontent' class='btn btn-link btn-daftar mr-3'>Profil</a>
							<a href='logout.php' class='btn btn-outline-primary btn-login'>Logout</a>
						</div>
					</div>
				</div>
			</header>
			<aside id='sidebar' style='top: 65px;'>
				<nav class='menu-sidebar mt'>
					<ul>
						<li>
							<span>Pelatihan</span>
						</li>
						<li /*class='active'*/>
							<a href='jadwal_pelatihan.php' target='isicontent'>Jadwal Pelatihan</a>
						</li>
						<li>
							<a href='program_pelatihan.php' target='isicontent'>Program Pelatihan</a>
						</li>
						<li>";
						$akses = new Akses;
						$akses->Cek();
						if($_SESSION['tipe'] == 'admin')
						{
							
						echo "<span>Area Admin</span>
						</li>
						<li>
							<a href='kelola_soal.php' target='isicontent'>Kelola Soal</a>
							
						</li>
						<li>
							<a href='kelola_tes.php' target='isicontent'>Kelola Tes</a>
						</li>
						<li>
							<a href='kelola_program.php' target='isicontent'>Kelola Program</a>
						</li>
						<li>
							<a href='kelola_hasil_tes.php' target='isicontent'>Kelola Hasil Tes</a>
						</li>";
						
						}
						else
						{
						echo "<span>Area Peserta</span>
						</li>
						<li>
							<a href='pelatihan_peserta.php' target='isicontent'>Pelatihan Saya</a>
						</li>
						<li>
							<a href='riwayat_pelatihan.php' target='isicontent'>Riwayat Daftar Pelatihan</a>
						</li>";	
					
						}

						echo "
							
					</ul>
				</nav>
			</aside>
			<div >
				<iframe src='jadwal_pelatihan.php' name='isicontent' id='content' >
				
			</iframe>
			</div>
		</div>";
			}
			

			function FormSoal()
			{
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Tambah Soal</h3>
				</header>
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead >
								<form name='form' method='POST' action='simpan_soal.php'>
								<tr >
									<td>Id Soal </td><td><input type='text' name='id_soal'></td>
								</tr>
								<tr >
									<td>Nama Soal </td><td><input type='text' name='nama_soal'></td>
								</tr>
								<tr >
									<td>Jumlah Soal </td><td><input type='text' name='jml_soal'></td>
								</tr>
								<tr >
									<td>Minimal Benar </td><td><input type='text' name='minimal_benar'></td>
								</tr>
								<tr >
									<td>Total Niali </td><td><input type='text' name='total_nilai'></td>
								</tr>
								<tr >
									<td>Passing Grade </td><td><input type='text' name='passing_grade'></td>
								</tr>
								<tr>
									<td><input type='submit' name='' value='Simpan'></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";
		
			}

			function FormUbahSoal(){
				
				
				$this->koneksi = new Akses(); 
				$this->id_soal=$_GET['kode'];

				$ambildata = mysqli_query($this->koneksi->link,"select * from soal where id_soal = '".$this->id_soal."'");
				$data=mysqli_fetch_array($ambildata);
				
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>";
				echo '
					<h3 class="text-uppercas"e>Ubah Data Soal '.$data['nama_soal'].' </h3>
				</header>';
				echo "
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead align='center'>
								<form name='form' method='POST' action='simpan_ubah_soal.php'>
								<tr >";

								echo '	<td>Id Soal </td><td><input type="text" name="id_soal" value ="'.$data['id_soal'].'" ></td>';
							echo '	</tr>
								<tr >
									<td>Nama Soal </td><td><input type="text" name="nama_soal" value ="'.$data['nama_soal'].'"></td>
								</tr>
								<tr >
									<td>Jumlah Soal </td><td><input type=text name=jml_soal value ="'.$data['jml_soal'].'"></td>
								</tr>
								<tr >
									<td>Minimal Benar </td><td><input type=text name=minimal_benar value ="'.$data['minimal_benar'].'"></td>
								</tr>
								<tr >
									<td>Total Niali </td><td><input type=text name=total_nilai value ="'.$data['total_nilai'].'"></td>
								</tr>
								<tr >
									<td>Passing Grade </td><td><input type=text name=passing_grade value ="'.$data['passing_grade'].'"></td>
								</tr>
								<tr>
									<td><input type=submit name= value=Simpan></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		';
			}
			function FormHapusSoal() 
			{
				echo "<body onload = 'return hapusSoal()';>";
				$id = $_GET['kode'];
				echo "<form name=delete method=GET>";
				echo "<input type=hidden value='$id' name=a>";
				echo "</body>";
			}

			function FormPertanyaan()
			{
				
				$this->id_soal = $_GET['kode'];
				
				$this->koneksi = new Akses(); // Memanggil class Akse
				$carikode = mysqli_query($this->koneksi->link,"select max(id_pertanyaan) from pertanyaan ");
				$datakode = mysqli_fetch_array($carikode);
				if ($datakode)
				{
		   			$nilaikode = substr($datakode[0]);
		   			// menjadikan $nilaikode ( int )
		   			$kode = (int) $datakode[0];
		   			// setiap $kode di tambah 1
		   			$kode2 = $kode + 1;
		   			$kode_otomatis = $this->id_soal.str_pad($kode, 0,  STR_PAD_LEFT);
		  		}
		  		else
		  		{
		   			//$kode_otomatis = "AR001";
		  		}
		  		
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
			<form name='form' method='POST' action=simpan_pertanyaan.php>
				<header class='title-content'>
					<h3 class='text-uppercase'>Tambah Soal ID
				<input type='text' name='id_soal' value=$this->id_soal></h3>
				</header>
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead align='center'>
							<label>Pertanyaan <input type='text' name='id_pertanyaan' class='form-control' 
							value=$kode2></label>
							<textarea id='editor1' name='pertanyaan' rows='10' cols='80' required></textarea>
								<div class='form-group'>
					            <label>Pilihan A</label>
					            <input type='text' name='option_1' class='form-control' required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan B</label>
					            <input type='text' name='option_2' class='form-control' required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan C</label>
					            <input type='text' name='option_3' class='form-control' required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan D</label>
					            <input type='text' name='option_4' class='form-control' required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan E</label>
					            <input type='text' name='option_5' class='form-control' required>
					          </div>
					          <div class='form-group'>
					            <label>Jawaban Pertanyaan</label>
					            <select class='form-control select2' name='jawaban' style='width: 100%;' required>
					              <option selected='selected' value=''>--- Pilih ---</option>
					              <option value='A'>Pilihan A</option>
					              <option value='B'>Pilihan B</option>
					              <option value='C'>Pilihan C</option>
					              <option value='D'>Pilihan D</option>
					              <option value='E'>Pilihan E</option>
					            </select>
					          </div>
					          <br>
					          <div>

					          <input type='submit' value='simpan'>
					          </div>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";
		
			}
			function FormUbahPertanyaan(){
				
				require_once 'ClassUser.php';
				$this->koneksi = new Akses(); 
				$this->id_pertanyaan=$_GET['kode'];

				$ambildata = mysqli_query($this->koneksi->link,"select * from pertanyaan where id_pertanyaan = '".$this->id_pertanyaan."'");
				$data=mysqli_fetch_array($ambildata);
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
			<form name='form' method='POST' action=simpan_ubah_pertanyaan.php>
				<header class='title-content'>
					<h3 class='text-uppercase'>Tambah Soal ID
				<input type='text' name='id_soal' value=$data[id_soal]></h3>
				</header>
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead align='center'>
							<label>Pertanyaan <input type='text' name='id_pertanyaan' class='form-control' value=$data[id_pertanyaan]></label>
							<textarea id='editor1' name='pertanyaan' rows='10' cols='80'  required>$data[pertanyaan]</textarea>
								<div class='form-group'>
					            <label>Pilihan A</label>
					            <input type='text' name='option_1' class='form-control' value=$data[option_1]  required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan B</label>
					            <input type='text' name='option_2' class='form-control' value=$data[option_2] required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan C</label>
					            <input type='text' name='option_3' class='form-control' value=$data[option_3] required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan D</label>
					            <input type='text' name='option_4' class='form-control' value=$data[option_4] required>
					          </div>
					          <div class='form-group'>
					            <label>Pilihan E</label>
					            <input type='text' name='option_5' class='form-control' value=$data[option_5] required>
					          </div>
					          <div class='form-group'>
					            <label>Jawaban Pertanyaan</label>
					            <select class='form-control select2' name='jawaban' style='width: 100%;' required>
					           
					              <option selected='selected' value=$data[jawaban]>Pilihan $data[jawaban]</option>
					              <option value='A'>Pilihan A</option>
					              <option value='B'>Pilihan B</option>
					              <option value='C'>Pilihan C</option>
					              <option value='D'>Pilihan D</option>
					              <option value='E'>Pilihan E</option>
					            </select>
					          </div>
					          <br>
					          <div>

					          <input type='submit' value='simpan'>
					          </div>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";


				
			}

			function FormHapusPertanyaan() 
			{
				echo "<body onload = 'return hapusPertanyaan()';>";
				$id = $_GET['kode'];
				echo "<form name=delete method=GET>";
				echo "<input type=hidden value='$id' name=a>";
				echo "</body>";
			}

			function FormProgram()
			{
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Tambah Program Pelatihan</h3>
				</header>
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead >
								<form name='form' method='POST' action='simpan_program.php'>
								<tr >
									<td>kode Pelatihan </td><td><input type='text' name='kd_pelatihan'></td>
								</tr>
								<tr >
									<td>Judul Pelatihan </td><td><input type='text' name='judul_pelatihan'></td>
								</tr>
								<tr >
									<td>Status </td><td><input type='text' name='sts'></td>
								</tr>
								<tr >
									<td>Tgl Buka Pendaftaran </td><td><input type='date' name='tgl_buka'></td>
								</tr>
								<tr >
									<td>Tgl Tutup Pendaftaran </td><td><input type='date' name='tgl_tutup'></td>
								</tr>
								<tr >
									<td>Tgl Pelaksanaan Pelatihan </td><td><input type='date' name='tgl_pelaksanaan'></td>
								</tr>
								<tr >
									<td>Tgl Selesai Pelatihan </td><td><input type='date' name='tgl_selesai'></td>
								</tr>
								<tr >
									<td>Gelimbang ke- </td><td><input type='text' name='gelombang'></td>
								</tr>
								<tr >
									<td>Id Soal </td><td><input type='text' name='id_soal'></td>
								</tr>
								<tr >
									<td>Waktu Pengerjaan </td><td><input type='text' name='waktu'></td>
								</tr>
								<tr>

									<td><input type='submit' name='' value='Simpan'></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";
		
			}

			function FormUbahProgram(){
				
				
				$this->koneksi = new Akses(); 
				$this->kd_pelatihan=$_GET['kode'];

				$ambildata = mysqli_query($this->koneksi->link,"select * from d_pelatihan where kd_pelatihan = '".$this->kd_pelatihan."'");
				$data=mysqli_fetch_array($ambildata);
				
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>";
				echo '
					<h3 class="text-uppercas"e>Ubah Data Program Pelatihan '.$data['judul_pelatihan'].' </h3>
				</header>';
				echo "
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead >
								<form name='form' method='POST' action='simpan_ubah_program.php'>
								<tr >";

								echo '	<td>Kode Program </td><td><input type="text" name="kd_pelatihan" value ="'.$data['kd_pelatihan'].'" ></td>';
							echo '	</tr>
								<tr >
									<td>Judul Pelatihan </td><td><input type="text" name="judul_pelatihan" value ="'.$data['judul_pelatihan'].'"></td>
								</tr>
								<tr >
									<td>Status </td><td><input type=text name=sts value ="'.$data['sts'].'"></td>
								</tr>
								<tr >
									<td>Tanggal Buka Pendaftaran </td><td><input type=date name=tgl_buka value ="'.$data['tgl_buka'].'"></td>
								</tr>
								<tr >
									<td>Tanggal Tutup Pendaftaran </td><td><input type=date name=tgl_tutup value ="'.$data['tgl_tutup'].'"></td>
								</tr>
								<tr >
									<td>Tanggal Pelaksanaan </td><td><input type=date name=tgl_pelaksanaan value ="'.$data['tgl_pelaksanaan'].'"></td>
								</tr>
								<tr >
									<td>Tanggal Selesai </td><td><input type=date name=tgl_selesai value ="'.$data['tgl_selesai'].'"></td>
								</tr>
								<tr >
									<td>Gelombang </td><td><input type=text name=gelombang value ="'.$data['gelombang'].'"></td>
								</tr>
								<tr >
									<td>Lokasi </td><td><input type=text name=lokasi value ="'.$data['lokasi'].'"></td>
								</tr>
								<tr>
									<td><input type=submit name= value=Simpan></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		';
			}

			function FormHapusProgram() 
			{
				echo "<body onload = 'return hapusProgram()';>";
				$id = $_GET['kode'];
				echo "<form name=delete method=GET>";
				echo "<input type=hidden value='$id' name=a>";
				echo "</body>";
			}

			function FormDesk()
			{
				  		
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Tambah Deskripsi</h3>
				</header>
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead >
								<form name='form' method='POST' action='simpan_desk.php'>
								<tr >
									<td>Id Deskripsi </td><td><input type='text' name='id_desk'></td>
								</tr>
								<tr >
									<td>Kode Pelatihan</td><td><input type='text' name='kd_pelatihan'></td>
								</tr>
								<tr >
									<td>Deskripsi </td><td><input type='text' name='desk'></td>
								</tr>
								<tr>
									<td><input type='submit' name='' value='Simpan'></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";
		
			}

			function FormUbahDesk(){
				
				
				$this->koneksi = new Akses(); 
				$this->id_desk=$_GET['kode'];

				$ambildata = mysqli_query($this->koneksi->link,"select * from desk_program where id_desk = '".$this->id_desk."'");
				$data=mysqli_fetch_array($ambildata);
				
				echo "
			<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>";
				echo '
					<h3 class="text-uppercas"e>Ubah Data Deskripsi </h3>
				</header>';
				echo "
				
				<div id='datatable' class='datatable card p' style='display: inline-flex;'>
					
					<table class='table no-footer' >
							<thead align='center'>
								<form name='form' method='POST' action='simpan_ubah_desk.php'>
								<tr >";

								echo '	<td>Id Deskripsi </td><td><input type="text" name="id_desk" value ="'.$data['id_desk'].'" ></td>';
							echo '	</tr>
								<tr >
									<td>Kode Pelatihan </td><td><input type="text" name="kd_pelatihan" value ="'.$data['kd_pelatihan'].'"></td>
								</tr>
								<tr >
									<td>Deskripsi </td><td><input type=text name=desk value ="'.$data['desk'].'"></td>
								</tr>
								
								<tr>
									<td><input type=submit name= value=Simpan></td><td></td>
								</tr>
								</form>
							<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		';
			}
			function FormHapusDesk() 
			{
			
				echo "<body onload = 'return hapusDesk()';>";
				$id = $_GET['kode'];
				echo "<form name=delete method=GET>";
				echo "<input type=hidden value='$id' name=a>";
				echo "</body>";
			}

			


		}
	

	 ?>

</body>
</html>