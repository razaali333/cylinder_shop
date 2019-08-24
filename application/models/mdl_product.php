
	<?php 
	class Mdl_product extends CI_Model
  {
		//login function
  	 public function insert_category($category)
  	 {
  			 $query=$this->db->insert('category',$category);
  			 return $query;
                  
     } public function insert_sub_category($data)
     {
         $query=$this->db->insert('sub_category',$data);
         return $query;
                  
     }

     public function get_category()
     {
     	$query=$this->db->get('category');
     	
      return $query;
     }

     public function fetch_cat_by_id($id)
     {
      $exe="SELECT * FROM category WHERE id='$id'";
      $query=$this->db->query($exe);
      $row=$query->result(); 
      echo json_encode($row);
      return $row;
     }

     public function delete_category($id)
     {
        $exe="DELETE FROM category WHERE id='$id'";
        $query=$this->db->query($exe);
        return $query;
     }
     public function edit_category()
     {

     }
     public function get_sub_category()
     {
      $exe="SELECT * FROM (SELECT * FROM sub_category) x LEFT JOIN (SELECT * FROM category)y ON x.cat_id=y.id";
        $query=$this->db->query($exe);
     
       return $query;
     }

     public function get_sub_cat_by_id($id)
     {
       $exe="SELECT * FROM sub_category WHERE cat_id='$id'";
         $query=$this->db->query($exe);
         $row=$query->result();
      echo json_encode($row);
       return $row;
      
     }

     public function add_test($data)
     {
        $query=$this->db->insert('test',$data);
         return $query;
     }

     public function get_all_test()
     {
      $exe="SELECT * FROM (SELECT * FROM test)x LEFT JOIN (SELECT * FROM category)y ON x.test_cat_id=y.id LEFT JOIN (SELECT * FROM sub_category)z ON x.test_sub_cat_id=z.id";
      $query=$this->db->query($exe);
      return $query;
     }

     public function delete_record_by_id($id)
     {
      $exe="DELETE FROM opd_entry WHERE id='$id'";
       $query=$this->db->query($exe);
        return $query;
     }

     public function get_invoice_print_by_id($id)
     {
       $exe="SELECT * FROM opd_entry WHERE id='$id'";
       // echo $exe;exit();
       $query=$this->db->query($exe);
       // echo $query;
    return $query;
     }

 }



	 ?>
