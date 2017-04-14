  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="">
        <a href="<?php echo $this->config->base_url();?>"><img class="navbar-brand-logo" src="<?php echo $this->config->base_url(); ?>template/assets/images/logo.png" title="USMS - Hệ thống quản lý Hoạt động Khoa học công nghệ"></a>
        <span class="navbar-brand-text hidden-xs-down"> USMS</span>
      </div>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="nav-item hidden-sm-down" id="toggleFullscreen">
            <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar -->
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
            <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
            data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
                <?php 
                if(isset($userInfo)){
                  $avatar = ($userInfo->Image_Path !=="") ? $userInfo->Image_Path: "default_avatar.png";
                ?>
                <img src="<?php echo $this->config->base_url().'uploads/images/avatar/'.$avatar; ?>" alt="<?php echo isset($userInfo) ? $userInfo->Name : ""; ?>" title="<?php echo isset($userInfo) ? $userInfo->Name : ""; ?>">
                <i></i>
                <?php } ?>
              </span>
              <span><?php //echo isset($userInfo) ? $userInfo->Name : ""; ?></span>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="/profile" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Hồ sơ</a>
<!--               <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-card" aria-hidden="true"></i> Billing</a> -->
              <a class="dropdown-item" href="/profile/changepass" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Đổi mật khẩu</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/authentication/logout" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Thoát</a>
            </div>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>