<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="Tung Vu">
  <!-- <title>USMS - Hệ thống Quản lý hoạt động Khoa học Công nghệ</title> -->
  <title><?php echo isset($title_for_layout) ? $title_for_layout : ''; ?></title>
  
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>template/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>template/assets/images/favicon.ico">
  <?php assets_css(
      array(
          'global/css/bootstrap.min.css',
          'global/css/bootstrap-extend.css',
          'assets/css/site.css',
      //plugin
          'global/vendor/animsition/animsition.css',
          'global/vendor/asscrollable/asScrollable.css',
          'global/vendor/switchery/switchery.css',
          'global/vendor/intro-js/introjs.css',
          'global/vendor/slidepanel/slidePanel.css',
          'global/vendor/flag-icon-css/flag-icon.css',
          'global/vendor/waves/waves.css',
          'global/vendor/chartist/chartist.css',
          'global/vendor/jvectormap/jquery-jvectormap.css',
          'global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
          'assets/examples/css/dashboard/v1.css',
      //fonts          
          'global/fonts/font-awesome/font-awesome.css',
          'global/fonts/web-icons/web-icons.css',
          'global/fonts/material-design/material-design.min.css',
          'global/fonts/brand-icons/brand-icons.min.css',
          'global/vendor/bootstrap-sweetalert/sweetalert.css',
      )
    );
  ?>
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>          
  
  <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>template/global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
  <!--[if lt IE 10]>
    <script src="<?php echo base_url(); ?>template/global/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo base_url(); ?>template/global/vendor/respond/respond.min.js"></script>
    <![endif]-->
  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>template/global/vendor/breakpoints/breakpoints.js"></script>
  <script>
  Breakpoints();
  </script>
  <?php assets_js(
  array(
    // Core 
    'global/vendor/babel-external-helpers/babel-external-helpers.js',
    'global/vendor/jquery/jquery.js',
    'global/vendor/bootbox/bootbox.js',
    'global/vendor/bootstrap-sweetalert/sweetalert.js',
    'global/vendor/toastr/toastr.js',
    'global/vendor/chart-js/Chart.js',
    'assets/js/Plugin/pdfobject.js'
    )); ?>
  <?php echo $css_for_layout; ?>  
</head>
<?php
//var_dump($controller_name);var_dump($method_name);die;
  $css = "animsition dashboard";
  $controller = array('Dashboard','User');

  if(in_array($controller_name,$controller)){
    $css = "animsition dashboard";
  }
  if($controller_name == 'authentication'){
    $css = "animsition page-login-v2 layout-full page-dark";
  }
  if($controller_name == 'Magazine'){
    $css = "animsition page-profile";
  }
  // if(($method_name = 'forgotpass')&&($controller_name = 'user')){
  //   $css = "animsition page-forgot-password layout-full";
  // }else{
  //   $css = 'animsition dashboard';
  // }

?>
<body class="<?php echo $css ?>">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
    <?php echo $content_for_layout; ?>
</body>
<?php assets_js(
  array(
    // Core 
    'global/vendor/tether/tether.js',
    'global/vendor/bootstrap/bootstrap.js',
    'global/vendor/animsition/animsition.js',
    'global/vendor/mousewheel/jquery.mousewheel.js',
    'global/vendor/asscrollbar/jquery-asScrollbar.js',
    'global/vendor/asscrollable/jquery-asScrollable.js',
    'global/vendor/ashoverscroll/jquery-asHoverScroll.js',
    'global/vendor/waves/waves.js',
    // Plugins
    'global/vendor/switchery/switchery.min.js',
    'global/vendor/intro-js/intro.js',
    'global/vendor/screenfull/screenfull.js',
    'global/vendor/slidepanel/jquery-slidePanel.js',
    // 'global/vendor/chartist/chartist.min.js',
    // 'global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min.js',
    'global/vendor/jvectormap/jquery-jvectormap.min.js',
    'global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js',
    'global/vendor/matchheight/jquery.matchHeight-min.js',
    'global/vendor/peity/jquery.peity.min.js',
    // Scripts 
    'global/js/State.js',
    'global/js/Component.js',
    'global/js/Plugin.js',
    'global/js/Base.js',
    'global/js/Config.js',
    'assets/js/Section/Menubar.js',
    'assets/js/Section/GridMenu.js',
    'assets/js/Section/Sidebar.js',
    'assets/js/Section/PageAside.js',
    'assets/js/Plugin/menu.js',
    'global/js/config/colors.js',
    'assets/js/config/tour.js',
    // Page -->
    'assets/js/Site.js',
    'global/js/Plugin/asscrollable.js',
    'global/js/Plugin/slidepanel.js',
    'global/js/Plugin/switchery.js',
    'global/js/Plugin/matchheight.js',
    'global/js/Plugin/jvectormap.js',
    'global/js/Plugin/peity.js',
    'assets/examples/js/dashboard/v1.js',
    'global/js/Plugin/bootbox.js',
    'global/js/Plugin/bootstrap-sweetalert.js',
  )
);
?>
<script>
Config.set('assets', '<?php echo $this->config->base_url();?>/template/assets');
</script>
<?php echo $js_for_layout; ?>
<?php echo $js_for_footer;?>
</html>