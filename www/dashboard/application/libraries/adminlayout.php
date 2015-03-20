<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Adminlayout extends CI_Controller {

	// файлы вида
	public $header = 'admin_header';
	public $sidebar='admin_sidebar';
	public $footer = 'admin_footer';

	// метод получает на вход два параметра: название вида и данные для него
	public function content($views = '', $data = '')
	{
		@session_start();
	
		$this->load->library('adminmenu');
		$data['arr_menu']['mainmenu'] = $this->adminmenu->init_menu();		
		$list_menu = $this->adminmenu->list_menu;
		
		if($this->uri->segment(2)=='edit')
			$data['title'] = "Редактирование записи - Панель администрирования";
		else
			foreach($list_menu as $lm)
				if($lm['link']==$this->uri->segment(3))
					$data['title'] = $lm['title']." - Панель администрирования";
		
		$data['columns_username']=array();
		foreach($list_menu as $r=>$a)
			foreach($a as $arr=>$column)
				if(is_array($column))
					foreach($column as $arr2=>$column2)
						if(isset($column2))
							$data['columns_username'][$arr2]=$column2;
		
		
		// загружаем header
		if ($this->header)
		{
			
			$this->load->view($this->header, $data);
		}
		

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

		// загружаем sidebar
		if ($this->sidebar && !is_array($views))
		{
			$this->load->view($this->sidebar);
		}
		
		// загружаем footer
		if ($this->footer)
		{
			$this->load->view($this->footer);
		}
	}
}