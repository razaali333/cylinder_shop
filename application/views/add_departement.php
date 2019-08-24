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
					
				<div class="row-fluid">

					<div class="span6" style="margin-left: 20%;">
						
						<div class="widget-box">
							<div class="widget-header">
								<h4>Departement Add Informations</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<form name="form" action="" method="post">
										<fieldset>
                                                     	<div class="span4" style="margin-left: 280px;">
														<label><strong>Sub Departement Name</strong></label>
														<input type="text" class="span12" id="sub_departement" placeholder="Departement Name" name="sub_departement"  />
                                                        </div>

                                                        <div class="span4" style="margin-left: 280px;margin-top: 10px;">
														<label><strong>Departement Name</strong></label>
														<select class="chzn-select" name="departement" id="departement" style="width: 250px;">
															<option value="">Select Departement</option>
															<option value="Laboratory">Laboratory</option>
															<option value="ECG">ECG</option>
															<option value="Ward">Ward</option>
															<option value="OT">OT</option>
															<option value="L-Room">Labour Room</option>
															<option value="Ultrasound">Ultrasound</option>
															<option value="Dental">Dental</option>
															<option value="CT Scan">CT Scan</option>
															<option value="Medical Certificate">Medical Certificate</option>
														</select>
                                                        </div>
                                                        
                                                        
                                                        <div class="span4" style="margin-left: 280px;margin-top: 10px;">
														<label><strong>Price</strong></label>
														<input type="text" class="span12" id="price" placeholder="Enter Price" name="price"  />
                                                        </div>
                                                       </fieldset>
														
														<div class="form-actions center">
														<input type="button" name="save" id="save" value="Save" class="btn btn-small btn-success btn-block" style="width:10%; border-radius:5px;" />
                                                        <input type="button" name="new" id="new" value="New" class="btn btn-small btn-danger btn-block" style="width:10%; border-radius:6px;margin-bottom: 2px;" />
															
														
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
								<h4>All Departement's</h4>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									
									<table id="sample-table-2" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
											<th>S No</th>
											<th>Name</th>
											<th>Departement</th>
											<th>Price</th>
											<th>Edit</th>
											<th>Delete</th>
											</tr>
										</thead>
								
										<tbody>
											<?php 
												$count=0;
											foreach($query->result() as $row){
													$count++;
												?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo $row->name ?></td>
												<td><?php echo $row->departement ?></td>
												<td><?php echo $row->price ?></td>
												<td><i class="icon-edit" data-id="<?php echo $row->id ?>" id="dep_edit" style="color: darkgreen;font-size: 15px;cursor: pointer;font-weight: bold;"></i></td>
												<td><i class="icon-trash" data-id="<?php echo $row->id ?>" id="dep_del" style="color: red;font-size: 15px;cursor: pointer;font-weight: bold;"></i></td>
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

$(document).on('click','#dep_del',function(){
	var conf=confirm('Are You Sure You Want To Delete');
	if(conf==true)
	{
		// alert('ok')
		var id=$(this).attr('data-id');
		$.ajax({
			url:'<?php echo base_url('departement/delete_departement') ?>',
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

$('#new').on('click',function(){
	$('#category,#price').val('');
	$('#save').val('Save');
})

$(document).on('dblclick','#dep_edit',function(){
	$('#save').val('Update');
	var id=$(this).attr('data-id');
	$.ajax({
		url:'<?php echo base_url('departement/fetch_departement_by_id') ?>',
		method:'POST',
		data:{id:id},
		dataType:'json',
		success:function(data)
		{
			$.each(data,function(item,value)
			{
				$('#category').val(value.name);
				$('#price').val(value.price);
			})
		}
	})
})

	$('#save').on('click',function(){
		var btn=$(this).val();
		var sub_departement=$('#sub_departement').val();
		var departement=$('#departement').val();
		var price=$('#price').val();
		var id=$(this).attr('data-id');
		if(btn=="Save")
		{
		$.ajax({
		url:'<?php echo base_url() ?>departement/add_departement',
		method:'POST',
		data:{sub_departement:sub_departement,departement:departement,price:price},
		success:function(data)
		{
			alert('Record Added');
			// $('#category,#price').val('');
			location.reload();
		}
	})	
		}
		else{
			$.ajax({
		url:'<?php echo base_url() ?>departement/edit_departement',
		method:'POST',
		data:{category:category,price:price,id:id},
		success:function(data)
		{
			alert('Record Updated');
			// $('#category,#price').val('');
			// $('#save').val('Save');
			location.reload();
		}
	})	
		}
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
  						 "iDisplayLength": 10,
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
