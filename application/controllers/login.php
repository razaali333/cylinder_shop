<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	public function login_user()
	{
		$this->load->model('mdl_user');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'User Name', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} 
		else {
			  	$name=$this->input->post('username');
        		$pass=$this->input->post('password');
                $data=$this->mdl_user->login($name,$pass);

                if($data)
            {
                $login_id=$data->id;        
                 $username=$data->name;

                $this->session->set_userdata('user_id',$login_id);
                $this->session->set_userdata('name',$username);
                redirect('login/dashboard');
            }
            else{
                $this->session->set_flashdata('error','Wrong Username or Password');
                $this->index();
            } 
		}
	}	

	public function register()
	{
		$this->load->view('register');
	}

	public function dashboard()
	{
		// $this->load->model('mdl_user');
		// $data['user']=$this->mdl_user->fetch_user();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}

		$this->load->view('dashboard');
	}

	public function logout()
	{
		$user_id=$this->session->userdata('user_id');
			unset($user_id);
      $this->session->sess_destroy();
	
		redirect('login/index');
	}
}
