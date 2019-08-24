<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class other extends CI_Controller
 {

 	function ecg()
 	{
 		$this->load->model('mdl_other');

 		$data['query']=$this->mdl_other->fetch_ecg();
 		$data['recept']=$this->mdl_other->fetch_ecg_recept();
 		$this->load->view('ecg_entry',$data);
 	}

 }//class end here


?>