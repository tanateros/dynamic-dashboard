    <div class="col-md-8" id="my-wrap" style="background: #fff; margin-bottom: 10px;">
	
	<script type="text/javascript">
		function del_page(id_del_page, table){
			if(confirm('Страница с id='+id_del_page+' будет удалена. Вы уверены?')){
				$.post(
					'<?=base_url();?>index.php/ajax/del_page',
					{id_del_page: id_del_page, table: table},
					function(data) {
						$('#resultdel').html(data);
					}
				);
			}
		}
	</script>

	<div id="resultdel"></div>
		<h2><?=$title?></h2>
		<a class="btn btn-success" href="<?=base_url();?>index.php/adminka/newitem/<?=$table;?>" style="margin-bottom: 10px;">+ Добавить</a>
		<table class="table table-striped">
			<tr style="font-weight: bold; background: #900; color: #fff;">
				<td style="font-weight: bold; background: #900; color: #fff;"><i class="fa fa-edit"></i></td>
				<td style="font-weight: bold; background: #900; color: #fff;"><i class="fa fa-delete"></i></td>
				<? $array_col=array();
				foreach($arr_c as $v=>$k){
					echo '<td';?>
					<? if($k['Field']=='content' || ($k['Field']!='id' && $k['Field']!='type_service' && $k['Field']!='name_tour' && $k['Field']!='email' && $k['Field']!='create_time' && $k['Field']!='title' && $k['Field']!='link' && $k['Field']!='name_slider' && $k['Field']!='parent_id')) echo ' style="max-width: 100px; overflow: hidden; display: none;">';
					else echo ' style="font-weight: bold; background: #900; color: #fff;">';
					if(isset($columns_username[$k['Field']]))
						echo $columns_username[$k['Field']];
					else
						echo $k['Field'];
					echo '</td>';
					//$array_col[]=$k['Field'];
				}?>
			</tr>
			<?
			foreach($arr_r as $a):?>
				<tr>
					<?foreach($a as $v=>$k):?>
						<?if($v=='id'){?><td><a class="btn btn-info" title="Редактировать запись" href="<?=base_url();?>index.php/adminka/edit/<?=$table;?>/<?=$k;?>"><i class="fa fa-edit"></i></a></td><?}?>
						<?if($v=='id'){?><td><button class="btn btn-danger" onclick="var id_del_page=<?=$k?>, table='<?=$table?>'; del_page(id_del_page, table);"><i class="fa fa-minus"></i></button></td><?}?>
						<td <? if($v=='text' || $v=='content' || ($v!='link' && $v!='email' && $v!='type_service' && $v!='name_tour' && $v!='title' && $v!='create_time' && $v!='name_slider' && $v!='parent_id' && $v!='id')) echo ' style="max-width: 100px; overflow: hidden; display: none;"'?>>
							<? 
							if($v=='title') echo '<b>';
							  if(strlen($k)>200)
								echo substr(htmlspecialchars_decode(strip_tags($k)),0,200).'...';
							   else echo htmlspecialchars_decode(strip_tags($k));
							if($v=='title') echo '</b>';
							?>
						 </td>
					<?endforeach;?>
				</tr>
			<? endforeach;?>
		</table>
	</div>