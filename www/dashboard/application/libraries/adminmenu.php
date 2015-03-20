<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Adminmenu extends CI_Controller {
		// configure admin menu
			public $admin_link='index.php/adminka/page/';
			public $list_menu=array(
				array('link'=>'pages', 'title'=>'Страницы'),
				array('link'=>'news', 'title'=>'Новости'),
				array('link'=>'menus', 'title'=>'Меню',
						array('id'=>'№', 
							  'parent_id'=>'Родитель',
							  'menu_group'=>'Группа&nbsp;меню',
							  'type_service'=>'Тип&nbsp;запроса',
							  'icon'=>'Иконка',
							  'title'=>'Название',
							  'link'=>'Ссылка',
							  'weight'=>'Позиция',
							  'thumb'=>'Превью',
							  'text'=>'Текст',
							  'content'=>'Контент',
							  'name_slider'=>'Название&nbspслайда',
							  'date_create'=>'Дата&nbsp;создания',
							  'create_time'=>'Время&nbsp;создания',
							  )
				)
			);
	 
	
	public function init_menu(){
		@session_start();
		$data['arr_menu']='';
		$admin_link=$this->admin_link;
		foreach($this->list_menu as $m):
			$data['arr_menu']=$data['arr_menu'].'<li><a ';
			if(base_url().'index.php/'.$admin_link.$m['link']==current_url()) 
				$data['arr_menu']=$data['arr_menu'].'class="active"';
			$data['arr_menu']=$data['arr_menu'].'href="'.base_url().$admin_link.$m['link'].'">'.$m['title'].'</a></li>';
		endforeach;
		
		/* media */
			$data['arr_menu']=$data['arr_menu'].'<li><a ';
			if(base_url().'index.php/'.$admin_link.$m['link']==current_url()) 
				$data['arr_menu']=$data['arr_menu'].'class="active"';
			$data['arr_menu']=$data['arr_menu'].'href="'.base_url().'adminka/media">Медиафайлы</a></li>';
	
		return $data['arr_menu'];
	}
}