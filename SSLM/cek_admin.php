<?php
if (!isset($_SESSION['log_nama'])) {
	die("anda belum login");//mesej jika belum login
}
if ($_SESSION['aras']!="Admin") {
	die("Anda bukan Admin");//mesej bukn admin
}
?>