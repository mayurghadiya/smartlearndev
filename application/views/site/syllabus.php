<!-- Sub Header Start -->  
<div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-page-title">
                    <h1>Syllabus</h1>
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
                            <div class="cs-column-text">
                                <h2><strong class="cs-color">Syllabus</strong></h2>
                               
                                <div class="cs-liststyle">
                                    <ul class="icon-listing">
                                        <?php if(count($syllabus)) 
                                            foreach ($syllabus as $file):?>
                                        <li><i class="icon-check3 cs-color"></i><span><a href="<?php echo base_url().'uploads/syllabus/'.$file->syllabus_filename; ?>" class="nounderline" title="<?php echo $file->syllabus_title; ?>" download=""><img src="<?php echo base_url().'assets/images/pdf-icon.jpg' ?>" height="32" width="32" /> <?php echo $file->syllabus_title; ?> </a>   <?php if($file->syllabus_desc!="") {?> ( <?php echo $file->syllabus_desc; ?> ) <?php } ?></span></li>                               
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
     
    
             
</div>
<!-- Main End --> 