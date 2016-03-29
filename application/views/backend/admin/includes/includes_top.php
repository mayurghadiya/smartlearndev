    <meta charset="utf-8" />
    <title>Login Pages HTML Template | Smart learn</title>
    <meta name="keywords" content="HTML5 Template, CSS3, All Purpose Admin Template, Smart learn" />
    <meta name="description" content="Login Pages - Responsive Admin HTML Template">
    <meta name="author" content="Venmond">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    
    <!-- CSS -->
       
    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="<?=$this->config->item('css_path')?>bootstrap.min.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="<?=$this->config->item('css_path')?>font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
    <link href="<?=$this->config->item('css_path')?>font-entypo.css" rel="stylesheet" type="text/css">    

    <!-- Fonts CSS -->
    <link href="<?=$this->config->item('css_path')?>fonts.css"  rel="stylesheet" type="text/css">
               
    <!-- Plugin CSS -->
    <link href="<?=$this->config->item('custom_plugin')?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
    <link href="<?=$this->config->item('custom_plugin')?>prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->config->item('custom_plugin')?>isotope/css/isotope.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->config->item('custom_plugin')?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
	<link href="<?=$this->config->item('custom_plugin')?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 
   
         
    <link href="<?=$this->config->item('custom_plugin')?>mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->config->item('custom_plugin')?>tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->config->item('custom_plugin')?>bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
    <link href="<?=$this->config->item('custom_plugin')?>daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
    <link href="<?=$this->config->item('custom_plugin')?>bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?=$this->config->item('custom_plugin')?>/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">
	<!-- Specific CSS -->
	<?php 
        $skin = $this->db->get_where('system_setting' , array('type' => 'skin_colour'))->row()->description;		
      ?>     
     
    <!-- Theme CSS -->
    <link id="pagestyle"  href="<?=$this->config->item('css_path')?><?php echo $skin; ?>" rel="stylesheet" type="text/css">
	
	
    <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
    <link href="<?=$this->config->item('css_path')?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->
        
    <!-- Responsive CSS -->
       <link href="<?=$this->config->item('css_path')?>theme-responsive.min.css" rel="stylesheet" type="text/css"> 
    <!-- for specific page in style css -->
        
    <!-- for specific page responsive in style css -->
        
    
    <!-- Custom CSS -->
    <link href="<?=$this->config->item('asset')?>custom/custom.css" rel="stylesheet" type="text/css">
	
    <!-- Head SCRIPTS -->
     <script type="text/javascript" src="<?=$this->config->item('js_path')?>modernizr.js"></script> 
    <script type="text/javascript" src="<?=$this->config->item('js_path')?>mobile-detect.min.js"></script> 
    <script type="text/javascript" src="<?=$this->config->item('js_path')?>mobile-detect-modernizr.js"></script> 
 
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5shiv.js"></script>
      <script type="text/javascript" src="js/respond.min.js"></script>     
    <![endif]-->
	