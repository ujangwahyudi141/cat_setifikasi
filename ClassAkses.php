<?php

require_once "ClassUser.php";


class Akses
{
	var $username, $password, $host, $namaDB, $link;

	function __construct()
	{
		$this->username = 'root';
		$this->password = '';
		$this->host = 'localhost';
		$this->namaDB = 'bptik';
		$this->link = mysqli_connect("$this->host", "$this->username", "$this->password", "$this->namaDB");
	}

	function BukaDB()
	{
		if(!$this->link)
		{
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			exit;
		}
	}

	function TutupDB()
	{
		mysqli_close($this->link);
		if(!$this->link)
		{
			
			echo "Error: Unable to close connection MySQL." . PHP_EOL;
			exit;
		}
	}

	function CekSesi()
	{
		session_start();
		if($_SESSION['username'] == '')
		{
			echo "<script> alert('Akses Ditolak'); </script>";
			echo "<script> window.open('index.php','_top'); </script>";
		}
		else
		{

			self::BukaDB();
			$uri = basename($_SERVER['PHP_SELF']);
			$login = mysqli_query($this->link, "select * from akses where username = '$_SESSION[username]'");
			$data = mysqli_fetch_array($login);
			$_SESSION['tipe'] = $data['tipe'];
			if($_SESSION['tipe'] == 'admin')
			{
				
			echo "<script> alert('Akses Admin'); </script>";
			echo "<script> window.open('home.php','_top'); </script>";
			}
			else
			{
			echo "<script> alert('Akses Peserta'); </script>";	
			echo "<script> window.open('home.php','_top'); </script>";
			}
		}
	}

	function Cek()
	{
		self::BukaDB();
			$uri = basename($_SERVER['PHP_SELF']);
			$login = mysqli_query($this->link, "select * from akses where username = '$_SESSION[username]'");
			$data = mysqli_fetch_array($login);
			$_SESSION['tipe'] = $data['tipe'];
	}
}
?>
