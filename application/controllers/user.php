<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->load->model('mdl_register');
		$data['query']=$this->mdl_register->get_user();
		$this->load->view('add_user',$data);
	}

	public function register()
	{
		$user=array('user_name' => $this->input->post('username'), 
                  	'password' => $this->input->post('password'),
                  	'type' => $this->input->post('type')
                  );

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_register');
			if(count($this->mdl_register->checkData($user['user_name'])) > 0)
			{
					$this->session->set_flashdata('error','Username already exists');
					 redirect('user/index');
			}
			else{


			$query=$this->mdl_register->insert($user);
				if($query)
				{
					 $this->session->set_flashdata('success','User Added sucessfuly');
					 redirect('user/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function edit_user($id)
	{                             
		$this->load->model('mdl_user');
		$data['query']=$this->mdl_user->fetch_user($id);
		$this->load->view('edit_user',$data);
	}

	public function edit_user_form($id)
	{
		$this->load->model('mdl_user');
		$this->load->library('form_validation');
		$data['name']=$this->input->post('edit_name');
		$data['password']=$this->input->post('edit_password');
		$this->form_validation->set_rules('edit_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('edit_password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			redirect('user/index');
		} else {
			$query=$this->mdl_user->edit_user($id,$data);
			if($query)
			{
				$this->session->set_flashdata('success', 'User Edit Successfuly');
				redirect('user/index');
			}
			else{
				$this->session->set_flashdata('error', 'Error');
				redirect('user/index');
			}
		}
	}

	public function delete_user($id)
	{
		$this->load->model('mdl_user');
		$query=$this->mdl_user->delete_user($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('user/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('user/index');
		}
	}
}
