<div id="wrapper">
    <!-- top-nav -->
    <nav class="top-nav">
        <div class="shell">
            <a href="#" class="nav-btn">MENU<span></span></a> <span class="top-nav-shadow"></span>
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
    <!-- main -->
    <div class="main">
        <span class="shadow-top"></span>
        <!-- shell -->
        <div class="shell page-shell">
            <div class="container">
                <h2>Projects</h2>
            </div>
             <!-- cols -->
            <section class="cols">
                <div class="col">
                    <h3>Work Health & Safety</h3>
                    <img src="webroot/css/images/safety_icon.jpeg" alt="" class="alignleft">
                    <div class="col-cnt">
                        <p>Manage your businesses work health and safety with HR Masters audit, injury, personal protective equipment, and chemical reregisters.</p>
                    </div>
                    <a href="<?php echo base_url(); ?>solution" class="view">View More</a> </div>
                <div class="col">
                    <h3>Industrial Relations</h3>
                    <img src="webroot/css/images/ir_icon.jpg" alt="" class="alignleft">
                    <div class="col-cnt">
                        <p>Save time and resources by utilising our fully integrated OPTRON technology enabling efficient and effective a human resources management.</p>
                    </div>
                    <a href="<?php echo base_url(); ?>solution" class="view">View More</a> </div>
                <div class="col">
                    <h3>Training and Development</h3>
                    <img src="webroot/css/images/classroom_icon.jpg" alt="" class="alignleft">
                    <div class="col-cnt">
                        <p>Save time and money by allowing HR Masters OPTRON technology manage your businesses training and development.</p>
                    </div>
                    <a href="<?php echo base_url(); ?>solution" class="view">View More</a> </div>
                <div class="cl">&nbsp;</div>
            </section>
            <!-- end of cols -->
            <!-- end of shell -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of main -->