
<?php
$TArtikel  = $_POST['inputMassage'];
$TParagraf = explode("</p>", $TArtikel);
foreach($TParagraf as $elementP){
	echo "$elementP<br>";
	$TKalimat = explode(". ",$elementP);
	foreach($TKalimat as $elementK){
		echo "$elementK<br>";
		$TKata = explode(" ",$elementK);
		foreach($TKata as $elementKt){
			echo "$elementKt<br>";
		}
	}
} 
?> 

