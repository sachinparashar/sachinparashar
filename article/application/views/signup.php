<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Article | Signup</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?=base_url(); ?>assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=base_url(); ?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?=base_url(); ?>assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=base_url(); ?>assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login" style="background-color: #ff83b6!important;">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<!-- <img src="<?=base_url(); ?>assets/admin/layout2/img/logo-big.png" width="75px" alt=""/> -->
	<h1 style="color:#ffffff;">Article Demo Website</h1>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="" method="post">
		<h3 class="form-title">User Signup</h3>
		<h4 class="form-title pwd_msg"></h4>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">First name</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="First Name" name="fname" id="fname" />
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Last name</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Last Name" name="lname" id="lname" />
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" id="email" />
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
			<span style='color:red;' id='err_password'></span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Confirm Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirm Password" name="cpassword" id="cpassword"/>
			<span style='color:red;' id='err_cpassword'></span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Date of Birth</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off" placeholder="23/09/1993" name="dob" id="dob"/>
			<span style='color:red;' id='err_dob'></span>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Gender</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" name="gender" id="gender"  placeholder="Gender"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Phone</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="number" autocomplete="off" placeholder="Phone number" name="phone" id="phone"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Preferences</label>
			<?php if(!empty($category)){
				foreach($category as $cat){ ?>
					<label class="rememberme check"><input type="checkbox" id="<?= $cat['id']?>" name="<?= $cat['cat_name']?>" value="<?= $cat['id']?>"/><?= $cat['cat_name']?> </label>
				<?php } } ?>
		</div>
		<div class="form-actions">
			<button type="button" class="btn btn-md green uppercase confirm_signup_btn">Signup</button>
			<button type="button" class="btn btn-md blue uppercase back">Back</button>
			<!--<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>-->
		</div>


	</form>
	<!-- END LOGIN FORM -->

</div>
<div class="copyright">
	 <?php echo date('Y'); ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="./assets/global/plugins/respond.min.js"></script>
<script src="./assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript">  var urlpath = "<?=base_url(); ?>"; </script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="<?=base_url(); ?>assets/own.js" type="text/javascript"></script>
<!-- 

<script src="<?=base_url(); ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?=base_url(); ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>
	END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
	// Metronic.init(); // init metronic core components
	// Layout.init(); // init current layout
	// Login.init();
	// Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
