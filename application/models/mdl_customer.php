
	<?php 
	class Mdl_customer extends CI_Model
	{
		//login function
  	public function insert($data)
  	{
  			return $this->db->insert('customer',$data);

                  
  }
  
  public function insert_open_qty($form_data)
  {
    
              
        for($i=0;$i<sizeof($form_data['item_id']);$i++)
        {
            


           $det="INSERT INTO opening_qty SET
                `customer_id`='".$form_data['customer_id']."',
                `item_id`='".$form_data['item_id'][$i]."',
                `qty`='".$form_data['qty'][$i]."'
                ";  
                $query=$this->db->query($det); 
            
        }
       
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
		$run="SELECT customer.id,name,shop_name,mobile,region,region_name,opening_balance FROM customer JOIN region ON region.id = customer.region";
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
		$query="SELECT customer.*,opening_qty.customer_id,opening_qty.qty,opening_qty.item_id FROM customer LEFT JOIN opening_qty ON(customer.id=opening_qty.customer_id) WHERE customer.id=$id";
		$query=$this->db->query($query);
    return $query->row_array();
	}	

	public function update_customer($data,$id)
	{
		$this->db->where('customer.id',$id);
		$query=$this->db->update('customer',$data);
	}

    public function update_customer_open_qty($form_data,$id)
    {
        $del="DELETE FROM opening_qty  WHERE customer_id=$id";
       $exe=$this->db->query($del);
       if($exe)
       {
         for($i=0;$i<sizeof($form_data['item_id']);$i++)
        {
            

           $det="INSERT INTO opening_qty SET
                `customer_id`='".$form_data['customer_id']."',
                `item_id`='".$form_data['item_id'][$i]."',
                `qty`='".$form_data['qty'][$i]."'
                ";  
                $query=$this->db->query($det); 
            

        }   

       }
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
                `customer_id`='".$form_data['customer_id']."',
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
                `invoice_total`='".$inv_data['invoice_total']."',
				`description`='".$inv_data['description']."'
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
                `customer_id`='".$form_data['customer_id']."',
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

     function fetchcustomer_prev($customer_name)
    {
    	$query ="SELECT customer.opening_balance AS open_balance,sum(return_payment.amount) AS ret_pay FROM customer AS customer LEFT JOIN return_payment ON(customer.id=return_payment.customer_id) WHERE customer.id='$customer_name'";
    	$exe=$this->db->query($query);
            $row=$exe->row_array();

        $query2="SELECT sum(sale_invoice.invoice_total) AS s_pay FROM customer AS customer LEFT JOIN sale_invoice ON(customer.id=sale_invoice.customer_id) WHERE customer.id='$customer_name'";
         $exe2=$this->db->query($query2);
            $row2=$exe2->row_array();   

           $inv_tot=$row2['s_pay']; 
               
            $opn_bln=$row['open_balance'];
            // $inv_tot=$row['inv_total'];
            $ret_pay=$row['ret_pay'];
           
           $total=(int)$opn_bln+(int)$inv_tot-(int)$ret_pay;
         	$output='<input type="text" readonly=""  style="font-weight:bold" value="'.$total.'" class="form-control prev_bln">';		
         		
            return $output;
    }

    // function ret_pay($customer_name)
    // {
    //     $query2="SELECT sum(sale_invoice.invoice_total) AS s_pay FROM customer AS customer LEFT JOIN sale_invoice ON(customer.id=sale_invoice.customer_id) WHERE customer.id='$customer_name'";
    //      $exe2=$this->db->query($query2);
    //         $row2=$exe2->row_array();   
    //        $inv_tot=$row2['s_pay']; 
    //      $output='<input type="text" readonly=""  style="font-weight:bold" value="'.$inv_tot.'" class="form-control sal_bln">';  
    //      return $output;
    // }


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

    public function fetch_return_cylinder()
    {
    	$exe="SELECT return_cylinder.*,customer.name,customer.mobile FROM return_cylinder AS return_cylinder LEFT JOIN customer AS customer ON (return_cylinder.customer_id = customer.id) LEFT JOIN product AS product ON (return_cylinder.p_id = product.id) GROUP BY return_cylinder.customer_id HAVING COUNT(return_cylinder.customer_id) >= 1";

    	$query=$this->db->query($exe);
    	return $query;
    }


     public function fetch_invoice($id)
    {
    	$query="SELECT return_cylinder.*,product.product_name FROM return_cylinder LEFT JOIN product ON (return_cylinder.p_id=product.id) WHERE return_cylinder.invoice_no=$id";

    	 $query=$this->db->query($query);
    	if($query)
    	{
    		return $query;
    	}
    	else{
    		 return $date=$query->row_array();	
    	}
    	
    }


    public function edit_return_cylinder($form_data,$id)
    {
    			$del="DELETE FROM return_cylinder WHERE invoice_no=$id";
    			$exe=$this->db->query($del);
    			if($exe)
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
			}
		return $query;
    }

    public function delete_return_cylinder_inv($id)
    {
    	$del="DELETE FROM `return_cylinder` WHERE invoice_no='$id'";
				$run=$this->db->query($del);
				return $run;
    }

    	public function insert_payment($form_data)
    	{
    		$query=$this->db->insert('return_payment',$form_data);
    		return $query;
    	}

    	public function get_payment_inv_no()
    	{
    	$exe="SELECT * FROM return_payment ORDER BY invoice_no DESC LIMIT 1";
		return $query=$this->db->query($exe);
    	}


    	public function fetch_ret_pay()
    	{
    		$exe="SELECT return_payment.*,customer.name,customer.mobile FROM return_payment AS return_payment LEFT JOIN customer AS customer ON (return_payment.customer_id = customer.id)";
    		return $query=$this->db->query($exe);
    	}

    	public function get_cust_returnpay($id)
    	{
    		$exe="SELECT * FROM return_payment WHERE id='$id'";
    		 $query=$this->db->query($exe);
    		return $run=$query->row_array();
    	}

    	public function update_payment($form_data,$id)
    	{
    	$this->db->where('return_payment.id',$id);
		$query=$this->db->update('return_payment',$form_data);
		return $query;	
    	}

    	public function delete_ret_payment($id)
    	{
    		 $this->db->where('id', $id);
		  $query= $this->db->delete('return_payment');
		  return $query; 
    	}

    	public function model($id)
    	{
    		$query ="SELECT return_cylinder.*,customer.name,customer.mobile,product.product_name FROM return_cylinder AS return_cylinder LEFT JOIN customer AS customer ON (return_cylinder.customer_id = customer.id) LEFT JOIN product AS product ON (return_cylinder.p_id = product.id) WHERE return_cylinder.invoice_no=$id";
    	$exe=$this->db->query($query);
    		$exe=$exe->result();
            // $row=$exe->row_array();
            // $name=$row['name'];
          //   	
            	echo json_encode($exe);
            return $exe;
    	}



        public function fetch_qty_by_customer($item_id,$customer_id)
        {
            $query="SELECT * FROM opening_qty WHERE customer_id='$customer_id' AND item_id='$item_id'";
            $query=$this->db->query($query);
            return $query;
        }
	 }


	 ?>