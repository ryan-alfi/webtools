<?php 
include("koneksi.php");
echo $_POST["judul"];
echo $_POST["kategori"];

	$txtKata = ($_POST["txtKata"]);
	$pos = ($_POST["pos"]);
	$idKalimat = ($_POST["idKalimat"]);
	
for ($i=0;$i<count($txtKata);$i++) {
   $queryk = "insert into tKata (id_kalimat, kata,pos) values (".$idKalimat[$i].", '".$txtKata[$i]."', '".$pos[$i]."')";
   $resultk = mysql_query($queryk) or die(mysql_error());
   $i++;
}
	
	

	
echo "<script>alert ('Data Berhasil Disimpan '); document.location='index.php'</script>";
?>