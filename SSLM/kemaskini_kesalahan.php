<?php
include ('connection.php');

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

	if (isset($_POST["kod_kesalahan"])) {
		$kod_kesalahan=$_POST["kod_kesalahan"];
		$perincian_kesalahan=$_POST["perincian_kesalahan"];
		$merit=$_POST["merit"];
		
		$id_kesalahan=$_POST["id_kesalahan"];

echo "UPDATE ref_kesalahan SET kod_kesalahan='$kod_kesalahan',perincian_kesalahan='$perincian_kesalahan',merit='$merit' WHERE id_kesalahan='$id_kesalahan' ";
		//kemaskini dengan rekod baru
		$data=mysqli_query($connection,"UPDATE ref_kesalahan SET kod_kesalahan='$kod_kesalahan',perincian_kesalahan='$perincian_kesalahan',merit='$merit' WHERE id_kesalahan='$id_kesalahan' ")or die(mysqli_error());

		//makluman jika rekod baru disimpan
		echo "<script>alert('Kemaskini maklumat bagi kesalahan telah dikemaskini');
		window.location='page_admin.php' </script>";
	}
	else{
		$dataKesalahan=mysqli_query($connection,"SELECT * FROM ref_kesalahan WHERE id_kesalahan='$_GET[id_kesalahan]'");
		$infoKesalahan=mysqli_fetch_array($dataKesalahan);

?>

<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIRAN SSLM</title>
</head>
<body>
<center>
	<h3>KEMASKINI MAKLUMAT SSLM</h3>
	<form name="form1" action="kemaskini_kesalahan.php" method="POST">
	<fieldset>
		<table width="400" border="0" align="center">
			<thead>
				<tr>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<tr>
						<td>
							<label>Kod Kesalahan: </label>
							<input type="text" name="kod_kesalahan" id="kod_kesalahan" value="<?php echo$infoKesalahan['kod_kesalahan']; ?>" />
							<input type="hidden" name="id_kesalahan" value="<?php echo$id_kesalahan=$_GET["id_kesalahan"]; ?>">
							<!--<input type="text"readonly name="id_user" id="id_user" value="<?php #echo $_SESSION['log_nama']; ?>" />-->
							<!--<input type="text" readonly name="id_kesalahan" id="id_kesalahan" value="<?php echo$_GET['id_kesalahan']; ?>" />-->
						</td>
					</tr>
					<tr>
						<td>
							<label>Perincian Kesalahan: </label>
							<input type="text" name="perincian_kesalahan" id="perincian_kesalahan" value="<?php echo$infoKesalahan['perincian_kesalahan']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Merit: </label>
							<input type="text" name="merit" value="<?php echo$infoKesalahan['merit']; ?>" />
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

		<a href="senarai_kesalahan.php">Ke Senarai Kesalahan</a><br>
		<a href="logout.php">Log Keluar</a>
</center>
<?php
}
?>
</body>
</html>
