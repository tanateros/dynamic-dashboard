
<div class="col-md-8" id="my-wrap" style="background: #fff;">
	<script src="/download/upload/jquery.uploadify.min.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/download/upload/uploadify.css">
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
				'swf'      : '/download/upload/uploadify.swf',
				'uploader' : '/download/upload/uploadify.php?table=<?=$this->uri->segment(3);?>',
				
				'onComplete'   : function(event,queueID,fileObj,response,data) {
				  $('input[name="link"]').val(data);
				 }
			});
		});
	</script>


<?
header('Content-type: text/html; charset=utf-8');

$path = "./images/".$doppath;
$d = dir($path);
if ($d) {
    $files = $dirs = array();
    while (false !== ($name = $d->read())) {
        if ($name === '.' || $name === '..') continue;
        $FullName = $path . "/" . $name;
        if (is_dir($FullName))
			$dirs[] = $name;
        elseif (is_file($FullName))
			$files[] = $name;
    }
    $d->close();
	sort($files);
//	echo "<a href='/adminka/media/'>В начало</a><br /> Картинки: <br />";
	foreach($dirs as $name)	
		if($name!='captcha')
			echo '<a href="/dashboard/index.php/adminka/media/'.$name.'"><i class="glyphicon glyphicon-folder-open"></i> '.$name.'</a><br />';
		
	foreach($files as $name)	
		echo '&nbsp;<div class="col-md-5"><a style="padding-right: 5px;vertical-align: top;" href="/images/'.$doppath.$name.'"><img src="/images/'.$doppath.$name.'" width="30" height="30" /></a><i class="fa fa-file"></i> '.$name.'</div> <a class="col-md-1" href="/adminka/media/delete/images/'.$name.'/'.$doppath.'"><i class="fa fa-times"></i></a>';
		
}
else echo '';//'Нету файлов здесь';
$path = "./download/".$doppath;
$d = @dir($path);
if ($d) {
    $files = $dirs = array();
    while (false !== ($name = $d->read())) {
        if ($name === '.' || $name === '..') continue;
        $FullName = $path . "/" . $name;
        if (is_dir($FullName))
			$dirs[] = $name;
        elseif (is_file($FullName))
			$files[] = $name;
    }
    $d->close();
//	echo "<br /> Загруженные файлы: <br />";
	foreach($dirs as $name)	
		if($name=='slider' || $name=='thumbs' || $name=='partners' || $name=='slider_header')
			echo '<a href="/dashboard/index.php/adminka/media/'.$name.'"><i class="glyphicon glyphicon-folder-open"></i> '.$name.'</a><br />';
	?><style>
	#my-wrap > a[href="/dashboard/index.php/adminka/media/icons"] {
		display: none;
	}
	</style><?	
//	foreach($files as $name)	
//		echo '&nbsp;<a href="/download/'.$doppath.$name.'"><i class="fa fa-file"></i> '.$name.'</a> <a href="/adminka/media/delete/'.$name.'/download"><i class="fa fa-times"></i></a><br />';
		
}
else echo '';//'Нету файлов здесь';
?>
</div>