<?php
include 'connection.php';
if (isset($_POST["submit"])) {

	$no_kp=$_POST["no_kp"];
	$log_nama=$_POST["log_nama"];
	$katalaluan=$_POST["katalaluan"];
	$aras=$_POST["aras"];

	$no_kp=mysqli_real_escape_string($connection,$no_kp);
	$log_nama=mysqli_real_escape_string($connection,$log_nama);
	$katalaluan=mysqli_real_escape_string($connection,$katalaluan);
	#$katalaluan=$katalaluan;

	$sql="SELECT * FROM maklumat_pengguna WHERE log_nama='$log_nama' ";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_array($result,mysql_assoc);
			if (mysqli_num_rows($result) == 1) {

				echo "<script>alert('Maaf... log nama ini sudah didaftarkan dalam sistem');
				window.location='index.php' </script>";
			}
			else{
				$query=mysqli_query($connection,"INSERT INTO maklumat_pengguna (log_nama,no_kp,katalaluan,aras,kemaskini_oleh)
				VALUES ('$log_nama','$no_kp','$katalaluan','$aras','danny') ");

						if ($query) {
							echo "<script>alert('Terima Kasih, anda sudah berdaftar');
							window.location='index.php' </script>";
						}
			}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SISTEM SALAH LAKU MURID KOLEJ</title>
</head>
<body>
<center>
	<h3>DAFTAR PENGGUNA BARU</h3>
	<p>Masukkan log Nama, No KP, dan Katalaluan untuk di rekodkan</p>

	<form name="daftar_baru" method="POST">
		
		<!--ruangan email-->
		<label>Log Nama: </label><input type="text" name="log_nama" placeholder="etc: okokk" required/><br>
		<input type="hidden" name="aras" value="<?php echo$_GET['aras'] ?>" placeholder="etc: okokk" required/>

		<!--ruangan nama-->
		<label>No KP: </label><input type="text" name="no_kp" placeholder="000000-00-0000" required/><br>

		<!--ruangan katalaluan-->
		<label>Katalaluan: </label><input type="password" name="katalaluan" placeholder="minimum 5 angka digit" required/><br>

		<input type="submit" value="Daftar" name="submit" /><br>
			<?php

			?>
	</form>

	<!--puatan-->
	<b>Sudah Berdaftar?</b> <br><a href="index.php">Klik di sini</a>
</center>
</body>
</html>