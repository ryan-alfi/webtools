
<?php
include("koneksi.php");
	$data = mysql_query('SELECT COUNT(*) AS num FROM tArtikel') or die(mysql_error());
		$row = mysql_fetch_assoc($data);
		$numData = $row['num'];
		$numData+=1;
$TArtikel = $_POST['InputMessage'];
$query = "insert into tArtikel (id_artikel, judul, kategori) values (".$numData.", '$_POST[InputJudul]', '$_POST[InputKategori]')";
$result = mysql_query($query) or die("gagal insert artikel");
$TParagraf = explode("\n", $TArtikel);
$sel = " <select name='pos[]'>
				<option value=''>-</option>
			    <option value='CC'>CC</option>
				<option value='CD'>CD</option>
				<option value='DT'>DT</option>
				<option value='EX'>EX</option>
			    <option value='FW'>FW</option>
				<option value='IN'>IN</option>
				<option value='JJ'>JJ</option>
				<option value='JJR'>JJR</option>
			    <option value='JJS'>JJS</option>
				<option value='LS'>LS</option>
				<option value='MD'>MD</option>
				<option value='NN'>NN</option>
			    <option value='NNS'>NNS</option>
				<option value='NNP'>NNP</option>
				<option value='NNPS'>NNPS</option>
				<option value='PDT'>PDT</option>
				<option value='POS'>POS</option>
			    <option value='PRP'>PRP</option>
				<option value='PRPS'>PRPS</option>
				<option value='RB'>RB</option>
				<option value='RBR'>RBR</option>
			    <option value='RBS'>RBS</option>
				<option value='RP'>RP</option>
				<option value='SYM'>SYM</option>
				<option value='TO'>TO</option>
				<option value='UH'>UH</option>
			    <option value='VB'>VB</option>
				<option value='VBD'>VBD</option>
				<option value='VBG'>VBG</option>
				<option value='VBN'>VBN</option>
			    <option value='VBP'>VBP</option>
				<option value='VBZ'>VBZ</option>
				<option value='WDT'>WDT</option>
				<option value='WP'>WP</option>
				<option value='WPS'>WPS</option>
				<option value='WRB'>WRB</option>
				
			    </select>";
			$parBerapa = 0;
	?>
	<html>
	<head>
	<title>Set-POS | CodePoint</title>
	<form method="post" action="confirm.php">
	<input type='hidden' style='display:none' name="judul" value='<?php echo  $_POST["InputJudul"] ?>' >
	<input type='hidden' style='display:none' name="kategori" value='<?php echo  $_POST["InputKategori"] ?>' >
	
	<link rel="stylesheet" type="text/css" href="distSemantic/semantic.css" />
	<!--<link rel="stylesheet" href="ops/dist/css/styleBootstrap.css">-->
	 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" src="distSemantic/semantic.js"></script>
	</head>  
	<body>
	
	 
	<div class="ui stackable inverted divided relaxed grid">
			<?php 
	
	function multiexplode ($delimiters,$string) {
   
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
	}
	
	foreach($TParagraf as $elementP)
	{
		//echo "$elementP<br>";
		$TKalimat = explode(". ",$elementP);
				foreach($TKalimat as $elementK)
				{
				$data = mysql_query('SELECT COUNT(*) AS num FROM tKalimat') or die(mysql_error());
					$row = mysql_fetch_assoc($data);
					$numDataKalimat = $row['num'];
					$numDataKalimat+=1;
							
						//echo "<tr><td colspan=2>".$parBerapa."</td></tr>";
						$tkal = "insert into tKalimat (id_kalimat, kalimat,no_paragraf,id_artikel) values (".$numDataKalimat.", '$elementK','".$parBerapa."','".$numData."')";
						$result1 = mysql_query($tkal) or die("gagal insert kalimat");
						$TKata = multiexplode(array(",",".","|"," ","\""),$elementK);
						foreach($TKata as $elementKt)
						{
							utf8_decode($elementKt);

							echo "
									<div class='column'>
									<input type='hidden' style='display:none' name=idKalimat[] value='".$numDataKalimat."' ><input type='hidden' style='display:none' name=txtKata[] value='".$elementKt."' >".$elementKt."<br>".$sel."
									</div>";								
								";
							echo ";
						
						}
					 
				}
			$parBerapa++;
						
		
	}
			?>
	  </div>
	  <br>
		<button class="button-success pure-button">Submit</button>
		</form>
	</body>
	</html>
		<?php
//	echo "<script>alert ('data berhasil disimpan '); document.location='index.php'</script>";
?>