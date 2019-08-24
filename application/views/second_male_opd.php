<?php 
include('include/head.php');
date_default_timezone_set('Asia/Karachi');
?>
		<body>
			
		<?php include('include/header.php') ?>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<?php include('include/sidebar.php'); ?>

			<div class="main-content">

				<div class="page-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-header">
								<h4>Second Male OPD Informations</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<form name="form" action="<?php echo base_url('login/insert_sm_opd') ?>" method="post">
										<fieldset>
                                                     <?php $invno=$sm_inv_no->row_array(); ?>
                                                        <div class="span1">
														<label><strong>Recept #</strong></label>
														<input type="text" class="span12" id="receptNumber" name="receptNumber" value="SM-<?php echo $invno['receptNumber']+1?>" readonly/>
                                                        </div>
                                                    <div class="span3">
														<label><strong>Date</strong></label>
														<input type="text" class="span12" id="testDate" name="testDate" value="<?php echo date('h:i A d-m-Y D'); ?>" readonly />
                                                        </div>
                                                       
														<div class="span2"> 
                                                        <label><strong> Shift</strong> &nbsp;&nbsp; </label>
                                                        	<select id="shift" name="shift" data-placeholder="Select Gander" >					
                                                        	<option value="morning" id="morning">Morning</option>
							 								<option value="evening" id="evening">Evening</option>
							 								<option value="night" id="night">Night</option>
														</select>
														</div>
                                                       </fieldset>
                                                       <fieldset style="margin-top: -20px;">
                                                       <div class="span4" style="margin-left: 0px;"> 
                                                        <label><strong>Patient Name</strong></label>
														<input type="text" class="span12" autofocus name="name" id="name" required placeholder="Patient Name" style="text-transform:uppercase;" />
														</div>
														<div class="span2"> 
                                                        <label><strong>Address</strong></label>
														<input type="text" class="span12" name="address" id="address" />
														</div>
                                                        
														<div class="span2"> 
                                                        <label><strong> Gander</strong> &nbsp;&nbsp; </label>
                                                        	<select class="chzn-select" id="gander" name="gander" data-placeholder="Select Gander" style="width:12%">					
                                                        	<option value="Male">Male</option>
							 								<option value="Female">Female</option>
														</select>
														</div>
														<div class="span1"> 
                                                        <label><strong> Age</strong> &nbsp;&nbsp; </label>
                                                        <input type="number" id="age" class="span12" name="age" />	
														</div>
														
														</fieldset>
														
														<div class="form-actions center">
														<input type="submit" name="save" id="save" value="Save" class="btn btn-small btn-success" style="width:7%; border-radius:5px;" />
                                                        
															
														
													</div>			
                                               </form> 
											</div>
										</div>
									</div>
								</div>
							</div>
                            
                     <!--/.row-fluid-->
				
                
                <div class="row-fluid"></div>
                </div><!--/.page-content-->

				<!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
		
		<!--basic scripts-->
		<?php include('include/foot.php') ?>
        
<script type="text/javascript">


$('[data-rel=tooltip]').tooltip();
$(".chzn-select").chosen();
$(function() {

	$('#save').on('click',function(e){
		e.preventDefault();
		var receptNumber=$('#receptNumber').val();
		var name=$('#name').val();
		var address=$('#address').val();
		var age=$('#age').val();
		var shift=$('#shift').val();
		var gander=$('#gander').val();
		$.ajax({
			url:'<?php echo base_url('login/insert_sm_opd') ?>',
			method:'POST',
			data:{receptNumber:receptNumber,name:name,address:address,age:age,shift:shift,gander:gander},
			success:function()
			{
				window.open('<?php echo base_url('login/sm_opd_print') ?>');
					location.reload();
			}
		})
	})
	$(document).ready(function(){
  $('#save').dblclick(function(e){
    e.preventDefault();
  });
  $('#saveandprint').dblclick(function(e){
    e.preventDefault();
  });

  
});

	
				var oTable1 = $('#sample-table-2').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null,
				  { "bSortable": false }
				] } );
				
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}



					var thehours = new Date().getHours();
			// alert(thehours);
			
			if (thehours > 8 && thehours <= 14) {
		
			$('#morning').attr('selected','selected');
		 

			} else if (thehours > 14 && thehours <= 20) {
			$('#evening').attr('selected','selected');

			} else if (thehours > 20 && thehours <= 24) {
			$('#night').attr('selected','selected');
			}
			else if (thehours > 24 && thehours <= 8) {
				$('#night').attr('selected','selected');
			}

			});


		
		

</script>
		<!--inline scripts related to this page-->
	</body>
</html>
