<!--x tukar lagi-->
<?php
include "connection.php";

session_start();
if (!$_SESSION['log_nama']) {
	header("location:index.php");
}

if (isset($_POST["no_kp"])) {
		$id_pelajar=$_POST["id_pelajar"];
		$id_pengguna=$_SESSION['id_pengguna'];

		$parts = explode('/', $_POST['tarikh']);
		$tarikh  = "$parts[2]-$parts[1]-$parts[0]";

		$masa=$_POST["masa"];
		$id_kesalahan=$_POST["kesalahan"];
		$tempat=$_POST["tempat"];
		$tindakan=$_POST["tindakan"];
		$perincian_lain=$_POST["perincian_lain"];

		//kemaskini dengan rekod baru
		$data=mysqli_query($connection,"INSERT maklumat_kesalahan_pelajar (id_pelajar,id_pengguna,id_kesalahan,tarikh,masa,perincian_kesalahan_lain,tindakan,tempat_kesalahan) VALUES ('$id_pelajar','$id_pengguna','$id_kesalahan','$tarikh','$masa','$perincian_lain','$tindakan','$tempat') ")or die(mysqli_error());

		//makluman jika rekod baru disimpan
		echo "<script>alert('Kemaskini maklumat bagi kesalahan telah direkodkan');
		</script>";

		$dataPelajar=mysqli_query($connection,"SELECT * FROM maklumat_pelajar WHERE no_kp='$_GET[no_kp]'");
		$infoPelajar=mysqli_fetch_array($dataPelajar);
		$nama_pelajar = $infoPelajar['nama_pelajar'];
		$no_kp = $infoPelajar['no_kp'];
		$id_pelajar = $infoPelajar['id_pelajar'];

		$month = date('m');
		$day = date('d');
		$year = date('Y');

		$today = $day . '/' . $month . '/' . $year;

		//unset form submit
		header('Location: papar_kesalahan_pelajar.php?no_kp='.$_GET[no_kp]);

	}
	else{
		$dataPelajar=mysqli_query($connection,"SELECT * FROM maklumat_pelajar WHERE no_kp='$_GET[no_kp]'");
		$infoPelajar=mysqli_fetch_array($dataPelajar);
		$nama_pelajar = $infoPelajar['nama_pelajar'];
		$no_kp = $infoPelajar['no_kp'];
		$id_pelajar = $infoPelajar['id_pelajar'];

		$month = date('m');
		$day = date('d');
		$year = date('Y');

		$today = $day . '/' . $month . '/' . $year;


}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DESKBOARD PENTADBIR SSLM</title>
	 <link rel="stylesheet" href="jquery-datepicker/jquery-ui.css">
        <script src="jquery-datepicker/jquery-1.12.4.js"></script>
        <script src="jquery-datepicker/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#tarikhpilihan").datepicker({ dateFormat: 'dd/mm/yy',changeMonth: true,changeYear: true });
            });
        </script>

		<!-- jQuery library
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 -->

		<!-- jQuery timepicker library -->
		<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
		<script src="jquery-timepicker/jquery.timepicker.min.js"></script>
		<script>
            $(function () {
                $("#masa").timepicker({ 'scrollDefault': 'now' });
            });
        </script>



</head>
<body>

<table border="0" width="100%">
	<tr>
		<td>
			<center>
	<h3>MERIT TERKINI PELAJAR</h3>
	<fieldset>
		<table width="100%" border="1" align="center">
			<tr>
				
				<td width="50"><b>nilai merit</b></td>
				<td width="50"><b>jumlah merit</b></td>

			</tr>

		<?php
		
			$data1=mysqli_query($connection,"SELECT 60-sum(ref_kesalahan.merit) AS merit, CASE WHEN 60-sum(ref_kesalahan.merit) <=30 then '-Keluarkan surat amaran' ELSE '' END AS amaran FROM maklumat_kesalahan_pelajar JOIN maklumat_pelajar ON maklumat_pelajar.id_pelajar = maklumat_kesalahan_pelajar.id_pelajar JOIN ref_kesalahan ON maklumat_kesalahan_pelajar.id_kesalahan = ref_kesalahan.id_kesalahan WHERE maklumat_pelajar.no_kp ='$_GET[no_kp] '");
			$no=1;
			while ($info1=mysqli_fetch_array($data1)) {

			
		?>

	<tr>
		<td><?php echo $info1['merit'].$info1['amaran']; ?></td>
		<td>60</td>
	</tr>
		<?php
		$no++;
	}
		?>
		</table>
	</fieldset>

</center>
		</td>
	</tr>
</table>
<table border="0" width="100%">
	<tr>
		<td valign="top" width="50%">
<center>
	<h3>KEMASUKAN KESALAHAN BARU</h3>
	<form name="form1" action="" method="POST">
		<fieldset>
			<table width="100%" border="0" align="center">
				<thead>
					<tr>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<label>Nama Pelajar: </label>
							<input type="text" name="nama_pelajar" size="50" placeholder="mengikut IC" value="<?php echo$nama_pelajar; ?>" readonly required/>
							<input type="hidden" name="id_pelajar" value="<?php echo$id_pelajar; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<label>No KP: </label>
							<input type="text" name="no_kp" placeholder="000000-00-0000" value="<?php echo$no_kp; ?>" readonly required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Tarikh: </label>
							<input type="text" name="tarikh" id="tarikhpilihan" placeholder="" value="<?php echo $today; ?>"  required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Masa: </label>
							<input type="text" name="masa" id="masa" placeholder="" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label>Kesalahan: </label>
							<select name="kesalahan">
								<option value="">Pilihan Kesalahan</option>
								<?php
									$data1=mysqli_query($connection,"SELECT * FROM ref_kesalahan ORDER BY kod_kesalahan");
									while ($info1=mysqli_fetch_array($data1)) {
								?>
								<option value="<?php echo$info1['id_kesalahan'] ?>"> <?php echo$info1['kod_kesalahan'].'-'.$info1['perincian_kesalahan'].'-['.$info1['merit'].']' ?></option>
							
							<?php
						}
						?>
						</select><br>
						</td>
					</tr>
					<tr>
						<td>
							<label>Tempat: </label>
							<input type="text" name="tempat" size="50" placeholder="" required/>
						</td>
					</tr>
					
					<tr>
						<td>
							<label>Tindakan: </label>
							<select name="tindakan">
								<option value="">Pilihan Tindakan</option>
								<option value="1">kaunseling</option>
								<option value="2">amaran 1</option>
								<option value="3">amaran 2</option>
								<option value="4">buang sekolah</option>
								<option value="5">amaran 1</option>
								<option value="6">amaran 1</option>
							</select><br>
						</td>
					</tr>
					<tr>
						<td>
							<label>Perincian Lain: </label><br>
							<textarea name="perincian_lain" cols="60" rows="5"></textarea>
						</td>
					</tr>
				
					<tr>
						<td>
							<input type="submit" value="Simpan" name="submit" />
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</form><br>
</center>

</td>
<td valign="top" width="50%">

<center>
	<h3>SENARAI KESALAHAN</h3>
	<fieldset>
		<table width="100%" border="1" align="center">
			<tr>
				<td width="40"><b>Bil.</b></td>
				<td width="50"><b>Kesalahan</b></td>
				<td width="50"><b>Tarikh</b></td>
				<td width="50"><b>nilai merit</b></td>

			</tr>

		<?php
		
			$data1=mysqli_query($connection,"SELECT ref_kesalahan.perincian_kesalahan, DATE_FORMAT(maklumat_kesalahan_pelajar.tarikh,'%d/%m/%Y') AS tarikh,ref_kesalahan.merit FROM maklumat_kesalahan_pelajar JOIN maklumat_pelajar ON maklumat_pelajar.id_pelajar = maklumat_kesalahan_pelajar.id_pelajar JOIN ref_kesalahan ON maklumat_kesalahan_pelajar.id_kesalahan = ref_kesalahan.id_kesalahan WHERE maklumat_pelajar.no_kp ='$_GET[no_kp] ' ORDER BY maklumat_kesalahan_pelajar.tarikh DESC ");
			$no=1;
			while ($info1=mysqli_fetch_array($data1)) {

			
		?>

	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $info1['perincian_kesalahan']; ?></td>
		<td><?php echo $info1['tarikh']; ?></td>
		<td><?php echo $info1['merit']; ?></td>
	</tr>
		<?php
		$no++;
	}
		?>
		</table>
	</fieldset>

</center>

</td>
</tr>
</table>

<br>
<center>
	<a href="page_pensyarah.php">Ke Menu Utama</a><br>
	<a href="logout.php">Log keluar</a>
	</center>
</body>
</html>