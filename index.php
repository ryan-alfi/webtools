<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login | CodePoint</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>POS TAGGING <small>CodePoint's simple login</small></h1>
</div>

<!-- Simple Login - START -->
<form class="col-md-12" method="post" action="login-query.php">
    <div class="form-group">
        <input type="text" class="form-control input-lg" name='email' placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control input-lg" name='password' placeholder="Password">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Sign In</button>
        <br>
<!--         <span class="pull-right"><a href="regis.html">New Registration</a></span> -->
    </div>
</form>
<!-- Simple Login - END -->

</div>

</body>
</html>