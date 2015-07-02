<?php 
    include("koneksi.php");
    session_start();
        if(!isset($_SESSION['email'])){
        header('location:supervisor.php');
    }
    $user =$_SESSION['email']; 
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard | Codepoint</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme-change-size.css">

        <!-- Datatables -->
        <link rel="stylesheet" media="screen" href="css/DT_bootstrap.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bootstrap-admin-with-small-navbar">
        <!-- main / large navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
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
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>

        <div class="container">
            <!-- left, vertical navbar & content -->
            <div class="row">
                <!-- content -->
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-header">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">List Artikel</div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <table class="table table-striped table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $data = mysql_query('SELECT * FROM tmentahan where status=1');
                                                while($key = mysql_fetch_assoc($data)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $key["judul"] ?></td>
                                                    <td><?php echo $key["kategori"] ?></td>
                                                    <td><a class="btn btn-success" href="view-spv.php?id=<?php echo $key["id"] ?>">View</a></td>
                                                </tr>
                                        <?php
                                                }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="text-muted bootstrap-admin-box-title">List Restore</div>
                                </div>
                                <div class="bootstrap-admin-panel-content">
                                    <table class="table table-striped table-bordered" id="restore">
                                        <thead>
                                            <tr>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $data = mysql_query("SELECT * FROM tmentahan m, tlog l where l.id = m.id and m.status=5 and l.spv= '".$user."'");
                                                while($key = mysql_fetch_assoc($data)) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $key["judul"] ?></td>
                                                    <td><?php echo $key["kategori"] ?></td>
                                                    <td><a class="btn btn-success" href="view-spv.php?id=<?php echo $key["id"] ?>">View</a></td>
                                                </tr>
                                        <?php
                                                }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="navbar navbar-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <footer role="contentinfo">
                            <p class="right">&copy; 2015 <a href="" target="_blank">codepoint-id.com</a></p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/DT_bootstrap.js"></script>

    </body>
</html>
