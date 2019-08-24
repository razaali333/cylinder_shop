<?php 
include('include/head.php');
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
						<?php  if( $error = validation_errors()){ ?>
								<div class="alert alert-block alert-danger span4">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									 <?= $error ?>
								</div>
							<?php } ?>
							<?php if( $error =  $this->session->flashdata('error')){ ?>
								<div class="alert alert-block alert-dange span4r">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $error ?>
								</div>
							<?php } ?>

						 <?php if( $success = $this->session->flashdata('success')): ?>
						<div class="alert alert-block alert-success span4">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $success ?>
							
						</div>
						<?php endif; ?>	
				<div class="row-fluid">

					<div class="span12">
						
						<div class="widget-box">
							<div class="widget-header">
								<h4>User Add Informations</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<form name="form" action="<?php echo base_url() ?>user/register" method="post">
										<fieldset>
                                                     
                                                        <div class="span1">
														<label><strong>User Name</strong></label>
														<input type="text" class="span12" id="receptNumber" placeholder="User Name" name="username"  />
                                                        </div>
                                                    <div class="span3">
														<label><strong>Password</strong></label>
														<input type="text" class="span12" placeholder="Password" name="password"  />
                                                        </div>
                                                        
                                                        
														<div class="span2"> 
                                                        <label><strong> Type</strong> &nbsp;&nbsp; </label>
                                                        	<select class="chzn-select" name="type" data-placeholder="Select Type" style="width:12%">
                                                        	<option value="">Select Type</option>	
                                                        	<option value="Admin">Admin</option>				
                                                        	<option value="First Male OPD">First Male OPD</option>
							 								<option value="Second Male OPD">Second Male OPD</option>
							 								<option value="First Female OPD">First Female OPD</option>
							 								<option value="Second Female OPD">Second Female OPD</option>
							 								<option value="Staff OPD">Staff OPD</option>
							 								<option value="Aged OPD">Aged OPD</option>
							 								<option value="Gyne OPD">Gyne OPD</option>
														</select>
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
				
                
                <div class="row-fluid">
                	
								<div class="span12">
						<div class="widget-box">
							<div class="widget-header">
								<h4>All User's</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<table class="table table-bordered">
										<thead>
											<tr>
												<th>S No</th>
											<th>Name</th>
											<th>Type</th>
											<th>Edit</th>
											<th>Delete</th>
											</tr>
										</thead>

										<tbody>

											<?php 
											$count=0;
											foreach ($query->result() as $row) {
												$count++;
											?>
											<tr>
												<td><?php echo $count ?></td>
												<td><?php echo $row->user_name ?></td>
												<td><?php echo $row->type ?></td>
												<td>Edit</td>
												<td>Delete</td>
											</tr>
										<?php } ?>
										</tbody>
									</table>
											</div>
										</div>
									</div>
								</div>
                </div>
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
			});


		
		

</script>
		<!--inline scripts related to this page-->
	</body>
</html>
