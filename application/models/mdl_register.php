
	<?php 
	class Mdl_register extends CI_Model
	{
		//login function
  	public function insert($user)
  	{
  			 $query=$this->db->insert('user',$user);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('username');
	  		$this->db->select('*');
	  		$this->db->where('user_name', $name);
	  		$this->db->from('user');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}


	public function get_user()
	{
		$exe=$this->db->get('user');
		return $exe;
	}

	 }

	 ?>
