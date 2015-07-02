<?php 
require_once("koneksi.php");
$n = $_POST['nama'];
$p = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['password'];
$cekuser = mysql_query("SELECT * FROM tuser WHERE email = '$email'");
if(mysql_num_rows($cekuser) <> 0) {
echo "<script type='text/javascript'>alert('Sudah Terdaftar.');</script>";
header('Location:regis-spv.html');
} else {
if(!$email || !$pass) {
echo "Masih ada data yang kosong!";
header('Location:regis-spv.html');
} else {
$simpan = mysql_query("INSERT INTO tuser(name,phone,email, password,status) VALUES('$n','$p','$email','$pass',1)");
if($simpan) {
echo "Pendaftaran Sukses, Silahkan <a href='supervisor.php'>Login</a>";
} else {
echo "Proses Gagal!";
}
}
}
?>