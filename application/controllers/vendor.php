<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

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

		public function loan_cylinder()
		{
			$this->load->model('mdl_product');
		$this->load->model('mdl_agency');
		$this->load->model('mdl_empty_cylinder');
		$data['query']=$this->mdl_product->get_item();
		$data['vendor']=$this->mdl_empty_cylinder->get_vendor();
		$data['invno']=$this->mdl_empty_cylinder->get_empty_cylinder_invno();

			$this->load->view('empty_loan_cylinder',$data);
		}

		public function add_vendor()
		{
			$this->load->model('mdl_empty_cylinder');

			$data['query']=$this->mdl_empty_cylinder->get_vendor();
			$this->load->view('add_vendor',$data);
		}
	
		public function add_vendor_form()
		{
			$this->load->model('mdl_empty_cylinder');
		$vendor=array('vendor_name' => $this->input->post('vendor_name'), 
                  'shop' => $this->input->post('shop'),
                  'mobile' => $this->input->post('mobile'),
                  'address' => $this->input->post('address')
                  );

		$this->load->library('form_validation');
		$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('shop', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			if(count($this->mdl_empty_cylinder->checkData($vendor['vendor_name'])) > 0)
			{
					$this->session->set_flashdata('error','Vendor Name already exists');
					 redirect('vendor/add_vendor');
			}
			else{


			$query=$this->mdl_empty_cylinder->insert($vendor);
				if($query)
				{
					 $this->session->set_flashdata('success','Vendor Added sucessfuly');
					 redirect('vendor/add_vendor');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
		}	

		public function insert_emp_cylinder_invoice()
		{
			$this->load->library('form_validation');
		$form_data = array();



		$inv_data=array(
				'invoice_no'=>	$this->input->post('invno'),
				'vendor_id'=>	$this->input->post('vendor'),
				'date'=>	$this->input->post('date')
		);

		$form_data['item_id'] =	$this->input->post('p_name');
		$form_data['qty'] =	$this->input->post('qty');
		
		// print_r($form_data['item_id']);exit();

		$this->load->model('mdl_empty_cylinder');
			
		$query=$this->mdl_empty_cylinder->insert_inv($inv_data,$form_data);
			if($query)
				{
					 $this->session->set_flashdata('success','Invoice  Added sucessfuly');
					 redirect('vendor/loan_cylinder');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
		}


	public function all_emp_cylinder_invoice()
		{

			$this->load->model('mdl_empty_cylinder');
			$data['query']=$this->mdl_empty_cylinder->get_invoice();
			$this->load->view('all_loan_cylinder',$data);
		}	
	
}
