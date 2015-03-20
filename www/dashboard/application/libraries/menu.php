<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Menu extends CI_Controller {

	public function init_menu($unit=''){
		@session_start();
		
		// Сбор меню

		$query=$this->db->query('SELECT 
								`mymenu`.* , 
								count( `mymenu`.`id` ) AS `count_child` 
								FROM 
								`menus` AS `mymenu` LEFT JOIN `menus` ON `mymenu`.`id` = `menus`.`parent_id`
								GROUP BY `mymenu`.`id` 
								ORDER BY `mymenu`.`weight`, `mymenu`.`id`');
			
		$arr_menu=$query->result_array();
		//print_r($arr_menu);
		$data['arr_menu']=array();
		foreach($arr_menu as $group_menu=>$v):
			if(true){
				$data['arr_menu'][$group_menu]='';
				foreach($arr_menu as $item_menu):
					
					
					if( $item_menu['menu_group']==$unit){
				
						
							if($item_menu['count_child']=='1' && $item_menu['parent_id']=='0'){
								$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'<li><a ';
								if(base_url('index.php/'.$item_menu['link'])==current_url()) 
									$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'class="active" ';
								$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'href="'.base_url().$item_menu['link'].'">'
									.$item_menu['title'].'</a></li>';
							}else if($item_menu['count_child']>'1'){
								$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$item_menu['title'].'<span class="caret"></span></a>
										<ul class="dropdown-menu" role="menu">
											';
								$q_submenu=$this->db->query('select * from `menus` where `parent_id`="'.$item_menu['id'].'"');	
								$arr_submenu=$q_submenu->result_array();
								
								foreach($arr_submenu as $item_submenu):
									$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'<li><a ';
									if(base_url('index.php/'.$item_submenu['link'])==current_url()) 
										$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'class="active"';
									$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'href="'.base_url().$item_submenu['link'].'">'.$item_submenu['title'].'</a></li>
									<li class="divider"></li>';
								endforeach;
								
							  $data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu].'</ul>
							</li>';
							}
							
					}
				endforeach;
			  
				$data['arr_menu'][$group_menu]=$data['arr_menu'][$group_menu];
			}
		endforeach;
		$data['arr_menu']['mainmenu']=$data['arr_menu'][$group_menu];
		return $data['arr_menu']['mainmenu'];
	}
}