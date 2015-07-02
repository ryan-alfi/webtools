<?php
	include("koneksi.php");
	$id = $_POST['id'];
	$pos = $_POST['pos'];

	$even = mysql_query("UPDATE tkata SET pos = '".$pos."' WHERE id_kata = '".$id."'");
	if($even)
		echo "true";
	else
		echo "false";
?>