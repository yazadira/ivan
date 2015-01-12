<?php
require_once("/config/config.php");

$id=(int)$_POST['id'];
$query="SELECT * FROM $tbl_pictures WHERE id=$id";
$cat=mysql_query($query);
	if(!cat){
		exit(query);
	}
$pic=mysql_fetch_array($cat);
?>
<div align="center">
<h2><?=$pic['name'];?></h2>
<?php
if($pic['picture']){
	$picture="<img src='media/img/".$pic['picture']."' width=100% />";
	}
	else{
		$picture='-';
	}
	echo $picture;
	echo $pic['body'];