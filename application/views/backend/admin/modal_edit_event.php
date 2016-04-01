<?php 
$edit_data		=	$this->db->get_where('event_manager' , array('event_id' => $param2) )->result_array();

?>

<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/events/do_update/'.$row['event_id'] , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'editevent','target'=>'_top','role'=>'form'));?>
            <div class="padded">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Event Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="event_name" id="event_name" value="<?php echo $row['event_name'];?>"/>
                    </div>
                </div>               
                <div class="form-group">
                    <label class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="event_desc" rows="4"><?php echo $row['event_desc'];?></textarea>
                    </div>
                </div>
				 <div class="form-group">
                    <label class="col-sm-3 control-label">Event Date</label>
                    <div class="col-sm-5">
                        <input type="text" id="datepicker-date123" class="form-control" name="event_date" value="<?php echo $row['event_date'];?>"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-5">
                  <button type="submit" class="btn btn-info">Update</button>
              </div>
            </div>
        </form>
        <?php endforeach;?>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
    $.noConflict();
$(window).load(function() 
{	"use strict";	
	$( "#datepicker-date123" ).datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true
	
	});
});
/*$(function() {
	$('#datepicker-date123').datepicker({
        dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
        onSelect: function(datetext){
            var d = new Date(); // for now
            datetext=datetext+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
            $('#datepicker-date123').val(datetext);
        },
    });
});*/
</script>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>
<script type="text/javascript">
  $.validator.setDefaults({
		submitHandler: function() {
			document.getElementById("editevent").submit();
		}
	});

	$().ready(function() {	
		$("#editevent").validate({		
			rules: {
				event_name: "required",
				event_desc: "required",
				event_date: "required"
			},
			messages: {
				event_name: "Please Enter Event Name",
				event_desc: "Please Enter Event Description",
				event_date: "Please Select Event Date"
			}
		});
	});
	</script>
