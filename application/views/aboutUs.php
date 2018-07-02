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
            <h2>About Us</h2>
         
            <p> fair use policy</p>
            <p>and usage The team at HR MASTER, are highly qualified and experienced in human resources, employment law and are trained in how HRM functions and operates. However there are some aspects which the our technical support department is unable to provide support for. For this reason the following Fair Use Policy has been developed to assist users in understanding the limitations associated with the technical support provided.</p>
            <p><strong>Technical support guidelines</strong></p>
            <p>HRM categorise technical support into 3 levels: </p>
            <ul>
               <li>Level 1 support | basic support on the functionality of HRM such as where things are, what things do, and its limitations</li>
               <li>Level 2 support | support on the functionality of HRM (as above) and, advice on how to apply your requirements to HRM to achieve your expected results </li>
               <li>Level 3 support | where the HRM support staff are unable to identify an excepted result or, has determined there is an anomaly in the system an enquiry will be lodged with 3rd party programming and/or engineering for further investigation. </li>
            </ul>
            <p>The HRM team are not qualified to, nor provide support for:</p>
            <ul>
               <li>providing computer support on your operating system</li>
               <li>providing internet and network support </li>
            </ul>
            <p><strong>Availability</strong></p>
            <ul>
               <li>Level 1 is available via email and telephone support is an outbound call service. There is 24 hours turn around time during business hours on Monday to Friday 9.00 am until 4.00 pm AEST (excluding NSW public holidays and the close down period between Christmas and New Year).</li>
               <li>Level 2  is available via email and telephone support is an outbound call service. There is 48 hours turn around time during business hours on Monday to Friday 9.00 am until 4.00 pm AEST (excluding NSW public holidays and the close down period between Christmas and New Year).</li>
               <li>Level 3 support is available via emailing HRM with a detailed description of what the issues are. There is 72 hour turn around time .</li>
            </ul>
            <p><strong>General</strong></p>
            <ul>
               <li>The HRM may rely on the Fair Use Policy where your usage of HRM is unreasonable</li>
               <li>Technical support is only provided to the account holder or an authorized person for the purpose of utilizing HRM</li>
               <li>HRM reserves the right to vary the terms of this Fair Use Policy from time to time and a notification will be emailed the user in accordance with HRMs general disclaimer.</li>
            </ul>
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