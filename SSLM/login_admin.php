<?php
$error='';
include "connection.php";
if(isset($_POST['submit'])){
echo "submited";
	$log_nama=$_POST['log_nama'];
	$katalaluan=$_POST['katalaluan'];
	$aras=$_POST['aras'];


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
?>
<!DOCTYPE html>
<html>
<head>
	<title>SISTEM SALAH LAKU MURID KOLEJ VOKASIONAL SEPANG,SELANGOR</title>
	 <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	 <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
   <!--  <script src="jquery-min/bootstrap.min.js"></script> 
     <script src="jquery-min/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
 -->

</head>
<body>
<center>
	<h3>Log Masuk Sistem Salah Laku Murid<br>KOLEJ VOKASIONAL SEPANG,DENGKIL,SELANGOR</h3>
	<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/admin.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    	<form method="post">
		<!--<label>Aras: </label>--><input type="text" readonly value="<?php echo$_GET['aras']; ?>" name="aras" required/>
		<label>Log Nama: </label><input type="text" id="login" class="fadeIn second"  name="log_nama" placeholder="Log Nama" required/><br>
		<label>Katalaluan: </label><input type="password" id="password" class="fadeIn third"  name="katalaluan" placeholder="password" required/><br>
		
<br>
		<input type="submit" class="fadeIn fourth" name="submit" value="Log In"><br>
		<div class="alert alert-warning"><?php echo $error; ?></div>
       </form>
        

        <?php if($_GET['aras']=="Admin" || $_GET['aras']=="Pensyarah" ){ ?>
	<b>Belum Berdaftar?</b><a href="daftar.php?aras=<?php echo$_GET['aras']; ?>">Klik di sini</a>

	<?php
	}
	?>

	<br><br><a href="index.php">Halaman Utama</a>
    <!-- Remind Passowrd -->
    <!--<div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>-->

  </div>
</div>
</center>
</body>
</html>