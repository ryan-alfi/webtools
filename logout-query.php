<?php session_start();
unset($_SESSION['email']);
header('location:index.php');
?>
 
<h2>Anda telah berhasil logout..</h2>
Silahkan klik <b>disini</b> untuk login kembali