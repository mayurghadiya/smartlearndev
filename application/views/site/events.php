<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>Unversity Events</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sub Header End --> 
<!-- Main Start -->
<div class="main-section">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="page-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                    <div class="cs-section-title" style="margin-bottom:45px;">
                                        <h2>UPCOMING EVENTS</h2>
                                        <p>University upcoming events list</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($events as $row) { ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                <div class="cs-event list">
                                    <div class="col-md-3">
                                        <div class="cs-media">
                                            <figure><a href="#"><img src="<?php echo base_url(); ?>site_assets/extra-images/event-post-1.jpg" alt="" /></a></figure>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="cs-text">
                                            <div class="cs-post-title">
                                                <span><?php echo date('F d, Y @ h:i A', strtotime($row->event_date)) ?></span>
                                                <h3><a href="#"><?php echo $row->event_name; ?></a></h3>
                                            </div>
                                            <span class="cs-location"><i class="cs-color icon-location-pin"></i><?php echo $row->event_location; ?></span>
                                            <p><?php echo substr($row->event_desc, 0, 500); ?></p>
                                            
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