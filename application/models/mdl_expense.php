
	<?php 
	class Mdl_expense extends CI_Model
	{
		//login function
  	public function insert($expense)
  	{
  			 $query=$this->db->insert('expenses',$expense);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('expense');
	  		$this->db->select('*');
	  		$this->db->where('expense_name', $name);
	  		$this->db->from('expenses');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	function get_expense()
	{
		  $query= $this->db->get('expenses');
   return $query;
	}


	public function fetch_expense($id)
	{
		$query="SELECT * FROM `expenses` WHERE id='$id'";
		$query=$this->db->query($query);
		return $query->row_array();
	}	

	public function edit_expense($id,$data)
	{
		$this->db->where('expenses.id',$id);
		$query=$this->db->update('expenses',$data);
		return $query;
	}

	 public function delete_expense($id)
    {
       $this->db->where('expenses.id',$id);
      return  $query= $this->db->delete('expenses');
    }  

	 }

	 ?>
