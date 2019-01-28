  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
<?php include('include/head.php'); ?>

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url() ?>css/css/css.css">
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
       Supplier Invoices
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- form start here -->

          
          </div>
          <div  class="box-body">
            <form action="<?php echo base_url() ?>vendor/insert_emp_cylinder_invoice" method="post">
            <div class="row">
               <div class="col-xs-8 col-xs-offset-4">

             <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
              <span class="btn btn-default"><i class="fa fa-print"></i></span>
              <span class="btn btn-info"><i class="fa fa-file"></i></span>
              <span class="btn btn-danger"><i class="fa fa-trash"></i></span>
              <span class="btn btn-primary"><i class="fa fa-file-o"></i></span>
              <span class="btn btn-warning"><i class="fa fa-send"></i></span>
            </div>
             
            </div>
            <div class="row">
              <div class="col-xs-2" style="margin-left: 4px;">
            
            <label for="">Select Vendor</label>
            <select name="vendor" id="" class="form-control">
              <option value="" disabled="" selected="">Select Vendor</option>
               <?php foreach($vendor->result() as $row)
                  {?>

                    <option value="<?php echo $row->id ?>"><?php echo $row->vendor_name; ?></option>
                  <?php } ?>
            </select>
            
        </div>
         <div class="col-xs-1 invoice-col">
          <label for="">Invoice #</label>
           <?php $invno=$invno->row_array(); ?> 
          <input type="text" readonly="" name="invno" class="form-control" value="<?php echo $invno['invoice_no']+1 ?>">
          <br>
         
        </div>
        <div class="col-xs-2 pull-right" style="margin-right: 5px;">
          
         <div class="form-group">
                <label>Date:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right input-sm" value="<?php echo date("Y/m/d"); ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        </div>
            </div>
             <div class="row invoice-info" style="margin-top: 20px;"> 
             <div class="col-xs-12 table-responsive"> 
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>P_Name</th>
              <th>Quantity</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="inv_detail">
            <tr>
              <th><b class="no">1</b></th>
              <td><select name="p_name[]" id="" class="form-control">
                  <option value="" disabled="" selected="">Select Item</option>
                  <?php foreach($query->result() as $row)
                  {  
                    ?>

                    <option value="<?php echo $row->id ?>"><?php echo $row->product_name; ?></option>
                  <?php } ?>
                </select></td>

              <td><input type="text" name="qty[]" class="form-control qty" placeholder="quantity"></td>
            </tr>

          </tbody>
          <tfoot>
              <tr>
                <td colspan="6"></td>
              </tr> 
             
                
                <!-- <td colspan="2"><input type="submit" class="btn btn-success btn-block" value="Insert"></td></tr> -->
              
          </tfoot>
        </table>
      </div>
       </div>

              <div class="box-footer">
          <!-- /.col -->
          <div class="row">
            <div class="col-sm-3 pull-right">
          <button type="button" class="btn btn-primary pull-right" id="click"><i class="fa fa-plus"></i></button>
          <p class="lead">Amount Due <?php echo date("D/M/Y") ?></p>

          <div class="table-responsive">

            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><input type="text" readonly="" name="total" value="" class="form-control input-sm total"></td>
              </tr>
             
            </table>
             </div> 
              </div>
              <div class="col-sm-3 col-sm-offset-5">
                <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="description...."></textarea>
              </div>  
            </form>
         
         
          </div>
        </div>
      <!-- Default box -->
    </section>
        </div>
        <!-- /.col -->
        </div>  
    
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 

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
  });
   $('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script>
      $(document).ready(function(){
      var n=1;

  
    $(document).on('click','#click',function(){
            add_new_row();

    });
    $(document).on('click', '#remove', function () {
         $(this).closest('tr').remove();
        //return false;
        // alert();
        n=n-1;
        total();
      });
      
    

     $('#inv_detail').delegate('.qty','keyup',function(){
        var tr=$(this).parent().parent();
        var qty=tr.find('.qty').val()-0;
        var amt=qty;
        total();
      }); 
    
     function total()
    {
      var gg=0;
      $('.qty').each(function(i,element){
          var qty=$(this).val()-0;
          gg +=qty;

      });
    $('.total').val(gg);

    }

    function add_new_row()
    {

      
       n=n+1;
      var row='<tr id="row_id_'+n+'">'+
              '<th><b class="no">'+n+'</b></th>'+
               '<td><select name="p_name[]" id="" class="form-control">'+
                  '<option value="" disabled="" selected="">Select Item</option>'+
                  '<?php foreach($query->result() as $row) {   ?>'+

                    '<option value="<?php echo $row->id?>"><?php echo $row->product_name; ?></option>'+
                  '<?php } ?>'+
                '</select></td>'+

              '<td><input type="text" name="qty[]" class="form-control qty" placeholder="quantity"></td>'+

              '<td><td><span class="btn btn-danger" type="button" id="remove"><i class="fa fa-remove"></></span></td></td>'+
              '</tr>';
              $('#inv_detail').append(row);
    }
});
  </script>
</body>
</html>
