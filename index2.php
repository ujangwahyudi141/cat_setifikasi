<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<link rel='stylesheet' type='text/css' href='assets/css/main.css'>
			<div id='wrapper'>
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
							<a href='profil.php' target="isicontent" class='btn btn-link btn-daftar mr-3'>Profil</a>
							<a href='login.php' class='btn btn-outline-primary btn-login'>Logout</a>
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
							<a href='jadwal_pelatihan.php' target="isicontent">Jadwal Pelatihan</a>
						</li>
						<li>
							<a href='program_pelatihan.php' target="isicontent">Program Pelatihan</a>
						</li>
						<li>
							<span>Area Peserta</span>
						</li>
						<li>
							<a href='pelatihan_peserta.php' target="isicontent">Pelatihan Saya</a>
						</li>
						<li>
							<a href='riwayat_pelatihan.php' target="isicontent">Riwayat Daftar Pelatihan</a>
						</li>
					</ul>
				</nav>
			</aside>
			<div >
				<iframe src="jadwal_pelatihan.php" name="isicontent" id="content" >
				
			</iframe>
			</div>
			
		</div>

</body>
</html>