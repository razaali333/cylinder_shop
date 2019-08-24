

		<!--basic styles-->
		<?php include('include/head.php') ?>	
		<!--page specific plugin styles-->

		<!--fonts-->
		<style>
    @media print

		{
			
		#noprint {
		  display:none;

		}
		#sample-table-2{
			margin-right: 100px;
		}

		table{
			position: absolute;
			right: -100px;
		}
		#head{
			padding-left: 60px;
			font-size: 20px;
		}
		}
		</style>
		<!--ace styles-->
	<body>
		<div id="noprint">
			<?php include('include/header.php'); ?>
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div id="noprint">
				<?php include('include/sidebar.php'); ?>
			</div>

			<div class="main-content">
				
<div class="page-content">

					<div class="row-fluid">
								

								<div class="span12" id="noprint">
                                <div class="widget-box">
                                
										<div class="widget-header">
											<h4 style="margin-left:20px;">Search Records</h4>
										</div>
    
                                        <div class="widget-body">
										<div class="widget-main no-padding">
										<form name="form" action="<?php echo base_url('report/monthly_report') ?>" method="POST">
													<!--<legend>Form</legend>-->
													
											<fieldset>
                                               <div class="control-group span2" style="margin-left:0px;">
                                                <label for="id-date-range-picker-1"  style="margin-bottom:0px;">From Date</label>
												<div class="row-fluid input-prepend">
												<input class="span11 date-picker" id="id-date-picker-1" name="from" type="text" data-date-format="yyyy-mm-dd" />
												<span class="add-on">
													<i class="icon-calendar"></i>
													</span>
														</div>
											</div>
                                             

                                             <div class="control-group span2">
                                                <label for="id-date-range-picker-1"  style="margin-bottom:0px;">To Date</label>
												<div class="row-fluid input-prepend">
												<input class="span11 date-picker" id="id-date-picker-1" name="to" type="text" data-date-format="yyyy-mm-dd" />
												<span class="add-on">
													<i class="icon-calendar"></i>
													</span>
														</div>
											</div>
											<div class="span2">
                                                         
														 <label><strong>OPD</strong></label>
														
														 <select class="chzn-select" id="user_id"  name="opd_type" style="width:20%;">								<option></option>		
															 <option value="fm_opd">First Male OPD</option>
															 <option value="sm_opd">Second Male OPD</option>
															 <option value="ff_opd">First Female OPD</option>
															 <option value="sf_opd">Second Female OPD</option>
															 <option value="staff_opd">Staff OPD</option>
															 <option value="age_opd">Aged OPD</option>
														 </select>
 
														 </div>    
														</fieldset>
												
													<div class="form-actions center">
														<button type="submit" name="search" id="" class="btn btn-small btn-success" > 
                                                        Submit
                                                        <i class="icon-ok bigger-110"></i>
                                                        </button>
														
													</div>
												</form>
											</div>
										</div>
									</div>
                                 </div>
                             </div>
                    
                   
                    
                            <div class="row-fluid">
                                
                                <div class="span12">
                                <div class="table-header" id="head">
									<span id="title">ALL OPD TODAY</span> 
                                   <a href="javascript:window.print()" class="btn btn-success pull-right"  id="noprint"><i class="fa fa-print" id="noprint"></i>Pirnt</a>
                                </div>
                                
								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
                                        <th width="5%" class="center">S.No</th>
                                        <th width="10%" class="center">Total Recept</th>
										<th width="10%" class="center">Date</th>
										<th width="20%" class="center">OPD Type</th>
										<th width="20%" class="center">Total Price</th>
											
										</tr>
									</thead>
									<tbody id="show_record">
										<?php 
										if(isset($search))
										{


										if($query->num_rows()>0)
										{
										$sum=0;	
										$count=0;	
										foreach($query->result() as $row){
										 $sum += $row->price;	
										$count++;	
										 ?>
										<tr>
											<td class="center"><?php echo $count; ?></td>
											 <td class="center"><?php echo $row->no ?></td>
											 <td class="center"><?php echo $row->c_date ?></td>
											 <td class="center"><?php
											 		if($row->type=="fm_opd")
												{
													echo "First Male OPD";
												}
												elseif($row->type=="sm_opd")
												{
													echo "Second Male OPD";
												}
												elseif($row->type=="ff_opd")
												{
													echo "First Female OPD";
												}
												elseif ($row->type=="sf_opd") {
													echo "Second Female OPD";
												}
												elseif ($row->type=="staff_opd") {
													echo "Staff OPD";
												}
												elseif ($row->type=="age_opd") {
													echo "Aged Person OPD";
												}
												elseif ($row->type=="gyne_opd") {
													echo "Gyne OPD";
												}
												

											 ?></td>


											 <td class="center"><?php echo $row->price ?></td>
										</tr>
									<?php

									 }
									}
										else
									{?>

										<tr>
											<td colspan="13"  style="text-align: center;color: red">NO RECORD FOUND</td>
										</tr>

									<?php }	

									 ?>
								<tr>
						            <td class="center" colspan="4"></td>
						                                           
						            
						            <td class="center" style="font-size:18px; color:#F00;">
						            	<?php echo $sum; ?>
						            </td>
						        </tr>
								<?php }?>

									
							</tbody>
						</table>
					</div>
				</div>
			</div>
										<!--/.page-content-->

				<!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->
		<?php include('include/foot.php') ?>

	
        <script type="text/javascript">
		$('[data-rel=tooltip]').tooltip();
		$(".chzn-select").chosen();
		
			$(function() {
				$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			})
			
	
		
		
		
			
		</script>
		<!--inline scripts related to this page-->
	</body>
</html>
