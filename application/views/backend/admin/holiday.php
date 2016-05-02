<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><?php echo set_breadcrumb(); ?></li>
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
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("add holiday");?>
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
                                
                                
                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content"> 
                                <div class="">
                                    <span style="color:red">*<?php echo ucwords(" is mandatory field");?> </span> 
                                </div>
<?php echo form_open(base_url() . 'index.php?admin/holiday/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'holidayform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("holiday name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_name" id="holiday_name"/>
                                            </div>
                                        </div>	
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("start date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_startdate" id="holiday_startdate"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("end date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_enddate" id="holiday_enddate"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="holiday_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>	
                                                </select>
                                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add");?></button>
                                            </div>
                                        </div>
                                        </form>               
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
   
    <script>
         $(document).ready(function () {
         $("#holiday_startdate").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
               //  minDate: new Date(),
                onClose: function (selectedDate) {
                    $("#holiday_enddate").datepicker("option", "minDate", selectedDate);
                }
            });
            
            $("#holiday_enddate").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                onClose: function (selectedDate) {
                    $("#holiday_startdate").datepicker("option", "maxDate", selectedDate);
                }
            });
            
            $("#holidayform").validate({
                rules: {
                    holiday_name: "required",
                    holiday_status: "required",
                    holiday_startdate:"required",
                    holiday_enddate:"required",
                },
                messages: {
                    holiday_name: "Enter holiday name",
                    holiday_status: "Select status",
                     holiday_startdate:"Select date",
                     holiday_enddate:"Select date",
                }
            });
          });
        </script>
<?php include('plus_icon.php'); ?>