<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Simple</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>webroot/css/images/favicon.ico">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/custom.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/logincss.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/flexslider.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo base_url(); ?>webroot/css/bootstrap.min.css" type="text/css" media="all">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css'>
	
		<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
		<!-- font Awesome -->
        <link href="<?php echo base_url();?>webroot/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<script src="<?php echo base_url(); ?>webroot/js/ajax.jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
	</head>
	<body style="margin-top: -10px !important;">
		<div id="wrapper">
			<!-- top-nav -->
			<nav class="top-nav">
				<div class="shell"> <a href="#" class="nav-btn">Menu<span></span></a> <span class="top-nav-shadow"></span>
					<ul>
						<?php  
							foreach($getAllTabAsPerRole as $tab_list)
							{
								if($tab_list->userView == '1')
								{
									?>
									<li class="<?php echo ($this->uri->segment(1)== $tab_list->controller_name)?'active':''?>">
										<span>
											<a href="<?php echo base_url(); ?><?php echo $tab_list->controller_name; ?>">
												<?php echo $tab_list->tabname; ?>
											</a>
										</span>
									</li> 
									<?php
								}
							}
						?>
                        
						<li><span><a href="<?php echo base_url();?>login/logout">Logout</a></span></li>
					</ul>
				</div>
			</nav>
			<!-- end of top-nav -->
            
            <!--<li role="presentation" class="dropdown hide">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> Training <span class="caret"></span> </a>
                            <ul class="dropdown-menu">
                                <li><span><a href="#"><small>Create</small></a></span></li>
                                <li><span><a href="#"><small>Edit Training Course</small></a></span></li>
                                <li><span><a href="#"><small>Allocate Training</small></a></span></li>
                            </ul>
                        </li>-->