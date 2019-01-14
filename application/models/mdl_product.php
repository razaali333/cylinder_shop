
	<?php 
	class Mdl_product extends CI_Model
	{
		//login function
  	public function insert($data)
  	{
  			 $query=$this->db->insert('product',$data);
  			 return $query;
                  
  }
  

  public function checkData()
	{
 		 $name = $this->input->post('name');
	  		$this->db->select('*');
	  		$this->db->where('product_name', $name);
	  		$this->db->from('product');
	  		$query = $this->db->get();
	 		 if($query->num_rows() >0){
	   		 return $query->result();
	  }
	 	 else{
	  		  return $query->result();
	   		 return false;
	  	}
	}

	public function get_item()
	{
		$query=$this->db->get('product');
		return $query;
	}

	public function edit_item($id,$data)
	{
		$this->db->where('product.id',$id);
		$query=$this->db->update('product',$data);
		return $query;
	}

	public function get_items_with_cat()
	{
		
		$sql="SELECT product.id,product_name,agency_id,agency_name FROM product JOIN agency ON agency.id = product.agency_id";
		$exe=$this->db->query($sql);
		
		return $exe;

		// $this->db->select('*')->from('product')->join('agency', 'agency.id = product.cat_id');
		// 	$exe=$this->db->get();
		// 	return $exe;

	}



	public function get_invno()
	{
		$query="SELECT * FROM stock_invoice ORDER BY inv_no  DESC LIMIT 1";
		$query=$this->db->query($query);

				return $query;
			

	}

	public function insert_inv($data,$form_data)
	{


		$query=$this->db->insert('stock_invoice',$data);
		$inv_id=$this->db->insert_id();

		for($i=0;$i<count($form_data['item_id']);$i++){

			 $det="INSERT INTO stock_inv_details SET
				`inv_id`=".$inv_id.",
				`item_id`='".$form_data['item_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."',
				`price`='".$form_data['price'][$i]."',
				`item_subtotal`='".$form_data['item_subtotal'][$i]."'
				"; 

				$query=$this->db->query($det);
		}
		return $query;
	}


	public function get_invoice()
	{
		$query="SELECT stock_invoice.*,agency.agency_name FROM stock_invoice LEFT JOIN agency ON agency.id = stock_invoice.agency_id";
		return $query=$this->db->query($query);
	}


	public function delete_product($id)
    {
       $this->db->where('product.id',$id);
      return  $query= $this->db->delete('product');
    }  

    public function fetch_product($id)
    {
    	$query="SELECT * FROM `product` WHERE id='$id'";
		$query=$this->db->query($query);
		return $query->row_array();
    }

    public function fetch_invoice($id)
    {
    	$query="SELECT stock_invoice.*,stock_inv_details.item_id,stock_inv_details.qty,stock_inv_details.price,stock_inv_details.item_subtotal, agency.agency_name,product.product_name FROM stock_invoice AS stock_invoice LEFT JOIN stock_inv_details AS stock_inv_details ON (stock_invoice.id = stock_inv_details.inv_id) LEFT JOIN agency AS agency ON (stock_invoice.agency_id = agency.id) LEFT JOIN product AS product ON (stock_inv_details.item_id=product.id) WHERE stock_invoice.id=$id";

    	 $query=$this->db->query($query);
    	if($query)
    	{
    		return $query;
    	}
    	else{
    		 return $date=$query->row_array();	
    	}
    	
    }



    public function fetch_sale_invoice($id)
    {

    $query="SELECT sale_invoice.*,sale_invoice_detail.item_id,sale_invoice_detail.qty,sale_invoice_detail.price,sale_invoice_detail.item_total, customer.name,customer.shop_name,customer.mobile,region.region_name, product.product_name FROM sale_invoice AS sale_invoice LEFT JOIN sale_invoice_detail AS sale_invoice_detail ON (sale_invoice.id = sale_invoice_detail.invoice_id) LEFT JOIN customer AS customer ON (sale_invoice.customer_id = customer.id) LEFT JOIN product AS product ON (sale_invoice_detail.item_id=product.id) LEFT JOIN region AS region ON (region.id=customer.region) WHERE sale_invoice.id='$id'";
    	 $query=$this->db->query($query);

    	if($query)
    	{
    		return $query;
    	}
    	
    }

    public function update_inv($id,$inv_data,$form_data)
    {
    	 $exe="UPDATE  stock_invoice SET
				`inv_no`='".$inv_data['inv_no']."',
				`agency_id`='".$inv_data['agency_id']."',
				`date`='".$inv_data['date']."',
				`inv_subtotal`='".$inv_data['inv_subtotal']."'
				 WHERE id='$id'";

			$run=$this->db->query($exe);	
			
			if($run)
			{
				$del="DELETE FROM `stock_inv_details` WHERE inv_id='$id'";
				$run=$this->db->query($del);
			}

		for($i=0;$i<count($form_data['item_id']);$i++){

			 $det="INSERT INTO  stock_inv_details SET
				`inv_id`=".$id.",
				`item_id`='".$form_data['item_id'][$i]."',
				`qty`='".$form_data['qty'][$i]."',
				`price`='".$form_data['price'][$i]."',
				`item_subtotal`='".$form_data['item_subtotal'][$i]."'"; 
				$query=$this->db->query($det);
					
		}
		return $query;
    }

    public function delete_invoice($id)
    {
    	 $exe="DELETE st,sts FROM stock_invoice st JOIN stock_inv_details sts ON st.id=sts.inv_id WHERE st.id=$id;";
    	 return $query=$this->db->query($exe);
    }

}

	 ?>
