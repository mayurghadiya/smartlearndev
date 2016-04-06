<?php
$edit_data = $this->db->get_where('event_manager', array('event_id' => $param2))->result_array();
?>
<div class="panel panel-primary">
    <div class="panel panel-heading">
        <div class="panel-title">Edit Event</div>
    </div>
    <div class="panel-body">
        <div class="tab-pane box active" id="edit">
            <div class="box-content">
                <?php foreach ($edit_data as $row): ?>
                    <?php echo form_open(base_url() . 'index.php?admin/events/do_update/' . $row['event_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'editevent', 'target' => '_top', 'role' => 'form')); ?>
                    <div class="form-group">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Name<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="event_name" id="event_name" value="<?php echo $row['event_name']; ?>"/>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Location<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" id="event_location" class="form-control" name="event_location" 
                                       value="<?php echo $row['event_location']; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <textarea name="event_desc" rows="4"><?php echo $row['event_desc']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Date<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" id="datepicker-date123" class="form-control" name="event_date" value="<?php echo date('d F Y', strtotime($row['event_date'])); ?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Event Time<span style="color:red">*</span></label>
                            <div class="col-sm-7">
                                <input type="time" id="event_time" class="form-control" name="event_time" 
                                       value="<?php echo date('H:i', strtotime($row['event_date'])); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-7">
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                    </form>
                <?php endforeach; ?>
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
        $("#datepicker-date123").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            minDate: new Date()

        });
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
