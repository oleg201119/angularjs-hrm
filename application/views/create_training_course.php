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
                <li <?php if($this->uri->segment(1) == 'training'){ echo ' class="active"'; }?>><span><a href="<?php echo base_url(); ?>jobs">Training</a></span></li>
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
            	<form>
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
             
              
            <!-- end of shell -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of main -->