<div id="wrapper">
    <!-- top-nav -->
    <nav class="top-nav">
        <div class="shell"> <a href="#" class="nav-btn">MENU<span></span></a> <span class="top-nav-shadow"></span>
            <ul>
                <?php  // ? what is this here for?  ?>
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
    <!-- header -->
    <header id="header">
        <!-- shell -->
        <div class="shell">
            <div class="header-inner">
                <!-- header-cnt -->
                <div class="header-cnt">
                    <h1 id="logo logo_text"><a href="#" class="main_title">HR Master</a></h1>
                    <h3 class="main_subtitle">Designed for Operation and HR Managers</h3>
                    <p> <span class="mobile">Employment relations software designed by award winning HR professionals.</span><span class="desktop"> For businesses big and small, HR Master covers it all.</span></p>
                    <a href="<?php echo site_url('login'); ?>" class="blue-btn">LOGIN NOW</a> </div>
                <!-- end of header-cnt -->
                <!-- slider -->
                <div class="slider-holder">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="webroot/css/images/team.jpg" alt=""></li>
                            <li><img src="webroot/css/images/fingertips.jpg" alt=""></li>
                            <li><img src="webroot/css/images/eLearning.jpg" alt=""></li>
                            <li><img src="webroot/css/images/workplace.jpg" alt=""></li>
                            <li><img src="webroot/css/images/reports.jpg" alt=""></li>
                            <li><img src="webroot/css/images/safety.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
                <!-- end of slider -->
                <div class="cl">&nbsp;</div>
            </div>
            <div class="cl">&nbsp;</div>
        </div>
        <!-- end of shell -->
    </header>
    <!-- end of header -->
    <!-- main -->
    <div class="main">
        <span class="shadow-top"></span>
        <!-- shell -->
        <div class="shell page-shell">
            <!-- testimonial -->
            <section class="testimonial">
                <h2>Manage your human resources effectively </h2>
                <p><strong>“</strong>HR Masters OPTRON technology has been designed by award winning leaders in employment relations and human resource management. OPTRON allows businesses to easily comply with the day to day requirements of running your human resources functions. Whether it be recruitment, training and development, work health and safety, termination or industrial relations generally, HR Master will give you the necessary tools to manage your business compliance in every area.<span class="mobile"><strong> ”</strong></span></p>
            </section>
            <!-- testimonial -->
            <section class="blog">
                <!-- content -->
                <div class="content"> <img src="webroot/css/images/i-img.png" alt="" class="alignleft">
                    <div class="cnt">
                        <h3>Designed by award winning leaders in employment relations and work health and safety</h3>
                        <p>HR Master has been designed by employment lawyers and award winning HR professionals ensuring your business, gets the tools it needs.</p>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>solution#work-health-and-safety">Work Health & Safety</a></li>
                            <li><a href="<?php echo base_url(); ?>solution#industrial-relations">Industrial Relations</a></li>
                            <li><a href="<?php echo base_url(); ?>solution#recruiment-and-training">Recruitment & Training</a></li>
                            <li><a href="<?php echo base_url(); ?>solution#discipline-and-terminationy">Discipline & Termination</a></li>
                            <li><a href="<?php echo base_url(); ?>solution#key-hr-metrical-data-and-reports">Key HR Metrical Data & Reports</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end of content -->
                <!-- sidebar -->
                <aside class="sidebar">
                    <!-- widget -->
                    <div class="widget">
                        <h3>Testimonials</h3>
                        <ul>
                            <li>
                                <div class="img-holder"><img src="webroot/css/images/post-img.png" alt=""></div>
                                <p>We have been using the work health and safety module in HRM for years and it has never let us down. The PPE, Injury, Plant, Audit and other registers are by far, the best we have used in any software package. Well done! - Lynette Sumner (La Casa Italiana).</p>
                            </li>
                            <li>
                                <div class="img-holder"><img src="webroot/css/images/post-img2.png" alt=""> </div>
                                <p><em>Thanks again David. Your training system in HRM is second to none. I have used many leading learning and development systems and yours does the job except at 1/4 the price. Thanks again. Rabbie Abu Zalaf (App Sunder).</em></p>
                            </li>
                            <li>
                                <div class="img-holder"><img src="webroot/css/images/post-img3.png" alt=""></div>
                                <p><em>* HRM is an essential tool for anyone trying to implement solid, robust and holistic, HR systems. We used to use a combination of systems and after seeing and using this once, I can't imagine running our business without HRM. This is the best value for money HR system we have every used. Thank you. G.R, (Healing Hands Clinic)</em></p>
                            </li></ul>
                    </div>
                    <a href="#" class="view">View All</a>
                    <!-- end of widget -->
                </aside>
                <!-- end of sidebar -->
                <div class="cl">&nbsp;</div>
            </section>
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