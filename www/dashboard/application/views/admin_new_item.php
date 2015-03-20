    <div class="col-md-8" id="my-wrap" style="background: #fff;">
		<h2><?=$title?></h2>
		<form class="form-horizontal" role="form" action="" method="post">
			
			<?foreach($arr_c as $type_mass):
				foreach($type_mass as $name=>$val):
					if($name=='Field')
						$field[]=$val;
					if($name=='Type')
						$type[]=$val;
				endforeach;
			endforeach;
			
			$count_f=count($field);
			$arr_field;
			for($i=0;$i<$count_f;$i++){
				$arr_field[$field[$i]]=$type[$i];
			}
			//print_r($arr_field);?>
			
			
			

				<div class="form-group">
					<?foreach($arr_field as $column=>$type_column):?>

						<label class="col-sm-2 control-label">
							<?if(isset($columns_username[$column]))
								echo $columns_username[$column]; 
							else echo $column;?>: 
						</label>						<div class="col-sm-10">
							<? // echo $type_column; - узнать название типа поля БД
							if($table=='menus' && $column=='icon'){?>
								<select name="icon" class="form-control">
								<?foreach($menu_icons as $inut){?>
									<option value="<?=$inut['id']?>">
										<?=$inut['icon'].' - '.$inut['id']?>
									</option>
								<?}?>
								</select>
							<?}
							
							
							//Если поле типа TEXT
							else if($type_column=='text'){?>
								<textarea name="<?=$column?>" class="form-control" rows="3"></textarea>
								<script>
								   CKEDITOR.replace('<?=$column?>',{'filebrowserBrowseUrl':'/ckeditor/kcfinder/browse.php?type=files',
  'filebrowserImageBrowseUrl':'/ckeditor/kcfinder/browse.php?type=images',
  'filebrowserFlashBrowseUrl':'/ckeditor/kcfinder/browse.php?type=flash',
  'filebrowserUploadUrl':'/ckeditor/kcfinder/upload.php?type=files',
  'filebrowserImageUploadUrl':'/ckeditor/kcfinder/upload.php?type=images',
  'filebrowserFlashUploadUrl':'/ckeditor/kcfinder/upload.php?type=flash'});
								</script><?
							}
							//Если поле типа DATETIME
							else if($type_column=='datetime'){?>
								<p class="form-control"><input id="datepicker" type="text" name="<?=$column?>" value="" style="width: 100%; padding: 0px; margin: 0px; left: 0px; right: 0px; border: medium none;" /></p>
							<?}
							//Если поле зовется id (по "феншую" обычно приммари кей с автоинкрементом)
							else if($column=='id'){?>
								<p class="form-control<?if($column=='id')echo '-static'?>" name="<?=$column?>"><?=$column;?></p>
							<?}
/*							else if($column=='thumb' || $column=='image' || $column=='file'){?>
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
											'uploader' : '/download/uploadvladka/uploadify.php?table=<?=$table;?>',
											
											'onComplete'   : function(event,queueID,fileObj,response,data) {
											  $('input[name="link"]').val(data);
											 }
										});
									});
								</script>
							<?}
*/							
							else{?>
						
								<p class="form-control"><input type="text" name="<?=$column?>" value="" style="width: 100%; padding: 0px; margin: 0px; left: 0px; right: 0px; border: medium none;" /></p>
							
							<?}?>
						</div>
					<?endforeach;?>
				</div>				
		<input name="new_item" type="submit" class="btn btn-primary btn-lg" value="Сохранить" />
		
	</div>