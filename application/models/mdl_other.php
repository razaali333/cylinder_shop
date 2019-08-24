
	<?php 
	class Mdl_other extends CI_Model
	{
		public function fetch_ecg()
		{
			 $exe="SELECT * FROM sub_departement WHERE departement='ECG'";
			 $query=$this->db->query($exe);
  			 return $query;

		}

		public function fetch_ecg_recept()
		{
			$exe="SELECT * FROM other_entry WHERE cat_name='ECG' ORDER BY receptNumber DESC LIMIT 1";
			 $query=$this->db->query($exe);
  			 return $query;

		}

	
	}

	?>