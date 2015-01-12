<?php
	session_start();
	require_once("config/config.php");
	require_once("config/class.config.php");?>
	<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Чистый воздух</title>
	<meta name="description" content="html">
	<meta name="keywords" content="">
	<link type="text/css"  href="media/bootstrap/css/bootstrap.min.css"  rel="stylesheet" />
	<link type="text/css"  href="media/css/style.css"  rel="stylesheet" />
	<script src="media/js/jquery.min.js"></script>
</head>
<body> 
<?php
if($_SESSION['id_user_position']){
	$query="SELECT * FROM $tbl_users WHERE id=".$_SESSION['id_user_position'];
	$sess_user=mysql_query($query);
		if(!$sess_user){
			exit($query);
		}
	$sess_user_arr=mysql_fetch_array($sess_user);
	echo "<a href='cabinet.php'>Кабинет</a>";
	echo "<a href='logout.php'>Выход</a>";
	echo "<a class=h1>Hello</a>".$sess_user_arr['login'];
	}
	else{
		echo"<a href='login.php'>Вход</a>";
		echo"<a href='reg.php'>Регистрация</a>";
	}
?>
	<div class="header">
		<p><a href="index.php?url=index"> <img src="media/img/logo.jpg"	class="logo" /></a></p>
		<h1 class="logotext"><strong>Чистый воздух</strong></h1>
	</div>
	<div class="menutop">
		<a href="basket.php">Корзина</a>
		<a href="goods.php">Каталог</a>
		<a href="galery.php">Фото галерея</a>
		<a href="adminka/index.php">Админка</a>
	</div>
	
		<div class="col-md-3">
		<?php
		$query="SELECT*FROM $tbl_maintext WHERE showhide='show'";
		$cat=mysql_query($query);
		if(!$cat) {exit($query);}
		while($tov=mysql_fetch_array($cat)){
		echo "<a href='index.php?url=".$tov['url']."' class='btn btn-primary'>";
		echo $tov['name'];
		echo "</a>";
		}
		?>
	
	<div class="form-group">
		<label class="col-sm-12 control-label"></label>
    </div>
		
	<form class="form-horizontal" action="search.php" method="POST">
  <div class="form-group">
    <label class="col-sm-4 control-label">Название</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="name" placeholder="название">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Категория</label>
    <div class="col-sm-8">
      <select type="text" class="form-control" name="categories">
		<option value=0>выберите категорию</option>
			<?php $query="SELECT * FROM $tbl_categories WHERE showhide='show'";
			$tov=mysql_query($query);
			while($cat=mysql_fetch_array($tov)){?>	
				<option value="<?=$cat['id']?>">
				<?=$cat['name'];?>
			</option>
			<?}?>
		</select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Цена</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="cena_ot" placeholder="от">
    </div>
	<div class="col-sm-4">
      <input type="text" class="form-control" name="cena_do" placeholder="do">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-4">
      <button type="submit" class="btn btn-default">Search</button>
    </div>
  </div>
</form>
	
	
	
	
	
	
	
	</div>
	<div align="justify" class="col-md-6">
	
	
