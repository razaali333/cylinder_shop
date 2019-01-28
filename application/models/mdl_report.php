<?php 
	class Mdl_report extends CI_Model
	{

		public function ret_payment()
		{
			$date = date('Y/m/d');
			$exe="SELECT return_payment.*,customer.name,customer.shop_name,customer.mobile FROM return_payment LEFT JOIN customer ON (return_payment.customer_id=customer.id)  WHERE return_payment.date = '$date'";
			$query=$this->db->query($exe);
				return $query;
		}

		public function filter_payment($from_date,$to_date)
		{
			if(isset($from_date) && isset($to_date)){

				if(!empty($from_date) && empty($to_date))
				{
				$data = "return_payment.date = '$from_date'";	
				}
				elseif (empty($from_date) && !empty($to_date)) {
				$data = "return_payment.date = '$to_date'";	
				}
				elseif (!empty($from_date) && !empty($to_date)) {
				$data = "return_payment.date >= '$from_date' AND return_payment.date < '$to_date' + INTERVAL 1 DAY";	
				}
				else{
				$data = "return_payment.date =".date('Y/m/d');	
				}
			}
			  $exe="SELECT return_payment.*,customer.name,customer.shop_name,customer.mobile FROM return_payment LEFT JOIN customer ON (return_payment.customer_id=customer.id) WHERE ".$data;
			$query=$this->db->query($exe);
			return $query;
		}


		public function ret_cylinder_report($from_date,$to_date,$cylinder)
		{
			
			if(isset($from_date) && isset($to_date) && isset($cylinder)){

				
				if(!empty($from_date) && empty($to_date))
				{
				$data = " return_cylinder.p_id=$cylinder AND return_cylinder.date = '$from_date'";	
				}
				elseif(!empty($cylinder) && $cylinder="all")
				{
					$data = " return_cylinder.date ='".date('Y/m/d')."'";
				}
				elseif (empty($from_date) && !empty($to_date))
				{
				$data = " return_cylinder.p_id=$cylinder AND return_cylinder.date = '$to_date'";	
				}
				elseif (!empty($from_date) && !empty($to_date))
				 {
				$data = " return_cylinder.p_id=$cylinder AND return_cylinder.date >= '$from_date' AND return_cylinder.date < '$to_date' + INTERVAL 1 DAY";	
				}
				else{
				$data = "return_cylinder.date ='".date('Y/m/d')."'";	
				}
			}
			 $exe="SELECT return_cylinder.*,product.product_name,product.id,customer.name FROM return_cylinder LEFT JOIN product ON (return_cylinder.p_id=product.id) LEFT JOIN customer ON(return_cylinder.customer_id=customer.id) WHERE ".$data; 
			$query=$this->db->query($exe);
			return $query;	
		}

		public function daily_sale_report($from_date,$to_date,$customer)
		{
			if(isset($from_date) && isset($to_date) && isset($customer)){

				if(!empty($from_date) && empty($to_date))
				{
				$data = " sale_invoice.customer_id=$customer AND sale_invoice.date = '$from_date'";	
				}
				elseif (empty($from_date) && !empty($to_date)) {
				$data = " sale_invoice.customer_id=$customer AND sale_invoice.date >= '$from_date'";	
				}
				elseif (!empty($from_date) && !empty($to_date)) {
				$data = " sale_invoice.customer_id=$customer AND sale_invoice.date >= '$from_date' AND sale_invoice.date <= '$to_date'";	
				}
				else{
				$data = "sale_invoice.date =".date('Y/m/d');	
				}
			}
			 $exe="SELECT sale_invoice.*,sale_invoice_detail.invoice_id,sale_invoice_detail.customer_id,sale_invoice_detail.item_id,sale_invoice_detail.qty,sale_invoice_detail.price,sale_invoice_detail.item_total,customer.name,product.product_name FROM sale_invoice LEFT JOIN sale_invoice_detail ON (sale_invoice.id=sale_invoice_detail.invoice_id) LEFT JOIN customer ON (sale_invoice.customer_id=customer.id) LEFT JOIN product ON (sale_invoice_detail.item_id=product.id) WHERE ".$data;
			$query=$this->db->query($exe);
			return $query;	
		}

		public function fetch_stock_item_qty($item_id)
		{
			$exe="SELECT SUM(qty) AS p_qty FROM stock_inv_details WHERE item_id='$item_id'";
			$query=$this->db->query($exe);
			return $query;	
		}

		public function fetch_sale_item_qty($item_id)
		{
			$exe="SELECT SUM(qty) AS s_qty FROM sale_invoice_detail WHERE item_id='$item_id'";
			$run=$this->db->query($exe);
			return $run;	
		}

		public function fetch_retun_item_qty($item_id)
		{
			$exe="SELECT SUM(qty) AS r_qty FROM `return_cylinder` WHERE p_id='$item_id'";
			$r_qty=$this->db->query($exe);
			return $r_qty;	
		}

		public function fetch_open_item_qty($item_id)
		{
			$exe="SELECT SUM(qty) AS o_qty FROM opening_qty  WHERE item_id='$item_id'";
			$o_qty=$this->db->query($exe);
			return $o_qty;	
		}


		public function get_item_purchase($date)
		{
			 $exe="SELECT stock_invoice.*,stock_inv_details.inv_id,stock_inv_details.item_id,SUM(stock_inv_details.qty) AS p_qty,product.product_name,product.id As p_id FROM stock_invoice LEFT JOIN stock_inv_details ON (stock_invoice.inv_no=stock_inv_details.inv_id) LEFT JOIN product ON (stock_inv_details.item_id=product.id) WHERE stock_invoice.date='$date' GROUP BY stock_inv_details.item_id";
			$query=$this->db->query($exe);
			return $query;	
		}

		public function fetch_sal_qty_by_item($item_id, $date)
		{
			$exe="SELECT sale_invoice.*,SUM(sale_invoice_detail.qty) AS s_qty FROM sale_invoice LEFT JOIN sale_invoice_detail ON (sale_invoice.id=sale_invoice_detail.invoice_id) WHERE  sale_invoice.date='$date' AND sale_invoice_detail.item_id='$item_id'";

			$query=$this->db->query($exe);
			return $query;	
		}
	}