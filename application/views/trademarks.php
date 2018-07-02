<div id="wrapper">
    <!-- top-nav -->
    <nav class="top-nav">
        <div class="shell"> <a href="#" class="nav-btn">HOMEPAGE<span></span></a> <span class="top-nav-shadow"></span>
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
                <h2>Trademarks</h2>
                <h3>1. General Disclaimer - Introduction</h3>
                <p>All rights including information pertaining to the web and database design, text, graphics, interfaces, and the selection and arrangements thereof is subject to copyright (c). All rights are reserved and are sole and exclusive property of HR Master - ABN 16377155715.</p>
                <p>Any use of materials on the website, including reproduction, modification, distribution, replication, any form of data extraction or data mining, or other commercial exploitation of any kind, without prior written permission of an authorised officer of HR Master is strictly prohibited. Users acknowledge and agree that they will not use any robot, spider, computer malware or virus of any kind or other automatic device, or manual process to monitor or copy any content contained within the HR Master website or any of it's sub directories.</p>
                <p>HR Master is a proprietary mark of HR Master - ABN 16377155715 and it's trademarks may not be used in connection with any product or service unless authorised in writing by an authorised officer of HR Master - ABN 16377155715.</p>
                <p>&nbsp;</p>
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