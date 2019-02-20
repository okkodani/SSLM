
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

			$data1=mysqli_query($connection,"SELECT 60-sum(ref_kesalahan.merit) AS merit, CASE WHEN 60-sum(ref_kesalahan.merit) <=30 then '-Keluarkan surat amaran' ELSE '' END AS amaran FROM maklumat_kesalahan_pelajar JOIN maklumat_pelajar ON maklumat_pelajar.id_pelajar = maklumat_kesalahan_pelajar.id_pelajar JOIN ref_kesalahan ON maklumat_kesalahan_pelajar.id_kesalahan = ref_kesalahan.id_kesalahan WHERE maklumat_pelajar.no_kp ='".$_GET['no_kp']."'");
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
<td valign="top" width="100%">
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
		
			$data1=mysqli_query($connection,"SELECT ref_kesalahan.perincian_kesalahan, DATE_FORMAT(maklumat_kesalahan_pelajar.tarikh,'%d/%m/%Y') AS tarikh,ref_kesalahan.merit FROM maklumat_kesalahan_pelajar JOIN maklumat_pelajar ON maklumat_pelajar.id_pelajar = maklumat_kesalahan_pelajar.id_pelajar JOIN ref_kesalahan ON maklumat_kesalahan_pelajar.id_kesalahan = ref_kesalahan.id_kesalahan WHERE maklumat_pelajar.no_kp ='".$_GET['no_kp']." ' ORDER BY maklumat_kesalahan_pelajar.tarikh DESC ");
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
	<a href="page_pelajar.php">Ke Menu Utama</a><br>
	<a href="logout.php">Log keluar</a>
	</center>
</body>
</html>