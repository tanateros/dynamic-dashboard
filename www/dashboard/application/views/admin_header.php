<!DOCTYPE html>
<html lang="ru">
  <head>
	<link rel="icon" href="<?=base_url();?>images/codeigniter.png" type="image/x-icon" />
	<link rel="shortcut icon" href="<?=base_url();?>images/codeigniter.png" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? if(isset($title)) echo $title; else echo 'Админ. панель'?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet">
    <script src="<?=base_url();?>js/jquery-1.11.1.js"></script>
    <link href="<?=base_url();?>css/jquery.datetimepicker.css" rel="stylesheet">
	<style>
		.nav > li {
			width: 100%;
		}
		
		.nav > li a[href="<?=base_url();?>index.php/adminka/page/<?=$this->uri->segment(3);?>"]{
			background: #fff;
		}
		<? if($this->uri->segment(2)=='media'):?>
		.nav > li a[href="<?=base_url();?>index.php/adminka/media"]{
			background: #fff;
		}
		<? endif;?>
	</style>
	<script src="<?=base_url();?>download/ckeditor/ckeditor.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background: #222;">


  
  <nav class="navbar navbar-inverse" role="navigation" style="text-align: right; height: 10px; padding-bottom: 0px; margin-bottom: 0px; padding-top: 7px;">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <!--<div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Навигация</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <!--  <a class="navbar-brand my-brand" href="/"><img src="<?=base_url()?>images/logo.jpg" width="60" /></a> -->
    <!--</div>-->
<a href="<?=base_url();?>index.php/adminka/logout" class="btn btn-danger">Выход</a>
    <!-- Collect the nav links, forms, and other content for toggling 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		<?=$arr_menu['mainmenu'];?>
	  </ul> 
   </div> /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="row">
      <div class="col-md-2" id="my-wrap">
	  
      <ul class="nav navbar-nav">
		<?=$arr_menu['mainmenu'];?>
	  </ul> 	  
	  
	  </div>