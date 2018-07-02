<div id="wrapper" class="page">
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
                <h2>Solutions</h2>
                <h3 id="work-health-and-safety">Work Health & Safety</h3>
                <p>Using OPTRON technology, HR Master allows users to manage their Work Health and Safety by utlising HRM's wide array of registers including it's safety data sheet, plant maintenance injury, safe operating procedure and workers compensation registers.</p>
                <h3 id="industrial-relations">Industrial Relations</h3>
                <p>Designed by employment lawyers and HR professionals, HR Master is designed with full employee integration and registers which prompt users to ensure the correct data is entered where required. Web page and e-mail reminders are triggered when necessary.</p>
                <h3 id="recruiment-and-training">Recruitment & Training</h3>
                <p>With OPTRON's recruitment integration, users can save time and money by creating induction and training courses and integrate that into the employees database. contracts, policy builders, systems for assessment and cessation are all part of OPTRON's award winning employee integration system ensure you have the tools needed for full compliance at minimal cost.</p>
                <h3 id="discipline-and-terminationy">Discipline & Termination</h3>
                <p> THR Master has been designed by employment lawyers and award winning HR professionals ensuring your business, gets the tools it needs.</p>
                <h3 id="key-hr-metrical-data-and-reports">Key HR Metrical Data & Reports</h3>
                <p>HR Masters reporting and analytical systems provide HR and Operation professional not only reports designed to quickly identify trends but also fully integrated breakdown of WHS, department and employee costing accross a wide range of platforms.</p>
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