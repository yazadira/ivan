<?PHP	
	require_once("templates/top.php");
	$login=new field_text('login', 'логин', true, $_POST['login']);
	$pass=new field_password('pass','пароль', true, $_POST['pass']);
	$passagain=new field_password('passagain','повторно пароль', true, $_POST['passagain']);
	$email=new field_text_email('e-mail', 'E-mail', true, $_POST ['e-mail']);
	$form=new form(array('login'=>$login, 'pass'=>$pass, 'passagain'=>$passagain, 'email'=>$email), 'Регистрация', 'field');
	if($_POST){
			$error=$form->Check();
		//echo"<pre>"; 
		//print_r($_POST); вывод
		//echo"<pre>";}
		if($form->fields['pass']->value!=$form->fields['passagain']->value){
					$error[]='пароль не совпадает';}
		$query="SELECT count(*) FROM $tbl_users WHERE login='{$form->fields['login']->value}'";
		$usr=mysql_query($query);
			if(!$usr){
				exit($query);}
		if(mysql_result($usr,0)){
					$error[]='логин занят';}
		if(!$error){
			$query="INSERT INTO $tbl_users VALUES(Null,
											'{$form->fields['login']->value}',
											'{$form->fields['pass']->value}',
											'{$form->fields['email']->value}',
											'unblock',NOW(), NOW())";
				
			$cut=mysql_query($query);
				if(!$cut){
					exit($query);
						}
						?>
						<script> 
							document.location.href='index.php';
						</script>
						<?PHP	}
				if($error){
					foreach($error as $err){
					echo"<span style='color:red'>";
					echo $err;
					echo"</span><br/>";}
					}
				
	}
	$form->print_form();
	require_once("templates/bottom.php");
?> 


