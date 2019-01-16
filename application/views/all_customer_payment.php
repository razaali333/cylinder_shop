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
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
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
                  <th>Amount</th>
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
                  <td><?php echo $row->amount ?> </td>
                  <td><?php echo $row->date ?></td>
                  <td>
                    <a href="<?php echo base_url('customer/edit_return_payment/'.$row->id.'') ?>"><span class="btn btn-primary"><i class="fa fa-edit"></i></span></a>
                    <a href="<?php echo base_url('customer/delete_payment/'.$row->id.'') ?>"><span class="btn btn-danger"><i class="fa fa-trash"></i></span></a>
                    <a href="#"><span class="btn btn-info"><i class="fa fa-eye"></i></span></a>
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
  <!-- Button trigger modal -->


<!-- Modal -->

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
