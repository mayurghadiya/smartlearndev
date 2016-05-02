<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <?php echo set_breadcrumb(); ?>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Event Manager"); ?></h1>
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Event List"); ?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Event"); ?>
                                </a>
                            </li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <div class="tab-pane box active" id="list">
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="event-data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("Event Name"); ?></th>
                                                <th><?php echo ucwords("Description"); ?></th>
                                                <th><?php echo ucwords("Event Date"); ?></th>
                                                <th><?php echo ucwords("Event Time"); ?></th>
                                                <th><?php echo ucwords("Action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($events as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['event_name']; ?></td>
                                                    <td><?php echo $row['event_desc']; ?></td>                          
                                                    <td><?php echo date('F d, Y', strtotime($row['event_date'])); ?></td> 
                                                    <td><?php echo date('h:i A', strtotime($row['event_date'])); ?></td> 
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_event/<?php echo $row['event_id']; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/events/delete/<?php echo $row['event_id']; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">   
                                    <div class="">
                                        <span style="color:red">* <?php echo ucwords("is mandatory field"); ?></span> 
                                    </div>                                      
                                    <?php echo form_open(base_url() . 'index.php?admin/events/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'eventform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Event Name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="event_name" value=""/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Event Location"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" id="event_location" class="form-control" name="event_location" value=""/>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea name="event_desc" rows="3"></textarea>									</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Start Date"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" id="datepicker-date" class="form-control" name="event_date" value=""/>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("End Date"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" id="datepicker-end-date" class="form-control" name="event_end_date" value=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Event Time"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="time" id="event_time" class="form-control" name="event_time" value=""/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Group"); ?></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="group">
                                                    <option value="">Select</option>
                                                    <?php foreach ($group as $row) { ?>
                                                        <option value="<?php echo $row->g_id; ?>"><?php echo $row->group_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add"); ?></button>
                                            </div>
                                        </div>
                                    </div>    
                                    </form>         
                                </div>
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
</div>
<!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 


<!-- Specific Page Scripts Put Here -->

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
<script type="text/javascript">

                                                            $().ready(function () {
                                                                $("#datepicker-date").datepicker({
                                                                    dateFormat: 'dd M yy',
                                                                    changeMonth: true,
                                                                    changeYear: true,
                                                                    minDate: new Date(),
                                                                    onClose: function (selectedDate) {
                                                                        $("#datepicker-end-date").datepicker("option", "minDate", selectedDate);
                                                                    }
                                                                });
                                                                $("#datepicker-end-date").datepicker({
                                                                    dateFormat: 'dd M yy',
                                                                    changeMonth: true,
                                                                    changeYear: true,
                                                                    minDate: new Date(),
                                                                    onClose: function (selectedDate) {
                                                                        //$(".datepicker-normal").datepicker("option", "maxDate", new Date());
                                                                    }
                                                                })
                                                                $("#eventform").validate({
                                                                    rules: {
                                                                        event_name: "required",
                                                                        event_desc: "required",
                                                                        event_date: "required",
                                                                        event_location: "required",
                                                                        event_time: "required"
                                                                    },
                                                                    messages: {
                                                                        event_name: "Please enter event name",
                                                                        event_desc: "Please enter event description",
                                                                        event_date: "Please select event date",
                                                                        event_location: "Please enter event location",
                                                                        event_time: "Please enter event time"
                                                                    }
                                                                });
                                                            });
</script>

<script>
    $(document).ready(function () {
        $('#event-data-tables').dataTable();
    })
</script>
<?php include('plus_icon.php'); ?>