<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Layout extends CI_Controller {

	// пути к файлам вида
	public $header = 'header';
	public $footer = 'footer';

	// метод получает на вход два параметра: название вида и данные для него
	public function content($views = '', $data = '')
	{
		@session_start();
	
		$this->load->library('menu');
		$data['arr_menu']['mainmenu'] = $this->menu->init_menu('1');
		$data['arr_menu']['sidebarmenu'] = $this->menu->init_menu('2');
		
	/*
		//Авторизация пользователя через соц.сети - получение данных
		if(!isset($_SESSION['token']) && isset($_POST['token']) && $_POST['token']!='')
			$_SESSION['token']=$_POST['token'];
		$s = @file_get_contents('http://ulogin.ru/token.php?token=' . $_SESSION['token'] . '&host=' . $_SERVER['HTTP_HOST']);
		$data['soc_user'] = json_decode($s, true);
		//$user['network'] - соц. сеть, через которую авторизовался пользователь
		//$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
		//$user['first_name'] - имя пользователя
		//$user['last_name'] - фамилия пользователя
    */            
		
		
		
		// загружаем header
		if ($this->header)
		{
			
			$this->load->view($this->header, $data);
		}
		
		// загружаем sidebar
/*		if ($this->sidebar && !is_array($views))
		{
			$this->load->view($this->sidebar);
		}
*/
		// загружаем основной контент, который может иметь больше одного вида
		if (is_array($views))
		{
			foreach ($views as $view)
			{
				$this->load->view($view, $data);
			}
		}
		else
		{
			$this->load->view($views, $data);
		}

		// загружаем footer
		if ($this->footer)
		{
			$this->load->view($this->footer);
		}
	}
}