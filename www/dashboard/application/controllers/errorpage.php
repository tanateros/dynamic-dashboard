<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errorpage extends CI_Controller {
	public function index()
	{
		$data['arr_q']=$this->db->where('link','')->limit(1)->get('pages')->row();
		
        $this->load->library('Layout');
		$this->layout->content('error404',$data);		
	}
}