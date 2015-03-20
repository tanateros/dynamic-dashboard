<?/*<? switch (@$table){
	case 'slider_home': $res='slider'; break;
	case 'partners_gallery': $res='partners'; break;
	case 'news': $res='thumbs'; break;
   };

		if(!empty($res) && $res!=''):?>
	<div class="col-md-2" id="my-sidebar">
		<ul class="nav nav-pills nav-stacked hidden-sm hidden-xs">
		<? /*	<li><a href="">Настроить админ панель (в процессе: будет в БД таблица с link, title для пунктов меню админки)</a></li>		
			<li><a href="">Скачать руководство (manual.chm - нужно будет написать)</a></li>		
		*/ ?>
<?/*		Путеводитель по медиафайлам
		</ul>
		
		
		<iframe src="/adminka/media/<?=$res?>" width="100%" height="400"></iframe>
		
							<script src="/download/uploadvladka/jquery.uploadify.min.js" type="text/javascript"></script>
							<link rel="stylesheet" type="text/css" href="/download/uploadvladka/uploadify.css">
								<div id="queue"></div>
								<input id="file_upload" name="file_upload" type="file" multiple="true">

							<script type="text/javascript">
								<?php $timestamp = time();?>
								$(function() {
									$('#file_upload').uploadify({
										'formData'     : {
											'timestamp' : '<?php echo $timestamp;?>',
											'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
										},
										'swf'      : '/download/uploadvladka/uploadify.swf',
										'uploader' : '/download/uploadvladka/uploadify.php?table=<? if($table=='slider_home') echo 'slider'; else echo $table;?>',
										
										'onComplete'   : function(event,queueID,fileObj,response,data) {
										  $('input[name="link"]').val(data);
										 }
									});
								});
							</script>
	</div>
<? endif; ?>
*/?>