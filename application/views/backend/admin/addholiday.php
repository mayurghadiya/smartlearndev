 <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add holiday");?>
                    </div>
                </div>
                <div class="panel-body"> 
                    <div class="box-content"> 
                                <div class="">
                                    <span style="color:red">*<?php echo "is ".ucwords("mandatory field");?> </span> 
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
                    
                  </div>
              </div>
      </div>
               </div> 

    <script>
         $(document).ready(function () {
         $("#holiday_startdate").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
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