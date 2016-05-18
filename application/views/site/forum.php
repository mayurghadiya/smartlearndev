<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>Forum</h1>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-event-detail-holder">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="cs-event-detail-heading" style="display: none;">
                                    <h6 class="cs-color"><i class="icon-uniF119"></i>Description</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                <?php foreach(@$forums as $forum): ?>
                                <div class="cs-event-detail-description">
                                    <div class="cs-post-title">
                                        <h3 class="cs-color"><i class="icon-uniF119"></i><a href="<?php echo base_url().'site/topics/'.$forum->forum_id; ?>"><?php echo $forum->forum_title; ?></a></h3>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Main End --> 
   