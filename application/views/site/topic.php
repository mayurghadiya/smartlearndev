<style>
    .cs-contact-form .cs-btn-submit input[type="submit"] {
    border: 0 none;
    border-radius: 3px;
    color: #fff !important;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    height: 45px;
    letter-spacing: 1.5px;
    line-height: 16px;
    position: relative;
    text-align: center;
    text-transform: uppercase;
    transition: all 0.3s ease 0s;
    width: 168px;
}
</style>
<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>Forum Topics</h1>
                    <h2><?php echo @$forum[0]->forum_title; ?></h2>
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
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                         <div class="cs-listing-filters">
                              <?php
                                        $message = $this->session->flashdata('message');
                                        if($message != '') { ?>
                                        <div class="alert alert-success">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <p><?php echo $message; ?></p>
                                        </div>
                                        <?php } ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h6 class="panel-title col-sm-4" style="background: #3488bf;">
                                        <a style="color:#fff !important;" role="button" data-toggle="collapse"  href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Start New Topic
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse out fade" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="cs-contact-form">
                                    <div class="cs-section-title">
                                        <h2>Create Topics</h2>
                                       
                                    </div>
                                    <div class="form-holder">
                                        <div class="row">
                                            <?php if($this->session->userdata('login_user_id')){ ?>
                                            <form action="<?php echo base_url(); ?>site/crudtopic" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <input type="hidden" name="forum_id" value="<?php echo $param; ?>" />
                                                        <div class="cs-form-holder">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                                                
                                                                <label>Subject</label>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input-holder"> <i class="icon-user"></i>
                                                                    <input name="subject" required="" type="text" placeholder="Subject">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cs-form-holder">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label>Discussion</label>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-holder"> <i class="icon-pencil-square-o"></i>
                                                            <textarea name="discussion" required="" placeholder="Start the discussion here"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                                    <div class="cs-field">
                                                        <div class="cs-btn-submit"> 
                                                            <input class="cs-bgcolor" type="submit" value="Post topic now" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php }else{ ?>
                                              Please login to join the discussion forums.                                                 
                                    <ul>
                                        <li><a style="color:#3488bf;" href="<?php echo base_url(); ?>site/user_login"><i class="icon-login"></i>Login</a></li>
                                        </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="cs-event-detail-heading">
                                    <h6 class="cs-color"></h6>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <?php foreach(@$topics as $topic): ?>
                                <div class="cs-event-detail-description" style="background:#3488bf; padding: 2px 2px 0px 10px;">
                                    <div class="cs-post-title">
                                        <h3 class="cs-color"><a style="color:#fff !important;" href="<?php echo base_url().'site/viewtopic/'.$topic->forum_topic_id; ?>"><?php echo $topic->forum_topic_title; ?></a></h3>
                                        <p style="color:#fff !important;"> <?php echo "Created By ".roleuserdatatopic($topic->user_role,$topic->user_role_id);                                       
                                       
                                        ?> <span><?php echo date("F d, Y h:i:s A",  strtotime($topic->created_date)); ?></span>
                                            
                                        </p>
                                       
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
   