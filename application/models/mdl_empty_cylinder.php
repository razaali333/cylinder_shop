
	<?php 
	class Mdl_empty_cylinder extends CI_Model
	{
		public function get_empty_cylinder_invno()
	{
		$query="SELECT * FROM loan_cylinder ORDER BY invoice_no  DESC LIMIT 1";
		$query=$this->db->query($query);

				return $query;
			

	}

		 public function checkData()
	{
 		 $name = $this->input->post('vendor_name');
	  		$this->db->select('*');
	  		$this->db->where('vendor_name', $name);
	  		$this->db->from('vendor');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	public function insert($data)
  	{
  	return $this->db->insert('vendor',$data);           
  	}

  public function get_vendor()
	{
		$query=$this->db->get('vendor');
		return $query;
	}

	public function insert_inv($data,$form_data)
	{


		$query=$this->db->insert('loan_cylinder',$data);
		$inv_id=$this->db->insert_id();

		for($i=0;$i<count($form_data['item_id']);$i++){

			 $det="INSERT INTO loan_cylinder_detail SET
				`invoice_id`=".$inv_id.",
				`item_id`='".$form_data['item_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."'
				"; 

				$query=$this->db->query($det);
		}
		return $query;
	}

	public function get_invoice()
	{
		$query="SELECT loan_cylinder.*,vendor.vendor_name FROM loan_cylinder LEFT JOIN vendor ON loan_cylinder.vendor_id = vendor.id";
		return $query=$this->db->query($query);
	}	

	 }

	 
	 ?>
