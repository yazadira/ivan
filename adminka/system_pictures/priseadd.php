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
  try  {
    
	$prise=new field_text("prise","Прайс",true,$_POST['prise']);
	$urlpict=new field_file('urlpict', 'Прайс.csv', false, $_FILES, "../../media/prises/");
    $form = new form(array("urlpict" => $urlpict),
                     "Добавить",
                     "field");
	if($_FILES){
		$error=$form->check();
		if(!$error){
			$var=$form->fields['urlpict']->get_filename();
				if(!empty($var)){
					$file=date('y_m_d_h_i_').$var;
					$dir='../../media/prises/';
					$path=$dir.$file;
					$handle=fopen($path,'r');
					$data=array();
					while(!feof($handle)){
						$data[]=fgetcsv($handle, 100000, '\n');
					}
					unset($data[0]);
				foreach($data as $key=>$value){
					
					$arr_value=explode(';',$value[0]);
					$vv0=trim($arr_value[0]); //категория
					$vv1=trim($arr_value[1]); //наименование
					$vv2=trim($arr_value[2]); //описание
					$vv3=trim($arr_value[3]); //цена
						//$query="SELECT * FROM $tbl_categories WHERE name='$vv0'"; //категории
						//	$cat=mysql_query($query);
						//		if(!$cat){
						//			$query="INSERT INTO $tbl_categories VALUES ('','$vv0','show')";
						//				$newcat=mysql_query($query);
						//				echo '<span style=color:blue>' .$vv0. ' Категория добавлена</span>';
						//				}
								if($cat){exit($query);}
						$query="SELECT * FROM $tbl_categories WHERE name='$vv0'";
							$newcat=mysql_query($query);
								if(!$newcat){exit($query);}
								if(mysql_num_rows($newcat)>0){
									$cats=mysql_fetch_array($cat);
								
																//start
						$query="SELECT * FROM $tbl_goods WHERE name='$vv1'";
							$cat=mysql_query($query);
								if(!$cat){exit($query);}
						$tov=mysql_fetch_array($cat);
							if($tov['id']){
								$query="UPDATE $tbl_goods SET catid='".$cats['id']."', name='$vv1', body='$vv2', prise='$vv3' WHERE id=".$tov['id'];
								$cat=mysql_query($query);
									if(!$cat){exit($query);}
								echo '<span style=color:green>' .$vv1. ' Данные обновлены</span>';
							}
							else {
								$query="INSERT INTO $tbl_goods VALUES(
								'',
								'',
								'$vv1',
								'$vv2',
								'$vv3',
								' ',
								'show')";
								$cat=mysql_query($query);
									if(!$cat){exit($query);}
									echo '<span style=color:blue>' .$vv1. ' Данные внесены</span>';
							}
							}
								else {
									exit($query);
								}
								
					echo "<hr/>";
				}
					
			}
		}
	}
	//$form->print_form();
	
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
