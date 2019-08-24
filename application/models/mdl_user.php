
	<?php 
	class Mdl_user extends CI_Model
	{
		//login function
  	public function login($name,$pass)
  	{
  			 $query=$this->db->where(['user_name'=>$name,'password'=>$pass])
                   ->get('user');
               if($query->num_rows())
               {
                return $data=$query->row();
                
               
                return $query;
                // return True;
               }    
               else{
                return false;
               }
  }
  

  public function get_opd_chart()
  {
    $query ="SELECT count(receptNumber) AS no,type FROM opd_entry WHERE type='fm_opd'";

//execute query
$result = $this->db->query($query);

//free memory associated with result

$data = array();
foreach ($result->result() as $row) {
  $data[] = $row;
}
// $result->close();
$query1 ="SELECT count(receptNumber) AS nom,type FROM opd_entry WHERE type='sm_opd'";

//execute query
$result1 = $this->db->query($query1);

foreach ($result1->result() as $row1) {
  $data[] = $row1;
}

$query2 ="SELECT count(receptNumber) AS nome,type FROM opd_entry WHERE type='ff_opd'";

//execute query
$result2 = $this->db->query($query2);

foreach ($result2->result() as $row2) {
  $data[] = $row2;
}
print json_encode($data);
  }

  public function first_male_opd_invoice()
  {
    // $type="fm_opd";
    $exe="SELECT * FROM `opd_entry` WHERE `id` !='' AND type='fm_opd'  ORDER BY `receptNumber` DESC LIMIT 1 ";
    // echo $exe;exit();
    $query=$this->db->query($exe);
  
    return $query;
  }

   public function second_male_opd_invoice()
  {
    $type="sm_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  } 

  public function first_female_opd_invoice()
  {
    $type="ff_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  }

    public function second_female_opd_invoice()
  {
    $type="sf_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  }
   public function staff_opd_invoice()
  {
    $type="staff_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  }

 public function aged_opd_invoice()
  {
    $type="age_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  }
   public function gyne_opd_invoice()
  {
    $type="gyne_opd";
    $exe="SELECT * FROM opd_entry WHERE type='$type' ORDER BY receptNumber DESC LIMIT 1";
    $query=$this->db->query($exe);
    return $query;
  }


  public function insert_fm_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }

  public function insert_sm_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }

    public function insert_ff_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }


   public function insert_sf_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }
    public function insert_st_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }
   public function insert_age_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }
     public function insert_gyne_opd($data)
  {
   $query=$this->db->insert('opd_entry',$data);
      return $query; 
  }


  public function get_opd_invoice_by_id($id)
  {
   $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='fm_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

    public function get_sm_opd_invoice_by_id($id)
  {
   $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='sm_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

  public function get_ff_opd_invoice_by_id($id)
  {
    $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='ff_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

   public function get_sf_opd_invoice_by_id($id)
  {
    $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='sf_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }
    public function get_st_opd_invoice_by_id($id)
  {
    $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='staff_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

public function get_age_opd_invoice_by_id($id)
  {
    $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='age_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

public function get_gyne_opd_invoice_by_id($id)
  {
    $exe="SELECT * FROM opd_entry WHERE receptNumber='$id' AND type='gyne_opd'";
    $query=$this->db->query($exe);
    return $query; 
  }

  // public function get_user()
  // {
  //  $query= $this->db->get('login');
  //  return $query;
  // }

  // public function fetch_user($id)
  // {
  //   $query="SELECT * FROM `login` WHERE id='$id'";
  //   $query=$this->db->query($query);
  //   return $query->row_array();
  // }

  // public function edit_user($id,$data)
  // {
  //   $this->db->where('login.id',$id);
  //   $query=$this->db->update('login',$data);
  //     return $query;
  //     }

  //   public function delete_user($id)
  //   {
  //      $this->db->where('login.id',$id);
  //     return  $query= $this->db->delete('login');
  //   }  

  //   public function get_cust()
  //   {
  //     $exe="SELECT COUNT(*) AS all_cust FROM customer";
  //     $run=$this->db->query($exe);
   
  //     return $run;
  //   }

  //   public function get_users()
  //   {
  //     $exe="SELECT COUNT(*) AS all_user FROM login";
  //     $run=$this->db->query($exe);
   
  //     return $run;
  //   }

  
	 }

	 ?>
