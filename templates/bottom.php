</div>
	<div class="col-md-3">
		<table width="100%" height="100%" style="background-color:#f2f2f2; border: #cccccc 5px solid; font-family:Tahoma; font-size:12px; color:#000000;" cellpadding="2" cellspacing="0">
			<tr><td align="center">
				<a href="http://6.pogoda.by/26850" style="font-family:Tahoma; font-size:12px; color:#003399;" title="Погода Минск на 6 дней - Гидрометцентр РБ" target="_blank">Погода Минск</a>
			</td></tr>
		<tr><td>
			<table width=100% height=100% style="background-color:#f2f2f2; font-family:Tahoma; font-size:12px; color:#000000;" cellpadding="0" cellspacing="0">
				<tr><td>
					<script type="text/javascript" charset="windows-1251" src="http://pogoda.by/meteoinformer/js/26850_3.js"></script>
				</td></tr>
			</table>
		</td></tr>
		<tr><td align="right">Информация сайта <a href="http://www.pogoda.by" target="_blank" style="font-family:Tahoma; font-size:12px; color:#003399;">pogoda.by</a>
		</td></tr>
		</table>
	</div>

	


<br style="clear:both"/>
	<div class="footer">&copy; yazadiratut@gmail.com 2014</div>
</body>
<html>


<script>
$(function(){
$(window).bind("load", function() { 

       var footerHeight = 0,
           footerTop = 0,
           $footer = $(".footer");

       positionFooter();

       function positionFooter() {

                footerHeight = $footer.height();
                footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";

               if ( ($(document.body).height()+footerHeight) < $(window).height()) {
                   $footer.css({
                        position: "absolute"
                   }).animate({
                        top: footerTop
                   })
               } else {
                   $footer.css({
                        position: "static"
                   })
               }

       }

       $(window)
               .scroll(positionFooter)
               .resize(positionFooter)

});
});
</script>