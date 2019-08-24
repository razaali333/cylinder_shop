<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

public function daily_report()
{
	date_default_timezone_set('Asia/Karachi');
	$this->load->model('mdl_report');
	$search=$this->input->post('search');
	if(isset($search))
	{
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$recept=$this->input->post('recept');
		$p_name=$this->input->post('p_name');
		$address=$this->input->post('address');
		$gendar=$this->input->post('gendar');
		$type=$this->input->post('opd_type');
		$shift=$this->input->post('shift');

		$data['query']=$this->mdl_report->get_date_filter_record($search,$from,$to,$type,$recept,$p_name,$address,$gendar,$shift);
	}
	else
	{
		$date=date('Y-m-d');
		$today=date('Y-m-d', strtotime($date)) . " 00:00:00";
		$data['query']=$this->mdl_report->get_daily_record($today);
	}

	$this->load->view('opd_daily_report',$data);	
}


public function filter_day_report()
{
$this->load->model('mdl_report');
	$status=$this->input->post('status');

	if($status)
	{
		$this->mdl_report->filter_day_report($status);
	}		
}

function today_report()
{
		date_default_timezone_set('Asia/Karachi');
	$this->load->model('mdl_report');
	$search=$this->input->post('search');
	if(isset($search))
	{
		$date=$this->input->post('date');
		$recept=$this->input->post('recept');
		$p_name=$this->input->post('p_name');
		$gendar=$this->input->post('gendar');
		$type=$this->input->post('opd_type');

		$data['query']=$this->mdl_report->get_today_record($search,$date,$type,$recept,$gendar,$p_name);
	}
	$data['search']=$search;
	$this->load->view('today_report',$data);
}



public function monthly_report()
{
	$this->load->model('mdl_report');
	$search=$this->input->post('search');
	if(isset($search))
	{
		$from=$this->input->post('from');
		$to=$this->input->post('to');

		$type=$this->input->post('opd_type');

		$data['query']=$this->mdl_report->monthly_report($search,$from,$to,$type);
	}
	$data['search']=$search;
	$this->load->view('monthly_report',$data);
}

}
