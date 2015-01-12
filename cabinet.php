<?php
require_once("templates/top.php");



if($_SESSION['id_user_position']){
	echo "<h2>Кабинет".$sess_user_arr['login']."</h2>";
		if(empty($_POST)){
		$_REQUEST=$sess_user_arr;
		$_REQUEST['oldpass']=' ';
		$_REQUEST['newpass']='';
		$_REQUEST['newpassagain']='';
		}

$oldpass=new field_text('oldpass','Текущий пароль', true, $_REQUEST['oldpass']);
$newpass=new field_password('newpass','Новый пароль', true, $_REQUEST['newpass']);
$newpassagain=new field_password('newpassagain','Повторить пароль', true, $_REQUEST['newpassagain']);
$email=new field_text_email('email', 'E-mail', true, $_REQUEST['email']);
$form=new form(array('oldpass'=>$oldpass, 'newpass'=>$newpass, 'newpassagain'=>$newpassagain, 'email'=>$email), 'Применить', 'field');
$form->print_form();

if($_POST){
	$error=$form->check;
	if($form->fields['newpass']->value!=$form->fields['newpassagain']->value){
		$error[]='Пароль не совпадает';}
			if(!$error){
$query="UPDATE $tbl_users SET password='{$form->fields['newpass']->value}', email='{$form->fields['email']->value}' WHERE id=".$_SESSION['id_user_position'];
		$cut=mysql_query($query);
			if(!$cut){
				exit($query);
			}
			
			?>
			<script> 
				document.location.href='cabinet.php';
			</script>
			<?PHP
				}
			}
			




}
	else {
		echo "Ошибка входа";
	}
require_once("templates/bottom.php");
?>