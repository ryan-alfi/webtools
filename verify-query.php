<?php
set_time_limit(0);
 include "koneksi.php";
 session_start();
 $user = $_SESSION['email'];
 
 require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: tables-spv.php");
    } else {


$ganti = mysql_query("UPDATE tmentahan SET status='2' WHERE id='".$_GET['id']."'") or die(mysql_error());  

$sql2 = mysql_query("UPDATE tlog SET spv='".$user."' WHERE id='".$_GET['id']."'");

header('location:tables-spv.php');
}
 ?>
