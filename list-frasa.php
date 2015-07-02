<?php 
	include("koneksi.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Kata | CodePoint</title>
	<style type="text/css">
         ul{
        padding: 0;
        list-style: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;
    }
   
    ul li:hover ul{
        display: block; /* display the dropdown */
    }
    </style>
	  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	
</head>
<body>

<div class="container">
<nav role="navigation" class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">POS TAGGING</a>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li ><a href="tables-spv.php">Home</a></li>
               <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">View <b class="caret"></b></a>
            <ul class="dropdown-menu">
                    <li><a href="view-verified.php">Artikel Verified</a></li>
                    <li><a href="list-kata.php">List Kata</a></li>
                    <li><a href="list-frasa.php">List Frasa</a></li>
                </ul>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout-spv.php">Logout</a></li>
            </ul>
        </div>
    </nav>

	<br>
	<header>
		<h3 align="center">List Frasa</h3>
	</header>
	<div class="table">
<table id="myTab" class="table table-striped table-bordered display">
	<thead>
		<tr>
			<th>Kata</th>
			<th>Pos</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$data = mysql_query('SELECT * FROM tfrasa GROUP BY frasa');
			while($key = mysql_fetch_assoc($data)) {
	?>
			<tr>
				<td><?php echo $key["frasa"] ?></td>
				<td><?php echo $key["pos"] ?></td>
				<!-- <td><input value="<?php echo $key["pos"] ?>" onblur="updated(<?php echo $key["id_frasa"] ?>, this.value)" ></td>				 -->
			</tr>
	<?php
			}
		?> 
	</tbody>
</table>
</div>	
</body>
<script >
	$(document).ready(function(){
		$("#myTab").DataTable();
	});		
		
	// function updated(id,valbaru){
	// 	$.ajax({
	// 		type:"post",
	// 		cache: false,
	// 		url:'update-fr.php',
	// 		data:'id='+id+'&pos='+valbaru,
	// 		success:function(data){
	// 			data!="true"?alert(valbaru+" Saved"):alert("Cannot Save.");
	// 		}
	// 	});
	// }

</script>

</html>

<!-- here is update.php -->
