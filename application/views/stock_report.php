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
        Daily Stock Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">Daily Return Payment Report</li>
      </ol>
    </section>

   

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Daily Return Cylinder Reports.
            <small class="pull-right">Date: <?php echo date('Y:m:d')?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <form action="<?php echo base_url('reports/stock_report'); ?>" method="post">
      	<div class="row invoice-info">
		 <div class="col-sm-3 invoice-col">
          
           <div class="form-group">
                <label>Select Cylinder Type:</label>
                 <select name="type" id="" class="form-control" required="">
                 	<option value="">Select Type Here</option>
                 	
                 	<option value="full_cylinder">Full cylinder </option>	
                 	<option value="empty_cylinder">Empty cylinder </option>
                 	
                 </select>
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
            <thead>
            <tr>
              <th>Serial #</th>
              <th>Cylinder Name</th>
              <th>Quantity</th>
              
            </tr>
            </thead>
            <?php  if(isset($type) && $type=="full_cylinder"){ ?>
            <tbody>
            	 <?php 
            	 if(isset($item))
            	 {
            	 $count=0;
            	 foreach($item->result() as $rows){
            	 		$count++;
            	  ?>

            	<tr>
           		<td><?php echo $count; ?></td>	
				<td><?php echo $rows->product_name ?></td>
				<?php 
                   $CI  = & get_instance();
                    $item_id=$rows->id;   
                 ?>
				
				<td id="item_qty"><?php echo $result = $CI->fetch_qty_by_item($item_id); ?></td>
				

            	</tr>

				<?php } } ?>

            	 
            	</tbody>
	<?php } else if(isset($type) && $type=="empty_cylinder"){ ?>
            	<tbody>
            	 <?php 
            	 if(isset($empty))
            	 {
            	 $count=0;
            	 foreach($empty->result() as $rows){
            	 		$count++;
            	  ?>

            	<tr>
           		<td><?php echo $count; ?></td>	
				<td><?php echo $rows->product_name ?></td>
				<?php 
                   $CI  = & get_instance();
                    $item_id=$rows->id;   
                 ?>
				
				<td id="item_qty"><?php echo $result = $CI->fetch_empty_qty_by_item($item_id); ?></td>
				

            	</tr>

				<?php }} ?>

            	 
            	</tbody>
            	<?php } else { ?> 

	<tbody>
            	 

            	<tr>
           		<td colspan="3">No Record Found</td>	
				

            	</tr>

            	 
            	</tbody>

            	<?php } ?>	
          </table>

        </div>
        <!-- /.col -->
        <div class="col-sm-12">
          <div class="row">
          	<div class="col-sm-2  col-sm-pull-2 pull-right">
          		Total Quantity:<span id="total" style="font-weight: bold;color: blue"></span>
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
		$('#search').on('click',function(){
			var type=$("#type").val();
		if(type="full_cylinder")
		{
			$t('tbody #empty_cylinder').hide();
		}
		if(type="empty_cylinder")
		{
			$('tbody #full_cylinder').hide();
		}
		});
		
		
	item_total();
		

  function item_total()
    {
      var gg=0;
      $('tr #item_qty').each(function(){
          var amt=$(this).text()-0;
          console.log(amt);
          gg +=amt;

       
      });
      $('#total').text(gg);   
  }



	});



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
     
    
  })
</script>
</script>
</body>
</html>
