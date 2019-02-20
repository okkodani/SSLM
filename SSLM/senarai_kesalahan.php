<?php
include "connection.php";

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIR SSLM</title>
</head>
<body>
<center>
	<h3>SENARAI KESALAHAN</h3><br>
		<a href="page_admin.php">Ke Menu Utama</a><br>
		<a href="logout.php">Log keluar</a>
	<fieldset>
		<table width="960" border="1" align="center">
			<tr>
				<td width="40"><b>Bil.</b></td>
				<td width="100"><b>Kod Kesalahan</b></td>
				<td width="600"><b>Perincian Kesalahan</b></td>
				<td width="102"><b>Merit</b></td>
			</tr>

		<?php
			$data1=mysqli_query($connection,"SELECT * FROM ref_kesalahan");
			$no=1;
			while ($info1=mysqli_fetch_array($data1)) {

			
		?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $info1['kod_kesalahan']; ?></td>
		<td><?php echo $info1['perincian_kesalahan']; ?></td>
		<td><?php echo $info1['merit']; ?></td>
		<td><a href="kemaskini_kesalahan.php?id_kesalahan=<?php echo $info1['id_kesalahan']; ?>">Kemaskini</a></td>
	</tr>
		<?php
		$no++;
	}
		?>
		</table>
	</fieldset>
</center>
</body>
</html>