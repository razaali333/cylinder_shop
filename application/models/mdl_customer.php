
	<?php 
	class Mdl_customer extends CI_Model
	{
		//login function
  	public function insert($data)
  	{
  			 $query=$this->db->insert('customer',$data);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('name');
	  		$this->db->select('*');
	  		$this->db->where('name', $name);
	  		$this->db->from('customer');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	public function get_customer()
	{
		$run="SELECT customer.id,name,shop_name,mobile,region,region_name,opening_balance,opening_quantity FROM customer JOIN region ON region.id = customer.region";
		$exe=$this->db->query($run);
		return $exe;
	}

	public function get_invno()
	{
		$exe="SELECT * FROM sale_invoice ORDER BY invoice_no DESC LIMIT 1";
		return $query=$this->db->query($exe);
	} 

	public function fetch_customer($id)
	{
		$query="SELECT * FROM `customer` WHERE id='$id'";
		$query=$this->db->query($query);
    return $query->row_array();
	}	

	public function update_customer($data,$id)
	{
		$this->db->where('customer.id',$id);
		$query=$this->db->update('customer',$data);
		return $query;
	}
	 public function delete_customer($id)
    {
       	$query="DELETE FROM `customer` WHERE `customer`.`id` = '$id'";
       return $query=$this->db->query($query);
    }  


    public function insert_inv($data,$form_data)
    {
    	$query=$this->db->insert('sale_invoice',$data);
		$inv_id=$this->db->insert_id();

		for($i=0;$i<count($form_data['item_id']);$i++){

			 $det="INSERT INTO sale_invoice_detail SET
				`invoice_id`=".$inv_id.",
				`item_id`='".$form_data['item_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."',
				`price`='".$form_data['price'][$i]."',
				`item_total`='".$form_data['item_total'][$i]."'
				"; 

				$query=$this->db->query($det);
		}
		return $query;
    }

    public function get_invoice()
    {
    	$query="SELECT sale_invoice.*,customer.name,customer.mobile,customer.region,region.region_name FROM sale_invoice AS sale_invoice LEFT JOIN customer AS customer ON (sale_invoice.customer_id = customer.id) LEFT JOIN region AS region ON (customer.region = region.id)";
		return $query=$this->db->query($query);
    }

    public function delete_invoice($id)
    {
    	 $exe="DELETE st,sts FROM sale_invoice st JOIN sale_invoice_detail sts ON st.id=sts.invoice_id WHERE st.id=$id;";
    	 return $query=$this->db->query($exe);
    }

     public function update_inv($id,$inv_data,$form_data)
    {
    	 $exe="UPDATE  sale_invoice SET
				`invoice_no`='".$inv_data['invoice_no']."',
				`customer_id`='".$inv_data['customer_id']."',
				`date`='".$inv_data['date']."',
				`invoice_total`='".$inv_data['invoice_total']."'
				 WHERE id='$id'";

			$run=$this->db->query($exe);	
			
			if($run)
			{
				$del="DELETE FROM `sale_invoice_detail` WHERE invoice_id='$id'";
				$run=$this->db->query($del);
			}

		for($i=0;$i<count($form_data['item_id']);$i++){

			 $det="INSERT INTO  sale_invoice_detail SET
				`invoice_id`=".$id.",
				`item_id`='".$form_data['item_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."',
				`price`='".$form_data['price'][$i]."',
				`item_total`='".$form_data['item_total'][$i]."'"; 
				$query=$this->db->query($det);
					
		}
		return $query;
    }

    function fetchcustomer($customer_name)
    {
    	$query ="SELECT customer.*,region.region_name FROM customer LEFT JOIN region ON region.id = customer.region WHERE customer.id='$customer_name'";
    	$exe=$this->db->query($query);
            $row=$exe->row_array();
            $shopname=$row['shop_name'];
            $mobile=$row['mobile'];
            $region=$row['region_name'];
            $output='<div class="col-xs-2 invoice-col">
            		<label for="">Shop Name</label>	
         			<input type="text" readonly="" style="font-weight:bold" value="'.$shopname.'" class="form-control"></div>';

              $output.='<div class="col-xs-2 invoice-col">
            		<label for="">Mobile</label>	
         			<input type="text" readonly="" style="font-weight:bold" value="'.$mobile.'" class="form-control"></div>';

         	$output.='<div class="col-xs-2 invoice-col">
            		<label for="">Region</label>	
         			<input type="text" readonly="" style="font-weight:bold" value="'.$region.'" class="form-control"></div>';		

            return $output;
    }

    public function get_return_invno()
	{
		$exe="SELECT * FROM return_cylinder ORDER BY invoice_no DESC LIMIT 1";
		return $query=$this->db->query($exe);
	} 

	 public function insert_return_item($form_data)
    {

		for($i=0;$i<count($form_data['p_id']);$i++){

			 $det="INSERT INTO return_cylinder SET
				`invoice_no`=".$form_data['invoice_no'].",
				`customer_id`='".$form_data['customer_id']."',
				`p_id`='".$form_data['p_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."',
				`date`='".$form_data['date']."',
				`description`='".$form_data['description']."'
				"; 

				$query=$this->db->query($det);
		}
		return $query;
    }

	 }


	 ?>