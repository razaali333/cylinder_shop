<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
<?php include('include/head.php'); ?>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

	 <!-- =============================================== -->
		<!-- Header here -->
		<?php include('include/header.php'); ?>
 		

  <!-- =============================================== -->		


  <!-- =============================================== -->
		<!-- sidebar here -->
		<?php include('include/sidebar.php'); ?>
 		

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Item page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Item page</li>
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

          <?php if( $error = validation_errors()): ?>
						<div class="row">
						<div class="col-lg-5 col-lg-offset-3 text-center">
						<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">
									<i>&times;</i>
								</button>	
						  <?= $error ?>
						</div>
						</div>
						</div>
						<?php endif; ?>

						 <?php if( $success = $this->session->flashdata('success')): ?>
						<div class="row">
						<div class="col-lg-5 col-lg-offset-3 text-center">
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
						<div class="col-lg-5 col-lg-offset-3 text-center">
						<div class="alert alert-dismissible alert-warning">
						<button type="button" class="close" data-dismiss="alert">
									<i>&times;</i>
								</button>	
						  <?= $error ?>
						</div>
						</div>
						</div>
						<?php endif; ?>
        </div>
        <div class="box-body">
          <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            	<?php extract($query) ?>
              <h3 class="box-title">Edit Item Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo base_url('product/edit_item_form/'.$id.'') ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Item Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="edit_product" value="<?php echo $product_name ?>">
                  </div>
                </div>
                 <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Agency</label>
                <div class="col-sm-10">
                  <select class="form-control select2" name="agency">
                    <?php foreach($agency->result() as $row){ ?>
                  <option value="<?php echo $row->id; ?>" <?php if($agency_id==$row->id) { ?> selected="selected" <?php } ?> > <?php echo $row->agency_name ?></option>
                    
              <?php } ?>
                </select>
                </div>
              </div>
               
      
              </div>
        <!-- /.box-body -->
		<div class="box-footer">
                <a href="<?php echo base_url() ?>product/index" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right col-sm-4">Edit Expense</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

      
      </div>
      <!-- /.box -->
     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('include/footer.php'); ?>

 <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
	<?php include('include/foot.php'); ?>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
     $('#example2').DataTable()
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
