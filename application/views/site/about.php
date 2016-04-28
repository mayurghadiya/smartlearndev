<!-- Sub Header Start -->  
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>About us</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sub Header End -->

<!-- Main Start -->
<div class="main-section">
   
    <div class="page-section" style="margin-bottom:85px;">
        <div class="container">
            <div class="row">
                <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="image-frame">
                                <div class="cs-media">
                                    <figure><img src="<?php echo base_url(); ?>uploads/University_main_building.jpg" alt="" /></figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="cs-column-text">
                                <h2>About <strong class="cs-color">university</strong></h2>
                                <p>Habitasse volutpat leo sodales sem himenaeos nulla class viverra habitant morbi posuere sapien ullamcorper sed fusce maecenas volutpat odio sit primis at aenean, auctor curabitur porttitor viverra maecenas curabitur blandit hendrerit rutrum tempus pretium vulputate pulvinar.</p>
                                <div class="cs-liststyle">
                                    <ul class="icon-listing">
                                        <li><i class="icon-check3 cs-color"></i><span>Materiality & Interpretation (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Design Management and Cultural Enterprise (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Experience Design (XD) (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>MA Final Project (60 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Sound Design; Social Media and SEO (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Information Technology (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Accounting &amp; Commerce (30 credits)</span></li>
                                        <li><i class="icon-check3 cs-color"></i><span>Advance Diploma in Business Application (30 credits)</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
     
    <div class="page-section" style="margin-bottom:40px;">
        <div class="container">
            <div class="row">
                <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="cs-section-title center">
                                <h2>UNIVERSITY PEOPLES</h2>
                                <p>Quisque porta, elit sed lacinia rutrum, nulla velit scelerisque sem, convallis molestie ante justo eget erat</p>
                            </div>
                        </div>
                        <?php
                        foreach($university_peoples as $row) { ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="cs-team grid">
                                <div class="cs-media">
                                    <figure>
                                        <a href="#"><img src="<?php echo base_url('uploads/system_image/' . $row->people_photo); ?>" alt="#"></a>
                                    </figure>
                                </div>
                                <div class="cs-text">
                                    <h5><a href="#" class="cs-color"><?php echo $row->people_name; ?></a></h5>
                                    <span><?php echo $row->people_designation; ?></span>
                                    <div class="cs-social-media">
                                        <ul>
                                            <li><a href="" title="<?php echo $row->people_phone; ?>" data-original-title="google"><i class="icon-phone3"></i></a></li>
                                            <li><a href="<?php echo $row->facebook_link; ?>" title="facebook" target="_blank" data-original-title="facebook"><i class="icon-facebook2"></i></a></li>
                                            <li><a href="<?php echo $row->twitter_link; ?>" title="twitter" target="_blank" data-original-title="twitter"><i class="icon-twitter2"></i></a></li>
                                            <li><a href="<?php echo $row->google_plus_link; ?>" title="google+" target="_blank" data-original-title="google"><i class="icon-google4"></i></a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>
<!-- Main End --> 