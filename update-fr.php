<?php
	include("koneksi.php");
	$id = $_POST['id'];
	$pos = $_POST['pos'];

	$even = mysql_query("UPDATE tfrasa SET pos = '".$pos."' WHERE id_frasa = '".$id."'");
	if($even)
		echo "true";
	else
		echo "false";
?>