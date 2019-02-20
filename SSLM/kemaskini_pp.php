<?php
include ('connection.php');

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

	if (isset($_POST["nama_pelajar"])) {
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
		$id_pengguna=$_POST["id_pengguna"];
		
		$id_pelajar=$_POST["id_pelajar"];


		//kemaskini dengan rekod baru
		$data=mysqli_query($connection,"UPDATE maklumat_pelajar SET nama_pelajar='$nama_pelajar',no_kp='$no_kp',jantina='$jantina',kelas_kohot='$kelas_kohot',keturunan='$keturunan',agama='$agama',alamat='$alamat',guru_kls='$guru_kls',tel_penjaga='$tel_penjaga',asrama='$asrama',kemaskini_oleh='$id_pengguna',tarikh_kemaskini='now()' WHERE id_pelajar='$id_pelajar' ")or die(mysqli_error());
		/*$data=mysqli_query($connection,"INSERT INTO maklumat_pelajar (nama_pelajar,no_kp,jantina,kelas_kohot,keturunan,agama,alamat,guru_kls,tel_penjaga,asrama,kemaskini_oleh,tarikh_kemaskini) 
		values ('$nama_pelajar','$no_kp','$jantina','$kelas_kohot','$keturunan','$agama','$alamat','$guru_kls','$tel_penjaga','$asrama','".$_SESSION['log_nama']."',now())") or die(mysqli_error());*/

		//makluman jika rekod baru disimpan
		echo "<script>alert('Kemaskini maklumat bagi pelajar telah direkodkan');
		window.location='page_admin.php' </script>";
	}
	else{
		$dataPelajar=mysqli_query($connection,"SELECT * FROM maklumat_pelajar WHERE id_pelajar='$_GET[id_pelajar]'");
		$infoPelajar=mysqli_fetch_array($dataPelajar);

?>

<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIRAN SSLM</title>
</head>
<body>
<center>
	<h3>KEMASKINI MAKLUMAT SSLM</h3>
	<form name="form1" action="kemaskini_pp.php" method="POST">
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
							<label>Nama Pelajar: </label>
							<input type="text" name="nama_pelajar" id="nama_pelajar" value="<?php echo$infoPelajar['nama_pelajar']; ?>" />
							<input type="text"readonly name="id_pengguna" id="id_pengguna" value="<?php echo $_SESSION['log_nama']; ?>" />
							<input type="text" readonly name="id_pelajar" id="id_pelajar" value="<?php echo$_GET['id_pelajar']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>No KP: </label>
							<input type="text" name="no_kp" id="no_kp" value="<?php echo$infoPelajar['no_kp']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Jantina: </label>
							<div class="radio">
							<input type="radio" name="jantina" <?php if($infoPelajar['jantina']=="Lelaki"){?> checked="true" <?php } ?> 
							value="Lelaki"/>Lelaki
							<input type="radio" name="jantina" <?php if($infoPelajar['jantina']=="Perempuan"){?> checked="true" <?php } ?>
							value="Perempuan"/>Perempuan
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>Kelas/Kohot: </label>
							<input type="text" name="kelas_kohot" value="<?php echo$infoPelajar['kelas_kohot']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Keturunan: </label>
							<input type="text" name="keturunan" value="<?php echo$infoPelajar['keturunan']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Agama: </label>
							<input type="text" name="agama" value="<?php echo$infoPelajar['agama']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Alamat: </label>
							<input type="text" name="alamat" value="<?php echo$infoPelajar['alamat']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>Guru Kelas: </label>
							<input type="text" name="guru_kls" value="<?php echo$infoPelajar['guru_kls']; ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<label>No Tel Penjaga: </label>
							<input type="text" name="tel_penjaga" value="<?php echo$infoPelajar['tel_penjaga']; ?>" />
						</td>
					</tr>
					<tr>	
						<td>
							<label>Asrama: </label>
							<div class="radio">
							<input type="radio" name="asrama" <?php if($infoPelajar['asrama']=="Ya"){?> checked="true" <?php } ?> 
							value="Ya"/>Ya
							<input type="radio" name="asrama" <?php if($infoPelajar['asrama']=="Tidak"){?> checked="true" <?php } ?>
							value="Tidak"/>Tidak
							</div>
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

		<a href="senarai_pp.php">Ke Senarai Pelajar</a><br>
		<a href="logout.php">Log Keluar</a>
</center>
<?php
}
?>
</body>
</html>
