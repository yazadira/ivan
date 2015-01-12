<?php
require_once("templates/top.php");





	if($_POST){
		if($_POST['name']){
			$tmp1="AND name LIKE '%".htmlspecialchars(trim($_POST['name']))."%'";
		}

	if($_POST['categories']!=0){
		$tmp2="AND catid=".(int)$_POST['categories'];
	}
	if($_POST['cena_ot']){
		$tmp3="AND prise>=".(int)$_POST['cena_ot'];
	}
	if($_POST['cena_do']){
		$tmp4="AND prise<=".(int)$_POST['до'];
	}
	$query="SELECT * FROM $tbl_goods WHERE id>0 $tmp1 $tmp2 $tmp3 $tmp4";

		$cat=mysql_query($query);
			if(!$cat){
				exit($query);}
				?>
<table class='table' width=100%>
	<tr><td></td></tr>
	<tr>
		<td align="center">Изображение</td>
		<td align="center">Описание</td>
	</tr>
<?				
				
			while($search=mysql_fetch_array($cat)){
if($search['picture']){
	$pic="<img src='media/upload/".$search['picture']."'/>";}
	else{
		$pic="-";}
?>
	<tr>
	<td align="center"width=200px><?=$pic?>
	</td>
	<td align="center">
		<h2><?=$search['name'];?></h2>Цена:<b><?=$search['prise'];?></b><br/>
		<?=$search['body'];?>
		</td>
	</tr>
<?
			}
?>
</table>
<?php

}	else {
echo 'начните поиск';
}		
require_once("templates/bottom.php");