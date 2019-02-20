<?php
if (!isset($_SESSION['log_nama'])) {
	die("Anda belum login");//mesej jika belum login
}
	if ($_SESSION['aras']!="Pensyarah") {
		die("Anda bukan Pengguna");//mesej jika salah pilih pengguna
	}
?>