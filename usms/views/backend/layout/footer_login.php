<?php  
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * version 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */
  ?>
<!-- Footer -->  
<?php assets_js(
	array(
  'global/vendor/babel-external-helpers/babel-external-helpers.js',
  'global/vendor/jquery/jquery.js',
  'global/vendor/tether/tether.js',
  'global/vendor/bootstrap/bootstrap.js',
  'global/vendor/animsition/animsition.js',
  'global/vendor/mousewheel/jquery.mousewheel.js',
  'global/vendor/asscrollbar/jquery-asScrollbar.js',
  'global/vendor/asscrollable/jquery-asScrollable.js',
  'global/vendor/ashoverscroll/jquery-asHoverScroll.js',
  'global/vendor/waves/waves.js',
  // Plugins -->
  'global/vendor/switchery/switchery.min.js',
  'global/vendor/intro-js/intro.js',
  'global/vendor/screenfull/screenfull.js',
  'global/vendor/slidepanel/jquery-slidePanel.js',
  'global/vendor/jquery-placeholder/jquery.placeholder.js',
  // Scripts -->
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
  'global/js/Plugin/jquery-placeholder.js',
  'global/js/Plugin/material.js',  		
	)
);
?>
<script>
(function(document, window, $) {
'use strict';
var Site = window.Site;
$(document).ready(function() {
  Site.run();
});
})(document, window, jQuery);
</script>	
<script>
Config.set('assets', '<?php echo $this->config->base_url();?>/template/assets');
</script>