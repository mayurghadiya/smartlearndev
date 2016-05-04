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
                         <li><?php echo ucwords("Photo Gallery");?></li>
                    </ul>                
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Photo Gallery</h1>

                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   Photo Gallery
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
                                                    <th><div>Image</div></th>
                                                    <th><div>Action</div></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                foreach ($gallery as $row):
                                                    ?>
                                                    <tr>
                                                       <td><?php echo $count++; ?></td>    
                                                    <td><?php echo $row->gallery_title; ?></td>    
                                                    <td><?php echo $row->gallery_desc; ?></td>  
                                                    <td><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_view_photogallery/<?php echo $row->gallery_id; ?>');" data-original-title="View Gallery" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-file-o"></i></a>	</td></td>
                                                  <td>  <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_photogallery/<?php echo $row->gallery_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?media/photogallery/delete/<?php echo $row->gallery_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	</td>
                                                       
                                                    </tr>
                                                <?php endforeach; ?>                        
                                            </tbody>
                                        </table>
                                    </div>
                                
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
                                 
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
        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addphotogallery/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>