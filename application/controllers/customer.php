<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

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
		$this->load->model('mdl_customer');	
		$data['customer']=$this->mdl_customer->get_customer();
		$data['query']=$this->mdl_region->get_region();
		$this->load->view('add_customer',$data);
	}

	public function insert()
	{
		$data=array(

				'name'=>	ucfirst($this->input->post('name')),
				'shop_name'=>	ucfirst($this->input->post('shop_name')),
				'mobile'=>	ucfirst($this->input->post('mobile')),
				'opening_balance'=>	ucfirst($this->input->post('opening_balance')),
				'opening_quantity'=>	ucfirst($this->input->post('opening_quantity')),
				'region'		=>	ucfirst($this->input->post('region')),
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Customer', 'trim|required');
		$this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'numeric');
		$this->form_validation->set_rules('opening_balance', 'Customer Balance', 'numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_customer');
			if(count($this->mdl_customer->checkData($data['name'])) > 0)
			{
					$this->session->set_flashdata('error','Customer already exists');
					 redirect('customer/index');
			}
			else{


			$query=$this->mdl_customer->insert($data);
				if($query)
				{
					 $this->session->set_flashdata('success','Customer Added sucessfuly');
					 redirect('customer/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function edit_customer($id)
	{
		$this->load->model('mdl_customer');
		$this->load->model('mdl_region');
		$data['query']=$this->mdl_customer->fetch_customer($id);
		$data['regions']=$this->mdl_region->get_region();
		$this->load->view('edit_costumer',$data);

	}

	public function edit_customer_form($id)
	{
		$data=array(

				'name'=>	ucfirst($this->input->post('name')),
				'shop_name'=>	ucfirst($this->input->post('shop_name')),
				'mobile'=>	ucfirst($this->input->post('mobile')),
				'opening_balance'=>	ucfirst($this->input->post('opening_balance')),
				'opening_quantity'=>	ucfirst($this->input->post('opening_quantity')),
				'region'		=>	ucfirst($this->input->post('region')),
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Customer', 'trim|required');
		$this->form_validation->set_rules('shop_name', 'Shop Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'numeric');
		$this->form_validation->set_rules('opening_balance', 'Customer Balance', 'numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_customer');
			

			$query=$this->mdl_customer->update_customer($data,$id);
				if($query)
				{
					 $this->session->set_flashdata('success','Customer Edit sucessfuly');
					 redirect('customer/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
			}
			
		}
	}

	public function delete_customer($id)
	{
		$this->load->model('mdl_customer');
		$query=$this->mdl_customer->delete_customer($id);

		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('customer/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('customer/index');
		}

	}


	public function customer_invoice()
	{
		$this->load->model('mdl_customer');
		$this->load->model('mdl_product');
		$data['customer']=$this->mdl_customer->get_customer();
		$data['item']=$this->mdl_product->get_item();
		$data['invno']=$this->mdl_customer->get_invno();
		$this->load->view('sale_invoice',$data);
	}


	public function insert_invoice()
	{
		$this->load->library('form_validation');
		$form_data = array();



		$inv_data=array(
				'invoice_no	'=>	$this->input->post('invno'),
				'customer_id'=>	$this->input->post('customer'),
				'date'=>	$this->input->post('date'),
				'invoice_total'=>	$this->input->post('total')
		);

		$form_data['item_id'] =	$this->input->post('p_name');
		$form_data['qty'] =	$this->input->post('qty');
		$form_data['price'] =	$this->input->post('price');
		$form_data['item_total'] =	$this->input->post('subtotal');
		
		// print_r($form_data['item_id']);exit();

		$this->load->model('mdl_customer');
			
		$query=$this->mdl_customer->insert_inv($inv_data,$form_data);
			if($query)
				{
					 $this->session->set_flashdata('success','Invoice  Added sucessfuly');
					 redirect('customer/customer_invoice');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
	}


	public function all_customer_invoices()
	{
		$this->load->model('mdl_customer');
		$data['query']=$this->mdl_customer->get_invoice();
		$this->load->view('all_customer_invoices',$data);
	}


	public function delete_invoice($id)
	{
		$this->load->model('mdl_customer');
		$query=$this->mdl_customer->delete_invoice($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('customer/all_customer_invoices');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('customer/all_customer_invoices');
		}

	}

	public function edit_invoice($id)
	{
		$this->load->model('mdl_customer');
		$this->load->model('mdl_product');
		$data['customer']=$this->mdl_customer->get_customer();
		$data['item']=$this->mdl_product->get_item();
		$data['query']=$this->mdl_product->fetch_sale_invoice($id);
		
		$rows=$data['query']->row_array();
		$data['date']=$rows['date'];
		$data['inv_no']=$rows['invoice_no'];
		$data['customer_id']=$rows['customer_id'];
		$data['shopname']=$rows['shop_name'];
		$data['mobile']=$rows['mobile'];
		$data['region']=$rows['region_name'];
		$data['id']=$rows['id'];
		$this->load->view('edit_sale_invoice',$data);
	}
	

	public function update_sale_invoice($id)
	{
		$this->load->model('mdl_customer');
		$inv_data['invoice_no']=$this->input->post('invno');
		$inv_data['customer_id']=$this->input->post('customer');
		$inv_data['date']=$this->input->post('date');
		$inv_data['invoice_total']=$this->input->post('total');
		
		$form_data['item_id'] =	$this->input->post('p_name');
		$form_data['qty'] =	$this->input->post('qty');
		$form_data['price'] =	$this->input->post('price');
		$form_data['item_total'] =	$this->input->post('subtotal');
	
			
		$query=$this->mdl_customer->update_inv($id,$inv_data,$form_data);

			if($query)
				{
					 $this->session->set_flashdata('success','Invoice  Edit sucessfuly');
					 redirect('customer/all_customer_invoices');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
	}


	 public function fetch_customer()
	{
    $this->load->model('mdl_customer');
    $customer_name=$this->input->post('customer_name');
    if($customer_name)
    {
        echo $this->mdl_customer->fetchcustomer($customer_name);
    }

}

	public function return_cylinder()
	{
		$this->load->model('mdl_customer');
		$this->load->model('mdl_product');
		$data['customer']=$this->mdl_customer->get_customer();
		$data['item']=$this->mdl_product->get_item();
		$data['invno']=$this->mdl_customer->get_return_invno();

		$this->load->view('return_cylinder',$data);
	}

public function insert_return_item()
{
	$this->load->library('form_validation');
	$form_data = array();

	$form_data['invoice_no'] =	$this->input->post('invno');
	$form_data['customer_id'] =	$this->input->post('customer');
	$form_data['p_id'] =	$this->input->post('p_name');
	$form_data['qty'] =	$this->input->post('qty');
	$form_data['date'] =	$this->input->post('date');
	$form_data['description'] =	$this->input->post('description');
	
	// print_r($form_data['item_id']);exit();

	$this->load->model('mdl_customer');
		
	$query=$this->mdl_customer->insert_return_item($form_data);
		if($query)
			{
				 $this->session->set_flashdata('success','Cylinder sucessfuly Return');
				 redirect('customer/return_cylinder');
			}
			else{
				$this->session->set_flashdata('error','Some thing went wrong');
				}
}	

}