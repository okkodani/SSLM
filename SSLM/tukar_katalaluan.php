<?php
$error='';
include "connection.php";
if(isset($_POST['submit'])){

	$log_nama=$_POST['log_nama'];
	$katalaluan_lama=$_POST['katalaluan_lama'];
	$katalaluan_baru=$_POST['katalaluan_baru'];

	echo "SELECT * FROM maklumat_pengguna WHERE log_nama='".$log_nama."' AND katalaluan='".$katalaluan_lama."'";

	$query=mysqli_query($connection,"SELECT * FROM maklumat_pengguna WHERE log_nama='".$log_nama."' AND katalaluan='".$katalaluan_lama."' ");
	 	
	 	if (mysqli_num_rows($query) ==0) {
	 		$error="log nama atau Katalaluan (sekarang) adalah salah";
	 	}

	 	else{

	 		session_start();
	 		$row=mysqli_fetch_assoc($query);

			if ($row['status'] ==1) {
				
	 		$data=mysqli_query($connection,"UPDATE maklumat_pengguna SET katalaluan='$katalaluan_baru' WHERE log_nama='$log_nama' AND katalaluan='$katalaluan_lama' ")or die(mysqli_error());

			//makluman jika rekod baru disimpan
			echo "<script>alert('Kemaskini katalaluan berjaya');
			window.location='index.php' </script>";

			}
	 		else{
	 			$error="pengguna tidak aktif";
	 		}
		}
}
#echo "out";
?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEM SALAH LAKU MURID KOLEJ VOKASIONAL SEPANG,SELANGOR</title>
</head>
<body>
<center>
	<h3>KOLEJ VOKASIONAL SEPANG,DENGKIL,SELANGOR</h3>
	<p>Tukar Katalaluan</p>

	<form class="" action="" method="post">
		<label>Log Nama: </label><input type="text" name="log_nama" required/><br>
		<label>Katalaluan (Sekarang): </label><input type="password" name="katalaluan_lama" required/><br>
		<label>Katalaluan (Baharu): </label><input type="password" name="katalaluan_baru" required/><br>
		<button type="submit" name="submit">Tukar</button><br/>
        <?php echo $error; ?>
       </form>
       
	<br><a href="index.php">Halaman Utama</a>
</center>
</body>
</html>