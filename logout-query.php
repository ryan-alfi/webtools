<?php session_start();

//disini INSERT DTABASE LOG
unset($_SESSION['email']);
unset($_SESSION['counter']);
header('location:index.php');
?>
 
<h2>Anda telah berhasil logout..</h2>
Silahkan klik <b>disini</b> untuk login kembali