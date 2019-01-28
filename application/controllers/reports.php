<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function return_report()
	{
		$data = array();
		$this->load->model('mdl_report');
		
		$search=$this->input->post('search');
		if($search)
		{

			$from_date=$this->input->post('from_date');
			$to_date=$this->input->post('to_date');
			//echo $from_date." ".$to_date;exit();
			$data['query']=$this->mdl_report->filter_payment($from_date,$to_date);
			
		}
		else{
			$data['query']=$this->mdl_report->ret_payment();
			
		}

		$this->load->view('ret_report.php',$data);
	}

	public function return_cylinder_report()
	{
		$this->load->model('mdl_report');
		$this->load->model('mdl_product');	

		$data=array();
		$search=$this->input->post('search');
		if($search)
		{
		$data['item']=$this->mdl_product->get_item();
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$cylinder=$this->input->post('cylinder');

		$data['query']=$this->mdl_report->ret_cylinder_report($from_date,$to_date,$cylinder);	
		}
		else
		{
			$data['item']=$this->mdl_product->get_item();
		}
		$this->load->view('ret_cylinder_report',$data);
	}

	public function daily_sale_report()
	{
		$this->load->model('mdl_customer');	
		$this->load->model('mdl_report');
		
		$data=array();
		$search=$this->input->post('search');
		if($search)
		{
		$data['customer']=$this->mdl_customer->get_customer();	
		$from_date=$this->input->post('from_date');
		$to_date=$this->input->post('to_date');
		$customer=$this->input->post('customer');

		$data['query']=$this->mdl_report->daily_sale_report($from_date,$to_date,$customer);	
		}
		else
		{
			$data['customer']=$this->mdl_customer->get_customer();
		}
		$this->load->view('daily_sale_report',$data);
	} 

	public function stock_report()
	{
		$this->load->model('mdl_report');
		$this->load->model('mdl_product');
		$search=$this->input->post('search');
		$data['type']= $this->input->post('type');


		if(isset($search) && $data['type']=='full_cylinder')
		{
			$data['item']=$this->mdl_product->get_item();
			$this->load->view('stock_report',$data);
		}
		else if(isset($search) && $data['type']=='empty_cylinder')
		{
			$data['empty']=$this->mdl_product->get_item();
			$this->load->view('stock_report',$data);
		}
		else{
			$this->load->view('stock_report',$data);
		}
	}

	public function fetch_qty_by_item($item_id)
	{

		$this->load->model('mdl_report');
		$data['query']=$this->mdl_report->fetch_stock_item_qty($item_id);
		$run=$data['query']->row_array();

		$data['run']=$this->mdl_report->fetch_sale_item_qty($item_id);
		$row=$data['run']->row_array();

		$data['r_qty']=$this->mdl_report->fetch_retun_item_qty($item_id);
		$r_qty=$data['r_qty']->row_array();

		$data['o_qty']=$this->mdl_report->fetch_open_item_qty($item_id);
		$o_qty=$data['o_qty']->row_array();
			
				$s_qty=$run['p_qty']-$row['s_qty'];
				echo $s_qty;
			
	}

	public function fetch_empty_qty_by_item($item_id)
	{

		$this->load->model('mdl_report');

		$data['run']=$this->mdl_report->fetch_sale_item_qty($item_id);
		$row=$data['run']->row_array();

		$data['r_qty']=$this->mdl_report->fetch_retun_item_qty($item_id);
		$r_qty=$data['r_qty']->row_array();

		$data['o_qty']=$this->mdl_report->fetch_open_item_qty($item_id);
		$o_qty=$data['o_qty']->row_array();
			
			
				$e_qty=$o_qty['o_qty']+$r_qty['r_qty']-$row['s_qty'];
				echo $e_qty;
			
	}

	public function daily_sale_purchase_report()
	{
			$this->load->model('mdl_report');
			$search=$this->input->post('search');
			$data['date']=$this->input->post('date');

		if(isset($search) && !empty($data['date']))
		{
			$data['item']=$this->mdl_report->get_item_purchase($data['date']);
			$item=$data['item']->row_array();
			$item_id=$item['p_id'];

			$this->load->view('daily_sale_purchase_report',$data);
		}
		else{
			$this->load->view('daily_sale_purchase_report');
		}

	
}

public function fetch_pur_qty_by_item($item_id, $date)
	{
		$this->load->model('mdl_report');

		$data['query']=$this->mdl_report->fetch_sal_qty_by_item($item_id, $date);
		$row=$data['query']->row_array();
		//echo $row['s_qty'];
		$s_qty=$row['s_qty'];
		 //
		return $s_qty;
	}
// 	// public function fetch_remianing_qty_by_item($item_id, $date) 
// 	//  {
// 	//  	$this->load->model('mdl_report');
// 	// 	$data['query']=$this->mdl_report->fetch_sal_qty_by_item($item_id,$date);
// 	// 	$row=$data['query']->row_array();
// 	// 	//echo $row['s_qty'];
// 	// 	//echo $s_qty=$row['s_qty'];

// 	// 	 $data['query']=$this->mdl_report->get_item_purchase($date);
// 	// 	// $p_qty=$data['query']->row_array();
// 	// 	// echo $r_qty=$p_qty['p_qty'];
// 	//  }
}