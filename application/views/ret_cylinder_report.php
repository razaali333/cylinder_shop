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
        Daily Return Payment Report
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
      <form action="<?php echo base_url('reports/return_cylinder_report'); ?>" method="post">
      	<div class="row invoice-info">
		 <div class="col-sm-3 invoice-col">
          
           <div class="form-group">
                <label>Select Cylinder:</label>
                 <select name="cylinder" id="" class="form-control" required="">
                 	<option value="all">All Cylinder</option>
                 	<?php foreach($item->result() as $row){ ?>
                 	<option value="<?php echo $row->id ?>"><?php echo $row->product_name ?></option>
                 	<?php } ?>
                 </select>
              </div>
         </div>

        <div class="col-sm-3 invoice-col">
          
           <div class="form-group">
                <label>From:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="datepicker" name="from_date" class="form-control pull-right">

                </div>
                <!-- /.input group -->
              </div>
         </div>
        <!-- /.col -->
        <div class="col-sm-3 invoice-col">
           <div class="form-group">
                <label>To:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="datepicker2" name="to_date" class="form-control pull-right">
                </div>
                <!-- /.input group -->
              </div>
           
        </div>
        <!-- /.col -->
        <div class="col-sm-2" style="margin-top: 24px;">
        	  <input type="submit" name="search" id="submit" class="btn btn-primary" value="search"> 
        </div>
      
      </form>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Serial #</th>
              <th>Customer Name</th>
              <th>Cylinder Name</th>
              <th>Date</th>
              <th>Quantity</th>
            </tr>
            </thead>
            	<tbody>

            		<?php
            			if(isset($query)){
            		 foreach($query->result() as $row){ ?>
            		<tr>
            			<td>1</td>
            			<td><?php echo $row->name ?></td>
            			<td><?php echo $row->product_name ?></td>
            			<td><?php echo $row->date ?></td>
            			<td id="amt"><?php echo $row->qty ?></td>
            		</tr>
            	<?php } }?>
            	</tbody>

          </table>
          <div class="col-xs-offset-10">
          	<label for="">Total</label>
          	<input type="text" readonly="" value="" id="total" class="form-control "><hr>
          </div>
        </div>
        <!-- /.col -->
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
	total();
		function total()
    {
      var gg=0;
      $('tr #amt').each(function(){
          var amt=$(this).text()-0;
          console.log(amt);
          gg +=amt;

       
      });
      $('#total').val(gg);   
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
