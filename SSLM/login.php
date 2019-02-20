<!--<?php
$error='';
include "connection.php";
if(isset($_POST['submit'])){

	$log_nama=$_POST['log_nama'];
	$katalaluan=$_POST['katalaluan'];
	$aras=$_POST['aras'];

#echo "SELECT * FROM maklumat_pengguna WHERE log_nama='".$log_nama."' AND katalaluan='".$katalaluan."'  ";
	$query=mysqli_query($connection,"SELECT * FROM maklumat_pengguna WHERE log_nama='".$log_nama."' AND katalaluan='".$katalaluan."'  ");
	 	
	 	if (mysqli_num_rows($query) ==0) {
	 		$error="log nama atau Katalaluan adalah salah";
	 	}

	 	else{

	 		session_start();
	 		$row=mysqli_fetch_assoc($query);

			if ($row['status'] ==1) {
				
	 		$_SESSION['log_nama']=$row['log_nama'];
	 		$_SESSION['no_kp']=$row['no_kp'];
	 		$_SESSION['aras']=$row['aras'];
	 		$_SESSION['id_pengguna']=$row['id_pengguna'];

	 			if ($row['aras']=="Admin") { //} && $aras=="1") {
	 				header("location:page_admin.php");
	 			}
	 			elseif ($row['aras']=="Pensyarah") { //} && $aras=="2") {
	 				header("location:page_pensyarah.php");
	 			}
	 			elseif ($row['aras']=="Pelajar") { //} && $aras=="3") {
	 				header("location:page_pelajar.php?no_kp=".$row['no_kp']);
	 			}
	 			else{
	 				$error="Log Masuk ke Sistem Gagal";
	 			}
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
	<h3>Log Masuk Sistem Salah Laku Murid<br>KOLEJ VOKASIONAL SEPANG,DENGKIL,SELANGOR</h3>
	<p>Masukkan log nama dan Katalaluan</p>

	<form class="" action="" method="post">
		<label>Log Nama: </label><input type="text" name="log_nama" required/><br>
		<label>Katalaluan: </label><input type="password" name="katalaluan" required/><br>
		<label>Aras: </label>
				<input type="text" readonly value="<?php echo$_GET['aras']; ?>" name="aras" required/>

			<select name="aras">
				<option value="">Pilihan Pengguna</option>
				<option value="1" <?php if($_GET['aras']=="Admin"){?> selected <?php } ?> >Admin</option>
				<option value="2" <?php if($_GET['aras']=="Pensyarah"){?> selected <?php } ?> >Pensyarah</option>
				<option value="3" <?php if($_GET['aras']=="Pelajar"){?> selected <?php } ?> >Pelajar</option>
			</select><br>
		<button type="submit" name="submit">Log Masuk</button><br/>
        <?php echo $error; ?>
       </form>
        <?php if($_GET['aras']=="Admin" || $_GET['aras']=="Pensyarah" ){ ?>
	<b>Belum Berdaftar?</b><br><a href="daftar.php?aras=<?php echo$_GET['aras']; ?>">Daftar di sini</a>

	<?php
	}
	?>

	<br><a href="index.php">Halaman Utama</a>
</center>
</body>
</html>

#off sementara sbb dh buat login lain,
#p/s jgn buang code ori ni.-->
