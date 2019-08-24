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
		$this->load->model('mdl_user');
		
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
                 $username=$data->user_name;
                 $type=$data->type;


                $this->session->set_userdata('user_id',$login_id);
                $this->session->set_userdata('name',$username);
                $this->session->set_userdata('type',$type);
                 if($type=="Admin")
                {
                	redirect('login/dashboard');
                }
                else if($type=="First Male OPD")
                {
                redirect('login/first_male_opd');	
                }
                else if($type=="Second Male OPD")
                {
                 redirect('login/second_male_opd');		
                }
                else if($type=="First Female OPD")
                {
                 redirect('login/first_female_opd');	
                }
                 else if($type=="Second Female OPD")
                {
                 redirect('login/second_female_opd');	
                }
                 else if($type=="Staff OPD")
                {
                 redirect('login/staff_opd');	
                }
                 else if($type=="Aged OPD")
                {
                 redirect('login/aged_opd');	
                }
                else if($type=="Gyne OPD")
                {
                 redirect('login/gyne_opd');	
                }
                
            }
            else{
                $this->session->set_flashdata('error','Wrong Username or Password');
               redirect('login');
            } 
		}
	}	

	public function dashboard()
	{

		$this->load->view('dashboard');	
	}

	public function get_chart()
	{
		$this->load->model('mdl_user');
		$this->mdl_user->get_opd_chart();
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function first_male_opd()
	{
		
		$this->load->model('mdl_user');
		
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			
			$data['fm_inv_no']=$this->mdl_user->first_male_opd_invoice();	
			$this->load->view('first_male_opd',$data);
	}

	public function fm_opd_recpno()
	{
		$this->load->model('mdl_user');
		$status=$this->input->post('status');
				if($status)
				{
				
				}
	}


	public function second_male_opd()
	{
		$this->load->model('mdl_user');	
		$data['sm_inv_no']=$this->mdl_user->second_male_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('second_male_opd',$data);
	}

	public function first_female_opd()
	{
			$this->load->model('mdl_user');	
		$data['ff_inv_no']=$this->mdl_user->first_female_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('first_female_opd',$data);
	}

	public function second_female_opd()
	{
			$this->load->model('mdl_user');	
		$data['sf_inv_no']=$this->mdl_user->second_female_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('second_female_opd',$data);
	}

		public function staff_opd()
	{
			$this->load->model('mdl_user');	
		$data['st_inv_no']=$this->mdl_user->staff_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('staff_opd',$data);
	}


	public function aged_opd()
	{
			$this->load->model('mdl_user');	
		$data['age_inv_no']=$this->mdl_user->aged_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('aged_opd',$data);
	}


		public function gyne_opd()
	{
			$this->load->model('mdl_user');	
		$data['gyne_inv_no']=$this->mdl_user->gyne_opd_invoice();
		$user_id=$this->session->userdata('user_id');	
		if(!isset($user_id))
		{
			redirect('login/index');
		}
			$this->load->view('gyne_opd',$data);
	}




	public function insert_fm_opd()
	{
		$this->load->model('mdl_user');	

		date_default_timezone_set('Asia/Karachi');

		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),	
					  'time'=>	date('H:i:s a'),	
					  'type' => 'fm_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );
		// echo $receptNumber[1];exit();
		$this->session->set_userdata('receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_fm_opd($data);
		
				
	}

		public function insert_sm_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),
					  'time'=>	date('h:i:s  A'),		
					  'type' => 'sm_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );
		$sm_receptNumber=$receptNumber[1];
		$this->session->set_userdata('sm_receptNumber',$sm_receptNumber);
		$query=$this->mdl_user->insert_sm_opd($data);
	
	}

		public function insert_ff_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d'),
					  'time'=>	date('h:i:s  A'),		
					  'type' => 'ff_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );

		$this->session->set_userdata('ff_receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_ff_opd($data);
		
				
	}

			public function insert_sf_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),	
					  'time'=>	date('h:i:s  A'),	
					  'type' => 'sf_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );

		$this->session->set_userdata('sf_receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_sf_opd($data);
		
				
	}

		public function insert_st_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),
					  'time'=>	date('h:i:s  A'),		
					  'type' => 'staff_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );

		$this->session->set_userdata('st_receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_st_opd($data);
		
				
	}

	public function insert_age_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),
					  'time'=>	date('h:i:s  A'),		
					  'type' => 'age_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );

		$this->session->set_userdata('age_receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_age_opd($data);
		
				
	}


		public function insert_gyne_opd()
	{
		$this->load->model('mdl_user');	
		$receptNumber=explode('-',$this->input->post('receptNumber'));
		$data = array('receptNumber' =>$receptNumber[1],
					  'patient_name' => $this->input->post('name'),	
					  'age' => $this->input->post('age'),	
					  'gander' => $this->input->post('gander'),		
					  'address' => $this->input->post('address'),	
					  'date' => date('Y-m-d h:i'),
					  'time'=>	date('h:i:s  A'),		
					  'type' => 'gyne_opd',	
					  'shift' => $this->input->post('shift'),	
					  'price' => 10,	
						 );

		$this->session->set_userdata('gyne_receptNumber',$receptNumber[1]);
		$query=$this->mdl_user->insert_gyne_opd($data);
		
				
	}



	public function fm_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('receptNumber');
		$data['query']=$this->mdl_user->get_opd_invoice_by_id($id);
		$this->load->view('fm_opd_print',$data);
	}

		public function sm_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('sm_receptNumber');
		$data['query']=$this->mdl_user->get_sm_opd_invoice_by_id($id);
		$this->load->view('sm_opd_print',$data);
	}

		public function ff_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('ff_receptNumber');
		$data['query']=$this->mdl_user->get_ff_opd_invoice_by_id($id);
		$this->load->view('ff_opd_print',$data);
	}

		public function sf_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('sf_receptNumber');
		$data['query']=$this->mdl_user->get_sf_opd_invoice_by_id($id);
		$this->load->view('sf_opd_print',$data);
	}

	
		public function st_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('st_receptNumber');
		$data['query']=$this->mdl_user->get_st_opd_invoice_by_id($id);
		$this->load->view('st_opd_print',$data);
	}

		public function age_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('age_receptNumber');
		$data['query']=$this->mdl_user->get_age_opd_invoice_by_id($id);
		$this->load->view('age_opd_print',$data);
	}

	public function gyne_opd_print()
	{

		$this->load->model('mdl_user');	
		$id=$this->session->userdata('gyne_receptNumber');
		$data['query']=$this->mdl_user->get_gyne_opd_invoice_by_id($id);
		$this->load->view('gyne_opd_print',$data);
	}


	

	public function logout()
	{
		$user_id=$this->session->userdata('user_id');
			unset($user_id);
      $this->session->sess_destroy();
	
		redirect('login/index');
	}
}
