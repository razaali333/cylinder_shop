
	<?php 
	class Mdl_region extends CI_Model
	{
		//login function
  	public function insert($region)
  	{
  			 $query=$this->db->insert('region',$region);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('region');
	  		$this->db->select('*');
	  		$this->db->where('region_name', $name);
	  		$this->db->from('region');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	public function get_region()
	{
		$query=$this->db->get('region');
		return $query;
	}


	public function fetch_region($id)
	{
		$query="SELECT * FROM `region` WHERE id='$id'";
		$query=$this->db->query($query);
		return $query->row_array();
	}	

	public function edit_region($id,$data)
	{
		$this->db->where('region.id',$id);
		$query=$this->db->update('region',$data);
		return $query;
	}

	 public function delete_region($id)
    {
       $this->db->where('region.id',$id);
      return  $query= $this->db->delete('region');
    }  
 }

	 ?>
