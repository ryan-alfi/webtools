<!DOCTYPE html>
<?php
include ("koneksi.php");
$query = "select * from tkata";
$result = mysql_query($query);
$total = mysql_num_rows($result);
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>tabel</title>
</head>
<body>
	<table border="1">
	
		<tr>
			<!--perulangan-->
			<?php while ($data = mysql_fetch_array($result)) { ?>
			<td><?php echo $data['kata']; ?></td>
			<?php } ?>
			<!--perulangan-->
		</tr>
		<tr>
			<?php
			$data = mysql_query('SELECT COUNT(`id_kata`) AS num FROM `tkata`') or die(mysql_error());
			$row = mysql_fetch_assoc($data);
			$numData = $row['num'];
			for ($x = $numData ; $x > 0; $x--) { ?>
		    <td>
			    <select name='pos'>
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
			<?php } ?>
		</tr>
	</table>
</body>
</html>