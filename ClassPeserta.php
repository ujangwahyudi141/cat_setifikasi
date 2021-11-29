<?php
	require_once "ClassUser.php";
	require_once "ClassMain.php";

	/**
	 * 
	 */
	class Peserta extends User
	{

		function tambahPeserta()
		{
			
			$this->kd_peserta=$_POST['kd_peserta'];
			$this->nama=$_POST['nama'];
			$this->username=$_POST['username'];
			$this->email=$_POST['email'];
			$this->nik=$_POST['nik'];
			$this->tmp_lahir=$_POST['tmp_lahir'];
			$this->tgl_lahir=$_POST['tgl_lahir'];
			$this->jekel=$_POST['jekel'];
			$this->agama=$_POST['agama'];
			$this->no_hp=$_POST['no_hp'];
			$this->no_tlp=$_POST['no_tlp'];
			$this->ktp=$_FILES['ktp']['name'];
			$this->tmp_ktp = $_FILES['ktp']['tmp_name'];
			$this->foto=$_FILES['foto']['name'];
			$this->tmp_foto = $_FILES['foto']['tmp_name'];
			$this->tipe=$_POST['tipe'];
			$this->pass=$_POST['pass'];
			$this->created=$_POST['created'];
			$this->provinsi=$_POST['provinsi'];
			$this->kota=$_POST['kota'];
			$this->pos=$_POST['pos'];
			$this->alamat=$_POST['alamat'];
			$this->provinsi2=$_POST['provinsi2'];
			$this->kota2=$_POST['kota2'];
			$this->pos2=$_POST['pos2'];
			$this->alamat2=$_POST['alamat2'];
			$this->jenjang=$_POST['jenjang'];
			$this->jurusan=$_POST['jurusan'];
			$this->ijazah1=$_FILES['ijazah1']['name'];
			$this->ijazah2=$_FILES['ijazah2']['name'];
			$this->sts_kerja=$_POST['sts_kerja'];
			$this->tmp_kerja=$_POST['tmp_kerja'];
			$this->pekerjaan=$_POST['pekerjaan'];
			$this->tgl_mulai=$_POST['tgl_mulai'];
			$this->tgl_selesai=$_POST['tgl_selesai'];


			
			

			$simpan2 = mysqli_query($this->koneksi->link,"insert into alamat_domisili values('".$this->kd_peserta."','".$this->provinsi2."','".$this->kota2."','".$this->pos2."','".$this->alamat2."') ");

			$simpan3 = mysqli_query($this->koneksi->link,"insert into alamat_ktp values('".$this->kd_peserta."','".$this->provinsi."','".$this->kota."','".$this->pos."','".$this->alamat."') ");

			$simpan4 = mysqli_query($this->koneksi->link,"insert into riwa_pendidikan values('".$this->kd_peserta."','".$this->jenjang."','".$this->jurusan."','".$this->ijazah1."','".$this->ijazah2."') ");

			$simpan5 = mysqli_query($this->koneksi->link,"insert into riwa_pekerjaan values('".$this->kd_peserta."','".$this->sts_kerja."','".$this->tmp_kerja."','".$this->pekerjaan."','".$this->tgl_mulai."','".$this->tgl_selesai."') ");

			$simpan1 = mysqli_query($this->koneksi->link,"insert into peserta values('".$this->kd_peserta."','".$this->nama."', '".$this->username."', '".$this->email."','".$this->nik."', '".$this->tmp_lahir."', '".$this->tgl_lahir."','".$this->jekel."','".$this->agama."','".$this->no_hp."','".$this->ktp."','".$this->foto."','".$this->tipe."','".$this->created."','".$this->kd_peserta."','".$this->kd_peserta."','".$this->kd_peserta."','".$this->kd_peserta."')");

			$simpan6 = mysqli_query($this->koneksi->link,"insert into akses values('".$this->username."','".$this->pass."','peserta') ");
				


			if(!$simpan2 && !$simpan3 && !$simpan4 && !$simpan5 && !$simpan1 && !$simpan6  )
			{	

				
				echo "<script>alert('Data Gagal Disimpan');</script>";
				echo "<script>window.history.back();</script>";
			}
			else
			{	
				move_uploaded_file($this->tmp_ktp, 'assets/img/upload/'.$this->ktp);
				move_uploaded_file($this->tmp_foto, 'assets/img/upload/'.$this->foto);
				move_uploaded_file($this->tmp_ijazah1, 'assets/img/upload/'.$this->ijazah1);
				move_uploaded_file($this->tmp_ijazah2, 'assets/img/upload/'.$this->ijazah2);
				echo "<script>alert('Pendaftaran Berhasil');</script>";
				echo "<script>window.location.href = 'index.php';</script>";
			}
			
		}

		function tampilPeserta()
		{
			

		}


		function ubahPasword()
		{

		}

	}

?>