<div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="<?php echo $this->config->base_url(); ?>template/assets/images/logo@2x.png" alt="...">
          <h2 class="brand-text font-size-40">Quản lý Khoa học Công nghệ</h2>
        </div>
        <p class="font-size-20">Powered by University Of Transport Technology.</p>
      </div>
      <div class="page-login-main">
        <div class="brand hidden-md-up">
          <img class="brand-img" src="<?php echo $this->config->base_url(); ?>template/assets/images/logo-blue@2x.png" alt="...">
          <h3 class="brand-text font-size-40">USM</h3>
        </div>
        <h3 class="font-size-24 text-primary"><i class="fa fa-lock"></i> Đăng nhập hệ thống</h3>
        <!-- <p>"Hãy làm mọi việc đơn giản nhất có thể!"</p> -->      
        
        <!-- <form method="post" action="" autocomplete="off"> -->
        <?php echo form_open('authentication/index'); ?>
        <?php echo validation_errors(); ?>
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="email" class="form-control empty" id="inputEmail" name="email" value="<?php echo set_value('email','');?>">
            <label class="floating-label" for="inputEmail">Email</label>
          </div>
          <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty" id="inputPassword" name="password" value="<?php echo set_value('password','');?>">
            <label class="floating-label" for="inputPassword">Password</label>
          </div>
          <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary pull-xs-left">
              <input type="checkbox" id="remember" name="checkbox">
              <label for="inputCheckbox">Ghi nhớ</label>
            </div>
            <a class="pull-xs-right" href="/Profile/forgotpass">Tìm lại mật khẩu?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block" name="submit">Đăng nhập</button>
        <!-- </form> -->
          <?php form_close() ; ?>
        
        <footer class="page-copyright">
          <p>© 2016 BY UTT. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
      </div>
    </div>
  </div>  
  <!-- End Page -->
  <!-- Core  -->
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/jquery/jquery.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/tether/tether.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/bootstrap/bootstrap.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/animsition/animsition.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/asscrollable/jquery-asScrollable.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/waves/waves.js"></script>
  <!-- Plugins -->
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/switchery/switchery.min.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/intro-js/intro.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/screenfull/screenfull.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/slidepanel/jquery-slidePanel.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
  <!-- Scripts -->
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/State.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Component.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Base.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Config.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Section/Menubar.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Section/GridMenu.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Section/Sidebar.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Section/PageAside.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Plugin/menu.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/config/colors.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/config/tour.js"></script>
  <script>
  Config.set('assets', '<?php echo $this->config->base_url(); ?>template/assets');
  </script>
  <!-- Page -->
  <script src="<?php echo $this->config->base_url(); ?>template/assets/js/Site.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin/asscrollable.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin/slidepanel.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin/switchery.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin/jquery-placeholder.js"></script>
  <script src="<?php echo $this->config->base_url(); ?>template/global/js/Plugin/material.js"></script>
  <script>
  (function(document, window, $) {
    'use strict';
    var Site = window.Site;
    $(document).ready(function() {
      Site.run();
    });
  })(document, window, jQuery);
  </script>
