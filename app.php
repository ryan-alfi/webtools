<?php 
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>WebTools PoS | CodePoint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap-dropdown.js"></script>
	
	  <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li class="active"><a href="#">Home</a></li>
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
<div class="page-header">
    <h1>WebTools form <small>A CodePoint WebTools PoS form with standard fields</small></h1>
	
</div>

<!-- Registration form - START -->
<div class="container">
    
 <!--    <div class="col-md-3">
    <a href="view.php" style="color:white;"><button class="btn btn-primary pull-left">View Artikel</button></a>
    <a href="tes.php" style="color:white;"><button class="btn btn-primary pull-left">View Kata</button></a>
    <a href="view-fr.php" style="color:white;"><button class="btn btn-primary pull-">View Frasa</button>

    </div> -->
    <div class="row">
        <form role="form" action="splitted.php" method="POST">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Judul</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="InputJudul" placeholder="Masukkan Judul" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Kategori</label>
                    <select class="form-control" name="InputKategori">
						<option value="Opini">Opini</option>
						<option value="Olahraga">Olahraga</option>
						<option value="Cerpen">Cerpen</option>
                        <option value="Lain-lain">Lain-lain</option>						
					</select>
					
                </div>
                <div class="form-group">
                    <label for="InputMessage">Isi Artikel</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="15" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-success pull-right">
				<br><br><br><br>
            </div>
        </form>
    </div>
</div>
<!-- Registration form - END -->

</div>
</body>
</html>