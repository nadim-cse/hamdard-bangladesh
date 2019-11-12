<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php if(isset($TemplateTitle)): echo $TemplateTitle; else: echo "Hamdard Waqf "; endif;?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Hamdard</b>Waqf Bangladesh</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <!-- <form action="../../index2.html" method="post"> -->
      <?php echo form_open('admin-login-creds', array('class' => 'admin-login'));?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
          <div class="col-md-12">
          <?php if($this->session->flashdata('LoginError')){echo $this->session->flashdata('LoginError');} ?>
          </div>
      </div> 
      <div class="row">

        <!-- /.col -->
       
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          <!-- <a href="<?php echo site_url('Dashboard'); ?>" class="btn btn-primary btn-block btn-flat">Sign In</a> -->
        </div>
        <!-- /.col -->
      </div>
    </form>
    <?php echo form_close();?>
    <a href="javascript:forgetPassword();">I forgot my password</a><br>
   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<div id="ForgetPasswordBox" class="modal fade">
	<div class="modal-dialog modal-login" style="width: 30%;">
		<div class="modal-content">
			<div class="modal-header">			
				<h4 class="modal-title">পাসওয়ার্ড রিকোভার করতে আপনার ইমেইল এড্রেস এখানে প্রবেশ করান </h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('password-recover', array('class' => 'forget-password'));?>
					
					<div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="ইমেইল">		
					</div>
					<div class="UserExist"></div>

					<div class="PasswordNotMatched"></div>  
					<div class="RegistrationSuccessfull"></div>  
          
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">সাবমিট</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> 

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  function forgetPassword(){
    $('#ForgetPasswordBox').modal('show');
    $('form.forget-password').on('submit', function(form){
   	
     form.preventDefault();
   
     var URL = 'password-recover';
   
     $.post(URL , $('form#edit-product').serialize(), function(data){
 
       if(data == '1'){
             
         
       }
       if(data == '0'){


       }
     
     
   })
 });

  }
</script>
</body>
</html>
