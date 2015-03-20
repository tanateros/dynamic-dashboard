<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public function page()
	{	
		$data['breadcrumbs']['link'][]=base_url();
		$data['breadcrumbs']['title'][]='Главная';
		$data['breadcrumbs']['link'][]=base_url().'news/page/';
		$data['breadcrumbs']['title'][]='Новости';

		
		$config['base_url'] = base_url().'/news/page/';
		$config['total_rows'] = $this->db->count_all('news');
		$config['per_page'] = '3';
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = 'В начало';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'В конец';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '->';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<-';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		
		$this->pagination->initialize($config);
		
		$this->load->model('news_model');
		$data['resurs'] = $this->news_model->get_news($config['per_page'],$this->uri->segment(3));

		$data['paginator'] = $this->pagination->create_links();


		$this->load->library('Layout');
		$this->layout->content('news_list',$data);
	}

	
	public function link($link='')
	{
		if($link!='')
		{
			$data['arr_q']=$this->db->where('link',$link)->limit(1)->get('news')->row();
			
			$data['breadcrumbs']['link'][]=base_url();
			$data['breadcrumbs']['title'][]='Главная';
			$data['breadcrumbs']['link'][]=base_url().'news/page/';
			$data['breadcrumbs']['title'][]='Новости';
			$data['breadcrumbs']['link'][]=base_url().'news/'.$link;
			$data['breadcrumbs']['title'][]=$data['arr_q']->title;
			
			$this->load->library('Layout');
			$this->layout->content('news',$data);		
		}
	}
}