<?php
set_time_limit(0);
 include "koneksi.php";
 session_start();
 $id_artikel = $_SESSION['id_artikel'];
 $ar_judul = $_SESSION['judulArtikel'];
 $user = $_SESSION['email'];
 $ar_kategori = $_SESSION['kategotiArtikel'];
 $nokal = $_POST['noK'];
 $kata = $_POST['kat'];
 $pos = $_POST['pos'];
 $kal = $_POST['kal'];
 $nopar = $_POST['noP'];
 $frasa = $_POST['gab'];
 $posfrasa = $_POST['posf'];

$qeury = mysql_query("INSERT INTO tartikel(judul,kategori) value ('".$ar_judul."','".$ar_kategori."')");

$ganti = mysql_query("UPDATE tmentahan SET status='1' WHERE id='".$id_artikel."'") or die(mysql_error());  

for($i=0; $i < sizeof($kal); $i++){
 	$sql1 = mysql_query("INSERT INTO tkalimat(no_paragraf,kalimat,id_artikel) VALUES('".$nopar[$i]."','".$kal[$i]."','".$id_artikel."')");
 }

for ($o=0; $o < sizeof($nokal) ; $o++) { 
for($i=0;$i<sizeof($pos);$i++){
 	$query = mysql_query("INSERT INTO tkata(kata,pos,id_kalimat,id) VALUES('".$kata[$i]."','".$pos[$i]."','".$nokal[$o]."','".$id_artikel."')");
}
}

$sql2 = mysql_query("INSERT INTO tlog(email,id) VALUES('".$user."','".$id_artikel."')");

if(empty($frasa)){
	echo "Tidak ada Frasa?";
}else{
	for($i=0;$i<sizeof($frasa);$i++){
	$query1 = mysql_query("INSERT INTO tfrasa(frasa,pos,id) VALUES('".$frasa[$i]."','".$posfrasa[$i]."','".$id_artikel."')");
	}
}



 header('location:tables.php');
 ?>
