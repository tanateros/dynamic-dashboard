<div class="col-md-12" id="my-wrap">
<div>
	<?if ( (isset($breadcrumbs)) AND (is_array($breadcrumbs)) ){
		?><ol class="breadcrumb"><?
		$cnt = count($breadcrumbs['title']);
		for ($i=0; $i < $cnt-1; $i++)
				echo '<li><a href="'.$breadcrumbs['link'][$i].'">'.$breadcrumbs['title'][$i].'</a></li> ';
		echo '<li class="active">'.$breadcrumbs['title'][$cnt-1].'</li>';
		?></ol><?
	}?>
		<?php foreach($resurs as $news):?>
			<div class="col-md-12">
				<div class="col-md-2">
					<!--<i class="glyphicon glyphicon-time"> </i> <?=date('d.m.Y',strtotime($news->date_create));?>-->
					<div class="col-md-12 text-center">
						<a class="btn btn-danger"><?=date('d',strtotime($news->date_create));?></a>
					</div>
					<div class="col-md-12 text-center">
						<? $days_array=array(
							"",
							"январь",
							"февраль",
							"март",
							"апрель",
							"май",
							"июнь",
							"июль",
							"август",
							"сентябрь",
							"октябрь",
							"ноябрь",
							"декабрь"
						);?>
						<?=$days_array[date('m',strtotime($news->date_create))];?>
					</div>
					<div class="col-md-12 text-center">
						<?=date('Y',strtotime($news->date_create));?>
					</div>
				</div>
				<div class="col-md-4">
					<img src="/images/thumbs/<?=$news->thumb?>" width="100%" /> 
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<a href="<?=base_url()?>news/<?=$news->link?>" title="<?=$news->title?>"><?=$news->title?></a> 
					</div>
					<div class="col-md-12">
						<?=$news->about_text?>
					</div>
				</div>
			</div>
			<hr style="display: block; float: left; width: 100%; border-top: 2px dotted rgb(119, 119, 119);" />
		<?php endforeach;?>
		<?php echo $paginator?>
	</div>
</div>