<?php
include("koneksi.php");
$query = "insert into tartikel (id_artikel, judul, kategori) values (NULL, '$_POST[InputJudul]', '$_POST[InputKategori]')";
$result = mysql_query($query) or die("gagal insert artikel");

$TArtikel = $_POST['InputMessage'];
$TParagraf = explode("</p>", $TArtikel);
	foreach($TParagraf as $elementP)
	{
		echo "$elementP<br>";
		$TKalimat = explode(". ",$elementP);
		foreach($TKalimat as $elementK)
			{
				echo "$elementK<br>";
				$tkal = "insert into tkalimat (id_kalimat, kalimat) values (NULL, '$elementK')";
				$result1 = mysql_query($tkal) or die("gagal insert kalimat");
				$TKata = explode(" ",$elementK);
			foreach($TKata as $elementKt)
				{
					echo "$elementKt<br>";
					$tkat = "insert into tkata (id_kata, kata) values (NULL, '$elementKt')";
					$result2 = mysql_query($tkat) or die("gagal insert kata");
				} 
			}
	}
	echo "<script>alert ('data berhasil disimpan '); document.location='index.php'</script>";
?>