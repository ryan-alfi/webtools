<?php
	include "koneksi.php";	
	$judul = $_POST['InputJudul'];
	$kategori = $_POST['InputKategori'];
	$qeury = mysql_query("INSERT INTO tartikel(judul,kategori) value ('".$judul."','".$kategori."')");
 header("splitted.php");
?>