
<?php
require_once "ClassMain.php";
require_once "ClassAkses.php";
$akses = new Akses;
$akses->Cek();

$main = new main;
$main->HalamanUtama();



?>