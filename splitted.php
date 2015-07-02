<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
 ?>
<!DOCTYPE html>
<?php
	include("koneksi.php");
	$judul = $_POST['InputJudul'];
	$sql = mysql_query("SELECT id_artikel FROM tartikel where judul='".$judul."'");
?>
<html>
<head>
	<title>Set-PoS | CodePoint </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	.kolom, .kata, .tombol{
	 float: left;
	}
	.kolom{
		min-width: 100px; 
		margin: 5px 5px 5px 5px; 
	}
	.tombol{
		margin-left: 3px;
	}
	div.scroll {
	height: 250px;
	width: 600px;
	overflow: auto;
	padding: 8px;
	}
	.bawah{
		clear: both;
    	margin-bottom: 2px;
		width: 600px;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<h3>Sentences</h3>
				<div class="scroll">
				<p><?php 
						$txt = $_POST['InputMessage']; 
						echo $txt; ?></p>
				</div>
				<div class="atas">
				<h3>Splitted</h3>
				<?php
				
							$data = mysql_query('SELECT COUNT(*) AS num FROM tartikel') or die(mysql_error());
									$row = mysql_fetch_assoc($sql);
									$numData = $row['id_artikel'];

							$parg = null;
							$TArtikel = $_POST['InputMessage'];
							$KArtikel = $_POST['InputKategori'];
							$parg = explode("\n", $TArtikel);
							$_SESSION['id_artikel']=$numData;
							$_SESSION['judulArtikel']=$judul;
							$_SESSION['kategotiArtikel']=$KArtikel;
					 
?>
				<form name="myForm" action="input_splitted.php" method="post" onsubmit="validateForm()">
					<!--<table class="table table-hover">
						<tbody>-->
							<?php
								$parBerapa = 1;	
								$kalBerapa = 1;	
								$patterns = array();
								$patterns[0] = '/\(/';
								$patterns[1] = '/\)/';
								//$patterns[2] = '/\"(?=.+")/';
								$patterns[2] = '/(?=".+)"/';
								$replacements = array();
								$replacements[2] = '( ';
								$replacements[1] = ' )';
								$replacements[0] = ' " ';
								//$replacements[0] = ' " ';		
								$j=0;		
								foreach ($parg as $keys) {
									echo '<input type="text" name="noP[]" value="'.$parBerapa.'" style="display:none" >';
									$arrKal = array("no_paragraf" => $parBerapa, "kalimat" => $keys);
									$sen = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $keys); 
								foreach ($sen as $key) {
								echo '<input type="text" name="noK[]" value="'.$kalBerapa.'" style="display:none" >';
								echo '<div class=\'kalimat\'>';
								$klmt = preg_replace($patterns, $replacements, $key);
								$klmt = preg_replace('!\s+!', " ", $klmt);
								$klmt = trim($klmt);
								if (!empty($klmt)){
									echo '<input type="text" name="kal[]" value="'.$klmt.'" style="display:none" >';
								}
								$word = explode(" ", $klmt);
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
									
									$j++;
									echo '<div class=\'kolom\'><div class=\'kata\'>
									<input type="text" name="kat[]" id=\'kataa-'.$j.'\' value="'.$word[$i].'" ><br>';
									echo '<select name="pos[]" required>'.
											'<option value="">-</option>'.
											'<option value="CC">CC</option>'.
											'<option value="CD">CD</option>'.
											'<option value="DT">DT</option>'.
											'<option value="EX">EX</option>'.
											'<option value="FW">FW</option>'.
											'<option value="IN">IN</option>'.
											'<option value="JJ">JJ</option>'.
											'<option value="JJR">JJR</option>'.
											'<option value="JJS">JJS</option>'.
											'<option value="LS">LS</option>'.
											'<option value="MD">MD</option>'.
											'<option value="NN">NN</option>'.
											'<option value="NNS">NNS</option>'.
											'<option value="NNP">NNP</option>'.
											'<option value="NNPS">NNPS</option>'.
											'<option value="PDT">PDT</option>'.
											'<option value="POS">POS</option>'.
											'<option value="PRP">PRP</option>'.
											'<option value="PRPS">PRPS</option>'.
											'<option value="RB">RB</option>'.
											'<option value="RBR">RBR</option>'.
											'<option value="RBS">RBS</option>'.
											'<option value="RP">RP</option>'.
											'<option value="SYM">SYM</option>'.
											'<option value="TO">TO</option>'.
											'<option value="UH">UH</option>'.
											'<option value="VB">VB</option>'.
											'<option value="VBD">VBD</option>'.
											'<option value="VBG">VBG</option>'.
											'<option value="VBN">VBN</option>'.
											'<option value="VBP">VBP</option>'.
											'<option value="VBZ">VBZ</option>'.
											'<option value="WDT">WDT</option>'.
											'<option value="WP">WP</option>'.
											'<option value="WPS">WPS</option>'.
											'<option value="WRB">WRB</option>'.
											'<option value="NONE">Empty</option>'.
										'</select></div>';
										
				
									if(($i+1)<$ln){
 								?>
	 									<div class='tombol'>
	 										<button type="button" class="btn btn-info" onclick="join('<?php echo $j ?>')">+</button>
										</div>
										</div>
 								<?php
							 		}
								}
								$kalBerapa++;
								echo '</div>';
								}
								$parBerapa++;
							}
							
						?>
					<!--	</tbody>
					</table> -->
					</div>
					<div class="bawah"><br>
					<h3>Joinned</h3>
					<a class="btn btn-primary" id='btn-tambah' >Tambah Kata</A>
					<table class="table table-hover" id="myTable">
						<thead>
							<th>Kata Gabungan</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</thead>
						<tbody id='bodinyatable'>
							
						</tbody>
					</table>
					<button type="submit" class="btn btn-success">Submit</button>
					</div>
			</div>
				</form>
			<div class="col-md-2"></div>
		</div>
	</div>

	<script type="text/javascript">
	var idnyabaris = 0;
	var aktif = 0;
	function klik(id){
			aktif = id;
		}
		
	$(document).ready(function(){
		$("#btn-tambah").on("click",function(){
			idnyabaris++;
			aktif=idnyabaris;
			var comp = '<tr id=\'baris-'+idnyabaris+'\'>'+
						'<td><input type="text"  name="gab[]" onClick=\'klik('+idnyabaris+')\' class=\'gabungan\' id="gabungan-'+idnyabaris+'" value="" ></td>'+
						'<td>'+
						'<select name="posf[]" id="posfrasa">'+
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
						'</form></tr>';
			$("#bodinyatable").append(comp);
		});
	});
		function join(id){
			$("#gabungan-"+aktif).val($("#gabungan-"+aktif).val()+" "+$("#kataa-"+id).val()	);
		/*
				
			var w = a+' '+b;
			var comp = '<tr>'+
						'<td><input type="text" name="gab[]" id="gabungan" value="'+w+'" style="display:none;">'+w+'</td>'+
						'<td>'+
						'<select name="posf[]" id="posfrasa">'+
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
						'</form></tr>';
			$("#myTable").append(comp);
*/
		}

		function rm(e)
		{
		    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
		}
		function validateForm() {
		    var x = document.forms["myForm"]["pos"].value;
		    if (x == "-") {
		        alert("Name must be filled out");
		        return false;
		    }
		}

		function finishSubmit(gab){
		  var gab = $("#gabungan").val();
		  var posf = $("#posfrasa").val();

		  $.ajax({
		   type:"post",
		   cache:false,
		   url:"input_splitted.php",
		   data:"gab="+gab+"&posfrasa="+posf,
		   success:function(data){
		    if(data!="true")
		     $.Notify.show(data);
		    else
		     location.reload();
		   }
		  });
		 }

	</script>
</body>
</html>