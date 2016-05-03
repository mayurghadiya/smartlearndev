  <?php $group = $this->db->get('group')->result(); ?>
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
                                                                        event_end_date:"required",
                                                                        event_location: "required",
                                                                        event_time: "required"
                                                                    },
                                                                    messages: {
                                                                        event_name: "Please enter event name",
                                                                        event_desc: "Please enter event description",
                                                                        event_date: "Please select event date",
                                                                         event_end_date:"Please select event end date",
                                                                        event_location: "Please enter event location",
                                                                        event_time: "Please enter event time"
                                                                    }
                                                                });
                                                            });
</script>
