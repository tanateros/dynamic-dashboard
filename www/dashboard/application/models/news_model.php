<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {
    
    function get_news($num, $offset)
    {
        $this->db->order_by('id','asc');
		$query = $this->db->get('news',$num, $offset);
        return $query->result();
    }
	// Формирование RSS-ленты
	public function feeds_info()
	{
		$this->db->order_by('date_create','asc');
		$this->db->limit(5);
		$query = $this->db->get('news');
		
		//Возвращаем массив с материалами для формирования ленты
		return $query->result_array();
	}
}