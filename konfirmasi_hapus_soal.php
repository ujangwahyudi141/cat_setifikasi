<script type="text/javascript">
	function hapusSoal()
	{
		var x = window.document.delete.a.value;
		var answer = confirm ('Anda Yakin Akan Menghapus Data Soal Dengan No Id : ' +x)
		if (answer)
		{
			window.location='form_hapus_soal.php?kode='+x;
		}
		else
		{
			alert("Penghapusan Data Dibatalkan")
			window.location='kelola_soal.php';
		}
	}
</script> 
 
<body onload = "return hapusSoal()";></body> 
 
<?php


include "ClassMain.php";
$main = new Main; 
$main->FormHapusSoal();
?>
