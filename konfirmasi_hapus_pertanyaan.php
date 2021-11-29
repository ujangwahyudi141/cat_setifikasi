<script type="text/javascript">
	function hapusPertanyaan()
	{
		var x = window.document.delete.a.value;
		var answer = confirm ('Anda Yakin Akan Menghapus Data Pertanyaan Dengan No Id : ' +x)
		if (answer)
		{
			window.location='form_hapus_pertanyaan.php?kode='+x;
		}
		else
		{
			alert("Penghapusan Data Dibatalkan")
			window.location='kelola_pertanyaan.php';
		}
	}
</script> 
 
<body onload = "return hapusPertanyaan()";></body> 
 
<?php


include "ClassMain.php";
$main = new Main; 
$main->FormHapusPertanyaan();
?>
