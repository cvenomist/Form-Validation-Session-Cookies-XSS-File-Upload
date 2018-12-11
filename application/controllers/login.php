<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()

	{
	
	parent::__construct();

	//$this->load->library("security");

	$this->load->helper('cookie');

	$this->load->model('Login_Model');

	$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

	}

public function index()

{

	$this->load->view('Login_view');

}
//...........Registration

public function reg() {
	
		//$this->load->view('Login_view');
		
	if($this->input->post('dsubmit')) 

	{

//........Form Validation

		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]|alpha_dash',
		array('required' => 'You must provide a %s.'));
			
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]');

		$this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]|valid_email');
			
		$this->form_validation->set_rules('picture','Image','callback_image_upload');
			
//..........Form Validation Check	
		
		if($this->form_validation->run()==true) {		
		
			//..............XSS Functionality
					
						$data['non_xss']=array

						(
							'username'=>$this->input->post('username'),

							'password'=>md5($this->input->post('password')),

							'email'=>$this->input->post('email'),

							'picture' => 'upload/'.$this->upload->data()['file_name']
						);

						$data['xss_data'] = $this->security->xss_clean($data['non_xss']);

//..............Data Insertion
						
						$this->Login_Model->insert_entry('users',$data['non_xss']);

						$this->session->set_flashdata('msg',' You are successfully registered');

						//print_r($this->upload->data());

						redirect(base_url().'login');

			} else {
					
//..........Form Validation Else Part
				$this->load->view('Login_view');
				
			}
	}

}
//............Image upload

public function image_upload(){

				$config['upload_path'] = 'upload/';

                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                $config['max_size'] = 100;

                $config['max_width'] = 1024;

                
				$this->load->library('upload',$config);
               
			   $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture')){
					
				return TRUE;

				}else {

				  $this->form_validation->set_message('image_upload',$this->upload->display_errors());

				  return FALSE;

				}	

}	
//...........Login
	
 public function loginpanel(){
	 //$this->load->view('Login1_view');
	 
//............Form Validation
	 
	 $this->load->library('form_validation');

	 $this->form_validation->set_rules('user', 'Username', 'trim|required');

 $this->form_validation->set_rules('pass', 'Password', 'trim|required');
	 
//............Validation Check		 

		 if($this->form_validation->run() ){

		$username=$this->input->post('user');

		$username = $this->security->xss_clean($username);
		
		$password=md5($this->input->post('pass'));

		$password = $this->security->xss_clean($password);
		
		//=========$this->load->model('Login_Model');

		$data['data1']=$this->Login_Model->check_user($username,$password);
		
		//...........Session-Checking
		
		
		if($data['data1']){
			
			$session_data=array('username'=>$username);

			//print_r ($session_data);

			$this->session->set_userdata($session_data);

			if($this->session->userdata('username')){
//.................cookie.............
		$name   = 'user';

        $value  = 'Welcome to your Profile';

        $expire = time()+1000;

        $path  = '/';

        $secure = TRUE;

        setcookie($name,$value,$expire,$path);
//.....................................session set.......
			$this->load->view('dispdata',$data);
				//redirect(base_url().'login/enter');
			} else {
//.............................session else when session not set
				redirect(base_url().'login/loginpanel');

			}
			
		} else {

			$this->session->set_flashdata('error',' Username And Password Not Matched');
			//when session Set/.......
			//redirect(base_url().'login/loginpanel');

		}

		//$this->load->view('dispdata',$data);

	 } else {
		 
		 $this->load->view('Login1_view');
	 }

 }

 //.......... For Session Set/..............
 //public function enter(){
 //	$this->load->view('dispdata');
 //}
 //...........Logout Function
 public function logout(){

	 $this->session->unset_userdata('username');

	 redirect(base_url().'login/loginpanel');

 }

  
 
}	 
?>