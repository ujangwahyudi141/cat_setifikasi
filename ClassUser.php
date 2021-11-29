
<?php

require_once "ClassAkses.php";

class User
{
	var $username, $password, $tipe;


	function __construct()
	{
		$this->koneksi = new Akses(); //Memanggil class Akses
		$this->koneksi->BukaDB(); //Memanggil method BukaDB untuk open database

		if(isset($_POST['username']))
		{
			$this->username = $_POST['username'];
		}
		if(isset($_POST['password']))
		{
			$this->password = $_POST['password'];
		}
	}

	function __destruct()
	{
		$this->koneksi = new Akses(); //Memanggil class Akses
		$this->koneksi->TutupDB(); //Memanggil method TutupDB
	}

	function DoLogin()
	{

		$login = mysqli_query($this->koneksi->link,"select * from akses where username = '$this->username'");
		$data = mysqli_fetch_array($login);

		if(($this->username != $data['username']) || ($this->password != $data['password']))
		{
			//echo $this->username;
			//echo $data['username'] ;
			
			echo "<script>alert('salah');</script>";
			echo "<script>alert('Username / Password Salah');</script>";
			echo "<script> window.open('index.php','_top'); </script>";
			
		}
		else
		{

			
			//daftarkan ID jika user dan password BENAR
			session_start();
			$_SESSION['username'] = $data['username'];
			$_SESSION['tipe'] = $data['tipe'];
			$this->username = $_SESSION['username'];
			$this->tipe = $_SESSION['tipe'];
			echo "<script>alert('Login Berhasil');</script>";
			echo "<script> document.location.href = 'homelogin.php'; </script>";
		}
	}

	function Logout()
	{
		echo "<script>alert('Anda Telah Logout');</script>";
		echo "<script> window.open('index.php','_top'); </script>";
	}
}
?>

