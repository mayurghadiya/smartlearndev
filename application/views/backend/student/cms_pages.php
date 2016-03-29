<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1><?php echo $cms_page->am_title; ?></h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('index.php?student/dashboard'); ?>">Home</a> </li>
                <li><a href="">CMS Page</a> </li>
                <li class="active"><?php echo $cms_page->am_title; ?></li>
            </ul>
        </div>

    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="container">
            <div class="vd_content clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel widget">
                            <div class="panel-heading vd_bg-grey">
                                <h3 class="panel-title"> 
                                    <span class="menu-icon"> 
                                        <i class="fa fa-pencil"></i> 
                                    </span><?php echo $cms_page->am_title; ?>
                                </h3>
                            </div>
                            <div  class="panel-body">                  
                                <?php if ($cms_page->is_form) { ?>
                                    <form action="" class="form-horizontal" method="post">
                                        <?php echo $cms_page->am_content; ?>
                                    </form>
                                <?php } else { ?>
                                    <?php echo $cms_page->am_content; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- Panel Widget --> 
                    </div>
                    <!-- col-sm-12--> 
                </div>
                <!-- row --> 
            </div>
        </div>
    </div>
</div>