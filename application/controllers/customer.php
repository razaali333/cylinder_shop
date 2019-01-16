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
				'invoice_total'=>	$this->input->post('total'),
				'description'=>	$this->input->post('description')
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
		$data['description']=$rows['description'];
		$this->load->view('edit_sale_invoice',$data);
	}
	

	public function update_sale_invoice($id)
	{
		$this->load->model('mdl_customer');
		$inv_data['invoice_no']=$this->input->post('invno');
		$inv_data['customer_id']=$this->input->post('customer');
		$inv_data['date']=$this->input->post('date');
		$inv_data['invoice_total']=$this->input->post('total');
		$inv_data['description']=$this->input->post('description');
		
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
 public function fetch_customer_prev()
	{
    $this->load->model('mdl_customer');
    $customer_name=$this->input->post('customer_name');
    if($customer_name)
    {
        echo $this->mdl_customer->fetchcustomer_prev($customer_name);
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


public function all_return_cylinder()
{
	$this->load->model('mdl_customer');
	// $data['item']=$this->mdl_product->get_item();
	// $data['customer']=$this->mdl_customer->get_customer();
	// $data['query']=$this->mdl_customer->fetch_invoice($id);
	$data['query']=$this->mdl_customer->fetch_return_cylinder();
	$row=$data['query']->row_array();
	$data['invoice_no']=$row['invoice_no'];
	$this->load->view('all_return_cylinder',$data);
}

public function edit_return_cylinder($id)
{
	$this->load->model('mdl_product');
	$this->load->model('mdl_customer');
	$data['item']=$this->mdl_product->get_item();
	$data['customer']=$this->mdl_customer->get_customer();
	$data['query']=$this->mdl_customer->fetch_invoice($id);
	$rows=$data['query']->row_array();
	$data['date']=$rows['date'];
	$data['inv_no']=$rows['invoice_no'];
	$data['cus_id']=$rows['customer_id'];
	$data['description']=$rows['description'];
	$data['id']=$id;
	$this->load->view('edit_return_cylinder',$data);
}

public function edit_return_cylinder_form($id)
{
	$form_data['invoice_no'] =	$this->input->post('invno');
	$form_data['customer_id'] =	$this->input->post('customer');
	$form_data['p_id'] =	$this->input->post('p_name');
	$form_data['qty'] =	$this->input->post('qty');
	$form_data['date'] =	$this->input->post('date');
	$form_data['description'] =	$this->input->post('description');


	$this->load->model('mdl_customer');
		
	$query=$this->mdl_customer->edit_return_cylinder($form_data,$id);
		if($query)
		{
			 $this->session->set_flashdata('success','Return Cylinder Invoice sucessfuly Edit');
			 redirect('customer/all_return_cylinder');
		}
		else{
			$this->session->set_flashdata('error','Some thing went wrong');
			}

}

public function delete_return_cylinder($id)
{
	$this->load->model('mdl_customer');
		$query=$this->mdl_customer->delete_return_cylinder_inv($id);

		if($query)
		{
			$this->session->set_flashdata('success', 'Return Cylinder Invoice Deleted Succesfully');
			redirect('customer/all_return_cylinder');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('customer/index');
		}
}

public function payment()
{
	$this->load->model('mdl_customer');
	$data['customer']=$this->mdl_customer->get_customer();
	$data['invno']=$this->mdl_customer->get_payment_inv_no();
	$this->load->view('payment',$data);
}
public function insert_payment()
{
	
	$form_data = array();

	$form_data['customer_id'] =	$this->input->post('customer');
	$form_data['invoice_no']=$this->input->post('invno');
	$form_data['amount'] =	$this->input->post('amount');
	$form_data['date'] =	$this->input->post('date');
	$form_data['description'] =	$this->input->post('description');
	$this->load->model('mdl_customer');
		
	$query=$this->mdl_customer->insert_payment($form_data);
		if($query)
		{
			 $this->session->set_flashdata('success','Cylinder sucessfuly Return');
			 redirect('customer/payment');
		}
		else{
			$this->session->set_flashdata('error','Some thing went wrong');
			}
	
}

public function all_return_payment()
{

	$this->load->model('mdl_customer');
	$data['query']=$this->mdl_customer->fetch_ret_pay();
	$this->load->view('all_customer_payment',$data);
}

public function edit_return_payment($id)
{

	$this->load->model('mdl_customer');
	$data['customer']=$this->mdl_customer->get_customer();
	$data['query']=$this->mdl_customer->get_cust_returnpay($id);
	$this->load->view('edit_return_payment',$data);
}

public function update_payment($id)
{
	$form_data = array();

	$form_data['customer_id'] =	$this->input->post('customer');
	$form_data['invoice_no']=$this->input->post('invno');
	$form_data['amount'] =	$this->input->post('amount');
	$form_data['date'] =	$this->input->post('date');
	$form_data['description'] =	$this->input->post('description');
	$this->load->model('mdl_customer');
		
	$query=$this->mdl_customer->update_payment($form_data,$id);
		if($query)
		{
			 $this->session->set_flashdata('success','Return Amount Updated');
			 redirect('customer/all_return_payment');
		}
		else{
			$this->session->set_flashdata('error','Some thing went wrong');
			}
	
}

public function delete_payment($id)
{
	$this->load->model('mdl_customer');
	$query=$this->mdl_customer->delete_ret_payment($id);
	if($query)
		{
			 $this->session->set_flashdata('success','Return Amount Deleted');
			 redirect('customer/all_return_payment');
		}
		else{
			$this->session->set_flashdata('error','Some thing went wrong');
			}

}

function model()
{
	$this->load->model('mdl_customer');
	$cus_id=$this->input->post('cus_id');
	if($cus_id)
	{

  $query=$this->mdl_customer->model($cus_id);
	}
}

}