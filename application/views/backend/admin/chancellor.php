<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("Home");?></a> </li>
                        <li><?php echo ucwords("basic management");?></li>
                        <li class="active"><?php echo ucwords("chancellor Management");?></li>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("chancellor Management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                     <?php echo ucwords("chancellor List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                     <?php echo ucwords("Add chancellor");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">

                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">	
                                <div class="panel-body table-responsive" >
                                      <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("chancellor name");?></th>
                                                <th><?php echo ucwords("contact no");?></th>
                                                <th><?php echo ucwords("email id");?></th>
                                                <th><?php echo ucwords("designation");?></th>
                                                <th><?php echo ucwords("description");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($chancellor as $row):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['people_name']; ?></td>    
                                               <td><?php echo $row['people_phone']; ?></td> 
                                                <td><?php echo $row['people_email']; ?></td> 
                                                 <td><?php echo $row['people_designation']; ?></td> 
                                                 <td><?php echo $row['people_description']; ?></td> 
                                                <td class="menu-action">
                                                     <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_chancellor/<?php echo $row['university_people_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/batch/delete/<?php echo $row['university_people_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>

                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">
                                    <div class="">
                                        <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                    </div >                                    
                                    <?php echo form_open(base_url() . 'index.php?admin/chancellor/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmchancellor', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name" id="name" />
                                            </div>
                                        </div>												
                                        											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Email Id");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email_id" id="email_id"  />
                                                <span id="emailerror" style="color: red"></span>
                                            </div>
                                        </div>                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("designation");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="designation" id="designation" />
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Mobile No");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="mobileno" id="mobileno" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Facebook URL");?></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="facebook" id="facebook" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Twitter URL");?></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="twitter" id="twitter" />
                                            </div>
                                        </div>	
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("google plus link");?></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="googleplus" id="googleplus" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Profile Photo");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="profilefile" id="profilefile"  />
                                                <span id="imgerror" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
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

        $("#frmchancellor").validate({
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
                    required: true,
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
                    required: "Upload image",
                    extension: "Upload valid file",
                }
            }
        });
    });
</script>
<?php include('plus_icon.php'); ?>