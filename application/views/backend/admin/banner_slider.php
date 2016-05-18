<!-- Middle Content Start -->  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("media");?></li>
                         <li><?php echo ucwords("Banner Slider");?></li>
                    </ul>   
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Banner Slider</h1>

                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   Banner Slider
                                </a></li>
                                <li >
                                <a href="#general" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   Slider General Setting
                                </a></li>
                                
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">		
                                
                                    
                                    <div class="panel-body table-responsive" id="getresponse">
                                        <table class="table table-striped" id="survey-table">
                                            <thead>
                                                <tr>
                                                    <th><div>#</div></th>                                                                                              
                                                    <th><div>Title</div></th>  
                                                    <th><div>Description</div></th>                                                                                  
                                                    <th><div>Action</div></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                foreach ($banners as $row):
                                                    ?>
                                                    <tr>
                                                       <td><?php echo $count++; ?></td>    
                                                    <td><?php if($row->banner_title!=""){ echo $row->banner_title; }else{ echo "No-Title"; } ?></td>    
                                                    <td><?php echo $row->banner_desc; ?></td>  
                                                    
                                                  <td>  <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_banner/<?php echo $row->banner_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?media/bannerslider/delete/<?php echo $row->banner_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	</td>
                                                       
                                                    </tr>
                                                <?php endforeach; 
                                               ?>                        
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
                                 
                                <!----CREATION FORM ENDS-->
                            </div>
                             <div class="tab-pane box" id="general" style="padding: 5px">
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?media/bannerslider/general', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmgeneral', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        
                                      
                              
                                       
                                        
                                          <div class="form-group">
                                                    <label class="col-sm-3 control-label">Pause Time <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        
                                                        <input type="text" class="form-control" name="pause_time" placeholder="Ex 4000" id="pause_time" value="<?php if(!empty($general)) { echo $general[0]->pause_time; } ?>" />
                                                        
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Animation Speed <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">                                                        
                                                        <input type="text" placeholder="Ex 340" class="form-control" name="anim_speed" id="anim_speed" value="<?php if(!empty($general)) {  echo $general[0]->anim_speed; } ?>" />
                                                    </div>
                                         </div>
                                        
                                        
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Pause On Hover  <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="pause_on_hover" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="true" <?php  if(!empty($general)) {  if($general[0]->pause_on_hover=="true"){ echo "selected=selected";} } ?>>True</option>
                                                            <option value="false"  <?php  if(!empty($general)) {  if($general[0]->pause_on_hover=="false"){ echo "selected=selected";} } ?>>False</option>
                                                        </select>
                                                    </div>
                                                </div>
                                         <div class="form-group">
                                                    <label class="col-sm-3 control-label">Caption Opacity  <span style="color:red">*</span></label>
                                                    <div class="col-sm-5">                                                        
                                                        <input type="text" placeholder="Ex 0.8" class="form-control" name="caption_opacity" id="caption_opacity" value="<?php  if(!empty($general)) {  echo $general[0]->caption_opacity; } ?>" />
                                                    </div>
                                         </div>                                                                             
                                        
                                        

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Update</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div> 
                                    <div id="dvPreview">
                                  </div>
                                </div>
                                 
                                <!----CREATION FORM ENDS-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    
     <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
   
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#survey-table').dataTable({
            });

        });

    </script>
    
<style>
    .nav-fixedtabs {
    left: 86%;
    position: fixed;
    top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }
    
    </style>
    
    <div class="md-fab-wrapper">
        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addbanner/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>