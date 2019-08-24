

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>DHQ TIMERGARA</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		
		<?php include('include/head.php') ?>

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body class="login-layout" style="background: url('<?php echo base_url('images/hos.jpg') ?>');">
		<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center">
									<h1>
										
										<span class="red">Welcome</span>
										<span class="white">To</span>
									</h1>
									<h4 class="orange">DHQ TIMERGARA</h4>
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
							<?php  if( $error = validation_errors()){ ?>
								<div class="alert alert-block alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $error ?>
								</div>
							<?php } ?>
							<?php if( $error =  $this->session->flashdata('error')){ ?>
								<div class="alert alert-block alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>
									<i class="icon-ok green"></i>
									 <?= $error ?>
								</div>
							<?php } ?>
								<div class="position-relative">
									<div id="login-box" style="background: #207884 !important;" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Please Enter Your Information
												</h4>

												<div class="space-6"></div>

												<form  name="form" method="post" action="<?php echo base_url() ?>login/login_user" >
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="text" id="name" autofocus="" name="username" class="span12" placeholder="Name" />
																<i class="icon-user"></i>
															</span>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<input type="password" name="password" class="span12" placeholder="Password" />
																<i class="icon-lock"></i>
															</span>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															

															<button type="submit" name="submit" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Login
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											
										</div><!--/widget-body-->
									</div><!--/login-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div><!--/.main-container-->

		<!--basic scripts-->

		<?php include('include/foot.php') ?>

		<script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}

		</script>
	</body>
</html>