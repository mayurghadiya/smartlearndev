
<!-- Sub Header Start -->
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>Forum Topic Discussion</h1>
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
                              <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                <div class="cs-event-detail-heading" style="display: none;">
                                    <h6 class="cs-color"><i class="icon-uniF119"></i>Description</h6>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">                                                               
                                <?php foreach(@$topics as $topic): ?>
                                <div class="cs-event-detail-description">
                                    <div class="cs-post-title">
                                        <h3 class="cs-color"><i class="icon-uniF119"></i><a href="<?php echo base_url().'site/viewtopic/'.$topic->forum_topic_id; ?>"><?php echo $topic->forum_topic_title; ?></a></h3>
                                        <p><?php echo $topic->forum_topic_desc; ?></p>
                                    </div>
                                </div>
                                <?php foreach(@$comments as $comment): ?>
                                <div class="cs-event-detail-description">
                                    <div class="cs-post-title">                                        
                                        <?php  $path =  roleimgpath($comment->user_role,$comment->user_role_id);?>
                                        <p>  
                                         <img src="<?php echo base_url().$path; ?>" height="50" width="50" />
                                        <?php echo "  ".$comment->forum_comments;  
                                              echo "<br>";
                                              echo roleuserdatatopic($comment->user_role,$comment->user_role_id).' '.date("F d, Y h:i:s A",  strtotime($comment->created_date));
                                        ?>
                                        </p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                
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
                                <div id="collapseOne" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="cs-contact-form">
                                    <div class="cs-section-title">                                       
                                       
                                    </div>
                                            <?php if($this->session->userdata('login_user_id')){ ?>
                                            <div class="form-holder">
                                        <div class="row">
                                            <form action="<?php echo base_url(); ?>site/comment/create" method="post">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <input type="hidden" name="forum_topic_id" value="<?php echo $param; ?>" />
                                                       
                                                    </div>
                                                </div>
                                                <div class="cs-form-holder">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                                        
                                                    </div>
                                                    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-holder"> <i class="icon-pencil-square-o"></i>
                                                            <textarea name="discussion" required="" placeholder="Join the discussion"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-md-12">
                                                    <div class="cs-field">
                                                        <div class="cs-btn-submit"> 
                                                            <input class="cs-bgcolor" type="submit" value="Post Comment" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                            <?php }else{?>
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
                                <?php endforeach; ?>
                                
                                
                            </div>
                        </div>
                    </div>
                    
                        </div>
                
            </div>
        </div>
    </div>
    <!-- Main End --> 
   