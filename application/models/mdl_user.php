
	<?php 
	class Mdl_user extends CI_Model
	{
		//login function
  	public function login($name,$pass)
  	{
  			 $query=$this->db->where(['name'=>$name,'password'=>$pass])
                   ->get('login');
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
  
  public function get_user()
  {
   $query= $this->db->get('login');
   return $query;
  }

  public function fetch_user($id)
  {
    $query="SELECT * FROM `login` WHERE id='$id'";
    $query=$this->db->query($query);
    return $query->row_array();
  }

  public function edit_user($id,$data)
  {
    $this->db->where('login.id',$id);
    $query=$this->db->update('login',$data);
      return $query;
      }

    public function delete_user($id)
    {
       $this->db->where('login.id',$id);
      return  $query= $this->db->delete('login');
    }  
	 }

	 ?>
