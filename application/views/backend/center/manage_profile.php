<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1>Center Profile form</h1>            
                        </div>
                    </div>
                    <div class="vd_content-section clearfix">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel widget light-widget">
                                    <?php echo form_open(base_url() . 'index.php?center_user/manage_profile/update', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmprofile', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="centername" id="centername" value="<?php echo $edit_data[0]['center_name']?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center Contact Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="center_contactname" id="center_contactname" value="<?php echo $edit_data[0]['name']?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $edit_data[0]['emailid']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact No<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo $edit_data[0]['contactno']?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="city" id="city" value="<?php echo $edit_data[0]['city']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zipcode<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $edit_data[0]['zipcode']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="address" id="address"><?php echo $edit_data[0]['address']?></textarea>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Setting Number<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="settingno" id="settingno" value="<?php echo $edit_data[0]['setting_number']?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $edit_data[0]['real_password']?>"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Edit Center</button>
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
        </div>
    </div>
</div>

 <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

            jQuery.validator.addMethod("mobile_no", function (value, element) {
                return this.optional(element) || /^[0-9-+]+$/.test(value);
            }, 'Please enter a valid contact no.');

            jQuery.validator.addMethod("zip_code", function (value, element) {
                return this.optional(element) || /^[0-9]{6}$/.test(value);
            }, 'Please enter a valid zip code.');

            jQuery.validator.addMethod("character", function (value, element) {
                return this.optional(element) || /^[A-z ]+$/.test(value);
            }, 'Please enter a valid character.');

            $("#frmprofile").validate({
                rules: {
                    centername:
                            {
                                required: true,
                                character: true,
                            },
                    center_contactname:
                            {
                                required: true,
                                character: true,
                            },
                    email:
                            {
                                required: true,
                                email: true,
                            },
                    contactno:
                            {
                                required: true,
                                maxlength: 11,
                                mobile_no: true,
                                minlength: 10,
                            },
                    city:
                            {
                                required: true,
                                character: true,
                            },
                    zipcode:
                            {
                                required: true,
                                zip_code: true,
                            },
                    address: 'required',
                    settingno:
                            {
                                required: true,
                                mobile_no: true,
                            },
                    password: 'required',
                },
                messages: {
                    centername:
                            {
                                required: "Enter center name",
                            },
                    center_contactname:
                            {
                                required: "Enter center contact name",
                            },
                    email:
                            {
                                required: "Enter email id",
                                email: "Enter valid email id",
                            },
                    contactno:
                            {
                                required: "Enter mobile no",
                                maxlength: "Enter valid contact no",
                                mobile_no: "Enter valid contact no",
                                minlength: "Enter valid contact no",
                            },
                    city:
                            {
                                required: "Enter city",
                                character: "Enter valid city name",
                            },
                    zipcode:
                            {
                                required: "Enter zipcode",
                            },
                    address: 'Enter address',
                    settingno:
                            {
                                required: "Enter setting number",
                                mobile_no: "Enter valid setting number",
                            },
                    password: 'Enter password',
                }
            });
        });
    </script>