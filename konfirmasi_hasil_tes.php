<?php
	include 'koneksi.php';
	$konfirmasi =$_GET['konfir'];
	$kode = $_GET['kode'];


	if ($konfirmasi == 'lolos') {
		echo $konfirmasi;
		$sql=mysqli_query($koneksi,"update peserta_pelatihan set ket ='lolos' where kd_pespel='$kode'");
		if(!$sql)
		{
			
			echo "<script>alert('Data Gagal Dikonformasi');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			
			echo "<script>alert('Data Berhasil Dikonformasi');</script>";
			echo "<script>document.location.href = 'kelola_hasil_tes.php';</script>";
		}
	}elseif ($konfirmasi == 'gagal') {
		$sql=mysqli_query($koneksi,"update peserta_pelatihan set ket ='gagal' where kd_pespel='$kode'");
		if(!$sql)
		{
			
			echo "<script>alert('Data Gagal Dikonformasi');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			
			echo "<script>alert('Data Berhasil Dikonformasi');</script>";
			echo "<script>document.location.href = 'kelola_hasil_tes.php';</script>";
		}
	}
?>