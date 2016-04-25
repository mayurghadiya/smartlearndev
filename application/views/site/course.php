<!-- Sub Header Start -->  
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1><?php echo $course_details->d_name; ?></h1>
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
                <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="cs-find-search">
                        <h6>Find your course</h6>
                        <span>Ranked as one of the world's most</span>
                        <form>
                            <div class="cs-label-area">
                                <input id="course-id" type="radio" name="course" />
                                <label for="course-id">Course ID</label>
                                <input id="course-name" type="radio" name="course" />
                                <label for="course-name">Course Name</label>
                            </div>
                            <div class="cs-input-area">
                                <div class="cs-input-holder"><i class="icon-search"></i><input type="text" placeholder="Enter Course name" /></div>
                                <select data-placeholder="Select Category" class="chosen-select" tabindex="5">
                                    <option>Select Category</option>
                                    <option>Select Category</option>
                                    <option>Select Category</option>
                                    <option>Select Category</option>
                                </select>
                            </div>
                            <ul class="cs-suggestions-list">
                                <li><i class="icon-keyboard_arrow_right"></i>Order your prospectus</li>
                                <li><i class="icon-keyboard_arrow_right"></i>A-Z courses</li>
                            </ul>
                            <button><i class="icon-search3"></i></button>
                        </form>
                    </div>
                    <div class="cs-listing-filters">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h6 class="panel-title">
                                        <a role="button" data-toggle="collapse"  href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Courses Types
                                        </a>
                                    </h6>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="cs-select-checklist">
                                            <ul class="cs-checkbox-list mCustomScrollbar" data-mcs-theme="dark">
                                                <?php
                                                foreach($courses as $course) { ?>
                                                <li>
                                                    <div>
                                                        <a href="<?php echo base_url('index.php?course/' . $course->d_id); ?>"><?php echo $course->d_name; ?></a>
                                                    </div>
                                                </li>
                                                <?php } ?>                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="page-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="row">
                        <?php foreach ($course_branch as $branch) { ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" data-tag="paid">
                                <div class="cs-courses courses-grid">
                                    <div class="cs-media">
                                        <figure><a href="<?php echo base_url('index.php?branch/' . $branch->course_id); ?>"><img src="<?php echo base_url(); ?>site_assets/extra-images/course-grid-img1.jpg" alt=""/></a></figure>
                                    </div>
                                    <div class="cs-text">
                                        <div class="cs-rating">
                                            <div class="cs-rating-star">
                                                <span class="rating-box" style="width:100%;"></span>
                                            </div>
                                        </div>
                                        <div class="cs-post-title">
                                            <h5><a href="<?php echo base_url('index.php?branch/' . $branch->course_id); ?>"><?php echo $branch->c_name; ?></a></h5>
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