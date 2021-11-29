
<?php
require_once "ClassUser.php";
session_start();

	include 'koneksi.php';
	$user=$_SESSION['username'];
	$cari= mysqli_query($koneksi,"SELECT * from akses where username='".$user."' ");
	$data = mysqli_fetch_array($cari);
						
?>

<link rel=stylesheet type=text/css href=assets/css/main.css>
<form method="Post" action="ubah_pass_peserta.php" >
	<div>
								<h3 class="text-uppercase">Alamat Domisili</h3>
							</div>
								<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Username
										</label>
										<input type="text" name="username" maxlength="50" placeholder="" class="form-control " value="<?php echo $data['username']; ?>">
									</div>
								</div>
									</div>						
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Password Lama
										</label>
										<input type="Password" name="pass_lama" maxlength="50" placeholder="Password lama" class="form-control " value="">
									</div>						
								</div>
								
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="no_hp">
											Pasword Baru
										</label>
										<input type="Pasword" name="pass_baru" maxlength="50" placeholder="Pasword Baru" class="form-control " value="">
									</div>						
								</div>
								
							</div>
						</div>
						<link rel=stylesheet type=text/css href=isi.css>
						<input type="submit" name=""  class="btn btn-warning" value="Ubah Paswords">
						</form>
						