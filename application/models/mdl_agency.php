
	<?php 
	class Mdl_agency extends CI_Model
	{
		//login function
  	public function insert($agency)
  	{
  			 $query=$this->db->insert('agency',$agency);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('agency');
	  		$this->db->select('*');
	  		$this->db->where('agency_name', $name);
	  		$this->db->from('agency');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	public function get_agency()
	{
		$query=$this->db->get('agency');
		return $query;
	}

	public function fetch_agency($id)
	{
		$query="SELECT * FROM `agency` WHERE id='$id'";
		$query=$this->db->query($query);
		return $query->row_array();
	}	

	public function edit_agency($id,$data)
	{
		$this->db->where('agency.id',$id);
		$query=$this->db->update('agency',$data);
		return $query;
	}
	 public function delete_agency($id)
    {
       $this->db->where('agency.id',$id);
      return  $query= $this->db->delete('agency');
    }  
	
	 }

	 
	 ?>
