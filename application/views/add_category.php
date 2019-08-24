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
					<?php  if( $error = validation_errors()){ ?>
								<div class="row-fluid">
									<div class="alert alert-block alert-danger span4">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									 <?= $error ?>
								</div>
								</div>
							<?php } ?>
							<?php if( $error =  $this->session->flashdata('error')){ ?>
								<div class="row-fluid">
									<div class="alert alert-block alert-dange span4r">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $error ?>
								</div>
								</div>
							<?php } ?>

						 <?php if( $success = $this->session->flashdata('success')): ?>
						 	<div class="row-fluid">
						 		<div class="alert alert-block alert-success span4">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $success ?>
							
						</div>
						 	</div>
						
						<?php endif; ?>	
				<div class="page-content">
					
				<div class="row-fluid">

					<div class="span6">
						
						<div class="widget-box">
							<div class="widget-header">
								<h4>Category Add Informations</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<form name="form" action="<?php echo base_url() ?>product/add_category" method="post">
										<fieldset>
                                                     
                                                        <div class="span4" style="margin-left: 280px;">
														<label><strong>Category Name</strong></label>
														<input type="text" class="span12" id="category" placeholder="Category Name" name="category"  />
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
								
							
								<div class="span6">
						<div class="widget-box">
							<div class="widget-header">
								<h4>All Category's</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<table id="sample-table-2" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
											<th>S No</th>
											<th>Name</th>
											<th>Edit</th>
											<th>Delete</th>
											</tr>
										</thead>
											<tbody >
												<?php 
													$count=0;
												foreach($category->result() as $row){ 
														$count++;
													?>
												<tr>
													<td><?php echo $count; ?></td>
													<td><?php echo $row->cat_name ?></td>
													<td><span id="cat_edit" data-id="<?php echo $row->id ?>" class="icon-edit green" style="cursor: pointer;"></span></td>
												<td><span id="cat_delete" class="icon-trash red" data-id="<?php echo $row->id ?>" style="cursor: pointer;"></span></td>
												</tr>
											<?php } ?>
											</tbody>
										
									</table>
											</div>
										</div>
									</div>
								</div>
							</div>
                            
                     <!--/.row-fluid-->
				
                
                <div class="row-fluid">
                	
								<div class="span6">
						<div class="widget-box">
							<div class="widget-header">
								<h4>Sub Category's Information</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<form name="form" action="<?php echo base_url() ?>product/add_sub_category" method="post">
										<fieldset>
                                                     
                                                        <div class="span4" style="margin-left: 280px;">
														<label><strong>Category</strong></label>
														<select name="category" id="" class="chzn-select" style="width: 250px;">
															<option value="">Select Category</option>
															<?php foreach($category->result_array() as $row){ ?>
															<option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
														<?php } ?>
														</select>
                                                        </div>
                                                        
                                                        <div class="span4" style="margin-left: 280px;margin-top: 10px;">
														<label><strong>Sub Category</strong></label>
														<input type="text" name="subcat" placeholder="Sub Category Name" class="span12">
                                                        </div>

                                                         <div class="span4" style="margin-left: 280px;margin-top: 10px;">
														<label><strong>price</strong></label>
														<input type="text" name="price" placeholder="Price" class="span12">
                                                        </div>
                                                       </fieldset>
														
														<div class="form-actions center">
														<input type="submit" name="save" id="save1" value="Save" class="btn btn-small btn-primary" style="width:7%; border-radius:5px;" />
                                                        
															
														
													</div>			
                                               </form> 
											</div>
										</div>
									</div>
								</div>

								<div class="span6">
						<div class="widget-box">
							<div class="widget-header">
								<h4>All Sub Category's</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<table id="sample-table-1" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>S No</th>
											<th>Sub Category Name</th>
											<th>Category Name</th>
											<th>Price</th>
											<th>Edit</th>
											<th>Delete</th>
											</tr>
										</thead>

										<tbody>
										<?php 
											$count=0;
										foreach($sub_category->result() as $row){
												$count++;
										 ?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row->sub_cat_name ?></td>
												<td><?php if($row->cat_name){ echo $row->cat_name;}else{echo "No Category";} ?> </td>
												<td><?php echo $row->price ?></td>
												<td><span id="edit" class="icon-edit green"></span></td>
												<td><span id="delete" class="icon-trash red"></span></td>
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

$(document).on('click','#cat_delete',function(){
	var conf=confirm('Are You Sure You Want To Delete');
	if(conf==true)
	{
		// alert('ok')
		var id=$(this).attr('data-id');
		$.ajax({
			url:'<?php echo base_url('product/delete_category') ?>',
			method:'POST',
			data:{id:id},
			success:function($data)
			{
				 location.reload(true);
			}
		})
	}
	else{
		alert('close')
	}
})
$(document).on('dblclick','#cat_edit',function(){
	$('#save').val('Update');
	var id=$(this).attr('data-id');
	$.ajax({
		url:'<?php echo base_url('product/fetch_cat_by_id') ?>',
		method:'POST',
		data:{id:id},
		dataType:'json',
		success:function(data)
		{
			$.each(data,function(item,value)
			{
				$('#category').val(value.cat_name);
			})
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

	
				var oTable1 = $('#sample-table-2').dataTable({
  						 "iDisplayLength": 3,
  						  "lengthMenu": [3, 6, 15, -1]
				});
				
				var oTable1 = $('#sample-table-1').dataTable({
  						 "iDisplayLength": 3,
  						  "lengthMenu": [3, 6, 15, -1]
				});

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
