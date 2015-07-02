<?php 
	include("koneksi.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Coba</title>
</head>
<body>
<table>
	<tbody>
		<?php
			$data = mysql_query('SELECT * FROM tkata');
			while($key = mysql_fetch_assoc($data)) {
	?>
			<tr>
				<td><input value="<?php echo $key["kata"] ?>" onblur="update(<?php $key["id_kata"] ?>, 'this.value')" ></td>				
			</tr>
	<?php
			}
		?>
	</tbody>
</table>
</body>
<script type="text/javascript">
	function update(id, valbaru){
		$.ajax({
			type:"post",
			cache: false,
			url:update.php
			data:'id='+id+'&kata='+valbaru
			success:function(data){
				if(data=="true")
					
				else 
					
			}			
		});
	}
</script>
</html>

<!-- here is update.php -->
