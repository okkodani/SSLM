
<!--<?php
include 'connection.php';
#echo "masuk";
session_start();
	if (!$_SESSION['log_nama']) {
		header("location:index.php");
	}
	if (isset($_POST["no_kp"])) {
		#$id_pengguna=$_POST["id_pengguna"];
		$no_kp=$_POST["no_kp"];
		$log_nama=$_POST["log_nama"];
		$katalaluan=$_POST["katalaluan"];
		$aras=$_POST["aras"];
		$status=$_POST["status"];
		$kemaskini_oleh=$_POST["kemaskini_oleh"];
		$tarikh_kemaskini=$_POST["tarikh_kemaskini"];
		
#echo "a4".$a4;
	$data=mysqli_query($connection,"INSERT INTO maklumat_pengguna (id_pengguna,no_kp,log_nama,katalaluan,aras,status,kemaskini_oleh,tarikh_kemaskini) 
		values ('$id_pengguna','$no_kp','$log_nama','$katalaluan','$aras','$status','$kemaskini_oleh','$tarikh_kemaskini')") or die(mysqli_error());

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
	<h3>DAFTAR PENGGUNA BARU</h3>
	<form name="form1" action="daftar_pengguna.php" method="POST">
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
							<label>No KP: </label>
							<input type="text" name="no_kp" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Log Nama: </label>
							<input type="text" name="log_nama" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Katalaluan: </label>
							<input type="password" name="katalaluan" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Aras: </label>
							<input type="text" name="aras" placeholder="" required/>
						</td>
					</tr>
					<<tr>
						<td>
							<label>Status: </label>
							<input type="text" name="status" placeholder="" required/>
						</td>
					</tr>

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
</html>-->