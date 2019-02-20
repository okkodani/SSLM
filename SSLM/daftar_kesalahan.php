<?php
include 'connection.php';
#echo "masuk";
session_start();
	if (!$_SESSION['log_nama']) {
		header("location:index.php");
	}
	if (isset($_POST["kod_kesalahan"])) {
		#$id_kesalahan=$_POST["id_kesalahan"];
		$kod_kesalahan=$_POST["kod_kesalahan"];
		$perincian_kesalahan=$_POST["perincian_kesalahan"];
		$merit=$_POST["merit"];
		
#echo "a4".$a4;
	$data=mysqli_query($connection,"INSERT INTO ref_kesalahan (id_kesalahan,kod_kesalahan,perincian_kesalahan,merit) 
		values ('$id_kesalahan','$kod_kesalahan','$perincian_kesalahan','$merit')") or die(mysqli_error());

	//makluman untuk rekod berjaya disimpan
	echo "<script>alert('Rekod telah disimpan'); 
	window.location='page_admin.php'</script>";
	}
	#else{
		#echo "NOT SAVE";

	#}
?>
<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIR SSLM</title>
</head>
<body>
<center>
	<h3>DAFTAR KESALAHAN BARU</h3>
	<form name="form1" action="daftar_kesalahan.php" method="POST">
		<fieldset>
			<table width="600" border="0" align="center">
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<label>Kod Kesalahan: </label>
							<input type="text" name="kod_kesalahan" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Perincian Kesalahan: </label>
							<input type="text" name="perincian_kesalahan" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Merit: </label>
							<input type="text" name="merit" placeholder="" required/>
						</td>
					</tr>
					<!--<tr>
						<td>
							<label>Keturunan: </label>
							<input type="text" name="keturunan" placeholder="" required/>
						</td>
					</tr>-->
					<tr>
						<td>
							<input type="submit" value="Daftar" name="submit" />
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</form><br>
	<a href="page_admin.php">Ke Menu Utama</a><br>
	<a href="logout.php">Log Keluar</a>
</center>
</body>
</html>