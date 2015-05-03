<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>WebTools PoS | CodePoint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>WebTools form <small>A CodePoint WebTools PoS form with standard fields</small></h1>
	<a href="logout-query.php" style="color:white;"><button class="btn btn-primary pull-right">Log Out</button></a>
</div>

<!-- Registration form - START -->
<div class="container">
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
						<option value="Opini">Cerpen</option>						
					</select>
					
                </div>
                <div class="form-group">
                    <label for="InputMessage">Isi Artikel</label>
                    <div class="input-group">
                        <textarea name="InputMessage" id="InputMessage" class="form-control" rows="15" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
				<br><br><br><br>
            </div>
        </form>
    </div>
</div>
<!-- Registration form - END -->

</div>

</body>
</html>