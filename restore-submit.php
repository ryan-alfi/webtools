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
        header("Location: tables.php");
    } else {


$ganti = mysql_query("UPDATE tmentahan SET status='5' WHERE id='".$_GET['id']."'") or die(mysql_error());  

}
 header('location:tables.php');
 ?>