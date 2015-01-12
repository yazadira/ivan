<?php
$id=(int)$_GET['id'];
setcookie($id,null);
header('location:basket.php');