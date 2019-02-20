<!--x tukar lagi-->
<?php
include ('connection.php');

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

	if (isset($_POST["no_kp"])) {
		$no_kp=$_POST["no_kp"];
		$log_nama=$_POST["log_nama"];
		$katalaluan=$_POST["katalaluan"];
		$aras=$_POST["aras"];
		$status=$_POST["status"];
		
		$id_pengguna=$_POST["id_pengguna"];

#echo "UPDATE maklumat_pengguna SET no_kp='$no_kp',log_nama='$log_nama',katalaluan='$katalaluan',aras='$aras',status='$status' WHERE id_pengguna='$id_pengguna' ";
		//kemaskini dengan rekod baru
		$data=mysqli_query($connection,"UPDATE maklumat_pengguna SET no_kp='$no_kp',log_nama='$log_nama',katalaluan='$katalaluan',aras='$aras',status='$status' WHERE id_pengguna='$id_pengguna' ")or die(mysqli_error());

		//makluman jika rekod baru disimpan
		echo "<script>alert('Kemaskini maklumat bagi kesalahan telah direkodkan');
		window.location='page_admin.php' </script>";
	}
	else{
		$dataPengguna=mysqli_query($connection,"SELECT * FROM maklumat_pengguna WHERE id_pengguna='$_GET[id_pengguna]'");
		$infoPengguna=mysqli_fetch_array($dataPengguna);

?>

<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIRAN SSLM</title>
</head>
<body>
<center>
	<h3>KEMASKINI MAKLUMAT PENGGUNA SSLM</h3>
	<form name="form1" action="kemaskini_pengguna.php" method="POST">
	<fieldset>
		<table width="960" border="0" align="center">
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
						<td>
							<label>No KP: </label>
							<input type="text" name="no_kp" id="no_kp" value="<?php echo$infoPengguna['no_kp']; ?>" />
							<!--<input type="text"readonly name="id_user" id="id_user" value="<?php #echo $_SESSION['log_nama']; ?>" />-->
							<!--<input type="text" readonly name="id_pengguna" id="id_pengguna" value="<?php echo$_GET['id_pengguna']; ?>" />-->
							<input type="hidden" name="id_pengguna" value="<?php echo$id_pengguna=$_GET["id_pengguna"]; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label>Log Nama: </label>
							<input type="text" name="log_nama" id="log_nama" value="<?php echo$infoPengguna['log_nama']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>katalaluan: </label>
							<input type="password" name="katalaluan" value="<?php echo$infoPengguna['katalaluan']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Aras: </label>
							<input type="text" name="aras" value="<?php echo$infoPengguna['aras']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>status: </label>
							<input type="text" name="status" value="<?php echo$infoPengguna['status']; ?>" />
						</td>
					</tr>
				<tr>
					<td>
						<input type="submit" name="button" id="button" value="Kemaskini"/>
					</td>
				</tr>
			</tbody>
		</table>
	</fieldset>		
	</form>

		<a href="senarai_pengguna.php">Ke Senarai Pengguna</a><br>
		<a href="logout.php">Log Keluar</a>
</center>
<?php
}
?>
</body>
</html>

