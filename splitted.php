<!DOCTYPE html>
<html>
<head>
	<title>Set-PoS | CodePoint </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
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
	$parBerapa = 0;
	$txt = $_POST['InputMessage'];
	$sen = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $txt);
?>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h3>Sentences</h3>
				<p><?php echo $txt ?></p>
				<h3>Splitted</h3>
				<form>
					<table class="table table-hover">
						<tbody>
							<?php 
						
								foreach ($sen as $key) {
								echo '<tr>';
								$word = explode(" ", $key);
								$ln = count($word);
								$arr = array();
								$obj = new stdClass();
								for ($i=0; $i < $ln; $i++) {
									$z = substr($word[$i], -1);
									if(($z==","||$z=="."||$z=="!"||$z=="?"||$z=="/"||$z=="("||$z==")"||$z==":")&&strlen($word[$i])>1){
										$obj->i = $i+1;
										$obj->v = $z;
										array_push($arr, $obj);
										$obj = clone $obj;
									}
									if(($z==","||$z=="."||$z=="!"||$z=="?"||$z=="/"||$z=="("||$z==")"||$z==":")&&strlen($word[$i])>1)
										$word[$i] = mb_substr($word[$i], 0, -1);
								}

								$i=0;
								foreach ($arr as $key) {
									array_splice($word, $key->i+$i, 0, array($key->v));
									$i++;
								}

								$ln = count($word);
								for ($i=0; $i < $ln; $i++) { 
									echo '<td>'.$word[$i].'</td>';
									if(($i+1)<$ln){
 								?>
	 									<td>
	 										<button type="button" class="btn btn-default" onclick="join('<?php echo $word[$i] ?>','<?php echo $word[$i+1] ?>')">+</button>
										</td>
 								<?php
							 		}
								}
								echo '</tr>';
								echo '<tr>';
								for ($i=0; $i < $ln; $i++) { 
							?>
									<td>
										<select name='pos[]'>
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
										</select>
									</td>
									<td></td>
							<?php
								}
								echo '</tr>';
							} ?>
						</tbody>
					</table>
					<h3>Joinned</h3>
					<table class="table table-hover" id="myTable">
						<thead>
							<th>Kata Gabungan</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<script type="text/javascript">
		function join(a,b){
			var w = a+' '+b;
			var comp = '<tr>'+
						'<td>'+w+'</td>'+
						'<td>'+
						'<select name="posf[]">'+
						'<option value="">-</option>'+
											'<option value="CC">CC</option>'+
											'<option value="CD">CD</option>'+
											'<option value="DT">DT</option>'+
											'<option value="EX">EX</option>'+
											'<option value="FW">FW</option>'+
											'<option value="IN">IN</option>'+
											'<option value="JJ">JJ</option>'+
											'<option value="JJR">JJR</option>'+
											'<option value="JJS">JJS</option>'+
											'<option value="LS">LS</option>'+
											'<option value="MD">MD</option>'+
											'<option value="NN">NN</option>'+
											'<option value="NNS">NNS</option>'+
											'<option value="NNP">NNP</option>'+
											'<option value="NNPS">NNPS</option>'+
											'<option value="PDT">PDT</option>'+
											'<option value="POS">POS</option>'+
											'<option value="PRP">PRP</option>'+
											'<option value="PRPS">PRPS</option>'+
											'<option value="RB">RB</option>'+
											'<option value="RBR">RBR</option>'+
											'<option value="RBS">RBS</option>'+
											'<option value="RP">RP</option>'+
											'<option value="SYM">SYM</option>'+
											'<option value="TO">TO</option>'+
											'<option value="UH">UH</option>'+
											'<option value="VB">VB</option>'+
											'<option value="VBD">VBD</option>'+
											'<option value="VBG">VBG</option>'+
											'<option value="VBN">VBN</option>'+
											'<option value="VBP">VBP</option>'+
											'<option value="VBZ">VBZ</option>'+
											'<option value="WDT">WDT</option>'+
											'<option value="WP">WP</option>'+
											'<option value="WPS">WPS</option>'+
											'<option value="WRB">WRB</option>'+
						'</select>'+
						'</td>'+
						'<td><button type="button" class="btn btn-warning" onclick="rm(this)">Hapus</button></td>'+
						'</tr>';
			$("#myTable").append(comp);
		}

		function rm(e)
		{
		    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
		}
	</script>
</body>
</html>