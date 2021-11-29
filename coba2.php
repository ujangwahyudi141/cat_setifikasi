<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<?php
	include "koneksi.php";
	//List Jawaban
	
    $waktu = 20;
?>

<link rel="stylesheet" type="text/css" href="assets/css/ujian.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="assets/js/flipclock.js"></script>
<body style="height: auto;min-height: 100%;">
	<div class="wrapper">
		<div class="content">
			<div class="container">
				
				<section class="content-header">
					<h1>Seleksi Penerimaan</h1>					
				</section>
				<section class="content-main">
					<div class="row">
						<div class="col-md">
							<div class="clock" style="margin:2em;"></div>
							<div class="message"></div>

							<script type="text/javascript">
								<?php
									$soal = $_POST['id_soal'];
									
									$waktu = 60*$_POST['waktu'];
									$now = date('Y-m-d H:i:s');
									$selesai= date('Y-m-d H:i:s',time() + $waktu);
									$time = strtotime($selesai) - strtotime($now);

								?>
								var clock;


								
								$(document).ready(function() {
									var clock;

									clock = $('.clock').FlipClock({
								        clockFace: 'DailyCounter',
								        autoStart: false,
								        callbacks: {
								        	stop: function() {
								        		$('.message').html('The clock has stopped!')
								        	}
								        }
								    });
										    
								    clock.setTime(<?php echo $time;?>);
								    clock.setCountdown(true);
								    clock.start();

								});
								$p=0;
							</script>
							<div class="pesan"></div>
							<div class="info callout">

									<h4>Computer</h4>
									<h4>Program</h4>
							</div>
							<div class="box-primary">
								<div class="box-header box">
									<h3>JUdul Soal</h3>
								</div>


								<form action="simpan_jawaban.php" method="POST">
									<input type="text" name="id_soal" value=
									'<?php  echo $_POST['jawab_peserta']; ?>' = hidden>
									<div class="box-body">
										<?php 

										$prods = count($_POST['jawab_peserta']);
										echo $prods;
										  $halaman = 30;
										  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
										  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
										  $id_soal =$_POST['id_soal'];
										  $result = mysqli_query($koneksi,"SELECT * FROM pertanyaan where id_soal = '$id_soal'");
										  $total = mysqli_num_rows($result);
										  $pages = ceil($total/$halaman);            
										  $query = mysqli_query($koneksi,"select * from pertanyaan  where id_soal = '$id_soal'  LIMIT $mulai, $halaman")or die(mysql_error);
										  $no =$mulai+1;
										  $n =0;
										  //$jawaban_peserta="A,B,C,B";

										  $jwb_peserta=explode(",", $jawaban_peserta);
										 	echo $jwb_peserta[0];
										 
										  while ($data = mysqli_fetch_assoc($query)) {
										  	$ar=$no-1;
										  	$n ++;
										  	$ar2= $_POST['jawab_peserta'][$ar];

										  	$id=$data["id_pertanyaan"];
								            $id_soal=$data["id_soal"];
								            $pertanyaan=$data["pertanyaan"];
								            $option_1=$data["option_1"];
								            $option_2=$data["option_2"];
								            $option_3=$data["option_3"];
								            $option_4=$data["option_4"];
								            $option_5=$data["option_5"];
								            $jawaban=$data["jawaban"];
										    ?>
										<div class="form-group">
											<p>No. <?php echo $n; ?> </p>
											<p> <?php echo $pertanyaan; ?></p>
											<input type="text" name="id[]" value="<?php echo $id; ?>" hidden>
											<input type="text" name="id_soal" value="<?php echo $id_soal; ?>" hidden>
											<input type="text" name="jumlah" value="<?php echo $total; ?>" hidden>
											<div class="radio-green">

												<input type="radio" name="pilihan[<?php echo $id; ?>]" value="A">A. <?php echo $option_1;?> <br>
											</div>
											<div class="radio-green checked">
												<input type="radio" name="pilihan[<?php echo $id; ?>]" value="B">B. <?php echo $option_2;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="pilihan[<?php echo $id; ?>]" value="C">C. <?php echo $option_3;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="pilihan[<?php echo $id; ?>]" value="D">D. <?php echo $option_4;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="pilihan[<?php echo $id; ?>]" value="E">E. <?php echo $option_5;?> <br>
											</div>											
										</div>
										<?php               
										  } 
										  ?>
										<div class="modal-footer"><br>
											
											<?php
											$hal=$_GET['halaman'];
											$next=$hal + 1; 
											if ($next <= $pages) {
											?>	
												<button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')" >Simpan Jawaban</button>
												
											<?php
											}
											else
											{
												echo '<button type="button" class="btn btn-primary" >Simpan Jawaban</button>';
												echo '<button type="button" class="btn btn-danger">Halaman Terakhir</button>';
											}
											?>
											
										</div>
									</div>
									
								</form>
							</div>
						</div>

						
					</div>
				</section>
			</div>
		</div>
		
	</div>

</body>
</html>
