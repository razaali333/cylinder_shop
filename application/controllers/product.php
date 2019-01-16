<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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
		$this->load->model('mdl_product');

		$data['query']=$this->mdl_agency->get_agency();
		$data['item']=$this->mdl_product->get_items_with_cat();
		// $data['agency_by_id']=$this->mdl_agency->get_cat_by_id();
		$this->load->view('product',$data);
	}

	public function insert()
	{
		$data=array(

				'product_name'=>	ucfirst($this->input->post('name')),
				'agency_id'=>	ucfirst($this->input->post('agency'))
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Cylinder Name', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_product');
			if(count($this->mdl_product->checkData($data['product_name'])) > 0)
			{
					$this->session->set_flashdata('error','Cylinder  already exists');
					 redirect('product/index');
			}
			else{


			$query=$this->mdl_product->insert($data);
				if($query)
				{
					 $this->session->set_flashdata('success','Cylinder  Added sucessfuly');
					 redirect('product/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function invoice()
	{
		$this->load->model('mdl_product');
		$this->load->model('mdl_agency');
		$data['query']=$this->mdl_product->get_item();
		$data['agency']=$this->mdl_agency->get_agency();
		$data['invno']=$this->mdl_product->get_invno();


		$this->load->view('invoice',$data);
	}

	public function insert_invoice()
	{
		$this->load->library('form_validation');
		$form_data = array();



		$inv_data=array(
				'inv_no'=>	$this->input->post('invno'),
				'agency_id'=>	$this->input->post('agency'),
				'date'=>	$this->input->post('date'),
				'inv_subtotal'=>	$this->input->post('total'),
				'description'=>		$this->input->post('description')
		);

		$form_data['item_id'] =	$this->input->post('p_name');
		$form_data['qty'] =	$this->input->post('qty');
		$form_data['price'] =	$this->input->post('price');
		$form_data['item_subtotal'] =	$this->input->post('subtotal');
		
		// print_r($form_data['item_id']);exit();

		$this->load->model('mdl_product');
			
		$query=$this->mdl_product->insert_inv($inv_data,$form_data);
			if($query)
				{
					 $this->session->set_flashdata('success','Invoice  Added sucessfuly');
					 redirect('product/invoice');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			
		}


		public function edit_item($id)
		{
			$this->load->model('mdl_product');
			$this->load->model('mdl_agency');
			$data['agency']=$this->mdl_agency->get_agency();
			$data['query']=$this->mdl_product->fetch_product($id);

			$this->load->view('edit_product',$data);
		}

		public function edit_item_form($id)
		{
			$this->load->model('mdl_product');
			$this->load->library('form_validation');
		$data['product_name']=ucfirst($this->input->post('edit_product'));
		$data['agency_id']=ucfirst($this->input->post('agency'));

		$this->form_validation->set_rules('edit_product', 'Cylinder', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->edit_product($id);
		} else {
			$query=$this->mdl_product->edit_item($id,$data);
			if($query)
			{
				$this->session->set_flashdata('success', 'Cylinder Edit Successfuly');
				redirect('product/index');
			}
			else{
				$this->session->set_flashdata('error', 'Error');
				$this->edit_product($id);
			}
		}
		}

		public function all_invoice()
		{

			$this->load->model('mdl_product');
			$data['query']=$this->mdl_product->get_invoice();
			$this->load->view('all_invoice_record',$data);
		}


		public function delete_item($id)
		{
			$this->load->model('mdl_product');
		$query=$this->mdl_product->delete_product($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('product/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('product/index');
		}


		}


		public function edit_invoice($id)
		{
			$this->load->model('mdl_product');
			$this->load->model('mdl_agency');
			$data['agency']=$this->mdl_agency->get_agency();
			$data['item']=$this->mdl_product->get_item();
			$data['query']=$this->mdl_product->fetch_invoice($id);
			
			$rows=$data['query']->row_array();
			$data['date']=$rows['date'];
			$data['inv_no']=$rows['inv_no'];
			$data['inv_id']=$rows['agency_id'];
			$data['id']=$rows['id'];
			$data['description']=$rows['description'];
			$this->load->view('edit_invoice',$data);
		}

		public function update_invoice($id)
		{
			$this->load->model('mdl_product');
		$inv_data['inv_no']=$this->input->post('invno');
		$inv_data['agency_id']=$this->input->post('agency');
		$inv_data['date']=$this->input->post('date');
		$inv_data['inv_subtotal']=$this->input->post('total');
		$inv_data['description']=$this->input->post('description');
		
		$form_data['item_id'] =	$this->input->post('p_name');
		$form_data['qty'] =	$this->input->post('qty');
		$form_data['price'] =	$this->input->post('price');
		$form_data['item_subtotal'] =	$this->input->post('subtotal');
	
			
		$query=$this->mdl_product->update_inv($id,$inv_data,$form_data);

			if($query)
				{
					 $this->session->set_flashdata('success','Invoice  Edit sucessfuly');
					 redirect('product/all_invoice');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
		}

		public function delete_invoice($id)
		{
			$this->load->model('mdl_product');
		$query=$this->mdl_product->delete_invoice($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('product/all_invoice');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('product/all_invoice');
		}
		}
}
