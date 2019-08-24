<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{

		
		 
		// $this->load->model('mdl_invoice');
		 $this->load->model('mdl_product');
				
		 $data['category']=$this->mdl_product->get_category();
		 $data['sub_category']=$this->mdl_product->get_sub_category();
		


		$this->load->view('add_category',$data);
	}

	public function add_category()
	{	
		$this->load->model('mdl_product');
		$category['cat_name']=ucfirst($this->input->post('category'));
		// $data['category']=$this->mdl_product->get_category();
		$query=$this->mdl_product->insert_category($category);
		if($query)
		{
			$this->session->set_flashdata('success','Category Successfully Added');
					 redirect('product/index');
		}
	}


	public function fetch_cat_by_id()
	{
		$this->load->model('mdl_product');
		$id=$this->input->post('id');
		// echo $id;exit();
		$this->mdl_product->fetch_cat_by_id($id);
	}
	public function edit_category()
	{

	}

	public function delete_category()
	{
		$this->load->model('mdl_product');
		$id=$this->input->post('id');
		$this->mdl_product->delete_category($id);
	}

	public function add_sub_category()
	{
		$this->load->model('mdl_product');
		$data = array('sub_cat_name' => $this->input->post('subcat'),
					  'cat_id' => $this->input->post('category'),	
					  'price' => $this->input->post('price')	
		 );
		// $data['category']=$this->mdl_product->get_category();
		$query=$this->mdl_product->insert_sub_category($data);
		if($query)
		{
			$this->session->set_flashdata('success',' Sub Category Successfully Added');
					 redirect('product/index');
		}
	}

	public function test()
	{
		$this->load->model('mdl_product');
		$data['category']=$this->mdl_product->get_category();

		$data['all_test']=$this->mdl_product->get_all_test();
		$this->load->view('test',$data);
	}

	public function get_sub_cat()
	{	
		 $this->load->model('mdl_product');
		$id=$this->input->post('id');
		$this->mdl_product->get_sub_cat_by_id($id);

	}
	

	public function add_test()
	{
		$this->load->model('mdl_product');

		$data = array('test_name' =>$this->input->post('name') ,
					  'test_cat_id' =>$this->input->post('category') ,
					  'unit' =>$this->input->post('unit') , 	
					  'ref_value' =>$this->input->post('refrence') ,
					  'result' =>$this->input->post('result') ,
					  'test_sub_cat_id' =>$this->input->post('sub_category') ,
						 );

		$query=$this->mdl_product->add_test($data);
		if($query)
		{
			$this->session->set_flashdata('success',' Test Successfully Added');
					 redirect('product/test');
		}
	}

	public function delete_record_by_id()
	{
		$this->load->model('mdl_product');
		$id=$this->input->post('id');

		$this->mdl_product->delete_record_by_id($id);
	}

	public function print_record_by_id()
	{
		$this->load->model('mdl_product');
		$id=$this->input->post('id');
		$query=$this->mdl_product->get_invoice_print_by_id($id);
		$row=$query->row_array();
		$name=$row['patient_name'];
		$no=$row['receptNumber'];
		$age=$row['age'];
		$address=$row['address'];
		$gander=$row['gander'];
		$type=$row['type'];
		$date=$row['date'];
		$time=$row['time'];
		$this->session->set_userdata('name',$name);
		$this->session->set_userdata('receptNumber',$no);
		$this->session->set_userdata('age',$age);
		$this->session->set_userdata('address',$address);
		$this->session->set_userdata('gander',$gander);
		$this->session->set_userdata('type',$type);
		$this->session->set_userdata('date',$date);
		$this->session->set_userdata('time',$time);
		
		
	}

	public function all_print_opd()
	{
			$this->load->model('mdl_product');
			$data['name']=$this->session->userdata('name');
			$data['receptNumber']=$this->session->userdata('receptNumber');
			$data['age']=$this->session->userdata('age');
			$data['address']=$this->session->userdata('address');
			$data['gander']=$this->session->userdata('gander');
			$data['type']=$this->session->userdata('type');
			$data['date']=$this->session->userdata('date');
			$data['time']=$this->session->userdata('time');
		$this->load->view('all_opd_print',$data);
	}
}