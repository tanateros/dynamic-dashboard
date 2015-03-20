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
	
	<div class="row">
		<h2><?=$arr_q->title?></h2>
		<div class="btn-group btn-group-xs"><i class="glyphicon glyphicon-time"> </i> <?=date('d.m.Y',strtotime($arr_q->date_create));?></div>
	</div>
	<div class="row">
		<?=$arr_q->text?>
	</div>
</div>