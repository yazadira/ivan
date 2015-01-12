<?php
require_once("templates/top.php");
?>
<table class='table table-bordered' width=100%>
	<tr>
		<th width=200px>Изображение</th>
		<th>Товар</th>
		<th>Количество</th>
		<th>Цена</th>
		<th>Сумма</th>
		<th>Действие</th>
	</tr>
<?

$all=0;
foreach($_COOKIE as $key=>$value){
	$key=(int)$key;
		if($key>0){
$query="SELECT * FROM $tbl_goods WHERE id=$key";
		$cat=mysql_query($query);
			if(!$cat){exit($query);}
			while($tov=mysql_fetch_array($cat)){
			$summa=(int)$tov['prise']*$value;
				$all+=$summa;
				if($tov['picture']){
					$pic="<img src='media/upload/".$tov['picture']."'/>";}
				else{
					$pic='-';}
			echo "<tr>
					<td>$pic</td>
					<td>".$tov['name']."</td>
					<td><form action='basket_edit.php?id=$key' method='POST'>
						<input type='number' value='$value' name='tov' class='input-tov'>
						</td>
					<td>".$tov['prise']."</td>
					<td>$summa<p>руб</p></td>
					<td><input type='submit' value='Пресчитать'>
						</form>
						<form action='basket_del.php?id=$key' method='POST'>
						<input type='submit' value='Удалить'>
						</form>
						</td></tr>";
			}
	}
	}
	
echo "<tr><td colspan=4><h4>Итого:</h3></td><td colspan=2>$all</td></tr>";

?>
</table>

<?php
	$fio=new field_text('fio', 'Ф.И.О', true, $_POST['fio']);
	$phone=new field_text('phone','Телефон', true, $_POST['phone']);
	$addr=new field_text('addr','Адрес доставки', true, $_POST['addr']);
	$message=new field_textarea('message', 'Коментарий', false, $_POST ['message']);
	$form=new form(array('fio'=>$fio, 'phone'=>$phone, 'addr'=>$addr, 'message'=>$message), 'Заказать', 'field');
		if($_POST){
			$error=$form->check();
			if(!$error){
				$query="INSERT INTO $tbl_orders VALUES (Null,
														'{$form->fields['fio']->value}',
														'{$form->fields['phone']->value}',
														'{$form->fields['addr']->value}',
														'".serialize($_COOKIE)."',
														'".$_SERVER['REMOTE_ADDR']."',
														'delivery',
														'BYR',
														'0',
														NOW(),
														'new',
														'{$form->fields['message']->value}')";
			}
			$cut=mysql_query($query);
				if(!$cut){
					exit($query);
						}
						?>
						<script>document.location.href='basket.php';</script>
	<?
			}
			if($error){
				foreach($error as $err){
				echo"<span style='color:red'>";
				echo $err;
				echo"</span><br/>";}
			}
	$form->print_form();
require_once("templates/bottom.php");