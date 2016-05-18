<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                     <ul class="breadcrumb">                    
                    <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("batch");?></li>
                     </ul>         
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("batch management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("batch list");?>
                                </a></li>
                            
                        </ul>
                        <!------CONTROL TABS END------>
                            
                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">
                                
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("batch name");?></th>
                                                <th><?php echo ucwords("department");?></th>
                                                <th><?php echo ucwords("branch");?></th>
                                                <th><?php echo ucwords("status");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($batches as $row):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['b_name']; ?></td>    
                                                <td> <?php
                                                       $explodedegree =explode(',',$row['degree_id']);
                                                        foreach ($degree as $deg) {
                                                            if (in_array($deg['d_id'],$explodedegree)) {
                                                                echo $deg['d_name']."<br> ";
                                                            }
                                                        }
                                                        ?></td>
                                                <td>                                                    
                                                    <?php
                                                    $explodecourse =explode(',',$row['course_id']);
                                                        foreach ($course as $crs) {
                                                            if (in_array($crs->course_id, $explodecourse)) {
                                                                echo $crs->c_name."<br>";
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                        <?php if ($row['b_status'] == '1') { ?>
                                                    <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                    <span class="label label-default">InActive</span>
    <?php } ?>
                                                </td>
                                                <td class="menu-action">
                                                     <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_batch/<?php echo $row['b_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/batch/delete/<?php echo $row['b_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addbatch/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

