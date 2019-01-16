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
      Payment
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sale Payment Page</li>
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

           <?php extract($query) ?>
          </div>
          <div  class="box-body">
            <form action="<?php echo base_url('customer/update_payment/'.$id.'') ?>" id="form" method="post">
            <div class="row">
               <div class="col-xs-8 col-xs-offset-4">

             <button type="submit" class="btn btn-primary" id="submit"><i class="fa fa-save"></i></button>
              <span class="btn btn-default"><i class="fa fa-print"></i></span>
              <span class="btn btn-info"><i class="fa fa-file"></i></span>
              <span class="btn btn-danger"><i class="fa fa-trash"></i></span>
              <span class="btn btn-primary"><i class="fa fa-file-o"></i></span>
              <span class="btn btn-warning"><i class="fa fa-send"></i></span>
            </div>
             
            </div>
            <div class="row" style="margin-top: 10px;">
              <div class="col-xs-2" style="margin-left: 4px;">
            
            <label for="">Select Customer</label>
            <select name="customer" id="customer" class="form-control" required="">
              <option value=""  selected="">Select Customer</option>
               <?php foreach($customer->result() as $row)
                  {?>

                    <option value="<?php echo $row->id ?>" <?php if($row->id==$customer_id){?> selected="selected" <?php  } ?>><?php echo $row->name; ?></option>
                  <?php } ?>
            </select>
            
        </div>
         
         <div id="shop">
           
         </div>
   

         <div class="col-xs-1 invoice-col">
          <label for="">Invoice #</label>
          <input type="text" readonly="" name="invno" class="form-control" value="<?php echo $invoice_no ?>">
          <br>
         
        </div>
        <div class="col-xs-2 pull-right" style="margin-right: 5px;">
          
         <div class="form-group">
                <label>Date:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right input-sm" value="<?php echo $invoice_no ?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
        </div>
            </div>
            
           
             <div class="row invoice-info" style="margin-top: 20px;"> 
             <div class="col-xs-8 table-responsive"> 
        <table class="table table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Payment</th>
              <th>Previous Balance</th>
              <th>Remaining Balance</th>
            </tr>
          </thead>
          <tbody id="inv_detail">
            <tr>
              <th><b class="no">1</b></th>

              <td ><input type="text" name="amount" class="form-control price" pattern="^[1-9][0-9]*$" id="price" value="<?php echo $amount ?>" required=""></td>
              <td id="prev"><input type="text" readonly="" class="form-control" placeholder="please first select customer"></td>
              <td ><input type="text"  class="form-control new_bln" value=""></td>
              <td>  <textarea name="description" class="form-control" id="" cols="30" rows="4"><?php echo $description ?></textarea></td>
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
       
          </form>
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
   
  </script>
  <script>
    $(function(){
         $('#customer').on("change",function(){
                 var customer_name=$('#customer').val();
                 if(customer_name !='')
                 {
                     $.ajax({
                           url:"<?php echo base_url('customer/fetch_customer'); ?>",
                           method:"POST",
                           data:{customer_name:customer_name},
                           success:function(data)
                           {
                             $('#shop').html(data);
                           }  
                     });
                 }
         });  
    });
        function customer()
        {
                 var customer_name=$('#customer').val();
                 if(customer_name !='')
                 {
                     $.ajax({
                           url:"<?php echo base_url('customer/fetch_customer_prev'); ?>",
                           method:"POST",
                           data:{customer_name:customer_name},
                           success:function(data)
                           {
                             $('#prev').html(data);
                           }  
                     });
                 }
        }
        $("#customer").on("change",customer);
        customer();
       

    $('#inv_detail').delegate('.price','keyup',function(){
        var tr=$(this).parent().parent();
        var price=tr.find('.price').val()-0;
        var prev_balance=tr.find('.prev_bln').val()-0;
        var amt=prev_balance-price;
        tr.find('.new_bln').val(amt);
      }); 
    
  </script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  });
   $('#datepicker').datepicker({
      autoclose: true
    })
</script>

</body>
</html>