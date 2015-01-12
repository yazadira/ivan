<?PHP
	if($_GET['url']){$file=$_GET['url'];
	}
	else{
	$file='index';
	}
	require_once("templates/top.php"); 
	$query="SELECT*FROM $tbl_maintext WHERE url='$file'";
	$cat=mysql_query($query);
	if(!$cat) {exit($query);}
	$tov=mysql_fetch_array($cat);
	//echo '<pre>';
	//print_r($tov);
	//echo "</pre>";
	?>
		<h2 align="center">
		<?php echo $tov['name']; ?> </h2>
		<p class="indent">
		<?php echo $tov['body']; ?></p>
<?php	require_once("templates/bottom.php");?>
