<?php 
$edit_data		=	$this->db->get_where('university_peoples' , array('university_people_id' => $param2) )->result_array();
foreach ( $edit_data as $row):
?>
    
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                   <?php echo ucwords("Update chancellor");?>
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                  <div class="box-content">
                    <div class="">
                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                    </div>                                    
                    <?php echo form_open(base_url() . 'index.php?admin/chancellor/do_update/'.$row['university_people_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'editfrmchancellor', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Name");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['people_name'];?>" />
                            </div>
                        </div>												

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Email Id");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email_id" id="email_id" value="<?php echo $row['people_email'];?>" />
                                <span id="emailerror" style="color: red"></span>
                            </div>
                        </div>                            
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("designation");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $row['people_designation'];?>"/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Mobile No");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="mobileno" id="mobileno" value="<?php echo $row['people_phone'];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Facebook URL");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $row['facebook_link'];?>"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Twitter URL");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $row['twitter_link'];?>"/>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("google plus link");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="googleplus" id="googleplus" value="<?php echo $row['google_plus_link'];?>"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Profile Photo");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                 <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['people_photo']; ?>" />
                                <input type="file" class="form-control" name="profilefile" id="profilefile" />
                                <span id="imgerror" style="color:red;"></span>
                                <img src="<?= base_url() ?>/uploads/system_image/<?= $row['people_photo']; ?>" height="100px" width="100px" id="blah"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="description" id="description" ><?php echo $row['people_description']?></textarea>
                            </div>
                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("update");?></button>
                            </div>
                        </div>
                        </form>               
                    </div>                
                </div>
                </div> </div>
        </div>
    </div>
</div>
    
<?php
endforeach;
?>

<script type="text/javascript">

    $.validator.setDefaults({
        submitHandler: function (form) {

            form.submit();

        }
    });

    $(document).ready(function () {

        $("#birthdate").datepicker({
            maxDate: 0
        });

        jQuery.validator.addMethod("mobile_no", function (value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        }, 'Please enter a valid contact no.');
        jQuery.validator.addMethod("email_id", function (value, element) {
            return this.optional(element) || /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value);
        }, 'Please enter a valid email address.');

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("zip_code", function (value, element) {
            return this.optional(element) || /^[0-9]+$/.test(value);
        }, 'Please enter a valid zip code.');

        $("#editfrmchancellor").validate({
            rules: {
                name:
                        {
                            required: true,
                            character: true,
                        },
                email_id:
                        {
                            required: true,
                            email_id: true,                           
                        },
                mobileno:
                        {
                            required: true,
                            maxlength: 11,
                            mobile_no: true,
                            minlength: 10,
                        },
                facebook:
                        {
                            url2: true,
                        },
                twitter:
                        {
                            url2: true,
                        },
                googleplus:
                {
                    url2: true,
                },
                admissiontype: "required",
                 designation: "required",
                profilefile: {
                    extension: 'gif|png|jpg|jpeg',
                }
            },
            messages: {
                name:
                        {
                            required: "Enter name",
                            character: "Enter valid name",
                        },
                email_id: {
                    required: "Enter email id",
                    email_id: "Enter valid email id",
                },
                mobileno:
                        {
                            required: "Enter mobile no",
                            maxlength: "Enter maximum 10 digit number",
                            mobile_no: "Enter valid mobile number",
                            minlength: "Enter minimum 10 digit number",
                        },
                designation: "Enter designation",
                profilefile: {
                    extension: "Upload valid file",
                }
            }
        });
    });
</script>
    
    
    
    