<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta name="description" content="Creative One Page Parallax Template">
  <meta name="keywords" content="" /> 
  <meta name="author" content=""> 
  <title><?php echo isset($title_for_layout) ? $title_for_layout : ''; ?></title>
  <!--[if lt IE 9]> <script src="js/html5shiv.js"></script> 
  <script src="js/respond.min.js"></script> <![endif]--> 
  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>template/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>template/assets/images/favicon.ico">
<?php assets_css(
      array(
        'frontend/css/bootstrap.min.css',
        'frontend/css/prettyPhoto.css', 
        'frontend/css/font-awesome.min.css', 
        'frontend/css/animate.css', 
        'frontend/css/main.css',
        'frontend/css/responsive.css', 
        )     
    );
?>
<?php assets_js(
      array(
      'frontend/js/jquery.js', 
      'frontend/js/bootstrap.min.js',
      'frontend/js/smoothscroll.js', 
      'frontend/js/jquery.isotope.min.js',
      'frontend/js/jquery.prettyPhoto.js', 
      'frontend/js/jquery.parallax.js',
      'assets/js/Plugin/pdfobject.js' 
      //'frontend/js/main.js',
)); ?>  
<?php echo $css_for_layout; ?>
</head><!--/head-->
<body>
    <?php echo $content_for_layout; ?>
</body>
<?php echo $js_for_layout; ?>
<?php echo $js_for_footer;?>

</html>