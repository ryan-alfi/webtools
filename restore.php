<?php 
	include("koneksi.php");
        session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }

	require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tkata where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>View Artikel | CodePoint</title>
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
                <li ><a href="app.php">Home</a></li>
               <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">View <b class="caret"></b></a>
            <ul class="dropdown-menu">
                    <li><a href="view.php">Artikel</a></li>
                    <li><a href="tes.php">Kata</a></li>
                    <li><a href="view-fr.php">Frasa</a></li>
                </ul>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout-query.php">Logout</a></li>
            </ul>
        </div>
    </nav>

	<br>
	<header>
		<h3 align="center">List Kata</h3>
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
			$data = mysql_query("SELECT * FROM tkata where id = '".$_GET['id']."'");
			while($key = mysql_fetch_assoc($data)) {
	?>
			<tr>
				<td><?php echo $key["kata"] ?></td>
				<td><input value="<?php echo $key["pos"] ?>" onblur="updated(<?php echo $key["id_kata"] ?>, this.value)" ></td>				
			</tr>
	<?php
			}
		?> 
	</tbody>
</table>

	<a href="restore-submit.php?id=<?php echo $_GET['id']; ?>"><button class="btn btn-success pull-right" >Verified</button></a>
	
	<br>
</div>	
</body>
<script >
	$(document).ready(function(){
		$("#myTab").DataTable();
	});		
		
	function updated(id,valbaru){
		$.ajax({
			type:"post",
			cache: false,
			url:'update.php',
			data:'id='+id+'&pos='+valbaru,
			success:function(data){
				data!="true"?alert(valbaru+" Saved"):alert("Cannot Save.");
			}
		});
	}

</script>

</html>

<!-- here is update.php -->
