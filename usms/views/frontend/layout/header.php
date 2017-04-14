<header id="navigation"> 
  <div class="navbar" role="banner"> 
    <div class="container"> 
      <div class="navbar-header"> 
<!--         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> 
          <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
        </button>  -->
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><h1><img src="<?php echo base_url(); ?>template/frontend/images/logo-khcn.png" alt="logo"></h1></a> 
      </div> 
      <div class="collapse navbar-collapse"> 
        <ul class="nav navbar-nav navbar-right"> 
<!--           <li class="scroll active"><a href="#navigation">Home</a></li> 
          <li class="scroll"><a href="#about-us">About Us</a></li> 
          <li class="scroll"><a href="#services">Services</a></li> 
          <li class="scroll"><a href="#our-team">Our Team</a></li> 
          <li class="scroll"><a href="#portfolio">Portfolio</a></li> 
          <li class="scroll"><a href="#clients">Clients</a></li> 
          <li class="scroll"><a href="#blog">Blog</a></li> --> 
          <li class="scroll"><a href="<?php echo $this->config->base_url().'authentication';?>">Đăng nhập</a></li> 
        </ul> 
      </div> 
    </div> 
  </div><!--/navbar--> 
</header> <!--/#navigation--> 