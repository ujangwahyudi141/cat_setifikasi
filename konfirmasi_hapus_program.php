<script type="text/javascript">
	function hapusProgram()
	{
		var x = window.document.delete.a.value;
		var answer = confirm ('Anda Yakin Akan Menghapus Data Pelatihan Dengan No Kode : ' +x)
		if (answer)
		{
			window.location='form_hapus_program.php?kode='+x;
		}
		else
		{
			alert("Penghapusan Data Dibatalkan")
			window.location='kelola_program.php';
		}
	}
</script> 
 
<body onload = "return hapusProgram()";></body> 
 
<?php


include "ClassMain.php";
$main = new Main; 
$main->FormHapusProgram();
?>
