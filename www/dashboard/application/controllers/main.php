<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$data['arr_q']=$this->db->where('link','')->limit(1)->get('pages')->row();
		
        $this->load->library('Layout');
		$this->layout->content('home',$data);		
	}
	
	public function page($link)
	{
		$data['arr_q']=$this->db->where('link',$link)->limit(1)->get('pages')->row();
	
		if(!isset($data['arr_q']->title)) redirect(base_url().'404');
		$data['breadcrumbs']['link'][]=base_url();
		$data['breadcrumbs']['title'][]='Главная';
		$data['breadcrumbs']['link'][]=base_url().'page/';
		$data['breadcrumbs']['title'][]=$data['arr_q']->title;
		
        $this->load->library('Layout');
		$this->layout->content('page',$data);
	}
}