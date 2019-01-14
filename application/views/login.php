<!DOCTYPE html>
<html>
<?php include('include/head.php'); ?>
<body class="login-page">
<div class="login-box" style="padding-top: 130px;
">
  <div class="login-logo">
    <a href="index2.html"><b>Gas Cylinder </b>Shop</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
	<?php if( $error = validation_errors()): ?>
						<div class="row">
						<div class="col-lg-12 text-center">
						<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">
									<i>&times;</i>
								</button>	
						  <?= $error ?>
						</div>
						</div>
						</div>
						<?php endif; ?>
<?php if( $error =  $this->session->flashdata('error')): ?>
						<div class="row">
						<div class="col-lg-12 text-center">
						<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">
									<i>&times;</i>
								</button>	
						  <?= $error ?>
						</div>
						</div>
						</div>
						<?php endif; ?>
						<?php unset($error) ?>

    <form action="<?php echo base_url() ?>login/login_user" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="User Name" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

 <!--    <a href="#">I forgot my password</a><br> -->
    <a href="<?php echo base_url() ?>login/register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php include('include/foot.php'); ?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>
