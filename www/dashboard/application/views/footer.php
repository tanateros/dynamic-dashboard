 
<!-- Закрываем контейнер содержимого уникальной страницы -->
	</div>
</div>	
<footer>
<div class="footer-main">
<div class="container">
	<div class="col-md-4">
		<div class="col-xs-12">
			<a href="/" title="Тут название фирмы">
				<img src="/images/logo.png" alt="logo" />
			</a>
		</div>
	</div>
	<div class="col-md-3">
		
			<?=$arr_menu['mainmenu'];?>	
	</div>
	<div class="col-md-2">
		Футер
	</div>
	<div class="col-md-3">
		И тут футер
	</div>
</div>
<div class="container" style="padding-top: 0px;">
	<div class="col-md-6">
		<p style="margin-bottom: 7px; color: #fff;">
			&copy;2015. Тут название фирмы
		</p>
	</div>
	<div class="col-md-6">
	</div>
</div>
</div>

</footer>	

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url();?>js/bootstrap.js"></script>
    <script src="<?=base_url();?>js/jquery.datetimepicker.js"></script>
	<script>
		jQuery('#datepicker').datetimepicker({
		  format:'Y-m-d H:i:s',
		  lang:'ru'
		});
		jQuery('#datepicker2').datetimepicker({
		  format:'Y-m-d H:i:s',
		  lang:'ru'
		});
	</script>

  </body>
</html>