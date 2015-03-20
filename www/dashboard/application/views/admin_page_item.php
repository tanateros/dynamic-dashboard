    <div class="col-md-8" id="my-wrap" style="background: #fff;">
		<h2><?=$title?></h2>
		<?if(isset($_POST['edit_item'])){?><h4 class="btn-warning">Запись обновлена</h4><?}?>
		<form class="form-horizontal" role="form" action="" method="post">
			
			<?foreach($arr_c as $type_mass):
				foreach($type_mass as $name=>$val):
					if($name=='Field')
						$field[]=$val;
					if($name=='Type')
						$type[]=$val;
				endforeach;
			endforeach;
			
//			print_r($field);
			
			$count_f=count($field);
			$arr_field=array();
			for($i=0;$i<$count_f;$i++){
				$arr_field[$field[$i]]=$type[$i];
			}
			//print_r($arr_field);?>
			
			
			
			<?foreach($arr_r as $unit):?>
				<div class="form-group">
					<?foreach($unit as $items=>$item):?>
						<label class="col-sm-2 control-label">
							<?if(isset($columns_username[$items]))
								echo $columns_username[$items]; 
							else echo $items;?>: 
						</label>
						<div class="col-sm-10">
							<? 
							if($table=='menus' && $items=='icon'){?>
								<select name="icon" class="form-control">
								<?foreach($menu_icons as $inut){?>
									<option <?if($item==$inut['id']) echo ' selected="selected" ';?> value="<?=$inut['id']?>">
										<?=$inut['icon'].' - '.$inut['id']?>
									</option>
								<?}?>
								</select>
							<?}
							
							
							//Если поле типа TEXT
							else if($arr_field[$items]=='text'){?>
								<textarea name="<?=$items?>" class="form-control" rows="3"><?=$item;?></textarea>
								<script>
								   CKEDITOR.replace('<?=$items?>',{'filebrowserBrowseUrl':'/download/ckeditor/kcfinder/browse.php?type=files',
  'filebrowserImageBrowseUrl':'/download/ckeditor/kcfinder/browse.php?type=images',
  'filebrowserFlashBrowseUrl':'/download/ckeditor/kcfinder/browse.php?type=flash',
  'filebrowserUploadUrl':'/download/ckeditor/kcfinder/upload.php?type=files',
  'filebrowserImageUploadUrl':'/download/ckeditor/kcfinder/upload.php?type=images',
  'filebrowserFlashUploadUrl':'/download/ckeditor/kcfinder/upload.php?type=flash'});
								</script>
							<?}
							//Если поле типа DATETIME
							else if($arr_field[$items]=='datetime'){?>
								<p class="form-control"><input id="datepicker" type="text" name="<?=$items?>" value="<?=$item;?>" style="width: 100%; padding: 0px; margin: 0px; left: 0px; right: 0px; border: medium none;" /></p>
							<?}
							//Если поле зовется id (по "феншую" обычно приммари кей с автоинкрементом)
							else if($items=='id'){?>
							<p class="form-control<?if($items=='id')echo '-static'?>" name="<?=$items?>"><?=$item;?></p>
							<?}else{?>
						
							<p class="form-control<?if($items=='id')echo '-static'?>"><input type="text" name="<?=$items?>" value="<?=htmlspecialchars($item);?>" style="width: 100%; padding: 0px; margin: 0px; left: 0px; right: 0px; border: medium none;" /></p>
							
							<?}?>
						</div>
					<?endforeach;?>
				</div>
			<?endforeach;?>
			
			
			
			
			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><?=$title?></h4>
				  </div>
				  <div class="modal-body">
					Вы уверены что хотите сохранить?
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Закрыть</button>
					<button onclick="$('#go-save').click();" type="button" class="btn btn-primary">Сохранить изменения</button>
				  </div>
				</div>
			  </div>
			</div>
			<input type="submit" name="edit_item" hidden="hidden" value="OK" id="go-save" />
		</form>		
		<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Сохранить</button>
		
	</div>