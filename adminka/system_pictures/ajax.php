<?php
require_once("../../config/config.php");
require_once("../../media/phpQuery/phpQuery/phpQuery.php");

$query="SELECT * FROM $tbl_goods WHERE picture=''";
	$cat=mysql_query($query);
		if(!$cat){
			exit($query);
		}
	while($tov=mysql_fetch_array($cat)){
		echo $tov['name'];
		$str=@ereg_replace(" ", "+", $tov['name']);
		$path="http://www.google.by/search?q=".$str."&source=lnms&tbm=isch&sa=X&ei=PC-YVJuyPJX1asa5gcgK&ved=0CAgQ_AUoAQ&biw=1787&bih=851&dpr=0.9";
		$hab=file_get_contents($path);
		$document=phpQuery::newDocument($hab);
		$hentry=$document->find('.images_table img:eq(0)')->attr('src');
		//echo $hentry;
		$dir=$_SERVER['DOCUMENT_ROOT']."/ivan/media/upload/";
		$pic='g'.time().'.jpg';
		$newfile=$dir.$pic;
			if(!copy($hentry, $newfile)){
				echo "Не удалось загрузить файл";
			}
		$query="UPDATE $tbl_goods SET picture='$pic' WHERE id=".$tov['id'];
		$cat1=mysql_query($query);
			if(!$cat1){
				exit($query);
			}
		echo "<br/>";
		sleep(2);
	}
