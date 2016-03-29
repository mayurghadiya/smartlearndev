<?php 
$edit_data		=	$this->db->get_where('center_user' , array('center_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
    
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit Center
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                <?php echo form_open(base_url() . 'index.php?admin/center/do_update/'.$row['center_id'] , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'frmeditcenter','target'=>'_top'));?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Center Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="centername" id="centername" value="<?php echo $row['center_name']?>"/>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Center Contact Name<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="center_contactname" id="center_contactname" value="<?php echo $row['name']?>"/>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['emailid']?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Contact No<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo $row['contactno']?>"/>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city']?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Zipcode<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $row['zipcode']?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="address" id="address"><?php echo $row['address']?></textarea>
                            </div>
                        </div>										
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Setting Number<span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="settingno" id="settingno" value="<?php echo $row['setting_number']?>"/>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-5">
                                <input type="checkbox" data-rel="switch" name="batch_status" value="1" data-size="mini" data-wrapper-class="yellow" <?php if($row['center_status'] == 1) { ?> checked <?php } ?>>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="submit btn btn-info">Edit</button>
                            </div>
                        </div>
                        </form>
                    </div> </div> </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function(form) {			
            form.submit();
        }
    });
    
    $().ready(function() {	
        
        jQuery.validator.addMethod("mobile_no", function(value, element) {
            return this.optional( element ) ||  /^[0-9-+]+$/.test( value );
        }, 'Please enter a valid contact no.');
        
        jQuery.validator.addMethod("zip_code", function(value, element) {
            return this.optional( element ) ||  /^[0-9]{6}$/.test( value );
        }, 'Please enter a valid zip code.');
        
        jQuery.validator.addMethod("character", function(value, element) {
            return this.optional( element ) ||  /^[A-z]+$/.test( value );
        }, 'Please enter a valid character.');
        
        $("#frmeditcenter").validate({		
            rules: {
                centername: 
                        {
                            required:true,
                    character:true,
                },
                center_contactname: 
                        {
                            required:true,
                    character:true,
                },
                email:
                        {
                            required:true,
                    email:true,
                    
                },
                contactno: 
                        {
                            required:true,
                    maxlength: 11,
                    mobile_no: true,
                    minlength: 10,					
                },
                city:
                        {
                            required:true,
                    character:true,
                },
                zipcode:
                        {
                            required:true,
                    zip_code:true,
                },
                address:'required',
                settingno:
                        {
                            required:true,
                    mobile_no:true,
                },
                password:'required',
            },
            messages: {
                
                centername:
                        {
                            required:"Enter center name",
                },
                center_contactname:
                        {
                            required:"Enter center contact name",
                },
                email:
                        {
                            required:"Enter email id",
                    email:"Enter valid email id",
                },
                contactno: 
                        {
                            required:"Enter mobile no",	
                    maxlength:"Enter valid contact no",
                    mobile_no:"Enter valid contact no",
                    minlength:"Enter valid contact no",	
                    
                },
                city:
                        {
                            required:"Enter city",
                    character:"Enter valid city name",
                },
                zipcode:
                        {
                            required:"Enter zipcode",
                },
                address:'Enter address',
                settingno:
                        {
                            required:"Enter setting number",
                    mobile_no:"Enter valid setting number" ,
                },
                password:'Enter password',
            }
        });
    });
</script>