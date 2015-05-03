<?php 
require_once("koneksi.php");
$email = $_POST['email'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM tuser WHERE email = '$email'");
if(mysql_num_rows($cekuser) <> 0) {
echo "<script type='text/javascript'>alert('Sudah Terdaftar.');</script>";
header('Location:regis.html');
} else {
if(!$email || !$pass) {
echo "Masih ada data yang kosong!";
header('Location:regis.html');
} else {
$simpan = mysql_query("INSERT INTO tuser(email, password) VALUES('$email','$pass')");
if($simpan) {
echo "Pendaftaran Sukses, Silahkan <a href='index.php'>Login</a>";
} else {
echo "Proses Gagal!";
}
}
}
?>