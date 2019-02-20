<?php
session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}
include ('cek_pelajar.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
	<h2>SELAMAT DATANG KE DESKBOARD PELAJAR SSLM</h2>
	<h3>MENU UTAMA SISTEM</h3>
	<h4>Selamat Datang <?php echo$_SESSION['log_nama']; ?></h4>
	<fieldset>
		<!--menu pengguna-->
		<a href="kesalahan_pelajar.php?no_kp=<?php echo$_GET['no_kp']; ?>">Paparan Kesalahan</a><br>
		<a href="tukar_katalaluan.php">Tukar Katalaluan</a><br>
		<a href="logout.php">Log Keluar</a><br>
	</fieldset>
</center>
</body>
</html>