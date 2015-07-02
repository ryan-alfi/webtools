<?php 
session_start();
require_once("koneksi.php");
$email = $_POST['email'];
$pass = $_POST['password'];
$_SESSION['counter'] = 0;
$cekuser = mysql_query("SELECT * FROM tuser WHERE email = '$email' AND status = 1");
$jumlah = mysql_num_rows($cekuser);
$hasil = mysql_fetch_array($cekuser);
if($jumlah == 0) {
echo "Email Belum Terdaftar!";
echo "<a href='supervisor.php'> Back</a>";
} else {
if($pass <> $hasil['password']) {
echo "Password Salah!
";
echo "<a href='supervisor.php'> Back</a>";
} else {
$_SESSION['email'] = $hasil['email'];
header('location:tables-spv.php');
}
}
?>