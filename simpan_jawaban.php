<?php
include 'koneksi.php';
	$pilih = $_POST['pilihan'];
	$id = $_POST["id"];
	$id_soal = $_POST["id_soal"];
	$jumlah = $_POST["jumlah"];
	//echo count($pilih);
	//ech $pilihan[0];

		$score = 0;
		$benar = 0;
		$salah = 0;
		$kosong = 0;
		session_start();
		$peserta = mysqli_query($koneksi, "SELECT kd_peserta
					FROM  peserta 
					WHERE username='".$_SESSION['username']."'"); 
		$p= mysqli_fetch_array($peserta);
		$kd_peserta = $p['kd_peserta'];


		for($i=0;$i<$jumlah;$i++){
			$nomor = $id[$i]; // id nomor soal

			// jika user tidak memilih jawaban
			if(empty($pilih[$nomor])){
				$kosong++;
			} else {
				// jika memilih
				$jawaban = $pilih[$nomor];
 
				// cocokan jawaban dengan yang ada didatabase
				$sql = "SELECT * FROM pertanyaan WHERE id_pertanyaan='$nomor' AND jawaban='$jawaban'";
				$query = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
 
				$cek = mysqli_num_rows($query);
 
				if($cek){
					// jika jawaban cocok (benar)
					$benar++;
				} else {
					// jika salah
					$salah++;
				}
			}
 
			}

			$carikode = mysqli_query($koneksi,"select max(id_jawaban) from jawaban");
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

		$carikd = mysqli_query($koneksi,"select kd_pelatihan from peserta_pelatihan where kd_peserta='$kd_peserta'");
				$datakd = mysqli_fetch_array($carikd);
		$kd_pelatihan=$datakd['kd_pelatihan'];

		$simpan = mysqli_query($koneksi,"insert into jawaban values('".$kode."', '".$id_soal."', '".$kd_peserta."','".$benar."', '".$salah."', '".$kosong."')");
		$ubah = mysqli_query($koneksi,"update peserta_pelatihan set ket ='tunggu' where kd_peserta='$kd_peserta' and kd_pelatihan='$kd_pelatihan' ");
		
		if(!$ubah && !$simpan  )
		{
			
			echo "<script>alert('Data Gagal Disimpan');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<script>alert('Data Berhasil Disimpan');</script>";
			echo $kd_peserta;
			echo $kd_pelatihan;
			echo "<script>document.location.href = 'pelatihan_peserta.php';</script>";
			
		}
		  		
	echo "Jumlah Jawaban Benar: $benar"."<br>";
	echo "Jumlah Jawaban Salah: $salah"."<br>";
	echo "Jumlah Jawaban Kosong: $kosong"."<br>";

?>
