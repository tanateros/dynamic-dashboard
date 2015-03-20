<!DOCTYPE html>
<html lang="ru">
  <head>
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<? if(isset($arr_q->keywords) && $arr_q->keywords!='') echo '<meta content="'.$arr_q->keywords.'" name="keywords">
	';?>
	<? if(isset($arr_q->description) && $arr_q->description!='') echo '<meta content="'.$arr_q->description.'" name="description">
	';?>
    <title>Тут название фирмы | <? if(isset($arr_q->title_SEO) && $arr_q->title_SEO!='') echo $arr_q->title_SEO;
		else if(isset($arr_q->title) && $arr_q->title!='') echo $arr_q->title;
		else echo $breadcrumbs['title'][count($breadcrumbs['title'])-1];
		?></title>
	
    <!-- Bootstrap -->
    <link href="<?=base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url();?>css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">
    <script src="<?=base_url();?>js/jquery-1.11.1.js"></script>
    <link href="<?=base_url();?>css/jquery.datetimepicker.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


  <div class="container">
	Хидер
  </div>

  <nav class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="col-md-12 navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Навигация</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand my-brand" href="/"><img src="<?=base_url()?>images/logo.png" alt="Logo" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-left: 270px;">
      <ul class="nav navbar-nav">
		<?=$arr_menu['mainmenu'];?>
	  </ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="row">