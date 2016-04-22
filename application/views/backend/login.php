<!DOCTYPE html>
<html lang="en">
<head>
<?php
	////$system_name	=	$this->db->get_where('system_setting' , array('type'=>'system_name'))->row()->description;
	//$system_title	=	$this->db->get_where('system_setting' , array('type'=>'system_name'))->row()->description;
	?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Neon Admin Panel" />
<meta name="author" content="" />
<title>Login | Learning Management System</title>
<link rel="stylesheet" href="assets/login/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
<link rel="stylesheet" href="assets/login/css/font-icons/entypo/css/entypo.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
<link rel="stylesheet" href="assets/login/css/bootstrap.css">
<link rel="stylesheet" href="assets/login/css/neon-core.css">
<link rel="stylesheet" href="assets/login/css/neon-theme.css">
<link rel="stylesheet" href="assets/login/css/neon-forms.css">
<link rel="stylesheet" href="assets/login/css/custom.css">
<script src="assets/login/js/jquery-1.11.0.min.js"></script>

<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
<link rel="shortcut icon" href="assets/images/favicon.png">
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">

<!-- This is needed when you send requests via Ajax --> 
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>
<div class="login-container">
  <div class="login-progressbar-indicator">
    <h3>43%</h3>
    <span>logging in...</span> </div>
  <div class="login-progressbar">
    <div></div>
  </div>
  
  <div class="login-form">
    
    <!-- progress bar indicator -->
    
    <div class="login-content">
      <div class="login-form-inner">
        <h3 class="form-title" >Learning Management System</h3>
        <div class="sep text-center"><img src="assets/login/images/login-sep.png" class="img-responsive" width="295" height="8"/></div>
        <div class="form-login-error">
          <h3>Invalid login</h3>
          <p>Please enter correct email and password!</p>
        </div>
        <form method="post" role="form" id="form_login">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"> <i class="entypo-user"></i> </div>
              <input type="text" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off" data-mask="email" />
            </div>
			<label for="email" class="error"></label>
          </div>
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"> <i class="entypo-key"></i> </div>
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
		   </div>
		   	<label for="password" class="error"></label>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-login">Login </button>
          </div>
        </form>
        <div class="login-bottom-links"> <a href="<?php echo base_url();?>index.php?login/forgot_password" class="link"> Forget Password ? </a> </div>
      </div>
    </div>
  </div>
</div>

<!-- Bottom Scripts --> 

<script type="text/javascript">
 $('#email').keypress(function() {   
    $(this).val($(this).val().replace(/\s/g,""));
});
</script>
<script src="assets/login/js/gsap/main-gsap.js"></script> 
<script src="assets/login/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script> 
<script src="assets/login/js/bootstrap.js"></script> 
<script src="assets/login/js/joinable.js"></script> 
<script src="assets/login/js/resizeable.js"></script> 
<script src="assets/login/js/neon-api.js"></script> 
<script src="assets/login/js/jquery.validate.min.js"></script> 
<script src="assets/login/js/neon-login.js"></script> 
<script src="assets/login/js/neon-custom.js"></script> 
<script src="assets/login/js/neon-demo.js"></script>
</body>
</html>