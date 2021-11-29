<script type="text/javascript">
	function hapusDesk()
	{
		var x = window.document.delete.a.value;
		var answer = confirm ('Anda Yakin Akan Menghapus Data Desktripsi Dengan No Kode : ' +x)
		if (answer)
		{
			window.location='form_hapus_desk.php?kode='+x;
		}
		else
		{
			alert("Penghapusan Data Dibatalkan")
			window.location='kelola_desk.php';
		}
	}
</script> 
 
<body onload = "return hapusDesk()";></body> 
 
<?php


include "ClassMain.php";
$main = new Main; 
$main->FormHapusDesk();
?>
