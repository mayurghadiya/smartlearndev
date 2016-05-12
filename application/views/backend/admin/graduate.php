<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("university");?></li>
                         <li><?php echo ucwords("graduate");?></li>
                    </ul>                 
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Toppers Graduate"); ?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("graduates list"); ?>
                                </a></li>
                            
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-responsive" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th width="10%">Image</th>
                                                <th><?php echo ucwords("student name"); ?></th>
                                                <th><?php echo ucwords("department"); ?></th>
                                                <th><?php echo ucwords("branch"); ?></th>
                                                <th><?php echo ucwords("graduation year"); ?></th>
                                                <th><?php echo ucwords("action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($graduates as $row) { ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><img class="img-circle img-responsive" src="<?php echo base_url('uploads/student_image/' . $row->std_thumb_img); ?>"/></td>
                                                    <td><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->graduate_year; ?></td>
                                                    <td>
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_graduate/<?php echo $row->graduates_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/graduate/delete/<?php echo $row->graduates_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    
                                                    </td>
                                                </tr>	
                                            <?php } ?>

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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addgraduate/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>