<!--x tukar lagi-->
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
	<h3>SENARAI PENGGUNA</h3><br>
		<a href="page_admin.php">Ke Menu Utama</a><br>
		<a href="logout.php">Log keluar</a>
	<fieldset>
		<table width="960" border="1" align="center">
			<tr>
				<td width="40"><b>Bil.</b></td>
				<td width="100"><b>No KP</b></td>
				<td width="600"><b>Log Nama</b></td>
				<td width="102"><b>Katalaluan</b></td>
				<td width="102"><b>aras</b></td>
				<td width="102"><b>Status</b></td>
				<td width="102"><b>Kemaskini Oleh</b></td>
				<td width="102"><b>Tarikh Kemaskini</b></td>
			</tr>

		<?php
			$data1=mysqli_query($connection,"SELECT * FROM maklumat_pengguna");
			$no=1;
			while ($info1=mysqli_fetch_array($data1)) {

			
		?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $info1['no_kp']; ?></td>
		<td><?php echo $info1['log_nama']; ?></td>
		<td><?php echo $info1['katalaluan']; ?></td>
		<td><?php echo $info1['aras']; ?></td>
		<td><?php echo $info1['status']; ?></td>
		<td><?php echo $info1['kemaskini_oleh']; ?></td>
		<td><?php echo $info1['tarikh_kemaskini']; ?></td>
		<td><a href="kemaskini_pengguna.php?id_pengguna=<?php echo $info1['id_pengguna']; ?>">Kemaskini</a></td>
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