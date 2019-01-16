<?php  include('include/head.php') ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include('include/header.php') ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 <?php include('include/sidebar.php') ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Return Cylinder Record 
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">All Return Cylinder Record </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <?php if( $success = $this->session->flashdata('success')): ?> 
            <div class="row">
            <div class="col-lg-3 col-lg-offset-4 text-center">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">
                  <i>&times;</i>
                </button> 
            <?= $success ?>
            </div>
            </div>
            </div>
          <?php endif; ?> 

             <?php if( $error = $this->session->flashdata('error')): ?>
            <div class="row">
            <div class="col-lg-3 col-lg-offset-4 text-center">
            <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">
                  <i>&times;</i>
                </button> 
              <?= $error ?>
            </div>
            </div>
            </div>
            <?php endif; ?>
           <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Invoice No</th>
                  <th>Mobile</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php  foreach($query->result() as $row){ ?>
                <tr>
                  <td><?php echo $row->name ?></td>
                  <td><?php echo $row->invoice_no ?> </td>
                  <td><?php echo $row->mobile ?> </td>
                  <td><?php echo $row->date ?></td>
                  <td>
                    <a href="<?php echo base_url('customer/edit_return_cylinder/'.$row->invoice_no.'') ?>"><span class="btn btn-primary"><i class="fa fa-edit"></i></span></a>
                    <a href="<?php echo base_url('customer/delete_return_cylinder/'.$row->invoice_no.'') ?>"><span class="btn btn-danger"><i class="fa fa-trash"></i></span></a>
                    <button type="button" id="<?php echo $row->invoice_no ?>" class="btn btn-info view_data" ><i class="fa fa-eye" ></i></button>
                  </td>
                </tr>
                
                <?php } ?>
              </tbody>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-4 col-md-offset-4" id="name_dis">
	        	<div class="form-group">
	        		<label for="" class="control-label text-center">Customer Name</label>
	        		<input type="text" class="form-control" id="name" readonly="">
	        	</div>
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6" id="cyl_name">
	        	<!-- <div class="form-group">
	        		<label for="" class="control-label">Cylinder</label>
	        		<input type="text" class="form-control" id="p_name" value="" readonly="">
	        	</div> -->
        	</div>
        	<div class="col-md-6 ">
	        	<div class="form-group">
	        		<label for="" class="control-label">Quantity</label>
	        		<input type="text" class="form-control" readonly="">
	        	</div>
        	</div>
        	<div class="col-md-4 col-md-offset-4">
	        	<div class="form-group">
	        		<label for="" class="control-label text-center">Customer Name</label>
	        		<input type="text" class="form-control" readonly="">
	        	</div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
  <!-- /.content-wrapper -->
<?php include('include/footer.php') ?>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('include/foot.php') ?>
<script>
	$(document).ready(function(){
		$(document).on('click','.view_data',function(){
				var cus_id=$(this).attr("id");
				$.ajax({
					url:"<?php echo base_url() ?>customer/model",
					method:"POST",
					data:{cus_id:cus_id},
					dataType:"json",
					success:function(data)
					{
						
					<?php foreach($data->result() as $row){ ?>
							var pname=' <div class="form-group">'+
							'<label for="" class="control-label">Cylinder</label>'+
							'<input type="text" class="form-control" id="p_name" value="<?php echo $row->product_name ?>" readonly="">';	 
												 
							$("#cyl_name").html(pname);		 	
						<?php }?>

						$("#myModal").modal('show');	
					}
				});
		});
	});
</script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

   $('#example2').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
</script>

</body>
</html>
