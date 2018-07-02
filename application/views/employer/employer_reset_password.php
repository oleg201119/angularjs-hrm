<!DOCTYPE html>
<html lang="en" class="gr__hrmaster_com_au">
	<head>
		<title>HR Master</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>webroot/css/images/favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/custom.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/logincss.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/flexslider.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" type="text/css" media="all">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
		<script src="<?php echo base_url(); ?>webroot/js/jquery-1.8.0.min.js"></script>
		<!--[if lt IE 9]><script src="js/modernizr.custom.js"></script><![endif]-->
		<script src="<?php echo base_url(); ?>webroot/js/jquery.flexslider-min.js"></script>
		<script src="<?php echo base_url(); ?>webroot/js/functions.js"></script>
	</head>
	<body style="margin-top: -10px;">
		<div id="wrapper">
		<!-- top-nav -->
		<nav class="top-nav">
			<div class="shell"> 
				<a href="#" class="nav-btn">HOMEPAGE<span></span></a> <span class="top-nav-shadow"></span>
				<ul>
					<li class="active"><span><a href="#">home</a></span></li>
					<li><span><a href="#">services</a></span></li>
					<li><span><a href="#">projects</a></span></li>
					<li><span><a href="#">solutions</a></span></li>
					<li><span><a href="#">jobs</a></span></li>
					<li><span><a href="#">blog</a></span></li>
					<li><span><a href="#">contacts</a></span></li>
				</ul>
			</div>
		</nav>
		<!-- end of top-nav -->
		<div class="main">
			<span class="shadow-top"></span>
			<div class="login-form-wrapper">
				<div id="msg_div1">
					<?php echo $this->session->flashdata('message');?>
				</div>
				<form action="" method="post" id="admin_login_form">
					<fieldset>
						<div class="label float-left">New Password</div>
						<input type="password" id="employer_password" name="employer_password" class="float-left" placeholder="Enter password" value=""><br/><br/>
						<?php echo form_error('employer_password','<span class="text-danger">','</span>'); ?>
					</fieldset>
					<fieldset>
						<div class="label float-left">Password</div>
						<input  type="password" id="c_employer_password" name="c_employer_password" class="float-left" placeholder="Enter confirm password" value=""><br/><br/>
						<?php echo form_error('c_employer_password','<span class="text-danger">','</span>'); ?>
					</fieldset>
					<div class="login-message">
						<?php echo $this->session->flashdata('message1');?>
						<span id="login_error" style="display:none; color: #ff0000;">You must enter password.</span>
					</div>
					<div class="buttons">
						<button type="submit" name="resetpassword" id="login_btn" value="resetpassword" class="btn btn-primary float-left">Reset Password</button>
						<a href="<?php echo base_url(); ?>login" class="btn btn-danger float-left">Cancel</a>	
						<div class="clear"></div>
					</div>
				</form>
			</div>         
		</div>
		<div id="footer-push"></div>
		<!-- end of footer-push -->
	</div>
	<!-- end of wrapper -->
	<!-- footer -->
	<div id="footer">
		<span class="shadow-bottom"></span>
		<!-- footer-cols -->
		<div class="footer-cols">
			<!-- shell -->
			<div class="shell footer-shell">
				<div class="shell">
					<nav class="footer-nav">
						<ul>
							<li><a href="http://www.hrmaster.com.au/index.php">Home</a></li>
							<li><a href="http://www.hrmaster.com.au/about_us.php">About Us</a></li>
							<li><a href="http://www.hrmaster.com.au/projects.php">Projects</a></li>
							<li><a href="http://www.hrmaster.com.au/solutions.php">Solutions</a></li>
							<li><a href="http://www.hrmaster.com.au/jobs.php">Jobs</a></li>
							<li><a href="http://www.hrmaster.com.au/blog.php">Blog</a></li>
							<li><a href="http://www.hrmaster.com.au/contacts.php">Contacts</a></li>
						</ul>
					</nav>
				</div>
			<div class="cl">&nbsp;</div>
		</div>
		<!-- end of shell -->
	</div>
	<!-- end of footer-cols -->
	<div class="footer-bottom">
		<div class="shell">
			<p class="copyl">© Copyright 2017<span>|</span>HR Master.</p>
		</div>
	</div>
	</div>
	<script type="text/javascript">

		$('#admin_login_form').on('submit', function(){
			var email = $('#email').val();
			var password = $('#password').val();
			if(email == '')
			{
				$('#login_error').css({"display":"block"});
				return false;
			}

			if(password == '')
			{
				$('#login_error').css({"display":"block"});
				return false;
			}
		});

		$('#login_btn').on('click', function(){
			var email = $('#email').val();
			var password = $('#password').val();

			if(email == '')
			{
				$('#login_error').css({"display":"block"});
				return false;
			}

			if(password == '')
			{
				$('#login_error').css({"display":"block"});
				return false;
			}
		});


		$(function () {
			var sf_menu_sub = $('.sf-menu-main');
			$('.nav-btn').on('click', function (e) {
				e.stopPropagation();
				sf_menu_sub.toggle();
			});
			$(document).on('click', function (e) {
				sf_menu_sub.hide();
			});
		});
	</script>

	<!-- end of footer -->
	</body>
</html>