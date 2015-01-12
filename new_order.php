<?php
setcookie($_GET['id'], 1);

foreach($_POST as $key=>$value){
	setcookie($key, $value, time()+3600);}
header('location:basket.php');
	

