<!DOCTYPE html>
<html>
<?php include('include/head.php'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include('include/header.php') ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include('include/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Daily Sale And Purchase Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Daily Sale And Purchase Report</li>
      </ol>
    </section>

   

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Daily Sale And Purchase Report.
            <small class="pull-right">Date: <?php echo date('Y:m:d')?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <form action="<?php echo base_url('reports/daily_sale_purchase_report'); ?>" method="post">
      	<div class="row invoice-info">
		 <div class="col-sm-3 invoice-col">
          
           <div class="form-group">
                <label>To:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="datepicker2" name="date" class="form-control pull-right">
                </div>
                <!-- /.input group -->
              </div>
         </div>

       
        <!-- /.col -->
        <div class="col-sm-2" style="margin-top: 24px;">
        	  <input type="submit" name="search" id="search" class="btn btn-primary" value="search"> 
        </div>
      
      </form>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped table-bordered">
            <thead >
            <tr>
              <th class="text-center">Serial #</th>
              <th class="text-center">Cylinder Name</th>
              <th class="text-center">Purchase Quantity</th>
              <th class="text-center">Sale Quantity</th>
              <th class="text-center">Remaining Quantity</th>
              
            </tr>
            </thead>
           
            <tbody class="inv_detail text-center">

            	<?php
            		if(isset($item))
            		{
            	 $count=0;
            			foreach($item->result() as $row){
            				$count++;
            	 ?>
            	 <?php 
                   $CI  = & get_instance();
                    $item_id=$row->p_id; 
                    if(!empty($row->product_name)){


                 ?>
				
				<tr>
					<td><?php echo $count; ?></td>
					<td><?php echo $row->product_name ?></td>
					<td id="p_qty"><?php echo $row->p_qty; ?></td>
					<td id="s_qty"><?php if($CI->fetch_pur_qty_by_item($item_id, $date)!=""){ echo $CI->fetch_pur_qty_by_item($item_id, $date); }else{ echo "0";} ?></td>	
					<td id="r_qty"><?php echo $row->p_qty - $CI->fetch_pur_qty_by_item($item_id, $date); ?></td>
				</tr>
			<?php }  }}?>
            	

				

            	 
            	</tbody>
	
	</table>
        </div>
        <!-- /.col -->
        <div class="col-sm-12">
          <div class="row">
          	<div class="col-sm-2  col-sm-pull-1 pull-right">
          		Total Remaining Quantity:&nbsp;&nbsp;<span id="r_total" style="font-weight: bold;color: blue"></span>
          	</div>
          	<div class="col-sm-2  col-sm-pull-1 pull-right">
          		Total Sale Quantity:&nbsp;&nbsp;<span id="s_total" style="font-weight: bold;color: blue"></span>
          	</div>
          	
          	<div class="col-sm-2  col-sm-pull-2 pull-right">
          		Total Purchase Quantity:&nbsp;&nbsp;<span id="p_total" style="font-weight: bold;color: blue"></span>
          	</div>
          </div>
          <hr>
          		
          		
          </div>

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
       
        <!-- /.col -->
        <div class="col-xs-6">
         

          <!-- <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div> -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default  pull-right"><i class="fa fa-print"></i> Print</a>
          
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php'); ?>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include 'include/foot.php'; ?>
<script>
	$(document).ready(function(){
		
		
		
	// //test();	
 p_total();	
 s_total();	
 r_total();	

  function p_total()
  {		
  	sum=0;
  	$('tr #p_qty').each(function(i){
  	 var tr=$(this).text();
  	  sum += Number(tr);
  	 console.log(sum);
  		// a=$('#p_qty').text()-0;
  		// min+=a
  		
  		
  });	
  	$('#p_total').text(sum);
  }

 function s_total()
  {		
  	sum=0;
  	$('tr #s_qty').each(function(i){
  	 var tr=$(this).text();
  	  sum += Number(tr);
  	// console.log(sum);
  		// a=$('#p_qty').text()-0;
  		// min+=a
  		
  		
  });	
  	$('#s_total').text(sum);
  }


});

	 function r_total()
  {		
  	sum=0;
  	$('tr #r_qty').each(function(i){
  	 var tr=$(this).text();
  	  sum += Number(tr);
  	 //console.log(sum);
  		// a=$('#p_qty').text()-0;
  		// min+=a
  		
  		
  });	
  	$('#r_total').text(sum);
  }


	 $(function () {
	 	
    //Initialize Select2 Elements
    $('.select2').select2()


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
       format: 'yyyy/mm/dd'
    })
    $('#datepicker2').datepicker({
      autoclose: true,
       format: 'yyyy/mm/dd'
    })
     
    
  });
</script>
</script>
</body>
</html>
