
<!DOCTYPE html>

<html lang="en">
	
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Print</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/css/print.css') ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/css/style.css') ?>"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <link href='http://fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>



<style type="text/css">

	center table{ border-collapse:collapse;}

	center table th{ padding:5px;border-bottom:1px solid #000;}

	center table td{ border:1px solid #CCC;}

  
    
   

</style>

</head>

<body>
<?php 

// set_default_zone('Asia/Karachi');
// $sql1 		= 	"SELECT * FROM `fm_opd` WHERE `receptNumber`='".$_SESSION['receptNumber']."'"; 
// $res1		=	$dbh->query($sql1); 
// $row1  		= 	$res1->fetch(PDO::FETCH_ASSOC);
$row=$query->row_array();
?>
<div id="container" style="width:750px;" id="layer">
<form name="form" method="post" action="" id="form">
    <header style="height:auto; width:750px;">
	 
        <div class="row">
      
        <div class="col-sm-12" >
          <h1 style=" font-weight: bold; font-size: 38px; word-spacing: 20px; letter-spacing: 2px; text-align: center;">
            DHQ HOSPITAL DIR LOWER
          </h1><br>
          <h3 style="font-weight: bold; font-size: 24px; word-spacing: 20px; letter-spacing: 2px; text-align: center; padding-top: 10px;">OUT PATIENT DEPARTMENT</h3>

        </div>
        
      
      
  </div>
     	
              <table width="100%" border="0" cellpadding="5" cellspacing="0" style="border-bottom:2px solid #666; border:3px solid #000; margin-top:5px;margin-bottom:10px;">

        <thead>

            <tr height="20">
                
                <th align="left"; width="22%" style="font-family: monospace; font-size:18px; background-color: #FFFFFF;">Patient Name : </th>
                <th align="left"; width="45%" style="text-decoration:underline;font-family: monospace; font-size:20px; background-color: #FFFFFF;"><input type="text" value=" <?php echo $row['patient_name'] ?>" name="patientName" style="text-decoration:underline;;font-family: monospace; font-size:20px; background-color: #FFFFFF; text-transform:uppercase; font-weight:800; border:none; outline:none;  width:100%"></th>
                
                <th align="left"; width="15%" style="font-family: monospace; font-size:16px; background-color: #FFFFFF;">Gender   &nbsp;: </th>
                <th align="left"; width="18%" style="text-decoration:underline;font-family: monospace; font-size:16px; background-color: #FFFFFF;"><?php echo $row['gander'] ?></th>
                </tr>
                <tr height="20">
                <th align="left"; width="20%" style="font-family: monospace; font-size:18px; background-color: #FFFFFF;">Address &nbsp; &nbsp; &nbsp;: </th>

                <th align="left"; width="45%" style="text-decoration:underline;font-family: monospace; font-size:16px; background-color: #FFFFFF;"> <?php echo $row['address'] ?></th>
                
                <th align="left"; width="15%" style="font-family: monospace; font-size:16px; background-color: #FFFFFF;">OPD No &nbsp;: </th>
                <th align="left"; width="20%" style="text-decoration:underline; font-family: monospace; font-size:16px; background-color: #FFFFFF;">SF-<?php echo $row['receptNumber'] ?>	</th>
                </tr>
                <tr height="20">
                
                
             <th align="left"; width="20%" style="font-size:18px;font-family: monospace; background-color: #FFFFFF;">Date/Time &nbsp;&nbsp; : </th>
                <th align="left"; width="45%" style="text-decoration:underline;font-family: monospace; font-size:16px; background-color: #FFFFFF;">  <?php echo date("j M, Y / g:i A",time()+14400);  ?></th>   

        <th align="left"; width="15%" style="font-family: monospace; font-size:16px; background-color: #FFFFFF;">Age  &nbsp; &nbsp; : </th>
                <th align="left"; width="20%" style="text-decoration:underline; font-family: monospace; font-size:16px; background-color: #FFFFFF;"><?php echo $row['age'] ?></th>
        
        

                
            </tr>
            
            
        </thead>
        

        

      

      

      </table>

  </header>
<form name="form" method="post" action="" id="myform">
    <center style="width:750px;">

      <textarea style="width: 30%; float: left; border:3px solid black;" rows="50"></textarea>
      <textarea style="width: 68%; float: left; border:3px solid black;" rows="50"></textarea>




  </center>
<style>
a div:hover { 
    background-color: yellow;
}
</style>
   

</form>
<script>
	 window.print();
	 window.close();

</script>