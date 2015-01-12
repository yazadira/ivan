<?php
$id=(int)$_GET['id'];
$val=(int)$_POST['tov'];
setcookie($id,$val,time()+60*60);
header('location:basket.php');