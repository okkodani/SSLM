<?php
session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}
include ('cek_admin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEM SALAH LAKU MURID </title>
</head>
<body>
<center>
	<!--SENARAI MENU ADMIN-->
	<h2>SELAMAT DATANG KE DESKBOARD ADMIN SSLM</h2>
	<h3>MENU UTAMA SISTEM</h3>
	<a href="daftar_pp.php">Daftar Pelajar Baru</a><br>
	<a href="senarai_pp.php">Senarai Maklumat Pelajar</a><br>
	<a href="daftar_kesalahan.php">Daftar Kesalahan</a><br>
	<a href="senarai_kesalahan.php">Senarai Kesalahan</a><br>
	<a href="senarai_pengguna.php">Senarai Pengguna</a><br>
	<a href="logout.php">Log Keluar</a><br>
</center>
</body>
</html>