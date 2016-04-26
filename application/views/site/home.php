

<!-- Banner Start --> 
<div class="page-section" style="background:url(<?php echo base_url(); ?>site_assets/extra-images/xbanner-img.jpg.pagespeed.ic.Cyn7NvNsmA.jpg) no-repeat;background-size:cover;padding:212px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-column-text">
                    <span style="display:inline-block;padding:10px 20px;background:rgba(0,0,0,0.8);color:#FFF;font-size:18px;margin-bottom:22px;">What would you like to learn?</span>
                    <h1 style="color:#ffffff !important;line-height:64px !important;text-transform:capitalize !important;">Brighton Experience</h1>
                    <p style="font-size:36px !important;line-height:42px !important;color:#FFF !important;font-weight:400 !important;margin-bottom:30px;">an inspiring place to work and study</p>
                    <a style="font-size:13px;font-weight:700;line-height:19px;padding:16px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="#">About Smart Study</a>
                </div>
            </div>
        </div>
    </div>
</div>
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

