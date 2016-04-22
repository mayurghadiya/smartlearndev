 <link rel="stylesheet" href="assets/gallery/css/style.css">    

    <!-- FONTS -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
    <!-- MODERNIZER -->
    <script src="assets/gallery/js/modernizr-2.8.3.min.js"></script>


    <!--================================
        SERVICES SECTION 
    =================================-->
 <!--================================
        Services SECTION 
    =================================-->
    <section class="do-portfolio-section do-section">
        <div class="container">
            <div class="row">
                <!-- SECTION HEADING -->
                <div class="do-section-heading">
                    <h1>GALLERY</h1>
                    <p class="do-section-subheading">OUR PHOTO GALLERY</p>
                </div>
                <!-- SECTION HEADING END -->

                <?php 
                $images = '';
              
                foreach($gallery as $row): ?>
                <?php $images[] =  $row->gallery_img;
                
                ?>
                
                <?php endforeach; ?>
                  <div class="do-portfolio-works do-portfolio-one-px">
                <?php 
                foreach($images as $img):
                    $explode = explode(",",$img);
                    foreach($explode as $main_img): 
                        ?>
                         
                    <div class="do-work-item">
                        <div class="do-work-item-inner-wrap appear fadeIn" data-wow-duration="1.5s" data-wow-delay=".3s">
                            <img src="uploads/photogallery/<?php echo $main_img; ?>" alt="">
                            <div class="do-work-item-hover">
                                <a href="javascript:void(0)" class="do-single-page-link"></a>
                                <div class="do-work-item-details">
                                    <h3 class="do-work-item-title">
                                        
                                    </h3>
                                   
                                </div>
                                <a href="uploads/photogallery/<?php echo $main_img; ?>" class="do-work-item-popup"></a>
                            </div>
                        </div>
                    </div>

                
                   <?php  endforeach;
                    
                    
                endforeach;
                ?>
                      </div>
                <!-- WORKS -->
             
                <!-- WORKS END -->
            </div>
        </div>

 
    </section>
    <!-- PORTFOLIO SECTION END -->

             <!--   SCRIPTS
    ************************************ -->
    <!-- JQUERY -->    		
    <script src="assets/gallery/js/jquery-1.11.3.min.js"></script>    
    <script src="assets/gallery/js/didizoo.js"></script>
    <!-- Google Map -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/google-map-init.js"></script> 
 -->    
    <!-- PLUGINS -->
    <script src="assets/gallery/js/plugins.js"></script>
    <script src="assets/gallery/js/vivus.js"></script>    
    <!-- CUSTOM SCRIPTS -->    
    <script src="assets/gallery/js/main.js"></script>