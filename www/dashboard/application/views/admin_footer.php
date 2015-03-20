 
<!-- Закрываем контейнер содержимого уникальной страницы -->
	</div>
</div>	
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