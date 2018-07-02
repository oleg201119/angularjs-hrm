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
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>

		<script src="<?php echo base_url(); ?>webroot/js/ajax.jquery.min.js"></script>
		
	</head>
	<body style="margin-top: -10px !important;">
		<div id="wrapper">
		<!-- top-nav -->
		<nav class="top-nav">
			<div class="shell"> 
				<a href="#" class="nav-btn">HOMEPAGE<span></span></a> <span class="top-nav-shadow"></span>
				<ul>
					<li <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'homepage'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>homepage">home</a></span></li>
        <li <?php if($this->uri->segment(1) == 'aboutUs'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>aboutUs">About Us</a></span></li>
        <li <?php if($this->uri->segment(1) == 'project'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>project">projects</a></span></li>
        <li <?php if($this->uri->segment(1) == 'solution'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>solution">solutions</a></span></li>
        <li <?php if($this->uri->segment(1) == 'jobs'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>jobs">jobs</a></span></li>
        <li <?php if($this->uri->segment(1) == 'blog'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>blog">blog</a></span></li>
        <li <?php if($this->uri->segment(1) == 'contacts'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>contacts">contacts</a></span></li>
				</ul>
			</div>
		</nav>
		<!-- end of top-nav -->
		<div class="main">
			<span class="shadow-top"></span>
			<div class="login-form-wrapper">
				<form action="" method="post" id="admin_login_form">
					<fieldset>
						<div class="label float-left">Enter Email</div>
						<input type="email" id="email" name="email" class="float-left" placeholder="Enter Email" value=""><br/><br/>
						<?php echo form_error('email','<span class="text-danger">','</span>'); ?>
					</fieldset>
					<div class="login-message">
						<?php echo $this->session->flashdata('email');?>						
					</div>
					<div class="buttons">
						<button type="submit" name="Submit" id="Submit" value="forgot_password" class="btn btn-primary float-left">Forget Password</button>							
						<a href="<?php echo base_url(); ?>login" class="btn btn-danger float-left">Cancel</a>							
						<div class="clear"></div>
					</div>
				</form>
			</div>         
		</div><div id="footer-push"></div>
		<!-- end of footer-push -->
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
							 <li><a href="<?php echo base_url(); ?>homepage">Home</a></li>
					                <li><a href="<?php echo base_url(); ?>contacts">Contact Us</a></li>
					                <li><a href="#">Privacy Statement</a></li>
					                <li><a href="#">Terms of Use</a></li>
					                <li><a href="#">Trademarks</a></li>
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
	</div>
	<!-- end of wrapper -->

	<script src="<?php echo base_url(); ?>webroot/js/bootstrap.min.js"></script>
	
		<script src="<?php echo base_url(); ?>webroot/js/jquery-1.8.0.min.js"></script>
		<!--[if lt IE 9]><script src="js/modernizr.custom.js"></script><![endif]-->
		<script src="<?php echo base_url(); ?>webroot/js/jquery.flexslider-min.js"></script>
	<script>
		$("#msg_div").fadeOut(10000);
		$("#login-message").fadeOut(10000);
	</script>
	<script type="text/javascript">

		$('#employer_login_form').on('submit', function(){
			var email = $('#email').val();
			var password = $('#password').val();
			if(email == '' || password == '')
			{
				if(email == '')
				{
					$('#login_error').css({"display":"block"});
					$('#log_er_msg').css({"display":"none"});					
					
					return false;
				}
	
				if(password == '')
				{
					$('#login_error').css({"display":"block"});
					$('#log_er_msg').css({"display":"none"});
					return false;
				}
			}
			else
			{
				$('#login_error').css({"display":"none"});
			}
			
		});

		$('#login_btn').on('click', function(){
			var email = $('#email').val();
			var password = $('#password').val();

			if(email == '')
			{
				$('#login_error').css({"display":"block"});
					$('#log_er_msg').css({"display":"none"});
				return false;
			}

			if(password == '')
			{
				$('#login_error').css({"display":"block"});
					$('#log_er_msg').css({"display":"none"});
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