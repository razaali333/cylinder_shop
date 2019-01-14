<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expense extends CI_Controller {

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
		$this->load->model('mdl_expense');
		$data['query']=$this->mdl_expense->get_expense();
		$this->load->view('expense',$data);
	}

	public function insert()
	{
		$data=array(

				'expense_name'=>	ucfirst($this->input->post('expense'))
			);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('expense', 'Expense', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$this->load->model('mdl_expense');
			if(count($this->mdl_expense->checkData($data['expense'])) > 0)
			{
					$this->session->set_flashdata('error','Expense already exists');
					 redirect('expense/index');
			}
			else{


			$query=$this->mdl_expense->insert($data);
				if($query)
				{
					 $this->session->set_flashdata('success','Expense Added sucessfuly');
					 redirect('expense/index');
				}
				else{
					$this->session->set_flashdata('error','Some thing went wrong');
				}
			}
			
		}
	}

	public function edit_expense($id)
	{
		$this->load->model('mdl_expense');
		$data['query']=$this->mdl_expense->fetch_expense($id);

		$this->load->view('edit_expense',$data);
	}
	

	function edit_expense_form ($id)
	{
		$this->load->model('mdl_expense');
		$this->load->library('form_validation');
		$data['expense_name']=ucfirst($this->input->post('edit_expense'));

		$this->form_validation->set_rules('edit_expense', 'Expense', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->edit_expense($id);
		} else {
			$query=$this->mdl_expense->edit_expense($id,$data);
			if($query)
			{
				$this->session->set_flashdata('success', 'Expense Edit Successfuly');
				redirect('expense/index');
			}
			else{
				$this->session->set_flashdata('error', 'Error');
				$this->edit_expense($id);
			}
		}
	}

	public function delete_expense($id)
	{
		$this->load->model('mdl_expense');
		$query=$this->mdl_expense->delete_expense($id);
		if($query)
		{
			$this->session->set_flashdata('success', 'Deleted Succesfully');
			redirect('expense/index');
		}
		else{
			$this->session->set_flashdata('error', 'Error');
			redirect('expense/index');
		}
	}
	
}
