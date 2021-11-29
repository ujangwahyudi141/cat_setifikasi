<?php
	require_once "ClassUser.php";
	require_once "ClassMain.php";

class Admin extends User
{
	
	function lihatSoal()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Soal</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					<a href='tambah_soal.php' target='isicontent'><input type='button' name=''value='Tambah Soal'></a>
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Id Soal</th><th>Nama Soal</th><th>Jumlah Soal</th><th>Minimal Benar</th><th>Total Nilai</th><th>Passing Grade</th><th>Opsi</th>
								</tr>
							</thead>";

										$db =mysqli_query($this->koneksi->link,'select *from soal');
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($db);
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[id_soal]</p></td>
													<td><p class='arial'>$data[nama_soal]</p></td>
													<td><p class='arial'>$data[jml_soal]</p></td>
													<td><p class='arial'>$data[minimal_benar]</p></td>
													<td><p class='arial'>$data[total_nilai]</p></td>
													<td><p class='arial'>$data[passing_grade]</p></td>
													<td><p class='arial'>
													<a href='kelola_pertanyaan.php?kode=$data[id_soal]' target='isicontent' >Input</a>-
													<a href='form_ubah_soal.php?kode=$data[id_soal]'  target='isicontent'>Edit</a>-
													<a href='konfirmasi_hapus_soal.php?kode=$data[id_soal]'  >Hapus</a></td>
													
												</tr>";
										}

							echo "<tbody>
													
							</tbody>
					</table>		
				</div>
			</main>
		</body>
		";

	}

	function tambahSoal()
	{
		
		$this->id_soal=$_POST['id_soal'];
		$this->nama_soal=$_POST['nama_soal'];
		$this->jml_soal=$_POST['jml_soal'];
		$this->minimal_benar=$_POST['minimal_benar'];
		$this->total_nilai=$_POST['jml_soal'] * 5;
		$this->passing_grade=$_POST['minimal_benar']*5;

		
		$simpan = mysqli_query($this->koneksi->link,"insert into soal values('".$this->id_soal."', '".$this->nama_soal."', '".$this->jml_soal."','".$this->minimal_benar."', '".$this->total_nilai."', '".$this->passing_grade."')");

		if(!$simpan)
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Disimpan');</script>";
			echo "<script>window.location.href = 'kelola_soal.php';</script>";
		}
	}

	function simpanubahSoal()
	{
		$this->id_soal=$_POST['id_soal'];
		$this->nama_soal=$_POST['nama_soal'];
		$this->jml_soal=$_POST['jml_soal'];
		$this->minimal_benar=$_POST['minimal_benar'];
		$this->total_nilai=$_POST['jml_soal'] * 5;
		$this->passing_grade=$_POST['minimal_benar']*5;

		$ubah = mysqli_query($this->koneksi->link,"update soal set id_soal= '".$this->id_soal."',nama_soal= '".$this->nama_soal."',jml_soal= '".$this->jml_soal."',minimal_benar= '".$this->minimal_benar."',total_nilai= '".$this->total_nilai."',passing_grade= '".$this->passing_grade."' where id_soal='".$this->id_soal."'");

		if(!$ubah)
		{
			echo "<script>alert('Data Gagal Diperbarui');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Diperbarui');</script>";
			echo "<script>document.location.href = 'kelola_soal.php';</script>";
		}
	}
	function HapusSoal()
	{
		$this->id_soal=$_GET['kode'];
		$hapus = mysqli_query($this->koneksi->link,"delete from soal where id_soal = '".$this->id_soal
			."'");
		if(!$hapus)
		{
			echo "<script>alert('Data Gagal Dihapus');</script>";
			echo "<script> document.location.href ='kelola_soal.php'; </script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Dihapus');</script>";
			echo "<script> document.location.href ='kelola_soal.php'; </script>";
		}
	}

	function lihatPertanyaan()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Pertanyaan</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Id Pertanyaan</th><th>Id Soal</th><th>Pertanyaan</th><th>Option 1</th><th>Option 2</th><th>Option 3</th><th>Option 4</th><th>Option 5</th><th>Jawaban</th><th>Opsi</th>
								</tr>
							</thead>";
										$this->id_soal=$_GET['kode'];

										$db =mysqli_query($this->koneksi->link,"select *from pertanyaan where id_soal='".$this->id_soal."'");
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($db);
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[id_pertanyaan]</p></td>
													<td><p class='arial' name='id_soal2'>$data[id_soal]</p></td>
													<td><p class='arial'>$data[pertanyaan]</p></td>
													<td><p class='arial'>$data[option_1]</p></td>
													<td><p class='arial'>$data[option_2]</p></td>
													<td><p class='arial'>$data[option_3]</p></td>
													<td><p class='arial'>$data[option_4]</p></td>
													<td><p class='arial'>$data[option_5]</p></td>
													<td><p class='arial'>$data[jawaban]</p></td>
													<td><p class='arial'>
													<a href='form_ubah_pertanyaan.php?kode=$data[id_pertanyaan]'  >Edit</a>-
													<a href='konfirmasi_hapus_pertanyaan.php?kode=$data[id_pertanyaan]'  >Hapus</a></td>
													
												</tr>";
										}

							echo "<tbody>
							
													
							</tbody>
					</table>";
					echo"
					<a href='tambah_pertanyaan.php?kode=$this->id_soal'><input type='button' name=''value='Tambah Pertanyaan'></a>

				</div>
			</main>
		</body>
		";

	}

	function tambahPertanyaan()
	{
		$this->id_pertanyaan=$_POST['id_pertanyaan'];
		$this->id_soal=$_POST['id_soal'];
		$this->pertanyaan=$_POST['pertanyaan'];
		$this->option_1=$_POST['option_1'];
		$this->option_2=$_POST['option_2'];
		$this->option_3=$_POST['option_3'];
		$this->option_4=$_POST['option_4'];
		$this->option_5=$_POST['option_5'];
		$this->jawaban=$_POST['jawaban'];

		
		
		$simpan = mysqli_query($this->koneksi->link,"insert into pertanyaan values('".$this->id_pertanyaan."', '".$this->id_soal."', '".$this->pertanyaan."','".$this->option_1."', '".$this->option_2."', '".$this->option_3."', '".$this->option_4."', '".$this->option_5."', '".$this->jawaban."')");

		if(!$simpan)
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Disimpan');</script>";
			echo "<script>window.location.href = 'kelola_soal.php';</script>";
		}
	}

	function simpanubahPertanyaan()
	{
		$this->id_pertanyaan=$_POST['id_pertanyaan'];
		$this->id_soal=$_POST['id_soal'];
		$this->pertanyaan=$_POST['pertanyaan'];
		$this->option_1=$_POST['option_1'];
		$this->option_2=$_POST['option_2'];
		$this->option_3=$_POST['option_3'];
		$this->option_4=$_POST['option_4'];
		$this->option_5=$_POST['option_5'];
		$this->jawaban=$_POST['jawaban'];


		$ubah = mysqli_query($this->koneksi->link,"update pertanyaan set id_pertanyaan= '".$this->id_pertanyaan."',id_soal= '".$this->id_soal."',pertanyaan= '".$this->pertanyaan."',option_1= '".$this->option_1."',option_2= '".$this->option_2."',option_3= '".$this->option_3."',option_4= '".$this->option_4."',option_5= '".$this->option_5."',jawaban= '".$this->jawaban."' where id_pertanyaan='".$this->id_pertanyaan."'");

		if(!$ubah)
		{
			echo '<script>alert($this->id_pertanyaan);</script>';
			echo "<script>alert('Data Gagal Diperbaruii');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			
			echo "<script>alert('Data Berhasil Diperbarui');</script>";
			echo "<script>document.location.href = 'kelola_soal.php';</script>";
		}
	}

	function HapusPertanyaan()
	{
		$this->id_pertanyaan=$_GET['kode'];
		$hapus = mysqli_query($this->koneksi->link,"delete from pertanyaan where id_pertanyaan = '".$this->id_pertanyaan
			."'");
		if(!$hapus)
		{
			echo "<script>alert('Data Gagal Dihapus');</script>";
			echo "<script> document.location.href ='kelola_pertanyaan.php'; </script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Dihapus');</script>";
			echo "<script> document.location.href ='kelola_pertanyaan.php'; </script>";
		}
	}

	function lihatProgram()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Program Pelatihan</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Kode Pelatihan</th><th>Judul Pelatihan</th><th>Status</th><th>Tgl Buka Pendaftaran</th><th>Tgl Tutup Pendaftaran</th><th>Tgl Pelaksanaan</th><th>Tgl Selesai</th><th>Gelombang</th><th>Waktu Pengerjaan</th><th>Opsi</th>
								</tr>
							</thead>";

										$db =mysqli_query($this->koneksi->link,'select *from d_pelatihan');
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($db);
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[kd_pelatihan]</p></td>
													<td><p class='arial'>$data[judul_pelatihan]</p></td>
													<td><p class='arial'>$data[sts]</p></td>
													<td><p class='arial'>$data[tgl_buka]</p></td>
													<td><p class='arial'>$data[tgl_tutup]</p></td>
													<td><p class='arial'>$data[tgl_pelaksanaan]</p></td>
													<td><p class='arial'>$data[tgl_selesai]</p></td>
													<td><p class='arial'>Gel ke-$data[gelombang]</p></td>
													<td><p class='arial'>$data[waktu_pengerjaan] menit</p></td>
													<td><p class='arial'>
													<a href='kelola_desk.php?kode=$data[kd_pelatihan]' target='isicontent' >Deskripsi</a>-
													<a href='form_ubah_program.php?kode=$data[kd_pelatihan]'  target='isicontent'>Edit</a>-
													<a href='konfirmasi_hapus_program.php?kode=$data[kd_pelatihan]'  >Hapus</a></td>
													
												</tr>";
										}

							echo "<tbody>
													
							</tbody>
					</table>	
					<a href='tambah_program.php' target='isicontent'><input type='button' name=''value='Tambah Program Pelatihan'></a>	
				</div>
			</main>
		</body>
		";

	}

	function tambahProgram()
	{
		$this->kd_pelatihan=$_POST['kd_pelatihan'];
		$this->judul_pelatihan=$_POST['judul_pelatihan'];
		$this->sts=$_POST['sts'];
		$this->tgl_buka=$_POST['tgl_buka'];
		$this->tgl_tutup=$_POST['tgl_tutup'];
		$this->tgl_pelaksanaan=$_POST['tgl_pelaksanaan'];
		$this->tgl_selesai=$_POST['tgl_selesai'];
		$this->gelombang=$_POST['gelombang'];
		$this->id_soal=$_POST['id_soal'];
		$this->waktu=$_POST['waktu'];

		
		
		$simpan = mysqli_query($this->koneksi->link,"insert into d_pelatihan values('".$this->kd_pelatihan."', '".$this->judul_pelatihan."', '".$this->sts."','".$this->tgl_buka."', '".$this->tgl_tutup."', '".$this->tgl_pelaksanaan."', '".$this->tgl_selesai."', '".$this->gelombang."', '".$this->id_soal."', '".$this->waktu."')");

		if(!$simpan)
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Disimpan');</script>";
			echo "<script>window.location.href = 'kelola_program.php';</script>";
		}
	}

	function simpanubahProgram()
	{
		$this->kd_pelatihan=$_POST['kd_pelatihan'];
		$this->judul_pelatihan=$_POST['judul_pelatihan'];
		$this->sts=$_POST['sts'];
		$this->tgl_buka=$_POST['tgl_buka'];
		$this->tgl_tutup=$_POST['tgl_tutup'];
		$this->tgl_pelaksanaan=$_POST['tgl_pelaksanaan'];
		$this->tgl_selesai=$_POST['tgl_selesai'];
		$this->gelombang=$_POST['gelombang'];
		$this->lokasi=$_POST['lokasi'];

		$ubah = mysqli_query($this->koneksi->link,"update d_pelatihan set kd_pelatihan= '".$this->kd_pelatihan."',judul_pelatihan= '".$this->judul_pelatihan."',tgl_buka= '".$this->tgl_buka."',tgl_tutup= '".$this->tgl_tutup."',tgl_pelaksanaan= '".$this->tgl_pelaksanaan."',tgl_selesai= '".$this->tgl_selesai."',gelombang= '".$this->gelombang."',lokasi= '".$this->lokasi."' where kd_pelatihan='".$this->kd_pelatihan."'");

		if(!$ubah)
		{
			echo "<script>alert('Data Gagal Diperbarui');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Diperbarui');</script>";
			echo "<script>document.location.href = 'kelola_program.php';</script>";
		}
	}

	function HapusProgram()
	{
		$this->kd_pelatihan=$_GET['kode'];
		$hapus = mysqli_query($this->koneksi->link,"delete from d_pelatihan where kd_pelatihan = '".$this->kd_pelatihan
			."'");
		if(!$hapus)
		{
			echo "<script>alert('Data Gagal Dihapus');</script>";
			echo "<script> document.location.href ='kelola_program.php'; </script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Dihapus');</script>";
			echo "<script> document.location.href ='kelola_program.php'; </script>";
		}
	}
	function lihatDesk()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Soal</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Id Deskripsi</th><th>Kode Pelatihan</th><th>Deskripsi</th><th>Opsi</th>
								</tr>
							</thead>";

										$db =mysqli_query($this->koneksi->link,'select *from desk_program');
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($db);
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[id_desk]</p></td>
													<td><p class='arial'>$data[kd_pelatihan]</p></td>
													<td><p class='arial'>$data[desk]</p></td>
													<td><p class='arial'>
													<a href='form_ubah_desk.php?kode=$data[id_desk]'  target='isicontent'>Edit</a>-
													<a href='konfirmasi_hapus_desk.php?kode=$data[id_desk]'  >Hapus</a></td>
													
												</tr>";
										}

							echo "<tbody>
													
							</tbody>
					</table>	
					<a href='tambah_desk.php' target='isicontent'><input type='button' name=''value='Tambah Soal'></a>	
				</div>
			</main>
		</body>
		";

	}

	function tambahDesk()
	{
		
		$this->id_desk=$_POST['id_desk'];
		$this->kd_pelatihan=$_POST['kd_pelatihan'];
		$this->desk=$_POST['desk'];
	

		
		$simpan = mysqli_query($this->koneksi->link,"insert into desk_program values('".$this->id_desk."', '".$this->kd_pelatihan."', '".$this->desk."')");

		if(!$simpan)
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Disimpan');</script>";
			echo "<script>window.location.href = 'kelola_desk.php';</script>";
		}
	}

	function simpanubahDesk()
	{
		$this->id_desk=$_POST['id_desk'];
		$this->kd_pelatihan=$_POST['kd_pelatihan'];
		$this->desk=$_POST['desk'];

		$ubah = mysqli_query($this->koneksi->link,"update desk_program set id_desk= '".$this->id_desk."',kd_pelatihan= '".$this->kd_pelatihan."',desk= '".$this->desk."' where id_desk='".$this->id_desk."'");

		if(!$ubah)
		{
			echo "<script>alert('Data Gagal Diperbarui');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Diperbarui');</script>";
			echo "<script>document.location.href = 'kelola_desk.php';</script>";
		}
	}

	function HapusDesk()
	{
		$this->id_desk=$_GET['kode'];
		$hapus = mysqli_query($this->koneksi->link,"delete from desk_program where id_desk = '".$this->id_desk
			."'");
		if(!$hapus)
		{
			echo "<script>alert('Data Gagal Dihapus');</script>";
			echo "<script> document.location.href ='kelola_desk.php'; </script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Dihapus');</script>";
			echo "<script> document.location.href ='kelola_desk.php'; </script>";
		}
	}
	function lihatTes()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Tes</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Kode Pelatihan</th><th>Progeam Pelatihan</th><th>Kode Peserta</th><th>Nama Peserta</th><th>Tgl Daftar Tes</th><th>Keterangan</th>
								</tr>
							</thead>";

										$db =mysqli_query($this->koneksi->link,"select peserta_pelatihan.kd_pelatihan, peserta_pelatihan.kd_peserta, d_pelatihan.judul_pelatihan, peserta.nama,peserta_pelatihan.tgl_daftar, peserta_pelatihan.ket from peserta_pelatihan,d_pelatihan,peserta where peserta_pelatihan.kd_pelatihan = d_pelatihan.kd_pelatihan and peserta_pelatihan.kd_peserta=peserta.kd_peserta and (peserta_pelatihan.ket='tunggu' or peserta_pelatihan.ket='mulai' )");
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<=$baris;$i++)
										{
											$data = mysqli_fetch_array($db);
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[kd_pelatihan]</p></td>
													<td><p class='arial'>$data[judul_pelatihan]</p></td>
													<td><p class='arial'>$data[kd_peserta]</p></td>
													<td><p class='arial'>$data[nama]</p></td>
													<td><p class='arial'>$data[tgl_daftar]</p></td>
													<td><p class='arial'>$data[ket]</p></td>
													
													
												</tr>";
										}

							echo "<tbody>
													
							</tbody>
					</table>	
					
				</div>
			</main>
		</body>
		";

	}
	function lihatHasilTes()
	{

	echo "
		<body>

			<link rel=stylesheet type=text/css href=isi.css >
			<main id='content' class='pad'>
				<header class='title-content'>
					<h3 class='text-uppercase'>Kelola Tes</h3>
				</header>
				
				<div id='datatable' class='datatable card p'>
					
					<table class='table no-footer'>
							<thead>
								<tr align='center'>
									<th>No.</th><th>Kode Pelatihan</th><th>Progeam Pelatihan</th><th>Kode Peserta</th><th>Nama Peserta</th><th>Tgl Daftar Tes</th><th>Nilai Tes</th><th>Passing Grade</th><th>Keterangan</th><th>Konfirmasi</th>
								</tr>
							</thead>";

										$db =mysqli_query($this->koneksi->link,"select peserta_pelatihan.kd_pelatihan, peserta_pelatihan.kd_peserta, d_pelatihan.judul_pelatihan, peserta.nama ,peserta_pelatihan.kd_pespel,peserta_pelatihan.tgl_daftar, peserta_pelatihan.ket ,jawaban.j_benar , soal.passing_grade

											from peserta_pelatihan,d_pelatihan,peserta , jawaban, soal

											where peserta_pelatihan.kd_peserta=jawaban.kd_peserta and jawaban.id_soal = soal.id_soal and peserta_pelatihan.kd_pelatihan = d_pelatihan.kd_pelatihan and peserta_pelatihan.kd_peserta=peserta.kd_peserta and (peserta_pelatihan.ket='tunggu' or peserta_pelatihan.ket='lolos' or peserta_pelatihan.ket='gagal' )");
										$baris = mysqli_num_rows($db);
										

										
										for($i=1;$i<$baris;$i++)
										{
											$data = mysqli_fetch_array($db);

											$nilai = $data['j_benar'] * 5;
											echo "<tr align=center>
													<td><p class='arial'>$i</p></td>
													<td><p class='arial'>$data[kd_pelatihan]</p></td>
													<td><p class='arial'>$data[judul_pelatihan]</p></td>
													<td><p class='arial'>$data[kd_peserta]</p></td>
													<td><p class='arial'>$data[nama]</p></td>
													<td><p class='arial'>$data[tgl_daftar]</p></td>
													<td><p class='arial'>$nilai</p></td>
													<td><p class='arial'>$data[passing_grade]</p></td>
													<td><p class='arial'>$data[ket]</p></td>
													";
													if ($data['ket']=='lolos') {
														echo "
													<td><p class='arial'>Telah Dikonformasi</p></td>
													
													
												</tr>";
													}elseif ($data['ket']=='gagal') {
														echo "
													<td><p class='arial'>Telah Dikonformasi</p></td>
													
													
												</tr>";
													}
													elseif($data[ket]=='tunggu'){
													echo "
													<td><p class='arial'><a href='konfirmasi_hasil_tes.php?kode=$data[kd_pespel]&konfir=lolos'>Lolos</a> || <a href='konfirmasi_hasil_tes.php?kode=$data[kd_pespel]&konfir=gagal'>Gagal</a></p></td>
													
													
												</tr>";
											}
										}

							echo "<tbody>
													
							</tbody>
					</table>	
					
				</div>
			</main>
		</body>
		";

	}

}
?>
							
