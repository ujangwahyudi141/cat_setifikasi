<?php
require_once 'ClassAdmin.php';
	require_once 'ClassUser.php';

	session_start();
	include 'koneksi.php';
	

	
	$username = $_SESSION['username'];


	$cari=mysqli_query($koneksi,"select *from peserta where username = '".$username."'");
	$data = mysqli_fetch_array($cari);

	$carikode = mysqli_query($koneksi,"select max(kd_pespel) from peserta_pelatihan");
				$datakode = mysqli_fetch_array($carikode);
				if ($datakode)
				{
		   			$nilaikode = substr($datakode[0]);
				   			// menjadikan $nilaikode ( int )
				   			$kode = (int) $nilaikode;
				   			// setiap $kode di tambah 1
				   			$kode = $datakode[0] + 1;
		   			//$kode_otomatis = $this->id_soal.str_pad($kode, 2, "0", STR_PAD_LEFT);
		  		}
		  		else
		  		{
		   			$kode='1';
		  		}
		  		
		  		
		  		$kd_pelatihan = $_GET['kd_pelatihan'];
		  		
		  		
		  		$kd_peserta = $data['kd_peserta'];
		  		$now = date("Y-m-d h:i:s");
		  		$ket = 'mulai';
		  		echo $kode;
		  		echo $kd_pelatihan;
		  		echo $kd_peserta;
		  		echo $now;
		  		echo $ket;



	//echo $_GET['kode'];
	$simpan = mysqli_query($koneksi,"insert into peserta_pelatihan values('$kode','$kd_pelatihan','$kd_peserta','$now','$ket')");


if(!$simpan)
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Daftar Ujian Pelatihan Berhasil');</script>";
			echo "<script>window.location.href = 'pelatihan_peserta.php';</script>";
		}
	


?>