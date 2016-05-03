<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                  <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("holiday");?></li>
                    </ul>               
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("holiday management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("holiday list");?>
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
                                                <th><?php echo ucwords("holiday name");?></th>
                                                <th><?php echo ucwords("holiday start date");?></th>
                                                <th><?php echo ucwords("holiday end date");?></th>
                                                <th><?php echo ucwords("year");?></th>
                                                <th><?php echo ucwords("status");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($holiday as $row):
                                                ?><tr>
                                            <td><?php echo $count++; ?></td>
                                              <td><?php echo $row['holiday_name']; ?></td>    
                                              <td><?php echo date('F d, Y', strtotime($row['holiday_startdate'])); ?></td>    
                                              <td><?php echo date('F d, Y', strtotime($row['holiday_enddate'])); ?></td>    
                                              <td><?php echo $row['holiday_year']; ?></td>   
                                              <td>
                                                <?php if ($row['holiday_status'] == '1') { ?>
                                                <span class="label label-success">Active</span>
                                                    <?php } else { ?>	
                                                <span class="label label-default">InActive</span>
                                                <?php } ?>
                                                </td>
                                                <td class="menu-action">
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_holiday/<?php echo $row['holiday_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/holiday/delete/<?php echo $row['holiday_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->
                                
                                
                            
                            
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
     <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
   