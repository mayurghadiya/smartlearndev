

<!-- Banner Start --> 
<link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url().'assets/slide/'; ?>style.css" type="text/css" media="screen" />
<div class="page-section" style="">
 <div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php if(count($banner)) 
                    foreach($banner as $slide) : ?>
                <img src="<?php echo base_url().'uploads/bannerimg/'.$slide->banner_img; ?>" data-thumb="<?php echo base_url().'uploads/bannerimg/'.$slide->banner_img; ?>" <?php if($slide->slide_option!=""){ ?> data-transition="<?php echo $slide->slide_option; ?>" <?php } ?>  alt="" title="#htmlcaption<?php echo $slide->banner_id; ?>" />
                <?php endforeach; ?>
            </div>
              <?php if(count($banner)) 
                    foreach($banner as $slide2) : 
                  if($slide2->banner_title!=''){?>
            <div id="htmlcaption<?php echo $slide2->banner_id; ?>" class="nivo-html-caption">
                <strong> <?php echo $slide2->banner_title; ?></strong>
                    <p><?php echo $slide2->banner_desc; ?></p>
            </div>
                  <?php } ?>
            <?php endforeach; ?>
        </div>

    </div>
</div>
    
    <script type="text/javascript" src="<?php echo base_url().'assets/slide/'; ?>scripts/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/slide/'; ?>jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
               $('#slider').nivoSlider(
                       {
                           <?php if(count($banner))
                               foreach($banner as $slide1): ?>
                                      <?php if($slide1->pause_time!=""){ ?>     
                           pauseTime:<?php echo $slide1->pause_time; ?>, 
                                      <?php  } ?>
                                          <?php if($slide1->pause_on_hover!=""){ ?>     
                    pauseOnHover:<?php echo $slide1->pause_on_hover; ?>, 
                                          <?php } ?>
                                              <?php if($slide1->caption_opacity!=""){ ?>     
                    captionOpacity: <?php echo $slide1->caption_opacity; ?>,
                                              <?php  } ?>                                                 
                                                  
                                                  animSpeed: 200,
                                        


                    <?php endforeach; ?>
                }
                       );
    });
    </script>
<!-- Banner End --> 
<!-- Main Start -->
<div class="main-section">
    <div class="page-section" style="margin-bottom:45px;margin-top:-60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="cs-top-categories">
                        <li><a href="<?php echo base_url('index.php?branch/2'); ?>" style="background:#8a9045;"><i class="icon-uniF1032"></i>Master Of Engg.</a></li>
                        <li><a href="<?php echo base_url('index.php?branch/1'); ?>" style="background:#a88b60;"><i class="icon-uniF1022"></i>Bachelor Of Business</a></li>
                        <li><a href="<?php echo base_url('index.php?branch/9'); ?>" style="background:#3e769a;"><i class="icon-uniF1052"></i>Bachelor Of Engg.</a></li>
                        <li><a href="<?php echo base_url('index.php?branch/3'); ?>" style="background:#c16622;"><i class="icon-uniF1012"></i>Mba Double Masters</a></li>
                        <li><a href="<?php echo base_url('index.php?branch/7'); ?>" style="background:#896ca9;"><i class="icon-uniF1042"></i>IT</a></li>
                        <li><a href="<?php echo base_url('index.php?branch/5'); ?>" style="background:#dd9d13;"><i class="icon-uniF1002"></i>Business</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="widget cs-text-widget">
                        <div class="cs-text" style="background:#FFF;padding:0;">
                            <h2>College Events</h2>
                            <p>Text of the printing and typesetting best industry. Lorem Ipsum has been the nome industry's.
                                standard text ever.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <?php
                        foreach($events as $event) { ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="cs-event left">
                                <div class="cs-media">
                                    <span><strong><?php echo date('M', strtotime($event->event_date)) ?></strong><?php echo date('d', strtotime($event->event_date)) ?></span>
                                </div>
                                <div class="cs-text">
                                    <em><?php echo date('h:m A', strtotime($event->event_date)); ?></em>
                                    <h6 style="margin-bottom:10px;"><a href="#"><?php echo $event->event_name; ?></a></h6>
                                    <span><i class="icon-map-marker"></i><?php echo $event->event_location; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php } ?>                       
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="page-section" style="margin-bottom:30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-element-title" style="margin-bottom:30px;">
                        <h2>University Faculty</h2>
                    </div>
                </div>
                <ul class="cs-teamlist-slider">
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-team listing loop">
                            <div class="cs-media">
                                <figure>
                                    <a href="#"><img src="<?php echo base_url(); ?>site_assets/extra-images/xfaculty-01.jpg.pagespeed.ic.uUD9zrE4Bb.jpg" alt="#"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><a href="#" class="cs-color">Sarah Johnson</a></h5>
                                <span>Associate Professor of Anthropology</span>
                                <p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
                                <div class="cs-social-media">
                                    <ul>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-team listing loop">
                            <div class="cs-media">
                                <figure>
                                    <a href="#"><img src="<?php echo base_url(); ?>site_assets/extra-images/xfaculty-02.jpg.pagespeed.ic.9vagy2osqS.jpg" alt="#"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><a href="#" class="cs-color">Arthur Springs</a></h5>
                                <span>Associate Professor of Anthropology</span>
                                <p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
                                <div class="cs-social-media">
                                    <ul>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-team listing loop">
                            <div class="cs-media">
                                <figure>
                                    <a href="#"><img src="<?php echo base_url(); ?>site_assets/extra-images/xfaculty-01.jpg.pagespeed.ic.uUD9zrE4Bb.jpg" alt="#"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><a href="#" class="cs-color">Sarah Johnson</a></h5>
                                <span>Associate Professor of Anthropology</span>
                                <p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
                                <div class="cs-social-media">
                                    <ul>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-team listing loop">
                            <div class="cs-media">
                                <figure>
                                    <a href="#"><img src="<?php echo base_url(); ?>site_assets/extra-images/xfaculty-02.jpg.pagespeed.ic.9vagy2osqS.jpg" alt="#"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><a href="#" class="cs-color">Arthur Springs</a></h5>
                                <span>Associate Professor of Anthropology</span>
                                <p>Diet and health, human osteology,paleopathology/ epidemiology, human evolution, disease ecology, human adaptation, Stable.</p>
                                <div class="cs-social-media">
                                    <ul>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="pinterest"><i class="icon-pinterest3"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
                                        <li style="margin-right:5px !important;"><a href="#" data-original-title="google"><i class="icon-google4"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page-section" style="margin-bottom:80px;">
        <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="row cs-testimonial main-testimonial">
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-1.jpg.pagespeed.ic.TtS-RcU70J.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-2.jpg.pagespeed.ic.oPPrh9xq34.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-3.jpg.pagespeed.ic.wPxdI7KVu1.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-4.jpg.pagespeed.ic.uQ6Lk6d-Ew.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-5.jpg.pagespeed.ic.jVMol7j23-.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-1.jpg.pagespeed.ic.TtS-RcU70J.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-2.jpg.pagespeed.ic.oPPrh9xq34.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-3.jpg.pagespeed.ic.wPxdI7KVu1.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-4.jpg.pagespeed.ic.uQ6Lk6d-Ew.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-img-5.jpg.pagespeed.ic.jVMol7j23-.jpg" alt=""/>
                            <figcaption>
                                <div class="cs-text">
                                    <p>“Diet and health, human osteology, paleopathology/ epidemiology, human evolution, disease ecology,</p>
                                    <div class="cs-media">
                                        <figure><img src="<?php echo base_url(); ?>site_assets/extra-images/xtestimonial-sm-img-1.jpg.pagespeed.ic.ycfNTg1QdH.jpg" alt=""/></figure>
                                    </div>
                                    <div class="cs-info">
                                        <h6><a href="#">Charlie Waite</a></h6>
                                        <span>Manager of University</span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-section" style="margin-bottom:40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-fancy-heading" style="margin-bottom:40px;">
                        <h6 style="font-size:14px !important; color:#999 !important; text-transform:uppercase !important;">Universities Accepting Our Recent Graduates</h6>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="cs-graduate-slider">
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo1.jpg.pagespeed.ic.IfdYciHoiv.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo2.jpg.pagespeed.ic.wKvAxHC9Yh.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo3.jpg.pagespeed.ic.U_sjCp0ME9.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo4.jpg.pagespeed.ic.HZZ0Xr-cIP.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo5.jpg.pagespeed.ic.8Uv5xUR9s2.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo6.jpg.pagespeed.ic.OEOmRGi60j.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo5.jpg.pagespeed.ic.8Uv5xUR9s2.jpg" alt=""/> </figure>
                            </div>
                        </li>
                        <li>
                            <div class="cs-media">
                                <figure> <img src="<?php echo base_url(); ?>site_assets/extra-images/xgraduate-logo5.jpg.pagespeed.ic.8Uv5xUR9s2.jpg" alt=""/> </figure>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main End --> 

