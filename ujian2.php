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
									$waktu = 60*20;
									$now = date('Y-m-d H:i:s');
									$selesai= date('2019-11-24 23:28:48',date('Y-m-d H:i:s'));
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


								<form action="?halaman=	
								<?php
								$hal=$_GET['halaman'];
								
											$next=$hal + 1; 
								 echo $next; ?>
								" method="POST">
									<input type="text" name="id_soal" value=
									'<?php  echo $_POST['jawab_peserta']; ?>' =>
									<div class="box-body">
										<?php 
										$prods = count($_POST['jawab_peserta']);
										echo $prods;
										  $halaman = 1;
										  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
										  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
										  $result = mysqli_query($koneksi,"SELECT * FROM pertanyaan");
	session_start();	
	 $query = mysqli_query($koneksi,"select * from pertanyaan") or die (mysqli_error());	

    $_SESSION['soal'] = array();
 
    $_SESSION['o'] = 1;
 
    $_SESSION['score'] = 0;
 
    $_SESSION['option'] = array();
 
    $_SESSION['jawab'] = array();
 
    $i=0;
 
    while($row = mysqli_fetch_assoc($query)){
 
        $_SESSION['soal'][] = $row;
 
        $_SESSION['option'][] = array($_SESSION['soal'][$i]['a'], $_SESSION['soal'][$i]['b'], $_SESSION['soal'][$i]['c'], $_SESSION['soal'][$i]['d'], $_SESSION['soal'][$i]['e']);
 
        $i++;
 
    }
										  $total = mysqli_num_rows($result);
										  $pages = ceil($total/$halaman);            
										  $query = mysqli_query($koneksi,"select * from pertanyaan LIMIT $mulai, $halaman")or die(mysql_error);
										  $no =$mulai+1;
										  //$jawaban_peserta="A,B,C,B";

										  $jwb_peserta=explode(",", $jawaban_peserta);
										 	echo $jwb_peserta[0];

	$soal = $_SESSION['soal'];
 
    $o = $_SESSION['o'];
 
    if(isset($_POST['next'])){
 
        $_SESSION['jawab'][] = $_POST['option'];
 
        if($_POST['option'] == $soal[$o-2]['kunci']){
 
            $_SESSION['score'] = $_SESSION['score'] + 10;
 
        }
 
    }
    if(isset($soal[$o-1])){
 
?>
 
<!DOCTYPE html>
 
<html>
 
<head>
 
    <title>Latihan Soal</title>
 
</head>
 
<body>
 
<a href="">Kembali ke soal 1</a>
 
    <form action="" method="POST">
 
        <p>
 
        <?php
 
            echo $o.". "; $_SESSION['o']++;
 
            echo $soal[$no-1]['soal'];
 
            $jawaban = $_SESSION['option'][$no-1];
 
            shuffle($jawaban);
 
        ?>
 
        </p>
 
        <?php
 
            for ($i=0; $i < 4; $i++) {
 
        ?>
 
            <input type="radio" name="option" value="<?php echo $jawaban[$i]; ?>" required/> <?php echo $jawaban[$i]; ?></br>
 
        <?php
 
            }
 
         ?>
 
        <input type="submit" name="next" value="next">
 
    </form>
 
</body>
 
</html>
 
<?php
 
    }else{
 
        echo "aaaa";
 
    }
 
?>

 
										 
										  while ($data = mysqli_fetch_assoc($query)) {
										  	$ar=$no-1;
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
											<p>No. <?php echo $no; ?> </p>
											<p>Soal <?php echo $pertanyaan; ?></p>
											<div class="radio-green">

												<input type="radio" name="jawab_peserta" value="A" <?php if ($jwb_peserta[$ar] == 'A') echo "checked"; ?>>A. <?php echo $option_1;?> <br>
											</div>
											<div class="radio-green checked">
												<input type="radio" name="jawab_peserta" value="B" <?php if ($jwb_peserta[$ar] == 'B') echo "checked"; ?>>B. <?php echo $option_2;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="jawab_peserta" value="C" <?php if ($jwb_peserta[$ar] == 'C') echo "checked"; ?>>C. <?php echo $option_3;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="jawab_peserta" value="D" <?php if ($jwb_peserta[$ar] == 'D') echo "checked"; ?>>D. <?php echo $option_4;?> <br>
											</div>
											<div class="radio-green">
												<input type="radio" name="jawab_peserta[]" value="E" <?php if ($jwb_peserta[$ar] == 'E') echo "checked"; ?>>E. <?php echo $option_5;?> <br>
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
												<button type="submit" class="btn btn-primary" >Simpan Dan Lanjutkan</button>
												<a href="?halaman=<?php echo $next; ?>">
												<button type="button" class="btn btn-danger">Lewati Soal Ini</button></a>
											<?php
											}
											else
											{
												echo '<button type="button" class="btn btn-primary" >Simpan Dan Selesai Ujian</button>';
												echo '<button type="button" class="btn btn-danger">Halaman Terakhir</button>';
											}
											?>
											
										</div>
									</div>
									
								</form>
							</div>
						</div>

						<div class="col-md4">
							<div class="box box-primary">
								<div class="box-header">
									<div class="box-body">
										<h3 >Nomor Soal</h3>
									<div class="col">
										 <?php 
										 $jawab = explode(",", $list_jawaban);
										 $nomor = sizeof($jawab);
										 $jawab ="a,b,c,d";

										 for ($i=1; $i<=$pages ; $i++){ 
										 	$a=$i-1;
										 	$jwb=explode(",", $jawab);//array jawaban
										 	if ($i==$hal) {
										 	?>
										 	<div class="col3">
											<a href="?halaman=<?php echo $i; ?>">
												<button class="btn btn-block btn-primary"><?php echo $i;echo " ."; echo $jwb_peserta[$a];   ?> </button></a>
										 	<?php
										 	}
										 	else
										 	{

										 	?>
										 	<div class="col3">
											<a href="?halaman=<?php echo $i; ?>">
												<button class="btn btn-block btn-default"><?php echo $i; echo " ."; echo $jwb_peserta[$a]; ?></button></a>
										 	<?php
										 	}
										 	?>

										
										</div>

										  <?php } ?>
										
										
									</div>
								</div>	
									
									<a href=""><button type="button" class="btn btn-success">Selesai</button></a>
								</div>	
														
							</div>
							
						</div>
					</div>
				</section>
			</div>
		</div>
		
	</div>

</body>
</html>