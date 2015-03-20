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
	</div>
	
	<h2 class="title-page"><?=$arr_q->title?></h2>
	<h5><?=$arr_q->content?></h5>
</div>