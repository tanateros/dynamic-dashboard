<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ajax extends CI_Controller {
		public function index()
		{
		}
		public function del_page()
		{		
			if($this->db->where('id',(int)$_POST['id_del_page'])
				->delete($_POST['table'])){
				echo "Запись удалена";
				?><script>document.location.href="";</script><?
			}
		}
	}