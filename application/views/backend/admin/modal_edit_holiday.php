<?php 
$edit_data		=	$this->db->get_where('holiday' , array('holiday_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
    
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   <?php echo ucwords("Update holiday");?>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                         <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>
                <?php echo form_open(base_url() . 'index.php?admin/holiday/do_update/'.$row['holiday_id'] , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'holidayformedit','target'=>'_top'));?>
                       <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("holiday name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_name" id="holiday_name" value="<?php echo $row['holiday_name'];?>" />
                                            </div>
                                        </div>	
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("start date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_startdate1" id="holiday_startdate1" value="<?php echo date('d F Y', strtotime($row['holiday_startdate'])); ?>"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("end date");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="holiday_enddate1" id="holiday_enddate1" value="<?php echo date('d F Y', strtotime($row['holiday_enddate'])); ?>" />
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="batch_status">
                                                  <option value="1" <?php if($row['holiday_status'] == '1'){ echo "selected"; } ?>>Active</option>
                                    <option value="0" <?php if($row['holiday_status'] == '0'){ echo "selected"; } ?>>Inactive</option>	
                                                </select>
                                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            	
                                            </div>
                                             
                                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                            </div>
                        </div>
                    </div> </div> </div>
        </div>
    </div>
</div>
    
<?php
endforeach;
?>

  <script>
         $(document).ready(function () {
         $("#holiday_startdate1").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                onClose: function (selectedDate) {
                    $("#holiday_enddate1").datepicker("option", "minDate", selectedDate);
                }
            });
            
            $("#holiday_enddate1").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                onClose: function (selectedDate) {
                    $("#holiday_startdate1").datepicker("option", "maxDate", selectedDate);
                }
            });
            
             $("#holidayformedit").validate({
                rules: {
                    holiday_name: "required",
                    holiday_status: "required",
                    holiday_startdate1:"required",
                    holiday_enddate1:"required",
                },
                messages: {
                    holiday_name: "Enter holiday name",
                    holiday_status: "Select status",
                    holiday_startdate1:"Select date",
                    holiday_enddate1:"Select date",
                }
            });
            
          });
        </script>
