<?php	
require_once("/templates/top.php");

$query="SELECT * FROM $tbl_pictures WHERE showhide='show'";
	$news=mysql_query($query);
		if(!$news){
			exit($query);
		}
	WHILE($pic=mysql_fetch_array($news)){
		echo "<div class='pic'>";
			if ($pic['picture']){
				echo "<a class='click_modal' href='media/img/".$pic['picture']."' data=".$pic['id'].">";
				echo "<img src='media/img/".$pic['picturesmall']."' />";
				echo "</a>";
					}
		echo "</div>";
	}
	
$query="SELECT * FROM $tbl_goods WHERE showhide='show'";
	$news1=mysql_query($query);
		if(!$news1){
			exit($query);
		}
	WHILE($pic1=mysql_fetch_array($news1)){
		echo "<div class='pic'>";
			if ($pic1['picture']){
				echo "<a href='media/upload/".$pic1['picture']."' data=".$pic1['id'].">";
				echo "<img src='media/upload/".$pic1['picture']."' />";
				echo "</a>";
					}
		echo "</div>";
	}
	
	
require_once("/templates/bottom.php");
?>

<script>
$(function(){	
//	$('.menutop a:eq(0)').mouseover(function(){
//		$('.header').css({
//			'background':'orange'});
//		});
	//модальое окно
	var fx={
		"initModal":function(){
			if($('.modal-window').length==0){
				$('<div>').attr('id','jquery-overlay')
							.fadeIn(2000)
							.appendTo('body')
				return $('<div>').addClass('modal-window').appendTo('body');
			}
			else{
				return $('.modal-window');
			}
		}
	}
	$('.pic a.click_modal').bind('click',function(e){
		e.preventDefault();
		var data=$(this).attr('data');
		var modal=fx.initModal();
		$('<a>').attr('href','#')
				.addClass('modal-close-btn')
				.html('&times')
				.click(function(e){
					e.preventDefault();
					$('#jquery-overlay').fadeOut(1000,function(){
						$(this).remove();
					});
					$('.modal-window').remove();
				})
				.appendTo(modal);
		$.ajax({
			type:'POST',
			url:'ajax.php',
			data:'id='+data,
//			beforeSend:function(){
//				modal.append('Загрузка...');
//			},
			success:function(data){
				modal.append(data);
			},
			error:function(msg){
				modal.append(msg);
			}
		});

	});
		
});
</script>