<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agency extends CI_Controller {

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

		$this->load->model('mdl_agency');
		$data['query']=$this->mdl_agency->get_agency();
		$this->load->view('agency',$data);
	}

	public function insert()
	{
		$data=array(

				'agency_name'=>	ucfirst($this->input->post('agency'))
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('agency', 'agency', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_agency');
			if(count($this->mdl_agency->checkData($data['agency'])) > 0)
			{
					$this->session->set_flashdata('error','agency already exists');
					 redirect('agency/index');
			}
			else{


			$query=$this->mdl_agency->insert($data);
				if($query)
				{
					 $this->session->set_flashdata('success','agency Added sucessfuly');
					 redirect('agency/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function edit_agency($id)
	{
		$this->load->model('mdl_agency');
		$data['query']=$this->mdl_agency->fetch_agency($id);

		$this->load->view('edit_agency',$data);
	}
	

	function edit_agency_form ($id)
	{
		$this->load->model('mdl_agency');
		$this->load->library('form_validation');
		$data['agency_name']=ucfirst($this->input->post('edit_agency'));

		$this->form_validation->set_rules('edit_agency', 'agency', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->edit_agency($id);
		} else {
			$query=$this->mdl_agency->edit_agency($id,$data);
			if($query)
			{
				$this->session->set_flashdata('success', 'agency Edit Successfuly');
				redirect('agency/index');
			}
			else{
				$this->session->set_flashdata('error', 'Error');
				$this->edit_agency($id);
			}
		}
	}

	public function delete_agency($id)
	{
		$this->load->model('mdl_agency');
		$query=$this->mdl_agency->delete_agency($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('categories/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('categories/index');
		}
	}
	
}
