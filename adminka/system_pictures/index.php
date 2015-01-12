<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Изображения"';
  $pageinfo = '<p class=help>Здесь можно добавить
               изображения, отредактировать или
               удалить существующие.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

  try{
  
  ?>
	<div class='menu_right'>
		<a href='newsadd.php'>Добавить фото</a>
		<a href='priseadd.php'>Загрузить прайс</a>
		<a href='#' class="search">Поиск изображения в Google</a>
			<div id='empty'>			</div>
	</div>
  <?php
  
  
  $page_link=3;
  $pnumber=20;
  $obj=new pager_mysql($tbl_pictures,
						"",
						'ORDER BY id DESC',
						$pnumber,
						$page_link);
	$news=$obj->get_page();
		if(!empty($news)){
			?>
				<table width=100% class=table>
					<tr class='header'>
						<td width=200px>Фото</td>
						<td>Название</td>
						<td>Действие</td>
					</tr>
						<?php 
							for($i=0; $i<count($news); $i++){
								if($news[$i]['picturesmall']){
									$picture="../../media/img/".$news[$i]['picturesmall'];
									}
								else {
									$picture="../../media/img/no_foto.png";
								}
								if($news[$i]['showhide']=='show'){
									$showhide="<a href='newshide.php?id=".$news[$i][id]."' title='скрыть'>
												<img src='../utils/img/folder_locked.gif' border=0 align='absmiddle'>Скрыть</a>";
												}
								else{
									$showhide="<a href='newsshow.php?id=".$news[$i][id]."' title='отобразить'>
												<img src='../utils/img/show.gif' border=0 align='absmiddle'>Отобразить</a>";
								}
								
								echo "<tr>
										<td><img src='$picture'/></td>
										<td>{$news[$i]['name']} <hr/>{$news[$i]['body']}</td>
										<td class='menu_right' align='left' valign='top'><a href='#' onClick=\"delete_position('newsdel.php?id=".$news[$i][id]."',
											'Вы действительно хотите удалить?')\" title='Удалить фото'>
											<img border=0 src='../utils/img/editdelete.gif' align='absmiddle'/>Удалить</a>
											<a href='newsedit.php?id=".$news[$i][id]."', title='Редактировать'>
											<img border=0 src='../utils/img/kedit.gif'align='absmiddle'/>Редактировать</a>
											$showhide
										</td>
									</tr>";
								}
						?>
				</table>
			<?php
		}
	}
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>

<script>
$(function(){
	$.ajaxSetup({
		url:'ajax.php',
		type:'POST',
		beforeSend:function(){
			$('#empty').html("<img src='../../media/img/loading.gif'/>");},
		success:function(data){
			$('#empty').html(data);},
		error:function(data){
			$('#emty').html(data);}
		
	});
	$('.search').click(function(){
		$.ajax();
	});
});
</script>