
<?php 
	class Mdl_report extends CI_Model
  {
  	public function get_date_filter_record($search,$from,$to,$type,$recept,$p_name,$address,$gendar,$shift)
  	{
  		// echo $from.$type;exit();
  		$sql="";
  		if(isset($search))
  		{
  			if($from!='' AND $type!='' AND $to !=''AND $recept !='' AND $p_name!='' AND $gendar!='' AND $address!='' AND $shift!='')
  			{
  			$sql="type='$type' AND date>='$from' AND date<='$to' AND receptNumber='$recept' AND patient_name='$p_name' AND gander='$gendar' AND address='$address' AND shift='$shift'";	
  			}

        elseif($from!='' AND  $recept !='' AND $to == ''  AND  $type=='' AND $p_name=='' AND $gendar=='' AND $address=='' AND $shift!='')
        {
          $sql="date='$from' AND receptNumber='$recept' ";
        }


          elseif($from !='' AND $type !='' AND $to!='' AND $p_name=='' AND $recept=='' AND $gendar=='' AND $address=='' AND $shift=='')
        {
          $sql="type='$type' AND date>='$from' AND date<='$to'";
        }

  			elseif($from !='' AND $type !='' AND $to=='' AND $p_name=='' AND $recept=='' AND $gendar=='' AND $address=='' AND $shift=='')
        {
  				$sql="type='$type' AND date='$from'";
  			}
  			elseif($to!='' AND $type!='' AND $from=='' AND $p_name=='' AND $recept=='' AND $gendar=='' AND $address=='' AND $shift=='')
  			{
  				$sql="type='$type' AND date='$from'";	
  			}
  			elseif($to=='' AND $from=='' AND $type!='' AND $p_name=='' AND $recept=='' AND $gendar=='' AND $address=='' AND $shift=='')
  			{
  				$date=date('Y-m-d');
  			 $sql="type='$type' AND date='$date'";	
  			}
  			elseif($from!='' AND $to=='' AND $type=='' AND $p_name=='' AND $recept=='' AND  $gendar=='' AND $address=='' AND $shift=='')
  			{
  				$sql="type!='' AND date='$from'";
  			}
  			elseif($from=='' AND $to!='' AND $type=='' AND $p_name=='' AND $recept=='' AND $gendar=='' AND $address=='' AND $shift=='')
  			{
  				$sql="type!='' AND date='$to'";
  			}
        elseif($recept!='' AND $to=='' AND $type=='' AND $p_name=='' AND $from=='' AND $gendar=='' AND $address=='' AND $shift=='')
        {
            $sql="receptNumber='$recept'";
        }

        elseif($from!='' AND $gendar!='' AND $recept=='' AND $to=='' AND $type=='' AND $p_name=='' AND  $address=='' AND $shift=='')
        {
            $sql="date='$from' AND gander='$gendar'";
        }

          elseif($gendar!='' AND $from=='' AND $recept=='' AND $to=='' AND $type=='' AND $p_name=='' AND  $address=='' AND $shift=='')
        {
          $date=date('Y-m-d');
            $sql="date='$date' AND gander='$gendar'";
        }

         elseif($p_name!='' AND $from=='' AND $recept=='' AND $to=='' AND $type=='' AND $gendar=='' AND  $address=='' AND $shift=='')
        {
        
            $sql="patient_name='$p_name'";
        }
           elseif($from!='' AND $to!='' AND $shift!='' AND $recept=='' AND $type=='' AND $gendar=='' AND  $address=='' AND $p_name=='')
        {
        
            $sql="date>='$from' AND date<='$to' shift='$shift'";
        }
          elseif($from!='' AND $shift!='' AND $recept=='' AND $from=='' AND $type=='' AND $gendar=='' AND  $address=='' AND $p_name=='')
        {
        
            $sql="date='$from' AND shift='$shift'";
        }

          elseif($type!='' AND $shift!='' AND $from!='' AND $to!='' AND $recept=='' AND $gendar=='' AND  $address=='' AND $p_name=='')
        {
            
            $sql="date>='$from' AND date<='$to' AND type='$type' AND shift='$shift' ";
        }



            elseif($type!='' AND $shift!='' AND $from=='' AND $recept=='' AND $to=='' AND $gendar=='' AND  $address=='' AND $p_name=='')
        {
            $date=date('Y-m-d');
            $sql="date='$date' AND type='$type' AND shift='$shift' ";
        }
             elseif($shift!='' AND $type=='' AND $from=='' AND $recept=='' AND $to=='' AND $gendar=='' AND  $address=='' AND $p_name=='')
        {
            $date=date('Y-m-d');
            $sql="date='$date' AND shift='$shift' ";
        }

         elseif($shift!='' AND $gendar!='' AND $from!='' AND $recept=='' AND $to=='' AND $type=='' AND  $address=='' AND $p_name=='')
        {
            
            $sql="date='$from' AND shift='$shift' AND gander='$gander'";
        }

         elseif($shift!='' AND $gendar!='' AND $from=='' AND $recept=='' AND $to=='' AND $type=='' AND  $address=='' AND $p_name=='')
        {
           $date=date('Y-m-d');
            
            $sql="date='$date' AND shift='$shift' AND gander='$gendar'";
        }


         elseif($address!='' AND $gendar=='' AND $from=='' AND $recept=='' AND $to=='' AND $type=='' AND  $shift=='' AND $p_name=='')
        {
           $date=date('Y-m-d');
            
            $sql="date='$date' AND address='$address'";
        }


         elseif($address!='' AND $from!='' AND $to!='' AND $recept=='' AND $gendar=='' AND $type=='' AND  $shift=='' AND $p_name=='')
        {
            
            $sql="date>='$from' AND date<='$to' AND address='$address'";
        }
         elseif($address!='' AND $from!='' AND $to=='' AND $recept=='' AND $gendar=='' AND $type=='' AND  $shift=='' AND $p_name=='')
        {
            
            $sql="date='$from' AND  address='$address'";
        }



  			 $exe="SELECT * FROM `opd_entry` WHERE ".$sql;
         // echo $exe; exit();
  			 $query=$this->db->query($exe);
  			 return $query;
  		}

  		
  	}

  	public function get_daily_record($today)
  	{
  		 $exe="SELECT * FROM `opd_entry` WHERE date>='$today' AND date<'$today' + INTERVAL 1 DAY";
  		 $query=$this->db->query($exe);
  			 return $query;
  	}



  	public function filter_day_report($status)
  	{
  		if($status=="week")
  		{
  		$exe="SELECT * FROM `opd_entry` WHERE date between date_sub(now(),INTERVAL 1 WEEK) and now()";
  		 $query=$this->db->query($exe);	
  		}
  		else if($status=="month")
  		{
  		$exe="SELECT * FROM opd_entry WHERE MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE())";
  		
  		}

  		else if($status=="year")
  		{
  			$exe="SELECT  * FROM opd_entry WHERE YEAR(date) = YEAR(CURDATE())";
  		}

  		 $query=$this->db->query($exe);	
  		 $row=$query->result();
  		echo json_encode($row);
  		return $row;

  	}


    public function get_today_record($search,$date,$type,$recept,$gendar,$p_name)
    {
        $sql="";
      if(isset($search))
      {
        if($date!='' AND $type!='' AND $recept!='' AND $gendar!='' AND $p_name!='')
            {
            $sql="type='$type' AND date='$date' AND gander='$gendar' AND patient_name='$p_name'";

            }
         if($date!='' AND $type!='' AND $recept=='' AND $gendar=='' AND $p_name=='')
            {
            $sql="type='$type' AND date='$date'";

           }

          if($date!='' AND $gendar!='' AND $type=='' AND $recept==''  AND $p_name=='')
            {
            $sql="gander='$gendar' AND date='$date'";

            }
          if($date!='' AND $gendar!='' AND $type=='' AND $recept==''  AND $p_name=='')
            {
            $sql="gander='$gendar' AND date='$date'";

             }
             if($p_name!='' AND $gendar=='' AND $type=='' AND $recept==''  AND $date=='')
            {
            $sql="patient_name='$p_name'";

             } 

             if($recept!='' AND $gendar=='' AND $type=='' AND $p_name==''  AND $date=='')
            {
            $sql="receptNumber='$recept'";

             } 
         elseif($date=='' AND $type!='')
         {
          $today=date('Y-m-d');
            $sql="type='$type' AND date='$today'";

         }

          $exe="SELECT * FROM `opd_entry` WHERE ".$sql;
          echo $exe;exit();
         $query=$this->db->query($exe);
         return $query;
      } 

    }

    public function monthly_report($search,$from,$to,$type)
    {
        $sql="";
      if(isset($search))
      {
        if($from!='' AND $to!='' AND $type!='')
        {
            $sql="type='$type' AND date>='$from' AND date<='$to' GROUP BY date";

         }

          $exe="SELECT COUNT(receptNumber) AS no,SUM(price) AS price,date AS c_date,type FROM opd_entry WHERE ".$sql;
          // echo $exe;exit();
         $query=$this->db->query($exe);
         return $query;
    }
  }
}