<link rel="stylesheet" href="assets/css/neon-core.css">
<link rel="stylesheet" href="assets/css/neon-theme.css">
<link rel="stylesheet" href="assets/css/neon-forms.css">

<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo ucwords("Home");?></a> </li>
                        <li><a href="#"><?php echo ucwords("Pages");?></a> </li>
                        <li class="active"><?php echo ucwords("System Settings");?></li>
                    </ul>                  
                </div>
            </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("System Setting");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">

                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#system" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("System Setting");?>
                                </a>
                            </li>
                            <li>
                                    <a href="#theme_setting" data-toggle="tab"><!--<i class="entypo-plus-circled"></i>-->
                                    <?php echo ucwords("Theme Setting");?>
                                </a>
                            </li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="system">
                               
                                <?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update', array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'systemform', 'target' => '_top', 'enctype' => 'multipart/form-data'));
                                ?>
                                <div class="col-md-12">					
                                    <div class="panel panel-primary" >

                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php echo ucwords("System Setting");?>
                                            </div>
                                        </div>
                                        <div class="panel-body">  
                                             <div class="">
                                    <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                </div>
                                            <div class="form-group">
                                                <label  class="col-sm-3 control-label"><?php echo ucwords("System Name");?><span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="system_name" id="system_name" value="<?php echo $this->db->get_where('system_setting', array('type' => 'system_name'))->row()->description; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-3 control-label"><?php echo ucwords("Phone");?><span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="phone" id="system_phone" value="<?php echo $this->db->get_where('system_setting', array('type' => 'phone'))->row()->description; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-3 control-label"><?php echo ucwords("Paypal Email");?><span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="paypal_email" id="paypal_email" value="<?php echo $this->db->get_where('system_setting', array('type' => 'paypal_email'))->row()->description; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-3 control-label"><?php echo ucwords("Currency");?><span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="currency" id="currency" value="<?php echo $this->db->get_where('system_setting', array('type' => 'currency'))->row()->description; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-3 control-label"><?php echo ucwords("System Email");?><span style="color:red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="system_email" id="system_email" value="<?php echo $this->db->get_where('system_setting', array('type' => 'system_email'))->row()->description; ?>">
                                                </div>
                                            </div>	
                                            <div class="form-group">
                                                <label for="field-1" class="col-sm-3 control-label"><?php echo ucwords("Photo");?></label>                          
                                                <div class="col-sm-9">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                            <img src="<?php echo $this->crud_model->get_image_url('system', $this->session->userdata('admin_id')); ?>" id="blah" alt="...">
                                                        </div>
                                                        <!--<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>-->
                                                        <div>
                                                            <span class="btn btn-white btn-file">                                        
                                                                <input type="file" id="imgInp" name="userfile"  accept="image/*"  >
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>	 	
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("save");?></button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                                </form>	

                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-pane box" id="theme_setting" style="padding: 5px">

                                <div class="col-md-12">			
                                    <div class="panel panel-primary" >

                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <?php echo ucwords("Theme Setting");?>
                                            </div>
                                        </div>
                                        <?php 
                                        $skin_colour = "";
                                        foreach($settings as $set){
                                        if($set['type']=="skin_colour"){
                                           $skin_colour=$set['description'];
                                        } 
                                        
                                        }
                                        
                                        ?>

                                        <div class="panel-body">

                                            <div class="gallery-env">
                                                <div class="row">
                                                <div class="col-sm-4">
                                                    <article class="album">
                                                        <header>
                                                            <a href="#" id="theme.min.css" <?php if($skin_colour=="theme.min.css"){?> style="opacity: 0.3" <?php } ?>>
                                                                <img src="<?php echo base_url().'assets/images/system_img/default.png' ?>"  />
                                                            </a>
                                                            <a id="theme.min.css" class="album-options" href="#">
                                                            <i class="entypo-check"></i>
                                                            Select Theme
                                                            </a>
                                                        </header>
                                                    </article>
                                                </div>
                                                <div class="col-sm-4">
                                                    <article class="album">
                                                        <header>
                                                            <a href="#" id="theme_gold.min.css" <?php if($skin_colour=="theme_gold.min.css"){?> style="opacity: 0.3;" <?php } ?>>
                                                                <img src="<?php echo base_url().'assets/images/system_img/gold.png' ?>" />
                                                            </a>
                                                            <a id="theme_gold.min.css" class="album-options" href="#">
                                                            <i class="entypo-check"></i>
                                                            Select Theme
                                                            </a>
                                                        </header>
                                                    </article>
                                                </div>
                                                <div class="col-sm-4">
                                                    <article class="album">
                                                        <header>
                                                            <a href="#" id="theme_blue.min.css"  <?php if($skin_colour=="theme_blue.min.css"){?> style="opacity: 0.3" <?php } ?>>
                                                                <img src="<?php echo base_url().'assets/images/system_img/blue.png' ?>"   />
                                                            </a>
                                                               <a id="theme_blue.min.css" class="album-options" href="#">
                                                            <i class="entypo-check"></i>
                                                            <?php echo ucwords("Select Theme");?>
                                                            </a>  
                                                        </header>
                                                    </article>
                                                </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-sm-4" >
                                                    <article class="album last">
                                                        <header>
                                                            <a href="#" id="theme_green.min.css"  <?php if($skin_colour=="theme_green.min.css"){?> style="opacity: 0.3" <?php } ?>>
                                                                  <img src="<?php echo base_url().'assets/images/system_img/green.png' ?>"   />
                                                            </a>
                                                             <a id="theme_green.min.css" class="album-options" href="#">
                                                                <i class="entypo-check"></i>
                                                                Select Theme
                                                            </a>
                                                        </header>
                                                    </article>
                                                </div>	
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>		

                            <!----CREATION FORM ENDS-->	


                            <!----TABLE LISTING ENDS--->
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 

    </div>
    <!-- .vd_content-section --> 

</div>
<!-- .vd_content --> 
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });
</script>

<script type="text/javascript">
    $(".gallery-env").on('click', 'a', function () {
        skin = this.id;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/system_settings/change_skin/' + skin,
            success: function()
            {
                window.location = '<?php echo base_url(); ?>index.php?admin/system_settings/';
            }
        });
    });
</script>