<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

    <!-- Specific Page Data -->
    <!-- End of Data -->

    <head>
        <meta charset="utf-8" />
        <title>Smart learn Dashboard | Smart learn</title>
        <meta name="keywords" content="HTML5 Template, CSS3, Metro Slider, Elegant HTML5 Theme" />
        <meta name="description" content="Multipurpose Responsive HTML5 Themes with Animated Metro Slider - Vencorp">
        <meta name="author" content="Smart  Learn">

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
        <link href="<?= $this->config->item('css_path') ?>bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('css_path') ?>font-awesome.min.css" rel="stylesheet" type="text/css">
        <!--[if IE 7]><link type="text/css" rel="stylesheet" href="css/font-awesome-ie7.min.css"><![endif]-->
        <link href="<?= $this->config->item('css_path') ?>font-entypo.css" rel="stylesheet" type="text/css">    

        <!-- Fonts CSS -->
        <link href="<?= $this->config->item('css_path') ?>fonts.css"  rel="stylesheet" type="text/css">

        <!-- Plugin CSS -->
        <link href="<?= $this->config->item('custom_plugin') ?>jquery-ui/jquery-ui.custom.min.css" rel="stylesheet" type="text/css">    
        <link href="<?= $this->config->item('custom_plugin') ?>/prettyPhoto-plugin/css/prettyPhoto.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('custom_plugin') ?>isotope/css/isotope.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('custom_plugin') ?>pnotify/css/jquery.pnotify.css" media="screen" rel="stylesheet" type="text/css">    
        <link href="<?= $this->config->item('custom_plugin') ?>google-code-prettify/prettify.css" rel="stylesheet" type="text/css"> 


        <link href="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.css" rel="stylesheet" type="text/css">    
        <link href="<?= $this->config->item('custom_plugin') ?>daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">    
        <link href="<?= $this->config->item('custom_plugin') ?>bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
        <link href="<?= $this->config->item('custom_plugin') ?>colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css">            

        <!-- Specific CSS -->
        <link href="<?= $this->config->item('custom_plugin') ?>layerslider/css/layerslider.css" rel="stylesheet" type="text/css"><link href="<?= $this->config->item('css_path') ?>animate.css" rel="stylesheet" type="text/css">    

        <!-- Theme CSS -->
        <link href="<?= $this->config->item('css_path') ?>theme_front.min.css" rel="stylesheet" type="text/css">
        <!--[if IE]> <link href="css/ie.css" rel="stylesheet" > <![endif]-->
        <link href="<?= $this->config->item('css_path') ?>chrome.css" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    



        <!-- Responsive CSS -->
        <link href="<?= $this->config->item('css_path') ?>theme-responsive.min.css" rel="stylesheet" type="text/css"> 




        <!-- for specific page in style css -->

        <!-- for specific page responsive in style css -->


        <!-- Custom CSS -->
        <link href="<?= $this->config->item('asset') ?>custom/custom.css" rel="stylesheet" type="text/css">



        <!-- Head SCRIPTS -->
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>modernizr.js"></script> 
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect.min.js"></script> 
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>mobile-detect-modernizr.js"></script> 

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type="text/javascript" src="js/html5shiv.js"></script>
          <script type="text/javascript" src="js/respond.min.js"></script>     
        <![endif]-->

    </head>    

    <body id="login-page" class="middle-layout no-nav-left no-nav-right  nav-top-fixed background-login     responsive remove-navbar front-layout   clearfix" data-active="login-page "  data-smooth-scrolling="1">     
        <div class="vd_body">
            <!-- Header Start -->
            <header class="header-2" id="header">
                <div class="vd_top-menu-wrapper vd_bg-white light-top-menu">
                    <div class="container">
                        <div class="vd_top-nav vd_nav-width  ">
                            <div class="vd_panel-header">
                                <div class="logo">
                                    <a href="<?php echo base_url(); ?>"><img alt="logo" src="<?= $this->config->item('image_path') ?>logo.png"></a>
                                </div>
                                <!-- logo -->
                                <div class="vd_panel-menu visible-sm visible-xs">
                                    <span class="menu visible-xs" data-action="submenu">
                                        <i class="fa fa-bars"></i>
                                    </span>                                 
                                </div>                                     
                                <!-- vd_panel-menu -->
                            </div>
                            <!-- vd_panel-header -->

                        </div>    
                        <div class="vd_container" style="height: 80px;">
                            <div class="row">
                                <div class="col-sm-8 col-xs-12">
                                    <div class="vd_mega-menu-wrapper horizontal-menu">
                                        <div class="vd_mega-menu">                
                                            <ul class="mega-ul nav">   
                                                    
                                            </ul>
                                            <!-- Head menu search form ends -->                         </div>
                                    </div>                    
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="vd_mega-menu-wrapper">
                                        <div class="vd_mega-menu pull-right">
                                            <ul class="mega-ul">
                                                <li id="top-menu-1" class="one-icon mega-li"> 
                                                    <a href="<?php echo base_url(); ?>index.php?login" class="btn vd_btn vd_bg-yellow font-semibold">Login</a>	
                                                </li>
                                                <li id="top-menu-2" class="one-icon mega-li"> 
                                                    <a href="<?php echo base_url(); ?>index.php?register" class="btn vd_btn  vd_bg-yellow font-semibold">Register</a>	
                                                </li>

                                            </ul>
                                            <!-- Head menu search form ends -->                         
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- container --> 
                </div>
                <!-- vd_primary-menu-wrapper --> 

            </header>
            <!-- Header Ends --> 
            <div class="content">


            </div>
            <!-- content -->

            <!-- Middle Content End --> 




        </div>
        <!-- .vc_body END  -->
        <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

        <!--
        <a class="back-top" href="#" id="back-top"> <i class="icon-chevron-up icon-white"> </i> </a> -->

        <!-- Javascript =============================================== --> 
        <!-- Placed at the end of the document so the pages load faster --> 
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script> 
        <!--[if lt IE 9]>
          <script type="text/javascript" src="js/excanvas.js"></script>      
        <![endif]-->
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>bootstrap.min.js"></script> 
        <script type="text/javascript" src='<?= $this->config->item('custom_plugin') ?>jquery-ui/jquery-ui.custom.min.js'></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>caroufredsel.js"></script> 
        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>plugins.js"></script>

        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>breakpoints/breakpoints.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>dataTables/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>prettyPhoto-plugin/js/jquery.prettyPhoto.js"></script> 

        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>tagsInput/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>bootstrap-switch/bootstrap-switch.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>blockUI/jquery.blockUI.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>pnotify/js/jquery.pnotify.min.js"></script>

        <script type="text/javascript" src="<?= $this->config->item('js_path') ?>theme.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('asset') ?>custom/custom.js"></script>

        <!-- Specific Page Scripts Put Here -->
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>stellar/jquery.stellar.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>waypoints/waypoints.min.js"></script>
        <script type="text/javascript" src="<?= $this->config->item('custom_plugin') ?>jquery-easing/jquery.easing.1.3.js"></script>

        <script src="<?= $this->config->item('custom_plugin') ?>layerslider/js/greensock.js" type="text/javascript"></script>
        <!-- LayerSlider script files -->
        <script src="<?= $this->config->item('custom_plugin') ?>layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
        <script src="<?= $this->config->item('custom_plugin') ?>layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {

                "use strict";

                var options = {
                    type: "POST",
                    url: $("#contact-form-widget").attr('action'),
                    dataType: "json",
                    success: function (data) {
                        if (data.response == "success") {
                            $("#contact-form-result div").addClass('hidden');
                            $("#contact-form-result #success").removeClass('hidden');
                        } else if (data.response == "error") {
                            $("#contact-form-result div").addClass('hidden');
                            $("#contact-form-result #error").removeClass('hidden');
                            $("#contact-form-result #error").append(data.message);
                        } else if (data.response == "empty") {
                            $("#contact-form-result div").addClass('hidden');
                            $("#contact-form-result #empty").removeClass('hidden');
                        } else if (data.response == "unexpected") {
                            $("#contact-form-result div").addClass('hidden');
                            $("#contact-form-result #unexpected").removeClass('hidden');
                        }
                        $("#contact-form-widget").find('#contact-form-submit #spin').remove();
                        $("#contact-form-widget").find('#contact-form-submit').removeClass('disabled').removeAttr('disabled').blur();

                        $("#contact-form-widget").fadeOut(500, function () {
                            $('#contact-form-result').fadeIn(500);
                        });
                    },
                    error: function () {
                        $("#contact-form-result div").addClass('hidden');
                        $("#contact-form-result #unexpected").removeClass('hidden');
                    }
                };

                $("#contact-form-widget").validate({
                    submitHandler: function (form) {
                        $(form).find('#contact-form-submit').prepend('<i id="spin" class="fa fa-spinner fa-spin mgr-10"></i>').addClass('disabled').attr('disabled');
                        $(form).ajaxSubmit(options);
                    },
                    success: function (form) {
                    }
                });


                $(".vd_testimonial .vd_carousel").carouFredSel({
                    prev: {
                        button: function ()
                        {
                            return $(this).parent().parent().children('.vd_carousel-control').children('a:first-child')
                        }
                    },
                    next: {
                        button: function ()
                        {
                            return $(this).parent().parent().children('.vd_carousel-control').children('a:last-child')
                        }
                    },
                    scroll: {
                        fx: "crossfade",
                        onBefore: function () {
                            var target = "#front-1-clients";
                            $(target).css("transition", "all .5s ease-in-out 0s");
                            if ($(target).hasClass("vd_bg-soft-yellow")) {
                                $(target).removeClass("vd_bg-soft-yellow");
                                $(target).addClass("vd_bg-soft-red");
                            } else
                            if ($(target).hasClass("vd_bg-soft-red")) {
                                $(target).removeClass("vd_bg-soft-red");
                                $(target).addClass("vd_bg-soft-blue");
                            } else
                            if ($(target).hasClass("vd_bg-soft-blue")) {
                                $(target).removeClass("vd_bg-soft-blue");
                                $(target).addClass("vd_bg-soft-green");
                            } else
                            if ($(target).hasClass("vd_bg-soft-green")) {
                                $(target).removeClass("vd_bg-soft-green");
                                $(target).addClass("vd_bg-soft-yellow");
                            }
                        }
                    },
                    width: "auto",
                    height: "responsive",
                    responsive: true

                });

                var slide = $('.slide-waypoint');

                //Setup waypoints plugin
                slide.waypoint(function (direction) {
                    //  		alert('Direction example triggered scrolling ' + direction);
                    //cache the variable of the data-waypoint attribute associated with each slide
                    var dataslide = $(this).attr('data-waypoint');



                    //If the user scrolls up change the navigation link that has the same data-waypoint attribute as the slide to active and 
                    //remove the active class from the previous navigation link 
                    /*			if (direction === 'down') {	
                     resetActive();
                     $('.vc_primary-menu  ul li a[data-waypoint="' + dataslide + '"]').parent().addClass('active');		
                     }
                     else {
                     resetActive();
                     $('.vc_primary-menu  ul li a[data-waypoint="' + dataslide + '"]').parent().prev().addClass('active');						
                     }
                     */

                }, {offset: 0});



                $(".feature-item, .vd_gallery .gallery-item").css("opacity", 0);


                $("#front-1-services").waypoint(function () {
                    $(".feature-1").delay().queue(function () {
                        $('.feature-1').addClass("animated fadeInRightBig");
                    });
                    $(".feature-3").delay(200).queue(function () {
                        $('.feature-3').addClass("animated fadeInRightBig");
                    });
                    $(".feature-5").delay(400).queue(function () {
                        $('.feature-5').addClass("animated fadeInRightBig");
                    });
                    $(".feature-2").delay(600).queue(function () {
                        $('.feature-2').addClass("animated fadeInRightBig");
                    });
                    $(".feature-4").delay(800).queue(function () {
                        $('.feature-4').addClass("animated fadeInRightBig");
                    });
                    $(".feature-6").delay(1000).queue(function () {
                        $('.feature-6').addClass("animated fadeInRightBig");
                    });

                }, {offset: 600});

                $(".vd_gallery").waypoint(function () {
                    $(".vd_gallery .gallery-1").queue(function () {
                        $('.vd_gallery .gallery-1').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-2").delay(200).queue(function () {
                        $('.vd_gallery .gallery-2').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-3").delay(400).queue(function () {
                        $('.vd_gallery .gallery-3').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-4").delay(600).queue(function () {
                        $('.vd_gallery .gallery-4').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-5").delay(800).queue(function () {
                        $('.vd_gallery .gallery-5').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-6").delay(1000).queue(function () {
                        $('.vd_gallery .gallery-6').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-7").delay(1200).queue(function () {
                        $('.vd_gallery .gallery-7').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-8").delay(1400).queue(function () {
                        $('.vd_gallery .gallery-8').addClass("animated fadeInUp");
                    });
                    $(".vd_gallery .gallery-9").delay(1600).queue(function () {
                        $('.vd_gallery .gallery-9').addClass("animated fadeInUp");
                    });


                }, {offset: 600});


                //Create a function that will be passed a slide number and then will scroll to that slide using jquerys animate. The Jquery
                //easing plugin is also used, so we passed in the easing method of 'easeInOutQuint' which is available throught the plugin.
                function goToByScroll(dataslide) {
                    if (dataslide == "home") {
                        $('html,body').animate({scrollTop: 0}, 1500, 'easeInOutQuint');
                    } else {
                        $('html,body').animate({
                            scrollTop: $('.slide-waypoint[data-waypoint="' + dataslide + '"]').offset().top
                        }, 1500, 'easeInOutQuint');
                    }
                }


                $('.vd_top-menu-wrapper .horizontal-menu .nav > li >  a[data-waypoint]').click(function (e) {
                    e.preventDefault();

                    var dataslide = $(this).attr('data-waypoint');
                    goToByScroll(dataslide);
                });

                jQuery("#layerslider").layerSlider({
                    responsive: false,
                    responsiveUnder: 1280,
                    layersContainer: 1280,
                    skin: 'noskin',
                    hoverPrevNext: false,
                    skinsPath: 'plugins/layerslider/skins/'
                });
            });
        </script>
        <!-- Specific Page Scripts END -->




        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->


    </body>
</html>