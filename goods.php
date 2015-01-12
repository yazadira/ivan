<?php	
require_once("/templates/top.php");

$query="SELECT * FROM $tbl_goods WHERE showhide='show'";
	$news=mysql_query($query);
		if(!$news){
			exit($query);
		}
	WHILE($pic=mysql_fetch_array($news)){
		echo "<div class='pic'>";
			echo "<div class='col-md-3' align='center'>";
				if ($pic['picture']){
					echo "<img src='media/upload/".$pic['picture']."'/>";
					echo "</a>";
				}
				echo "<form action='new_order.php' method='POST'>";
				echo "<input class='btn-value btn-default btn-xs' type='text' name='".$pic['id']."' value=1>";
				echo "<button type='submit' class='btn-default btn-xs'>
						<span class='glyphicon glyphicon-trash' aria-hidden='true'> В корзину</span>
					</button>";
				echo "</form>";
			echo "</div>";
			echo "<div class='col-md-9'>";
				echo "<div class='h4 pictitle'>";
					echo $pic['name'];
				echo "</div>";
				echo "<div class='text-left'>";
					echo $pic['body'];
				echo "</div>";
			echo "</div>";
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