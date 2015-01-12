<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");
    // Начало страницы
    $title     = 'Добавление новостного сообщения';
    $pageinfo  = '<p class=help></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");
	require_once("../../utils/utils.resizeimg.php");
  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {
    $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);
	$editor1        = new field_textarea("editor1",
                                  "Содержание",
                                  true,
                                  $_POST['editor1']);
	$urlpict=new field_file('urlpict', 'Изображение', false, $_FILES, "../../media/img/");
    $form = new form(array(
	                       "name" => $name, 
                           "editor1" => $editor1,
						   "urlpict" => $urlpict),
                     "Добавить",
                     "field");
	

    // Обработчик HTML-формы
    if(!empty($_POST))
    {	$error=$form->check();
		if(!$error) {
			$var=$form->fields['urlpict']->get_filename();
				if($var) {
					$picture=date('y_m_d_h_i_').$var;
					$picturesmall='s_'.$picture;
					resizeimg("../../media/img/".$picture, "../../media/img/".$picturesmall, 200, 200);
					}
				else {
					$picture='';
					$picturesmall='';
					}
			$query="INSERT into $tbl_pictures VALUES (Null,
											'{$form->fields['name']->value}',
											'{$form->fields['editor1']->value}',
											'$picture',
											'$picturesmall',
											'show',
											NOW())";
		$cat=mysql_query($query);
			if(!$cat){
				exit($query);
			}
						?>
						<script> 
							document.location.href='index.php';
						</script>
						<?PHP
		}
		if($error){
			foreach($error as $err){
					echo"<span style='color:red'>";
					echo $err;
					echo"</span><br/>";}
		}
	
}
	
	
	
	


?>
<div align=left>
<FORM>
<INPUT class="button" TYPE="button" VALUE="На предыдущую страницу" 
onClick="history.back()">
</FORM> 
</div>
<div class="table_user">
<?
    // Выводим HTML-форму 
    $form->print_form();
?>
</div>
<?
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>
