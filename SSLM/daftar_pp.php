<?php
include 'connection.php';
#echo "masuk";
session_start();
	if (!$_SESSION['log_nama']) {
		header("location:index.php");
	}
	if (isset($_POST["nama_pelajar"])) {
		$log_nama_pelajar=$_POST["log_nama_pelajar"];
		$nama_pelajar=$_POST["nama_pelajar"];
		$no_kp=$_POST["no_kp"];
		$jantina=$_POST["jantina"];
		$kelas_kohot=$_POST["kelas_kohot"];
		$keturunan=$_POST["keturunan"];
		$agama=$_POST["agama"];
		$alamat=$_POST["alamat"];
		$guru_kls=$_POST["guru_kls"];
		$tel_penjaga=$_POST["tel_penjaga"];
		$asrama=$_POST["asrama"];
		
/*echo "INSERT INTO maklumat_pelajar (nama_pelajar,no_kp,jantina,kelas_kohot,keturunan,agama,alamat,guru_kls,tel_penjaga,asrama,dicipta_oleh) 
		values ('$nama_pelajar','$no_kp','$jantina','$kelas_kohot','$keturunan','$agama','$alamat','$guru_kls','$tel_penjaga','$asrama','".$_SESSION['log_nama']."')";*/
#echo "a4".$a4;
	$data=mysqli_query($connection,"INSERT INTO maklumat_pelajar (nama_pelajar,no_kp,jantina,kelas_kohot,keturunan,agama,alamat,guru_kls,tel_penjaga,asrama,dicipta_oleh) 
		values ('$nama_pelajar','$no_kp','$jantina','$kelas_kohot','$keturunan','$agama','$alamat','$guru_kls','$tel_penjaga','$asrama','".$_SESSION['log_nama']."')") or die(mysqli_error());

echo "INSERT INTO maklumat_pengguna (no_kp,log_nama,katalaluan,aras,status,kemaskini_oleh) 
		values ('$no_kp','$log_nama_pelajar','1506','Pelajar','1','".$_SESSION['log_nama']."') ";

	$data2=mysqli_query($connection,"INSERT INTO maklumat_pengguna (no_kp,log_nama,katalaluan,aras,status,kemaskini_oleh) 
		values ('$no_kp','$log_nama_pelajar','1506','Pelajar','1','".$_SESSION['log_nama']."') ") or die(mysqli_error());

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
	<h3>DAFTAR PELAJAR BARU</h3>
	<form name="form1" action="daftar_pp.php" method="POST">
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
							<label>Log Nama: </label>
							<input type="text" name="log_nama_pelajar" placeholder="log nama tidak lebih 10 huruf" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Nama Pelajar: </label>
							<input type="text" name="nama_pelajar" size="50" placeholder="mengikut IC" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>No KP: </label>
							<input type="text" name="no_kp" placeholder="000000-00-0000" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Jantina: </label>
							<div class="radio">
								<label><input type="radio" name="jantina" value="Lelaki">Lelaki</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="jantina" value="Perempuan">Perempuan</label>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>Kelas/Kohot: </label>
							<input type="text" name="kelas_kohot" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Keturunan: </label>
							<input type="text" name="keturunan" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Agama: </label>
							<input type="text" name="agama" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Alamat: </label>
							<input type="text" name="alamat" size="60" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Guru Kelas: </label>
							<input type="text" name="guru_kls" size="50" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>No Tel Penjaga: </label>
							<input type="text" name="tel_penjaga" placeholder="***-*******" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Asrama: </label>
							<div class="radio">
								<label><input type="radio" name="asrama" value="Ya">Ya</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="asrama" value="Tidak">Tidak</label>
							</div>
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
</html>