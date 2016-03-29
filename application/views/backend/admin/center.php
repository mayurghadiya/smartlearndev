    
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">				 
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Center Management</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Center List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Exam Center 
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th>Center Name</th>
                                                <th>Center Contact Name</th>
                                                <th>Email Id</th>
                                                <th>City</th>
                                                <th>Zipcode</th>
                                                <th>Address</th>
                                                <th>Setting Number</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($centeruser as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row->center_name; ?></td>
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->emailid; ?></td>
                                                    <td><?php echo $row->city; ?></td>
                                                    <td><?php echo $row->zipcode; ?></td>
                                                    <td><?php echo $row->address; ?></td>
                                                    <td><?php echo $row->setting_number; ?></td>
                                                    <td class="text-center">
                                                        <?php if ($row->center_status == '1') { ?>
                                                            <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                            <span class="label label-default">InActive</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_center/<?php echo $row->center_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/center/delete/<?php echo $row->center_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>	
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
                                    <?php echo form_open(base_url() . 'index.php?admin/center/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmcenter', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="centername" id="centername"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Center Contact Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="center_contactname" id="center_contactname"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email" id="email"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Contact No<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="contactno" id="contactno"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="city" id="city"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zipcode<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="zipcode" id="zipcode"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="address" id="address"></textarea>
                                            </div>
                                        </div>										
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Setting Number<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="settingno" id="settingno"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-5">
                                                <input type="checkbox" data-rel="switch" name="center_status" value="1" data-size="mini" data-wrapper-class="yellow" checked>									
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Center</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
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
                return this.optional(element) || /^[A-z]+$/.test(value);
            }, 'Please enter a valid character.');

            $("#frmcenter").validate({
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