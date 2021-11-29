<?php
	include 'koneksi.php';
	$cari= mysqli_query($koneksi,"SELECT * from akses where username='".$_POST['username']."' ");
	$data = mysqli_fetch_array($cari);

						if ($_POST['pass_lama']==$data['password']) {
							$ubah = mysqli_query($koneksi,"update akses set password='".$_POST['pass_baru']."' where username='".$_POST['username']."' ");
							if(!$ubah)
							{
								echo "<script>alert('Data Gagal Diperbarui');</script>";
								echo "<script>window.history.back();</script>";
							}
							else
							{
								echo "<script>alert('Data Berhasil Diperbarui');</script>";
								echo "<script>document.location.href = 'profil.php';</script>";
							}

						}else
						{
							echo "<script>alert('Password Gagal Di Ubah');</script>";             
    						echo "<script>window.history.back();</script>";
						}
						
						?>

		