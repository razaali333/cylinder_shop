
	<?php 
	class Mdl_departement extends CI_Model
	{
		public function insert_departement($data)
		{
			 $query=$this->db->insert('sub_departement',$data);
  			 return $query;

		}

		public function get_departement()
		{
			$query=$this->db->get('sub_departement');
			return $query;
		}	

		public function fetch_departement_by_id($id)
		{
			$exe="SELECT * FROM departement WHERE id='$id'";
			$query=$this->db->query($exe);
			 $row=$query->result(); 
      			echo json_encode($row);
			return $query;
		}	

		public function edit_departement($category,$price,$id)
		{
			$exe="UPDATE departement SET name='$category',price='$price' WHERE id='$id'";
			$query=$this->db->query($exe);
			
			return $query;
		}

		public function delete_departement($id)
		{
			$exe="DELETE FROM departement WHERE id='$id'";
			$query=$this->db->query($exe);
			
			return $query;
		}
	}

	?>