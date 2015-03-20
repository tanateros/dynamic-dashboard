<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminka extends CI_Controller {
	public function index()
	{		
		$data=array();
        $this->load->library('adminlayout');
		$this->load->helper('captcha');
		// Добавить валидацию формы
	//	$this->load->library('form_validation');
	//	$this->form_validation->set_rules('login', 'Имя пользователя', 'required');
		if($this->input->post('login')=='admin' && $this->input->post('password')=='Qwerty12' && $this->session->userdata('word_captcha')==$this->input->post('captcha') || $this->session->userdata('userId')=='admin'){
			$this->session->set_userdata('userId', 'admin');
			$this->adminlayout->content('admin_home',$data);	
		}
		else {
			$vals = array(
				'word' => rand(100000,10),
				'img_path' => './images/captcha/',
				'img_url' => base_url().'images/captcha/',
				'img_width' => '150',
				'img_height' => 30,
				'expiration' => 7200
			);
			if($this->session->userdata('word_captcha'))
				$this->session->unset_userdata('word_captcha');
			$this->session->set_userdata('word_captcha', $vals['word']);
			$cap = create_captcha($vals);
			?><?php echo form_open(''); ?>
				Login: <input type="text" name="login" /><br />
				Password: <input type="password" name="password" /><br />
				<?=$cap['image'];?><br />
				<input type="text" name="captcha" value="" /><br />
				<input type="submit" value="Ok" /><br />
			</form>
		<?}
	}
	public function logout()
	{		
		$this->session->unset_userdata('userId');
		redirect(base_url().'index.php/adminka');
	}
	
	
	public function page($table='')
	{
	 if($this->session->userdata('userId')=='admin'){
		$query=$this->db->query('show columns from `'.$table.'`');
		$data['arr_c']=$query->result_array();
		
		if($table=='menus')
			$query=$this->db->order_by('parent_id','asc');
		$query=$this->db->get($table);
		$data['arr_r']=$query->result_array();
		$data['table']=$table;
		
		$this->load->library('adminlayout');
		$this->adminlayout->content('admin_page',$data);	
	 }
	 else redirect(base_url().'index.php/adminka');
	}
	
	
	public function edit($table='', $id='')
	{
	 if($this->session->userdata('userId')=='admin'){
		if($table=='menus'){
			$q_m_i=$this->db->query('select * from menu_icons');
			$data['menu_icons']=$q_m_i->result_array();
		}
		
		$data['table']=$table;
		
		$query=$this->db->query('show columns from `'.$table.'`');
		$data['arr_c']=$query->result_array();
		
		$query=$this->db->where('id',(int)$id)->get($table);
		$data['arr_r']=$query->result_array();

		$this->load->library('adminlayout');
		$this->adminlayout->content('admin_page_item',$data);	
	
		if(isset($_POST['edit_item'])){
			$update_mass=array();
			foreach($_POST as $c=>$k){
				if($c!='edit_item')
					$update_mass[$c]=$k;
			}
			
			$this->db->where('id',$id)->update($table,$update_mass);
			redirect(base_url().'index.php/adminka/edit/'.$table.'/'.$id);
		}
	 }
	 else redirect(base_url().'index.php/adminka');
	}
		
	public function newitem($table='')
	{
	 if($this->session->userdata('userId')=='admin'){
		if($table=='menus'){
			$q_m_i=$this->db->query('select * from menu_icons');
			$data['menu_icons']=$q_m_i->result_array();
		}
		
		$data['table']=$table;
		
		$query=$this->db->query('show columns from `'.$table.'`');
		$data['arr_c']=$query->result_array();
		
		$this->load->library('adminlayout');
		$this->adminlayout->content('admin_new_item',$data);	
	
		if(isset($_POST['new_item'])){
			$update_mass=array();
			foreach($_POST as $c=>$k){
				if($c!='new_item' && $c!='id')
					$update_mass[$c]=$k;
			}
			
			$this->db->insert($table,$update_mass);
			redirect(base_url().'index.php/adminka/page/'.$table);
		}
	 }
	 else redirect(base_url().'index.php/adminka');
	}
	public function media($res='', $item='', $pathitem=''){
	 if($this->session->userdata('userId')=='admin'){
		$data=array();
		$data['doppath'] ='';
		if($res=='delete' && $item!=''){
		echo $_SERVER['DOCUMENT_ROOT'].'/'.$pathitem.'/'.urldecode($item);
			unlink ($_SERVER['DOCUMENT_ROOT'].'/'.$pathitem.'/'.urldecode($item));
		 	redirect(base_url().'index.php/adminka/media');
		}
		else if($res!=''){
			$data['doppath'] = $res.'/';
		}
			$this->load->library('adminlayout');
		$this->adminlayout->content('admin_media',$data);	
	 }
	 else redirect(base_url().'index.php/adminka');
	}
}