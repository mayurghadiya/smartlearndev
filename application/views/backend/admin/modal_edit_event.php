<?php
$edit_data = $this->db->get_where('event_manager', array('event_id' => $param2))->result_array();
?>
<div class="panel panel-primary">
    <div class="panel panel-heading">
        <div class="panel-title"><?php echo ucwords("Update Event"); ?></div>
    </div>
    <div class="panel-body">
        <div class="tab-pane box" id="edit">
            <div class="box-content">
                <span style="color:red">* <?php echo ucwords("is mandatory field"); ?></span> 
                <?php
                foreach ($edit_data as $row) {
                    
                }
                ?>
                <?php echo form_open(base_url() . 'index.php?admin/events/do_update/' . $row['event_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'editevent', 'target' => '_top', 'role' => 'form')); ?>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Event Name"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="event_name" id="event_name" value="<?php echo $row['event_name']; ?>"/>
                    </div>
                </div>    
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Event Location"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" id="event_location" class="form-control" name="event_location" 
                               value="<?php echo $row['event_location']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Description"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <textarea name="event_desc" rows="4"><?php echo $row['event_desc']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Start Date"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" id="edit-datepicker-date" class="form-control" name="event_date" value="<?php echo date('d F Y', strtotime($row['event_date'])); ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("End Date"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" id="edit-datepicker-end-date" class="form-control" name="event_end_date" value="<?php echo date('d F Y', strtotime($row['event_end_date'])); ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Event Time"); ?><span style="color:red">*</span></label>
                    <div class="col-sm-7">
                        <input type="time" id="event_time" class="form-control" name="event_time" 
                               value="<?php echo date('H:i', strtotime($row['event_date'])); ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo ucwords("Group"); ?></label>
                    <div class="col-sm-7">
                        <select class="form-control" name="group">
                            <?php
                            $group = $this->db->get('group')->result();
                            ?>
                            <option>Select</option>
                            <?php foreach ($group as $gp) { ?>
                                <option value="<?php echo $gp->g_id; ?>"
                                        <?php if ($gp->g_id == $row['group_id']) echo 'selected'; ?>><?php echo $gp->group_name; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-7">
                        <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Update"); ?></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function () {
            document.getElementById("editevent").submit();
        }
    });

    $().ready(function () {
        $("#edit-datepicker-date").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            minDate: new Date(),
            onClose: function (selectedDate) {
                $("#edit-datepicker-end-date").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#edit-datepicker-end-date").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            minDate: new Date(),
            onClose: function (selectedDate) {
                //$(".datepicker-normal").datepicker("option", "maxDate", new Date());
            }
        })
        $("#editevent").validate({
            rules: {
                event_name: "required",
                event_desc: "required",
                event_date: "required",
                event_location: "required",
                event_time: "required"
            },
            messages: {
                event_name: "Please Enter Event Name",
                event_desc: "Please Enter Event Description",
                event_date: "Please Select Event Date",
                event_location: "Please enter event location",
                event_time: "Please enter event time"
            }
        });
    });
</script>
