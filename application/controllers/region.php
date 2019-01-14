<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {

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
		$this->load->model('mdl_region');
		$data['query']=$this->mdl_region->get_region();
		$this->load->view('region',$data);
	}

	public function insert()
	{
		$data=array(

				'region_name'=>	ucfirst($this->input->post('region'))
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('region', 'Region', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_region');
			if(count($this->mdl_region->checkData($data['region'])) > 0)
			{
					$this->session->set_flashdata('error','Region already exists');
					 redirect('region/index');
			}
			else{


			$query=$this->mdl_region->insert($data);
				if($query)
				{
					 $this->session->set_flashdata('success','Region Added sucessfuly');
					 redirect('region/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function edit_region($id)
	{
		$this->load->model('mdl_region');
		$data['query']=$this->mdl_region->fetch_region($id);

		$this->load->view('edit_region',$data);
	}
	

	function edit_region_form ($id)
	{
		$this->load->model('mdl_region');
		$this->load->library('form_validation');
		$data['region_name']=ucfirst($this->input->post('edit_region'));

		$this->form_validation->set_rules('edit_region', 'Region', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->edit_region($id);
		} else {
			$query=$this->mdl_region->edit_region($id,$data);
			if($query)
			{
				$this->session->set_flashdata('success', 'Region Edit Successfuly');
				redirect('region/index');
			}
			else{
				$this->session->set_flashdata('error', 'Error');
				$this->edit_region($id);
			}
		}
	}

	public function delete_region($id)
	{
		$this->load->model('mdl_region');
		$query=$this->mdl_region->delete_region($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('region/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('region/index');
		}
	}
}
